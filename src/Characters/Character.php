<?php
namespace Src\Characters;

abstract class Character {
    public int $hp;
    public int $mana;
    public int $atk;
    public int $def;
    public int $speed;
    public string $name;
    public string $title;

    public function __construct(int $hp, int $mana, int $atk, int $def, int $speed, string $name, string $title) {
        $this->hp = $hp;
        $this->mana = $mana;
        $this->atk = $atk;
        $this->def = $def;
        $this->speed = $speed;
        $this->name = $name;
        $this->title = $title;
    }

    public function talk() {
        print_r("I am " . $this->name);
    }

    public function calculateDamage(Character $character) {
        return $character->def - $this->atk;
    }

    public function isFaster(Character $character) {
        return $this->speed > $character;
    }
}