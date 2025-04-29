<?php

declare(strict_types=1);

namespace Tests\Battle;

use HeroGame\Battle\Battle;
use HeroGame\Characters\Beast;
use HeroGame\Characters\Hero;
use PHPUnit\Framework\TestCase;

class BattleTest extends TestCase
{
    public function testBattleEndsCorrectly()
    {
        $hero = new Hero('Orderus');
        $hero->initializeStats();
        $beast = new Beast('Wild Beast');
        $beast->initializeStats();

        $battle = new Battle($hero, $beast);

        ob_start();
        $battle->start();
        $output = ob_get_clean();

        $this->assertStringContainsString('Winner is', $output);
        $this->assertTrue($hero->isAlive() || $beast->isAlive() || str_contains($output, 'No winner'));
    }
}
