<?php

use Src\BattleSystem\Choice\Choice;
use Src\BattleSystem\Choice\Enums\Choices;
use Src\Core\Factory;

class ChoiceFactory implements Factory {
    public function create(string $type, mixed $properties = null): Choice {
        return match($type) {
            Choices::Attack => new AttackChoice(target: $properties['target'], author: $properties['author']),
            Choices::Defend => new DefendChoice(target: $properties['target'], author: $properties['author']),
            default => throw new Exception('Choice doesnt exists')
        };
    }
}