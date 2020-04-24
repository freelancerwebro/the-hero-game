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
    }

    public function initBeast(Character $beast)
    {
        $this->beast = $beast;
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

            $this->checkIfDefenderWasLucky();
            $this->updateDefenderHealth();
            $this->printRoundStats($round);
            $this->changeBattleRounds();
        }

        $this->printBattleResults();
    }

    public function isEndOfBattle()
    {
        if($this->defender->getStat('health') <= 0 || $this->attacker->getStat('health') <= 0)
        {
            return true;
        }

        return false;
    }

    public function selectFirstAttacker()
    {
        if($this->hero->getStat('speed') > $this->beast->getStat('speed'))
        {
            $this->attacker = $this->hero;
            $this->defender = $this->beast; 
            return false;
        }

        if($this->hero->getStat('speed') < $this->beast->getStat('speed'))
        {
            $this->attacker = $this->beast;
            $this->defender = $this->hero;  
            return false;
        }

        if($this->hero->getStat('luck') > $this->beast->getStat('luck'))
        {
            $this->attacker = $this->hero;
            $this->defender = $this->beast; 
            return false;
        }

        if($this->hero->getStat('luck') < $this->beast->getStat('luck'))
        {
            $this->attacker = $this->beast;
            $this->defender = $this->hero;  
            return false;
        }

        $this->attacker = $this->hero;
        $this->defender = $this->beast; 
    }

    public function getDamage()
    {
        $damage = 0;
        
        if($this->attacker->getStat('strength') > $this->defender->getStat('defence'))
        {
            return $this->attacker->getStat('strength') - $this->defender->getStat('defence');
        }

        return $damage;
    }

    public function updateDefenderHealth()
    {
        $damage = $this->getDamage();

        if($this->defenderWasLucky === true)
        {
            $damage = 0;
        }

        $newHealthValue = $this->defender->getStat('health') - $damage;

        if($newHealthValue < 0)
        {   
            $newHealthValue = 0;
        }

        $this->defender->setHealth($newHealthValue);
    }

    public function changeBattleRounds()
    {
        $temp = $this->attacker;
        $this->attacker = $this->defender;
        $this->defender = $temp;
    }

    public function getWinner()
    {
        if($this->attacker->getStat('health') > $this->defender->getStat('health'))
        {
            return $this->attacker;
        }

        return $this->defender;
    }

    public function checkIfDefenderWasLucky()
    {
        $rand = mt_rand(0, 100);
        if($rand <= 50)
        {
            $this->defenderWasLucky = true;
            return;
        }   

        $this->defenderWasLucky = false;
    }

    public function printInitialStats()
    {
        $this->logger->printInitialStats($this);
    }
    
    public function printRoundStats($currentRound)
    {
        $this->logger->printRoundStats($this, $currentRound);
    }

    public function printBattleResults()
    {
        $this->logger->printBattleResults($this);
    }
}