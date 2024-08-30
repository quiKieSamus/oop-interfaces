<?php

use Src\Characters\Character;
use Src\Characters\EnemyCharacter;
use Src\Characters\PlayableCharacter;
use Src\Collections\CharacterCollection;
use Src\Core\Iterator;

require("vendor/autoload.php");

$characterCollection = new CharacterCollection([new PlayableCharacter(3, 3, 3, 3, 3, 'aaaa', 'bb')]);
