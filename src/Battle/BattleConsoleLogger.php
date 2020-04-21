<?php
namespace HeroGame\Battle;

class BattleConsoleLogger implements LoggerInterface {

    public function printInitialStats(BattleInterface $battle)
    {
        echo "Start Battle!".PHP_EOL.PHP_EOL;
        echo "Hero health: ".$battle->getHero()->getStat('health').PHP_EOL;
        echo "Hero strength: ".$battle->getHero()->getStat('strength').PHP_EOL;
        echo "Hero speed: ".$battle->getHero()->getStat('speed').PHP_EOL;
        echo "Hero defence: ".$battle->getHero()->getStat('defence').PHP_EOL;
        echo "Hero luck: ".$battle->getHero()->getStat('luck').PHP_EOL;
        echo PHP_EOL;

        echo "Beast health: ".$battle->getBeast()->getStat('health').PHP_EOL;
        echo "Beast strength: ".$battle->getBeast()->getStat('strength').PHP_EOL;
        echo "Beast speed: ".$battle->getBeast()->getStat('speed').PHP_EOL;
        echo "Beast defence: ".$battle->getBeast()->getStat('defence').PHP_EOL;
        echo "Beast luck: ".$battle->getBeast()->getStat('luck').PHP_EOL;
        echo PHP_EOL;
    }

    public function printRoundStats(BattleInterface $battle, $currentRound)
    {
        echo "ROUND: ".$currentRound.PHP_EOL;
        echo "Attacker: ".$battle->getAttacker()->getName().PHP_EOL;
        echo "Attacker Health: ".$battle->getAttacker()->getStat('health').PHP_EOL;

        echo "Defender: ".$battle->getDefender()->getName().PHP_EOL;
        echo "Defender Health: ".$battle->getDefender()->getStat('health').PHP_EOL;

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