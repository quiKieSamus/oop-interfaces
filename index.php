<?php
use Src\BattleSystem\BattleSystem;
use Src\Characters\EnemyCharacter;
use Src\Characters\PlayableCharacter;
require("vendor/autoload.php");

$char = new PlayableCharacter(10, 5, 5, 3, 4, 'Artorias', 'Knight of the abyss');
$enemyChar = new EnemyCharacter(8, 3, 5, 5, 6, 'Slime', 'The Great');
$battle = new BattleSystem($char, $enemyChar);
print_r($battle->nextOne());
print_r($battle->nextOne());