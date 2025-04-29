# The hero game

PHP console application that simulates an epic battle between a legendary hero and a wild beast.

## The game features:

- Randomized character stats (health, strength, defense, speed, luck)
- Turn-based battle mechanics
- Offensive and defensive skills with activation chances
- Clear round-by-round battle logs
- Automatic win detection or draw after 20 rounds

## How to run the game
1. Clone the repository:
```
git clone git@github.com:freelancerwebro/the-hero-game.git
cd the-hero-game
```

2. Install dependencies:
```
composer install
```

3. Run the battle simulation:
```
php index.php
```

## Running tests:
```
composer test
```


## Battle output:
```
Start battle!

Wild Beast [Health: 65, Strength: 66, Defense: 59, Speed: 52, Luck: 0.28]
Orderus [Health: 87, Strength: 78, Defense: 46, Speed: 43, Luck: 0.24]

ROUND 1
---------------------------------------------------------------------
Wild Beast attacks Orderus!
Wild Beast hits Orderus for 20 damage. Orderus'remaining health: 67

ROUND 2
---------------------------------------------------------------------
Orderus attacks Wild Beast!
Orderus hits Wild Beast for 19 damage. Wild Beast'remaining health: 46

ROUND 3
---------------------------------------------------------------------
Wild Beast attacks Orderus!
Orderus activated Magic Shield! Half damage taken!
Wild Beast hits Orderus for 10 damage. Orderus'remaining health: 57

ROUND 4
---------------------------------------------------------------------
Orderus attacks Wild Beast!
Orderus used Rapid Strike! Double damage!
Orderus hits Wild Beast for 38 damage. Wild Beast'remaining health: 8

ROUND 5
---------------------------------------------------------------------
Wild Beast attacks Orderus!
Wild Beast hits Orderus for 20 damage. Orderus'remaining health: 37

ROUND 6
---------------------------------------------------------------------
Orderus attacks Wild Beast!
Orderus hits Wild Beast for 19 damage. Wild Beast'remaining health: 0

Winner is: Orderus
GAME OVER!!
```