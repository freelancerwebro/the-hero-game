<?php

namespace emag\Battle;

use emag\Characters\Character;

class Battle{
	
	private $currentRound = null;

	private $attacker 	  = null;
	private $defender     = null;

	private $hero 	      = null;
	private $beast  	  = null;

	private $config       = null;

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

			$this->updateDefenderHealth();
			$this->printRoundStats($round);
			$this->changeBattleRounds();
		}

		$this->printEndOfGame();
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

		//if($this->hasLuck === false)
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
			return $this->attacker;

		return $this->defender;
	}


	public function printInitialStats()
	{
		echo "Start Battle!".PHP_EOL;
		echo "hero health: ".$this->hero->getStat('health').PHP_EOL;
		echo "hero strength: ".$this->hero->getStat('strength').PHP_EOL;
		echo "hero speed: ".$this->hero->getStat('speed').PHP_EOL;
		echo "hero defence: ".$this->hero->getStat('defence').PHP_EOL;
		echo "hero luck: ".$this->hero->getStat('luck').PHP_EOL;
		echo PHP_EOL;

		echo "beast health: ".$this->beast->getStat('health').PHP_EOL;
		echo "beast strength: ".$this->beast->getStat('strength').PHP_EOL;
		echo "beast speed: ".$this->beast->getStat('speed').PHP_EOL;
		echo "beast defence: ".$this->beast->getStat('defence').PHP_EOL;
		echo "beast luck: ".$this->beast->getStat('luck').PHP_EOL;
		echo PHP_EOL;
	}
	
	public function printRoundStats($currentRound)
	{
		echo "ROUND: ".$currentRound.PHP_EOL;
		echo "Attacker: ".get_class($this->attacker).PHP_EOL;
		echo "Attacker Health: ".$this->attacker->getStat('health').PHP_EOL;

		echo "Defender: ".get_class($this->defender).PHP_EOL;
		echo "Defender Health: ".$this->defender->getStat('health').PHP_EOL;

		//if($this->hasLuck === true)	
			//echo "Defender hasLuck: ".$this->hasLuck.PHP_EOL;
		echo PHP_EOL;
	}

	public function printEndOfGame()
	{
		echo "Winner is: ".get_class($this->getWinner()).PHP_EOL;
		echo "GAME OVER!!".PHP_EOL;
	}


}