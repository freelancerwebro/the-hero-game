<?php

namespace emag;

use emag\Helpers\Logger;
use emag\Characters\Hero;
use emag\Characters\Beast;



class App{

	function isSingle()
	{
		return true;
	}

	function init()
	{	
		$stats = [
		  'health' => [70, 100],
		  'strength' => [70, 80],
		  'speed' => [40, 50],
		  'defence' => [45, 55],
		  'luck' => [10, 30]
		];
		$hero = new Hero();
		$hero->initStats($stats);

		
		$stats = [
		  'health' => [60, 90],
		  'strength' => [60, 90],
		  'speed' => [40, 60],
		  'defence' => [40, 60],
		  'luck' => [25, 40]
		];
		$beast = new Beast();	
		$beast->initStats($stats);

		echo "<pre>";
		print_r($hero);
		print_r($beast);
		echo "</pre>";	
	}
}