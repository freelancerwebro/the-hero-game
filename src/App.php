<?php
namespace HeroGame;
use HeroGame\Factory\BattleFactory;
use HeroGame\Factory\HeroFactory;
use HeroGame\Factory\BeastFactory;

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
