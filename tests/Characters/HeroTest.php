<?php

require "vendor/autoload.php";

use emag\Characters\Hero;

class HeroTest extends PHPUnit_Framework_TestCase{
	
	public function setUp(){ }
	public function tearDown(){ }


	public function testEmptyStatsArray()
	{	
		$this->setExpectedException(Exception::class, "The stats cannot be empty");

		$stats = [];
		$hero = new Hero();
		$hero->initStats($stats);
	}

	public function testMinimumOrMaximumIsMissing()
	{
		$this->setExpectedException(Exception::class, "The minimum or maximum value is missing");

		$stats = [
			'health' 	=> [40],
			'strength'  => [70, 80],
			'speed'     => [40, 50],
			'defence'   => [],
			'luck'      => [10, 30]
		];
		$hero = new Hero();
		$hero->initStats($stats);
	}

	public function testMinimumIsGreaterThanMaximum()
	{
		$this->setExpectedException(Exception::class, "The minimum cannot be greater than maximum");

		$stats = [
			'health' 	=> [100, 70],
			'strength'  => [70, 80],
			'speed'     => [40, 50],
			'defence'   => [30, 50],
			'luck'      => [10, 30]
		];
		$hero = new Hero();
		$hero->initStats($stats);
	}

	public function testStatsValuesAreNotEmpty()
	{
		$stats = [
			'health' 	=> [70, 100],
			'strength'  => [50, 50],
			'speed'     => [40, 50],
			'defence'   => [30, 50],
			'luck'      => [10, 30]
		];
		$hero = new Hero();
		$hero->initStats($stats);

		$health = $hero->getStat("health");
		$strength = $hero->getStat("strength");
		$speed = $hero->getStat("speed");
		$defence = $hero->getStat("defence");
		$luck = $hero->getStat("luck");

		$this->assertNotEmpty($health);
		$this->assertNotEmpty($strength);
		$this->assertNotEmpty($speed);
		$this->assertNotEmpty($defence);
		$this->assertNotEmpty($luck);
	}

	public function testStatsValuesAreInRange()
	{
		$stats = [
			'health' 	=> [70, 100],
			'strength'  => [50, 50],
			'speed'     => [40, 50],
			'defence'   => [30, 50],
			'luck'      => [10, 30]
		];
		$hero = new Hero();
		$hero->initStats($stats);

		$health = $hero->getStat("health");
		$this->assertTrue($health >= $stats['health'][0]);
		$this->assertTrue($health <= $stats['health'][1]);

		$strength = $hero->getStat("strength");
		$this->assertTrue($strength >= $stats['strength'][0]);
		$this->assertTrue($strength <= $stats['strength'][1]);

		$speed = $hero->getStat("speed");
		$this->assertTrue($speed >= $stats['speed'][0]);
		$this->assertTrue($speed <= $stats['speed'][1]);

		$defence = $hero->getStat("defence");
		$this->assertTrue($defence >= $stats['defence'][0]);
		$this->assertTrue($defence <= $stats['defence'][1]);

		$luck = $hero->getStat("luck");
		$this->assertTrue($luck >= $stats['luck'][0]);
		$this->assertTrue($luck <= $stats['luck'][1]);
	}


}