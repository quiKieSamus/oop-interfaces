<?php

namespace Src\Core;

use Exception;

abstract class Iterator
{
    public Collection $collection;
    public int $current;
    public int $previous;
    public mixed $currentItem;
    public function __construct(Collection $collection, int $initial = 0)
    {
        $this->collection = $collection;
        if ($this->collection->isEmpty()) throw new Exception('Collection is empty');
        if ($this->collection->isValid($initial)) {
            $this->current = $initial;
            $this->previous = 0;
            $this->currentItem = $this->collection->getItem($initial);
        }
    }
    /**
     * Traverse to the next element
     * @return mixed
     */
    public function next(): mixed
    {
        $this->current++;
        $this->currentItem = $this->collection->getItem($this->current);
        if (!$this->currentItem) return $this->previous();
        return $this->currentItem;
    }
    /**
     * Traverse to the previous element
     * @return mixed
     */
    public function previous(): mixed
    {
        $this->current--;
        $this->currentItem = $this->collection->getItem($this->current);
        return $this->currentItem;
    }
    /**
     * Traverse all the way back to the collection's first element. This method will set the current element to the beggining
     * @return mixed
     */
    public function getInitial()
    {
        $this->goToInitial();
        return $this->collection->getItem($this->current);
    }
    /**
     Traverse all the way forward to the collection's last item. This method will set the current element to the end
     * @return mixed
     */
    public function getLast()
    {
        $this->goToEnd();
        return $this->collection->getItem($this->current);
    }
    /**
     * Sets the Iterator to the beggining
     * @return void
     */
    public function goToInitial()
    {
        $this->current = array_key_first($this->collection->elements);
        $this->currentItem = $this->collection->getItem($this->current);
    }
    /**
     * Sets the Iterator to the end
     * @return void
     */
    public function goToEnd()
    {
        $this->current = array_key_last($this->collection->elements);
        $this->currentItem = $this->collection->getItem($this->current);
    }
    /**
     * Get current element of the Iterator
     * @return mixed
     */
    public function getCurrentItem(): mixed
    {
        return $this->currentItem;
    }
    /**
     * Checks if the Iterator is at the end
     * @return bool
     */
    public function isItTheLast(): bool
    {
        return $this->getLast() == $this->getCurrentItem();
    }
    /**
     * Checks if the iterator's current item is empty
     * @return bool
     */
    public function isItEmpty() {
        $currentItem = $this->getCurrentItem();
        return !$currentItem || is_null($currentItem);
    }
}