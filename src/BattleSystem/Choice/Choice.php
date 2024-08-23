<?php

namespace Src\BattleSystem\Choice;

use Src\BattleSystem\Choice\Enums\Choices;
use Src\Characters\Character;

abstract class Choice
{
    public Character $author;
    public Character $target;
    public string $method;

    public function __construct(Character $target, Character $author, string $method)
    {
        $this->target = $target;
        $this->author = $author;
        if (!enum_exists(Choices::{$method}))
            throw new \Exception("Action {$method} doesn't exists");
        $this->method = Choices::{$method};
    }

    public function perform(): void
    {
        $this->author->{$this->method}($this->target);
    }


}