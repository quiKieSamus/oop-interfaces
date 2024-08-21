<?php

namespace Src\BattleSystem;

use Src\Characters\Character;

class BattleSystem
{
    public Character $characterA;
    public Character $characterB;
    public Character $currentCharacter;
    public array $order;

    public function __construct(Character $characterA, Character $characterB)
    {
        $this->characterA = $characterA;
        $this->characterB = $characterB;
        $this->order = $this->calculateOrder();
    }

    public function calculateOrder()
    {
        return $this->characterA->isFaster($this->characterB) ? ['0' => $this->characterA, '1' => $this->characterB] : ['0' => $this->characterB, '1' => $this->characterA];
    }

    public function writeLog() {
        // define function
    }
}
