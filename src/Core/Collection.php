<?php
namespace Src\Core;

use stdClass;

abstract class Collection
{
    public string $className = stdClass::class;
    public array $elements;

    public function __construct(array $elements)
    {
        for ($i = 0; $i < count($elements); $i++) {
            $element = $elements[$i];
            if (!$this->validate($element))
                throw new \Exception("Invalid collection type");
            $this->push($element);
        }
    }

    public function push(mixed $element): void
    {
        if (($element instanceof $this->className))
            $this->elements[] = $element;
    }

    public function validate(mixed $element): bool
    {
        return $element instanceof $this->className;
    }

    public function delete(int $index): void
    {
        unset($this->elements[$index]);
    }

    public function isValid(int $index)
    {
        return array_key_exists($index, $this->elements);
    }

    public function getItem(int $index): mixed
    {
        return $this->isValid($index) ? $this->elements[$index] : false;
    }

    public function length(): int
    {
        return count($this->elements);
    }
    public function isEmpty()
    {
        return $this->length() == 0;
    }
    public function find(mixed $item) {
        return array_search($item, $this->elements);
    }
    public function forEach(callable $function) {
        foreach($this->elements as $element) {
            $function($element);
        }
    }
}