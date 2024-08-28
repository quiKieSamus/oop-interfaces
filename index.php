<?php

use Src\Characters\Character;
use Src\Characters\EnemyCharacter;
use Src\Characters\PlayableCharacter;
use Src\Collections\CharacterCollection;
use Src\Core\Iterator;

require("vendor/autoload.php");

$characterCollection = new CharacterCollection([new PlayableCharacter(3, 3, 3, 3, 3, 'aaaa', 'bb')]);

class CharacterIterator extends Iterator {
    public CharacterCollection $characterCollection;

    public function next(): Character
    {
        $this->current++;
        $this->currentItem = $this->collection->getItem($this->current);
        if (!$this->currentItem) return $this->previous();
        return $this->currentItem;
    }
    public function previous(): Character
    {
        $this->current--;
        $this->currentItem = $this->collection->getItem($this->current);
        return $this->currentItem;
    }
    public function getCurrentItem(): Character
    {
        return $this->currentItem;
    }
}

$characterIterator = new CharacterIterator($characterCollection);

print_r($characterIterator);

$characterCollection->push(new EnemyCharacter(3, 3, 3, 3, 3, '111', '222'));

print_r($characterIterator->next());
print_r($characterIterator->next());