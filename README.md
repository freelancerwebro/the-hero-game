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

Wild Beast [Health: 76, Strength: 76, Defense: 48, Speed: 45, Luck: 0.33]
Orderus [Health: 100, Strength: 74, Defense: 47, Speed: 42, Luck: 0.28]

==== ROUND 1 ====
---------------------------------------------------------------------
Wild Beast attacks Orderus!
Orderus activated Magic Shield! Half damage taken!
Ouch! Orderus takes 14. Orderus'remaining health: 86

==== ROUND 2 ====
---------------------------------------------------------------------
Orderus attacks Wild Beast!
Ouch! Wild Beast takes 26. Wild Beast'remaining health: 50

==== ROUND 3 ====
---------------------------------------------------------------------
Wild Beast attacks Orderus!
Ouch! Orderus takes 29. Orderus'remaining health: 57

==== ROUND 4 ====
---------------------------------------------------------------------
Orderus attacks Wild Beast!
Ouch! Wild Beast takes 26. Wild Beast'remaining health: 24

==== ROUND 5 ====
---------------------------------------------------------------------
Wild Beast attacks Orderus!
Ouch! Orderus takes 29. Orderus'remaining health: 28

==== ROUND 6 ====
---------------------------------------------------------------------
Orderus attacks Wild Beast!
Ouch! Wild Beast takes 26. Wild Beast'remaining health: 0

Winner is: Orderus
GAME OVER!!

```