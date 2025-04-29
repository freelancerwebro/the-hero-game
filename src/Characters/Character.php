<?php

declare(strict_types=1);

namespace HeroGame\Characters;

abstract class Character
{
    protected int $health;
    protected int $strength;
    protected int $defense;
    protected int $speed;
    protected float $luck;
    public function __construct(
        protected string $name
    ) {
    }

    abstract public function initializeStats(): void;

    public function getName(): string { return $this->name; }
    public function getHealth(): int { return $this->health; }
    public function getStrength(): int { return $this->strength; }
    public function getDefense(): int { return $this->defense; }
    public function getSpeed(): int { return $this->speed; }
    public function getLuck(): float { return $this->luck; }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    public function takeDamage(int $damage): void
    {
        $this->health = max(0, $this->health - $damage);
    }

    public function isHero(): bool
    {
        return false;
    }
}