<?php

namespace Src\Collections;

use Src\Characters\Character;
use Src\Core\Collection;

class CharacterCollection extends Collection
{
    public string $className = Character::class;
    public function getItem(int $index): Character|false
    {
        return $this->isValid($index) ? $this->elements[$index] : false;
    }
}