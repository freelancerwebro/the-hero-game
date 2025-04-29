<?php

declare(strict_types=1);

namespace HeroGame\Characters;

class Beast extends Character
{
    public function initializeStats(): void
    {
        $this->health = rand(60, 90);
        $this->strength = rand(60, 90);
        $this->defense = rand(40, 60);
        $this->speed = rand(40, 60);
        $this->luck = rand(25, 40) / 100;
    }
}