<?php

namespace Src\BattleSystem;

use ChoiceFactory;
use Src\BattleSystem\Choice\Choice;
use Src\Characters\Character;

final class Turn
{
    /**
     * Summary of choice
     * @var \array<Choice>
     */
    public array $choices = [];
    public bool $committed = false;
    public bool $performed = false;
    /**
     * Summary of choice
     * @var \array<\Src\Characters\Character>
     */
    public array $chars;

    public function __construct()
    {
    }

    public function addChoice(string $choiceType, Character $target, Character $author)
    {
        $factory = new ChoiceFactory;
        $this->choices[] = $factory->create($choiceType, ['author' => $author, 'target' => $target]);
    }

    public function commit()
    {
        $this->committed = true;
    }

    public function setPerformed(bool $status): void {
        if ($this->performed) return;
        $this->performed = $status;
    }

    public function doTurn(): bool {
        if (!$this->committed) return false;
        if (!$this->performed) return false;
        $choices = $this->defineOrder();
        array_map(function (Choice $choice) {
            $choice->perform();
        }, $choices);
        $this->setPerformed(true);
        return true;
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
}