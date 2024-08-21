<?php

abstract class Character {
    public int $hp;
    public int $mana;
    public int $atk;
    public int $def;
    public int $speed;
    public string $name;
    public string $title;

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