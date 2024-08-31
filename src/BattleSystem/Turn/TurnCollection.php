<?php

namespace Src\BattleSystem\Turn;
use Src\Core\Collection;

class TurnCollection extends Collection
{
    public string $className = Turn::class;
    public function getItem(int $index): Turn|false
    {
        return $this->isValid($index) ? $this->elements[$index] : false;
    }
    public function createIterator(): TurnIterator
    {
        return new TurnIterator($this, 0);
    }
}