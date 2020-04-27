<?php
namespace HeroGame\Factory;
use HeroGame\Config\Config;
use HeroGame\Characters\RandomStatsGenerator;
use HeroGame\Characters\Hero;

class HeroFactory implements CharacterFactory
{
    public static function create()
    {
        return (new Hero(new RandomStatsGenerator, Config::HERO_STATS))
            ->setName(Config::HERO_NAME);
    }
}