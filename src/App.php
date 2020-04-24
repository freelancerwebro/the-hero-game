<?php
namespace HeroGame;

use HeroGame\Characters\Hero;
use HeroGame\Characters\Beast;
use HeroGame\Config\Config;
use HeroGame\Battle\Battle;
use HeroGame\Logger\BattleConsoleLogger;
use HeroGame\Characters\RandomStatsGenerator;

class App{
    function init()
    {   
        try{
            $hero = new Hero();
            $hero->initStats(new RandomStatsGenerator, Config::HERO_STATS);
            $beast = new Beast();
            $beast->initStats(new RandomStatsGenerator, Config::BEAST_STATS);

            $battle = new Battle(new Config, new BattleConsoleLogger);
            $battle->initHero($hero);
            $battle->initBeast($beast);
            $battle->startBattle();
        }
        catch(Exception $e)
        {
            print_r($e->getMessage());
        }
    }
}
