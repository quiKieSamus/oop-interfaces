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
        $this->currentCharacter = $this->order[0];
    }

    public function calculateOrder()
    {
        return $this->characterA->isFaster($this->characterB) ? ['0' => $this->characterA, '1' => $this->characterB] : ['0' => $this->characterB, '1' => $this->characterA];
    }

    /**
     * get next character
     * @return Character
     */
    public function nextOne() {
        $nextOne = array_filter($this->order, function(Character $character) {
            return $character != $this->currentCharacter;
        });
        return $nextOne[array_key_first($nextOne)];
    }

    public function writeLog() {
        // define function
    }

    public function checkIfItsOver() {
        $losers = array_filter($this->order, function(Character $character) {
            return $character->hp == 0;
        });
        return count($losers) > 0;
    }
}
