<?php

namespace HeroGame\Battle;

use HeroGame\Characters\Character;

class Battle{
	
	private $currentRound     = null;

	private $attacker 	      = null;
	private $defender         = null;

	private $hero 	          = null;
	private $beast  	      = null;

	private $config       	  = null;

	private $defenderWasLucky = false;

	public function __construct(Config $config)
	{
		$this->config = $config;
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


	public function initHero(Character $hero)
	{
		$this->hero = $hero;
	}

	public function initBeast(Character $beast)
	{
		$this->beast = $beast;
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
		echo "Start Battle!".PHP_EOL.PHP_EOL;
		echo "Hero health: ".$this->hero->getStat('health').PHP_EOL;
		echo "Hero strength: ".$this->hero->getStat('strength').PHP_EOL;
		echo "Hero speed: ".$this->hero->getStat('speed').PHP_EOL;
		echo "Hero defence: ".$this->hero->getStat('defence').PHP_EOL;
		echo "Hero luck: ".$this->hero->getStat('luck').PHP_EOL;
		echo PHP_EOL;

		echo "Beast health: ".$this->beast->getStat('health').PHP_EOL;
		echo "Beast strength: ".$this->beast->getStat('strength').PHP_EOL;
		echo "Beast speed: ".$this->beast->getStat('speed').PHP_EOL;
		echo "Beast defence: ".$this->beast->getStat('defence').PHP_EOL;
		echo "Beast luck: ".$this->beast->getStat('luck').PHP_EOL;
		echo PHP_EOL;
	}
	
	public function printRoundStats($currentRound)
	{
		echo "ROUND: ".$currentRound.PHP_EOL;
		echo "Attacker: ".$this->attacker->getName().PHP_EOL;
		echo "Attacker Health: ".$this->attacker->getStat('health').PHP_EOL;

		echo "Defender: ".$this->defender->getName().PHP_EOL;
		echo "Defender Health: ".$this->defender->getStat('health').PHP_EOL;

		if($this->defenderWasLucky === true)
		{
			echo "Defender was lucky. No damage will be taken.".PHP_EOL;	
		}	
			
		echo PHP_EOL;
	}

	public function printBattleResults()
	{
		echo "Winner is: ".$this->getWinner()->getName().PHP_EOL;
		echo "GAME OVER!!".PHP_EOL;
	}
}