<?php

declare(strict_types=1);

namespace HeroGame\Skills;

use HeroGame\Characters\Character;

class RapidStrike implements SkillInterface
{
    private float $chance = 0.1; // 10% chance to double the damage
    public function apply(Character $attacker, Character $defender, int &$damage): ?string
    {
        if (!$attacker->isHero()) {
            return null;
        }

        if (mt_rand() / mt_getrandmax() <= $this->chance) {
            $damage *= 2;
            return "{$attacker->getName()} used Rapid Strike! Double damage!";
        }
        return null;
    }
}