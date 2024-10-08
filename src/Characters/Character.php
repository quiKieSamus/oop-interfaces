<?php
namespace Src\Characters;

abstract class Character
{
    public int $hp = 10;
    public int $mana = 5;
    public int $atk = 4;
    public int $def = 2;
    public int $speed = 3;
    public string $name;
    public string $title;

    public function __construct(int $hp, int $mana, int $atk, int $def, int $speed, string $name, string $title)
    {
        $this->hp = $hp;
        $this->mana = $mana;
        $this->atk = $atk;
        $this->def = $def;
        $this->speed = $speed;
        $this->name = $name;
        $this->title = $title;
    }

    public function talk(): void
    {
        print_r("I am " . $this->name);
    }

    public function attack(Character $target): void {
        print_r("I'm ({$this->name}) attacking {$target->name}");
    }

    public function defend(Character $character): void {
        print_r("I'm ({$this->name}) defending {$character->name}");
    }

    public function calculateDamage(Character $character): int
    {
        $result = $character->def - $this->atk;
        return $result < 0 ? 1 : $result;
    }

    public function isFaster(Character $character): bool
    {
        return $this->speed > $character->speed;
    }

    public function moveUp(): void
    {
        print_r("{$this->name} is moving up");
    }

    public function moveDown(): void
    {
        print_r("{$this->name} is moving down");
    }

    public function moveLeft(): void
    {
        print_r("{$this->name} is moving to the left");
    }

    public function moveRight(): void
    {
        print_r("{$this->name} is moving to the right");
    }
}