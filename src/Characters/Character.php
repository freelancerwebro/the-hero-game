<?php

namespace emag\Characters;

abstract class Character{
	

	protected $health;

	protected $strength;

	protected $defence;

	protected $speed;

	protected $luck;


	function initStats($stats = [])
	{	
		if(empty($stats))
		{
			throw new \Exception('The stats cannot be empty');
		}

		foreach($stats as $statKey => $statValue)
		{
			if(empty($statValue[0]) || empty($statValue[1]))
			{
				throw new \Exception('The minimum or maximum value is missing');
			}

			if($statValue[0] > $statValue[1])
			{
				throw new \Exception('The minimum cannot be greater than maximum');
			}

			$this->$statKey = mt_rand($statValue[0], $statValue[1]);
		}
	}

	function getStat($stat = null)
	{
		return $this->$stat;
	}
	

	function setHealth($health)
	{
		$this->health = $health;
	}

	function setStrength($strength)
	{
		$this->strength = $strength;
	}

	function setDefence($defence)
	{
		$this->defence = $defence;
	}
	
	function setSpeed($speed)
	{
		$this->speed = $speed;
	}

	function setLuck($luck)
	{
		$this->luck = $luck;
	}
}

