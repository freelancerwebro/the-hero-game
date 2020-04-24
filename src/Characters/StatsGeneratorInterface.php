<?php
namespace HeroGame\Characters;

interface StatsGeneratorInterface {
    public function generate(Character $character, $stats = []);
}