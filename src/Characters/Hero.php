<?php

declare(strict_types=1);

namespace HeroGame\Characters;

use HeroGame\Skills\SkillInterface;

class Hero extends Character
{
    private array $skills = [];

    public function initializeStats(): void
    {
        $this->health = rand(70, 100);
        $this->strength = rand(70, 80);
        $this->defense = rand(45, 55);
        $this->speed = rand(40, 50);
        $this->luck = rand(10, 30) / 100;
    }

    public function addSkill(SkillInterface $skill): void
    {
        $this->skills[] = $skill;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function isHero(): bool
    {
        return true;
    }
}