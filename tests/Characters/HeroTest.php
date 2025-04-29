<?php

declare(strict_types=1);

namespace Tests\Characters;

use HeroGame\Characters\Hero;
use HeroGame\Skills\MagicShield;
use HeroGame\Skills\RapidStrike;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{
    public function testHeroInitialization()
    {
        $hero = new Hero('Orderus');
        $hero->initializeStats();
        $hero->addSkill(new RapidStrike());
        $hero->addSkill(new MagicShield());

        $this->assertGreaterThanOrEqual(70, $hero->getHealth());
        $this->assertLessThanOrEqual(100, $hero->getHealth());

        $this->assertGreaterThanOrEqual(70, $hero->getStrength());
        $this->assertLessThanOrEqual(80, $hero->getStrength());

        $this->assertGreaterThanOrEqual(45, $hero->getDefense());
        $this->assertLessThanOrEqual(55, $hero->getDefense());

        $this->assertGreaterThanOrEqual(40, $hero->getSpeed());
        $this->assertLessThanOrEqual(50, $hero->getSpeed());

        $this->assertGreaterThanOrEqual(0.1, $hero->getLuck());
        $this->assertLessThanOrEqual(0.3, $hero->getLuck());

        $this->assertCount(2, $hero->getSkills());

        $this->assertInstanceOf(RapidStrike::class, $hero->getSkills()[0]);
        $this->assertInstanceOf(MagicShield::class, $hero->getSkills()[1]);

        $this->assertTrue($hero->isAlive());
        $this->assertTrue($hero->isHero());
    }
}