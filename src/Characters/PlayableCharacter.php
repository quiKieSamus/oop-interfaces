<?php
namespace Src\Characters;

class PlayableCharacter extends Character
{
    public function __construct(int $hp, int $mana, int $atk, int $def, int $speed, string $name, string $title)
    {
        parent::__construct($hp, $mana, $atk, $def, $speed, $name, $title);
    }

    public function saySomething(string $msg): void
    {
        print_r($msg);
    }
}