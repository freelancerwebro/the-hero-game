<?php
namespace HeroGame;

use HeroGame\Helpers\Logger;
use HeroGame\Characters\Hero;
use HeroGame\Characters\Beast;
use HeroGame\Battle\Config;
use HeroGame\Battle\Battle;
use HeroGame\Battle\BattleConsoleLogger;

class App{
    function init()
    {   
        try{
            $hero = new Hero();
            $hero->initStats(Config::HERO_STATS);
            $hero->setName(Config::HERO_NAME);

            $beast = new Beast();   
            $beast->initStats(Config::BEAST_STATS);
            $beast->setName(Config::BEAST_NAME);

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
