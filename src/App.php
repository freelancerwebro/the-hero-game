<?php

namespace emag;

use emag\Helpers\Logger;
use emag\Characters\Hero;
use emag\Characters\Beast;
use emag\Battle\Config;
use emag\Battle\Battle;


class App{

	function isSingle()
	{
		return true;
	}

	function init()
	{	

		try{

			$hero = new Hero();
			$hero->initStats(Config::HERO_STATS);
			$hero->setName("Hero");

			$beast = new Beast();	
			$beast->initStats(Config::BEAST_STATS);
			$beast->setName("Beast");

			$battle = new Battle(new Config);
			$battle->initHero($hero);
			$battle->initBeast($beast);
			$battle->startBattle();


			// echo "<pre>";
			// print_r($hero);
			// print_r($beast);

			// print_r($battle->isEndOfBattle());
			// echo "</pre>";	

		}
		catch(Exception $e)
		{
			print_r($e->getMessage());
		}
	}
}