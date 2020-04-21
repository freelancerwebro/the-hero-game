<?php

namespace HeroGame;

use HeroGame\Helpers\Logger;
use HeroGame\Characters\Hero;
use HeroGame\Characters\Beast;
use HeroGame\Battle\Config;
use HeroGame\Battle\Battle;

class App{
    function init()
    {   
        try{
            $hero = new Hero();
            $hero->initStats(Config::HERO_STATS);
            $hero->setName("Hero");

            $beast = new Beast();   
            $beast->initStats(Config::BEAST_STATS);
            $beast->setName("Beast");

            $battle = new Battle(new Config);
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
