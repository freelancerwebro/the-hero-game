<?php

declare(strict_types=1);

use HeroGame\Battle\Battle;
use HeroGame\Characters\Beast;
use HeroGame\Characters\Hero;
use HeroGame\Skills\MagicShield;
use HeroGame\Skills\RapidStrike;

require "vendor/autoload.php";

$hero = new Hero('Orderus');
$hero->initializeStats();
$hero->addSkill(new RapidStrike());
$hero->addSkill(new MagicShield());

$beast = new Beast('Wild Beast');
$beast->initializeStats();

$battle = new Battle($hero, $beast);
$battle->start();