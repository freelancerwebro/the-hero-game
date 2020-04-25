<?php

namespace HeroGame\Characters;

abstract class Character{
    
    protected $name;

    protected $health;

    protected $strength;

    protected $defence;

    protected $speed;

    protected $luck;

    public function __construct(StatsGeneratorInterface $generator, $stats = [])
    {
        $generator->generate($this, $stats);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        $this->health = $health;
        return $this;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function setStrength($strength)
    {
        $this->strength = $strength;
        return $this;
    }

    public function getDefence()
    {
        return $this->defence;
    }

    public function setDefence($defence)
    {
        $this->defence = $defence;
        return $this;
    }
    
    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }

    public function getLuck()
    {
        return $this->luck;
    }

    public function setLuck($luck)
    {
        $this->luck = $luck;
        return $this;
    }
}
