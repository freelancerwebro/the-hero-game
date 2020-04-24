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

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getStat($stat = null)
    {
        return $this->$stat;
    }

    function setHealth($health)
    {
        $this->health = $health;
    }

    function setStrength($strength)
    {
        $this->strength = $strength;
    }

    function setDefence($defence)
    {
        $this->defence = $defence;
    }
    
    function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    function setLuck($luck)
    {
        $this->luck = $luck;
    }
}
