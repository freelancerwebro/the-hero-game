# The hero game

The task simulates a battle between two characters, a hero and a beast.
Both have a set of randomly generated abilities: health, strength, defence, speed and luck.

To start the battle, run the following command in the console. Also you can to run 'index.php' file in browser.
```
php index.php
```

Battle output:
```
Start Battle!

hero health: 94
hero strength: 73
hero speed: 45
hero defence: 53
hero luck: 16

beast health: 77
beast strength: 73
beast speed: 44
beast defence: 46
beast luck: 29

ROUND: 1
Attacker: Hero
Attacker Health: 94
Defender: Wild Beast
Defender Health: 50

ROUND: 2
Attacker: Wild Beast
Attacker Health: 50
Defender: Hero
Defender Health: 74

ROUND: 3
Attacker: Hero
Attacker Health: 74
Defender: Wild Beast
Defender Health: 23

ROUND: 4
Attacker: Wild Beast
Attacker Health: 23
Defender: Hero
Defender Health: 54

ROUND: 5
Attacker: Hero
Attacker Health: 54
Defender: Wild Beast
Defender Health: 0

Winner is: emag\Characters\Hero
GAME OVER!!
```

Unit tests can be run by the following command:
```
vendor/bin/phpunit tests/
```