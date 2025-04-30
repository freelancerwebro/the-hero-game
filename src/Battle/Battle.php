<?php

declare(strict_types=1);

namespace HeroGame\Battle;

use HeroGame\Characters\Character;
use HeroGame\Characters\Hero;

class Battle
{
    private array $log = [];
    private int $rounds = 20;

    public function __construct(
        private readonly Character $player1,
        private readonly Character $player2,
    ) {
    }

    public function start(): void
    {
        [$attacker, $defender] = $this->decideFirstAttacker();

        $this->prepareInitialStats($attacker, $defender);

        for ($round = 1; $round <= $this->rounds; $round++) {
            $this->log[] = "ROUND $round";
            $this->log[] = "---------------------------------------------------------------------";
            $this->log[] = "{$attacker->getName()} attacks {$defender->getName()}!";

            $this->switchRounds($attacker, $defender);

            if (!$attacker->isAlive() || !$defender->isAlive()) {
                break;
            }

            [$attacker, $defender] = [$defender, $attacker];
            $this->log[] = "";
        }

        $this->declareWinner();
    }

    private function decideFirstAttacker(): array
    {
        $player1Speed = $this->player1->getSpeed();
        $player2Speed = $this->player2->getSpeed();

        if ($player1Speed > $player2Speed) {
            return [$this->player1, $this->player2];
        }

        if ($player1Speed < $player2Speed) {
            return [$this->player2, $this->player1];
        }

        if ($this->player1->getLuck() > $this->player2->getLuck())
            return [$this->player1, $this->player2];
        else
            return [$this->player2, $this->player1];
    }

    private function switchRounds(Character $attacker, Character $defender): void
    {
        $damage = max(0, $attacker->getStrength() - $defender->getDefense());

        if ($attacker instanceof Hero) {
            foreach ($attacker->getSkills() as $skill) {
                $skillMessage = $skill->apply($attacker, $defender, $damage);
                if ($skillMessage !== null) {
                    $this->log[] = $skillMessage;
                }
            }
        }

        if ($defender instanceof Hero) {
            foreach ($defender->getSkills() as $skill) {
                $skillMessage = $skill->apply($attacker, $defender, $damage);
                if ($skillMessage !== null) {
                    $this->log[] = $skillMessage;
                }
            }
        }

        $defender->takeDamage($damage);
        $this->log[] = "{$attacker->getName()} hits {$defender->getName()} for $damage damage. {$defender->getName()}'remaining health: {$defender->getHealth()}";
    }

    private function declareWinner(): void
    {
        $gameOver = "GAME OVER!!";

        $this->log[] = "";

        if (!$this->player1->isAlive()) {
            $this->log[] = "Winner is: {$this->player2->getName()}";
            $this->log[] = $gameOver;
            return;
        }

        if (!$this->player2->isAlive()) {
            $this->log[] = "Winner is: {$this->player1->getName()}";
            $this->log[] = $gameOver;
            return;
        }

        $this->log[] = "No winner after {$this->rounds} rounds.";
        $this->log[] = $gameOver;
    }

    private function prepareInitialStats(Character $attacker, Character $defender): void
    {
        $this->log[] = "";
        $this->log[] = "Start battle!";
        $this->log[] = "";
        $this->log[] = "{$attacker->getName()} [Health: {$attacker->getHealth()}, Strength: {$attacker->getStrength()}, Defense: {$attacker->getDefense()}, Speed: {$attacker->getSpeed()}, Luck: {$attacker->getLuck()}]";
        $this->log[] = "{$defender->getName()} [Health: {$defender->getHealth()}, Strength: {$defender->getStrength()}, Defense: {$defender->getDefense()}, Speed: {$defender->getSpeed()}, Luck: {$defender->getLuck()}]";
        $this->log[] = "";
    }

    public function getLog(): array
    {
        return $this->log;
    }
}