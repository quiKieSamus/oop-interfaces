<?php

namespace Src\Characters;

use Src\Collections\CharacterCollection;
use Src\Core\Iterator;

class CharacterIterator extends Iterator {
    public CharacterCollection $collection;
    public Character $currentItem;
    /**
     * Traverse to the next element
     * @return mixed
     */
    public function next(): Character
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
    public function previous(): Character
    {
        $this->current--;
        $this->currentItem = $this->collection->getItem($this->current);
        return $this->currentItem;
    }
    /**
     * Traverse all the way back to the collection's first element. This method will set the current element to the beggining
     * @return mixed
     */
    public function getInitial(): Character
    {
        $this->goToInitial();
        return $this->collection->getItem($this->current);
    }
    /**
     Traverse all the way forward to the collection's last item. This method will set the current element to the end
     * @return mixed
     */
    public function getLast(): Character
    {
        $this->goToEnd();
        return $this->collection->getItem($this->current);
    } 
        /**
     * Get current element of the Iterator
     * @return mixed
     */
    public function getCurrentItem(): Character
    {
        return $this->currentItem;
    }
}