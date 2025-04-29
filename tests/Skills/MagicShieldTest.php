<?php

declare(strict_types=1);

namespace Tests\Skills;

use HeroGame\Characters\Beast;
use HeroGame\Characters\Hero;
use HeroGame\Skills\MagicShield;
use PHPUnit\Framework\TestCase;

class MagicShieldTest extends TestCase
{
    public function testMagicShieldHalvesDamage()
    {
        $magicShield = new MagicShield();
        $attacker = new Beast('Wild Beast');
        $defender = new Hero('Orderus');

        $attacker->initializeStats();
        $defender->initializeStats();

        $damage = 50;
        $message = $magicShield->apply($attacker, $defender, $damage);

        $this->assertTrue($damage === 50 || $damage === 25);
        if ($damage === 25) {
            $this->assertStringContainsString('Magic Shield', $message);
        }
    }
}