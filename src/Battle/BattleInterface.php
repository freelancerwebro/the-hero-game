<?php
namespace HeroGame\Battle;
use HeroGame\Characters\Character;

interface BattleInterface {
	public function initHero(Character $hero);
	public function initBeast(Character $beast);
	public function startBattle();
	public function getWinner();
}