<?php

use Src\BattleSystem\Choice\Choice;
use Src\Characters\Character;


class DefendChoice extends Choice {
    public function __construct(Character $target, Character $author) {
        parent::__construct($target, $author);
    }
    public function perform(): void {
        $this->author->defend($this->target);
    }
}