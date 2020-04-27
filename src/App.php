<?php
namespace HeroGame;
use HeroGame\Battle\BattleFactory;
use HeroGame\Characters\HeroFactory;
use HeroGame\Characters\BeastFactory;

class App{
    function init()
    {   
        try{
            $hero  = HeroFactory::create();
            $beast = BeastFactory::create();

            $battle = BattleFactory::create($hero, $beast);
            $battle->startBattle();
        }
        catch(Exception $e)
        {
            print_r($e->getMessage());
        }
    }
}
