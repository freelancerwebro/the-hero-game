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
		foreach($stats as $statKey => $statValue)
	    {
	        $this->$statKey = mt_rand($statValue[0], $statValue[1]);
	    }
    }

    function getStat($stat = null)
    {
       	return $this->$stat;
    }
}

