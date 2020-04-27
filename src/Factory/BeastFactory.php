<?php
namespace HeroGame\Factory;
use HeroGame\Config\Config;
use HeroGame\Characters\RandomStatsGenerator;
use HeroGame\Characters\Beast;

class BeastFactory implements CharacterFactory
{
    public static function create()
    {
        return (new Beast(new RandomStatsGenerator, Config::BEAST_STATS))
            ->setName(Config::BEAST_NAME);
    }
}