<?php

namespace Src\Core;

abstract class Iterator
{
    public Collection $collection;
    public int $current;
    public mixed $currentItem;
    public function __construct(Collection $collection, int $initial = 0)
    {
        $this->collection = $collection;
        if ($this->collection->isValid($initial)) {
            $this->current = $initial;
            $this->currentItem = $this->collection->getItem($initial);
        }
    }
    public function next(): mixed
    {
        $this->current++;
        $this->currentItem = $this->collection->getItem($this->current);
        return $this->currentItem;
    }
    public function getInitial() {
        return $this->collection->getItem(array_key_first($this->collection->elements));
    }
    public function getEnd() {
        return $this->collection->getItem(array_key_last($this->collection->elements));
    }
    public function goToInitial() {
        $this->current = array_key_first($this->collection->elements);
        $this->currentItem = $this->collection->getItem($this->current);
    }
    public function goToEnd() {
        $this->current = array_key_last($this->collection->elements);
        $this->currentItem = $this->collection->getItem($this->current);
    }
}