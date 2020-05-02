<?php
namespace HeroGame\Battle;
use HeroGame\Characters\Character;
use HeroGame\Logger\LoggerInterface;
use HeroGame\Config\ConfigInterface;

class Battle implements BattleInterface {
    
    private $currentRound     = null;

    private $attacker         = null;
    private $defender         = null;

    private $hero             = null;
    private $beast            = null;

    private $config           = null;
    private $logger           = null;

    private $defenderWasLucky = false;

    public function __construct(ConfigInterface $config, LoggerInterface $logger)
    {
        $this->config = $config;
        $this->logger = $logger;
    }

    public function initHero(Character $hero)
    {
        $this->hero = $hero;
        return $this;
    }

    public function initBeast(Character $beast)
    {
        $this->beast = $beast;
        return $this;
    }

    public function getHero()
    {
        return $this->hero;
    }

    public function getBeast()
    {
        return $this->beast;
    }

    public function getAttacker()
    {
        return $this->attacker;
    }

    public function getDefender()
    {
        return $this->defender;
    }

    public function getDefenderWasLucky()
    {
        return $this->defenderWasLucky;
    }

    public function startBattle()
    {
        $this->printInitialStats();
        $this->selectFirstAttacker();

        for($round = 1; $round <= $this->config::BATTLE_ROUNDS; $round++)
        {
            $this->currentRound = $round;

            if($this->isEndOfBattle() === true)
            {
                break;
            }

            $this->playRound($round);
        }

        $this->printBattleResults();
    }

    private function playRound(int $round)
    {
        $this->checkIfDefenderWasLucky();
        $this->updateDefenderHealth();
        $this->printRoundStats($round);
        $this->switchPlayerRoles();
    }

    private function isEndOfBattle()
    {
        if($this->defender->getHealth() <= 0 || $this->attacker->getHealth() <= 0)
        {
            return true;
        }

        return false;
    }

    private function selectFirstAttacker()
    {
        if($this->hero->getSpeed() > $this->beast->getSpeed())
        {
            $this->attacker = $this->hero;
            $this->defender = $this->beast; 
            return false;
        }

        if($this->hero->getSpeed() < $this->beast->getSpeed())
        {
            $this->attacker = $this->beast;
            $this->defender = $this->hero;  
            return false;
        }

        if($this->hero->getLuck() > $this->beast->getLuck())
        {
            $this->attacker = $this->hero;
            $this->defender = $this->beast; 
            return false;
        }

        if($this->hero->getLuck() < $this->beast->getLuck())
        {
            $this->attacker = $this->beast;
            $this->defender = $this->hero;  
            return false;
        }

        $this->attacker = $this->hero;
        $this->defender = $this->beast; 
    }

    private function calculateDamage()
    {
        $damage = 0;
        
        if($this->attacker->getStrength() > $this->defender->getDefence())
        {
            return $this->attacker->getStrength() - $this->defender->getDefence();
        }

        return $damage;
    }

    private function updateDefenderHealth()
    {
        $damage = $this->calculateDamage();

        if($this->defenderWasLucky === true)
        {
            $damage = 0;
        }

        $newHealthValue = $this->defender->getHealth() - $damage;

        if($newHealthValue < 0)
        {   
            $newHealthValue = 0;
        }

        $this->defender->setHealth($newHealthValue);
    }

    private function switchPlayerRoles()
    {
        $temp = $this->attacker;
        $this->attacker = $this->defender;
        $this->defender = $temp;
    }

    public function getWinner()
    {
        if($this->attacker->getHealth() > $this->defender->getHealth())
        {
            return $this->attacker;
        }

        return $this->defender;
    }

    private function checkIfDefenderWasLucky()
    {
        $rand = mt_rand(0, 100);
        if($rand <= $this->defender->getLuck())
        {
            $this->defenderWasLucky = true;
            return;
        }   

        $this->defenderWasLucky = false;
    }

    private function printInitialStats()
    {
        $this->logger->printInitialStats($this);
    }
    
    private function printRoundStats($currentRound)
    {
        $this->logger->printRoundStats($this, $currentRound);
    }

    private function printBattleResults()
    {
        $this->logger->printBattleResults($this);
    }
}