<?php

declare(strict_types=1);

namespace HeroGame\Skills;

use HeroGame\Characters\Character;

class MagicShield implements SkillInterface
{
    private float $chance = 0.2; // 20% chance to reduce damage by 50%
    public function apply(Character $attacker, Character $defender, int &$damage): ?string
    {
        if (!$defender->isHero()) {
            return null;
        }

        if (mt_rand() / mt_getrandmax() <= $this->chance) {
            $damage = (int)($damage / 2);
            return "{$defender->getName()} activated Magic Shield! Half damage taken!";
        }
        return null;
    }
}