<?php
namespace HeroGame\Battle;
use HeroGame\Logger\BattleConsoleLogger;
use HeroGame\Config\Config;
use HeroGame\Battle\Battle;
use HeroGame\Characters\Character;

class BattleFactory
{
    public static function create(Character $hero, Character $beast)
    {
        return (new Battle(new Config, new BattleConsoleLogger))
            ->initHero($hero)
            ->initBeast($beast);
    }
}