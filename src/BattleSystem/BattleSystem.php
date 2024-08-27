<?php

namespace Src\BattleSystem;

use Src\Characters\Character;

final class BattleSystem
{
    public Character $characterA;
    public Character $characterB;
    public array $turns;
    public Turn $currentTurn;

    public function __construct(Character $characterA, Character $characterB)
    {
        $this->characterA = $characterA;
        $this->characterB = $characterB;
    }

    public function writeLog()
    {
        // define function
    }

    public function checkIfItsOver()
    {
        $losers = array_filter([$this->characterA, $this->characterB], function (Character $character) {
            return $character->hp == 0;
        });
        return count($losers) > 0;
    }

    public function isTurnOver(Turn $turn) {
        return $turn->performed;
    }

    public function setCurrentTurn(Turn $turn) {
        $this->currentTurn = $turn;
    }

    public function addTurn() {
        
    }
}
