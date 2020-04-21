<?php
namespace HeroGame\Battle;

interface LoggerInterface {
	public function printInitialStats(BattleInterface $battle);
	public function printRoundStats(BattleInterface $battle, $currentRound);
	public function printBattleResults(BattleInterface $battle);
}