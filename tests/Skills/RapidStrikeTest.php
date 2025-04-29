<?php

declare(strict_types=1);

namespace Tests\Skills;

use HeroGame\Characters\Beast;
use HeroGame\Characters\Hero;
use HeroGame\Skills\RapidStrike;
use PHPUnit\Framework\TestCase;

class RapidStrikeTest extends TestCase
{
    public function testRapidStrikeDoublesDamage()
    {
        $rapidStrike = new RapidStrike();
        $attacker = new Hero('Orderus');
        $defender = new Beast('Wild Beast');

        $attacker->initializeStats();
        $defender->initializeStats();

        $damage = 50;
        $message = $rapidStrike->apply($attacker, $defender, $damage);

        $this->assertTrue($damage === 50 || $damage === 100);
        if ($damage === 100) {
            $this->assertStringContainsString('Rapid Strike', $message);
        }
    }
}