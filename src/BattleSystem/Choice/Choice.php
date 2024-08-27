<?php

namespace Src\BattleSystem\Choice;

use Src\BattleSystem\Choice\Enums\Choices;
use Src\Characters\Character;

abstract class Choice
{
    public Character $author;
    public Character $target;

    public function __construct(Character $target, Character $author)
    {
        $this->target = $target;
        $this->author = $author;
    }

    public function perform(): void
    {
    }


}