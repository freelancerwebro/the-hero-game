<?php

namespace HeroGame\Battle;

class Config{

    const BATTLE_ROUNDS = 20;

    const HERO_STATS = [
        'health'    => [70, 100],
        'strength'  => [70, 80],
        'speed'     => [40, 50],
        'defence'   => [45, 55],
        'luck'      => [10, 30]
    ];

    const BEAST_STATS = [
        'health'    => [60, 90],
        'strength'  => [60, 90],
        'speed'     => [40, 60],
        'defence'   => [40, 60],
        'luck'      => [25, 40]
    ];
}
