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
		echo "Start Battle!";

		$this->selectFirstAttacker();

		for($round = 1; $round <= $this->config::BATTLE_ROUNDS; $round++)
		{
			$this->currentRound = $round;

			if($this->isEndOfBattle() === true)
			{
				break;
			}

			//echo $round."<br/>";
		}
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

		if($this->hasLuck === false)
			$this->defender->health  = $this->defender->health - $damage;
	}


	

}