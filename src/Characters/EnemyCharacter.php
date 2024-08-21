<?php
namespace Src\Characters;

class EnemyCharacter extends Character
{
    public function __construct(int $hp, int $mana, int $atk, int $def, int $speed, string $name, string $title)
    {
        parent::__construct($hp, $mana, $atk, $def, $speed, $name, $title);
    }
    public function saySomethingRude(Character $character)
    {
        print_r("{$character->name}, you're disgusting");
    }
}
