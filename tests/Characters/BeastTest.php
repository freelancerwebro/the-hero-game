<?php

declare(strict_types=1);

namespace Tests\Characters;

use HeroGame\Characters\Beast;
use PHPUnit\Framework\TestCase;

class BeastTest extends TestCase
{
    public function testBeastInitialization()
    {
        $beast = new Beast('Wild Beast');
        $beast->initializeStats();

        $this->assertGreaterThanOrEqual(60, $beast->getHealth());
        $this->assertLessThanOrEqual(90, $beast->getHealth());

        $this->assertGreaterThanOrEqual(60, $beast->getStrength());
        $this->assertLessThanOrEqual(90, $beast->getStrength());

        $this->assertGreaterThanOrEqual(40, $beast->getDefense());
        $this->assertLessThanOrEqual(60, $beast->getDefense());

        $this->assertGreaterThanOrEqual(40, $beast->getSpeed());
        $this->assertLessThanOrEqual(60, $beast->getSpeed());

        $this->assertGreaterThanOrEqual(0.25, $beast->getLuck());
        $this->assertLessThanOrEqual(0.4, $beast->getLuck());

        $this->assertTrue($beast->isAlive());
        $this->assertFalse($beast->isHero());
    }
}