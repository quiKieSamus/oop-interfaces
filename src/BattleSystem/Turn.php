<?php

namespace Src\BattleSystem;

use Src\BattleSystem\Choice\Choice;

class Turn
{
    /**
     * Summary of choice
     * @var \array<\Src\BattleSystem\Choice\Choice>
     */
    public array $choices = [];
    public bool $commited = false;
    /**
     * Summary of choice
     * @var \array<\Src\Characters\Character>
     */
    public array $chars;

    public function __construct()
    {
    }

    public function addChoice(Choice $choice)
    {
        $this->choices[] = $choice;
    }

    public function commit()
    {
        $this->commited = true;
    }

    public function defineOrder(): array
    {
        $speeds = [];
        for ($i = 0; $i < count($this->chars); $i++) {
            $speeds[] = ['speed' => $this->chars[$i]->speed, 'character' => $this->chars[$i]];
        }
        asort($speeds, SORT_DESC);
        return $speeds;
    }

    public function takeTurn()
    {
        if (!$this->commited)
            throw new \Exception('Turn is not commited yet');

        array_map(function (Choice $choice) {
            $choice->perform();
        }, $this->choices);
    }
}