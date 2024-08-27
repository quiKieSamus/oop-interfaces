<?php
namespace Src\Core;
abstract class Collection
{
    public string $className;
    public array $elements;

    public function __construct(string $className, array $elements)
    {
        $this->className = $className;
        for ($i = 0; $i < count($elements); $i++) {
            $element = $elements[$i];
            if (!$this->validate($element))
                throw new \Exception("Invalid connection type");
            $this->push($element);
        }
    }

    public function push(mixed $element): void
    {
        $this->elements[] = $element;
    }

    public function validate(mixed $element): bool
    {
        if (!($element instanceof $this->className))
            return false;
        return true;
    }

    public function delete(int $index): void
    {
        $this->elements = array_splice($this->elements, $index, 1);
    }

    public function isValid(int $index) {
        return array_key_exists($index, $this->elements);
    }

    public function getItem(int $index): mixed
    {
        return $this->isValid($index) ? $this->elements[$index] : throw new \Exception("Item doesn't exists");
    }

    public function length(): int
    {
        return count($this->elements);
    }
    public function filter(mixed $element) {
        
    }

}