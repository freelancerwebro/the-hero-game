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
            $hero  = (new Hero(new RandomStatsGenerator, Config::HERO_STATS))
                ->setName(Config::HERO_NAME);
            $beast = (new Beast(new RandomStatsGenerator, Config::BEAST_STATS))
                ->setName(Config::BEAST_NAME);

            $battle = (new Battle(new Config, new BattleConsoleLogger))
                ->initHero($hero)
                ->initBeast($beast)
                ->startBattle();
        }
        catch(Exception $e)
        {
            print_r($e->getMessage());
        }
    }
}
