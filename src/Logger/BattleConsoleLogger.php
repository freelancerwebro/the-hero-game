<?php
namespace HeroGame\Logger;
use HeroGame\Battle\BattleInterface;

class BattleConsoleLogger implements LoggerInterface {

    public function printInitialStats(BattleInterface $battle)
    {
        echo "Start Battle!".PHP_EOL.PHP_EOL;
        echo "Hero health: ".$battle->getHero()->getHealth().PHP_EOL;
        echo "Hero strength: ".$battle->getHero()->getStrength().PHP_EOL;
        echo "Hero speed: ".$battle->getHero()->getSpeed().PHP_EOL;
        echo "Hero defence: ".$battle->getHero()->getDefence().PHP_EOL;
        echo "Hero luck: ".$battle->getHero()->getLuck().PHP_EOL;
        echo PHP_EOL;

        echo "Beast health: ".$battle->getBeast()->getHealth().PHP_EOL;
        echo "Beast strength: ".$battle->getBeast()->getStrength().PHP_EOL;
        echo "Beast speed: ".$battle->getBeast()->getSpeed().PHP_EOL;
        echo "Beast defence: ".$battle->getBeast()->getDefence().PHP_EOL;
        echo "Beast luck: ".$battle->getBeast()->getLuck().PHP_EOL;
        echo PHP_EOL;
    }

    public function printRoundStats(BattleInterface $battle, $currentRound)
    {
        echo "ROUND: ".$currentRound.PHP_EOL;
        echo "Attacker: ".$battle->getAttacker()->getName().PHP_EOL;
        echo "Attacker Health: ".$battle->getAttacker()->getHealth().PHP_EOL;

        echo "Defender: ".$battle->getDefender()->getName().PHP_EOL;
        echo "Defender Health: ".$battle->getDefender()->getHealth().PHP_EOL;

        if($battle->getDefenderWasLucky() === true)
        {
            echo "Defender was lucky. No damage will be taken.".PHP_EOL;    
        }   
            
        echo PHP_EOL;
    }

    public function printBattleResults(BattleInterface $battle)
    {
        echo "Winner is: ".$battle->getWinner()->getName().PHP_EOL;
        echo "GAME OVER!!".PHP_EOL;
    }
}