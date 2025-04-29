<?php

declare(strict_types=1);

namespace HeroGame\Skills;

use HeroGame\Characters\Character;

interface SkillInterface
{
    public function apply(Character $attacker, Character $defender, int &$damage): ?string;
}