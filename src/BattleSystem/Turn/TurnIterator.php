<?php

namespace Src\BattleSystem\Turn;

use Src\Core\Iterator;

class TurnIterator extends Iterator {
    public TurnCollection $collection;
    public Turn $currentItem;
    /**
     * Traverse to the next element
     * @return Turn
     */
    public function next(): Turn
    {
        $this->current++;
        $this->currentItem = $this->collection->getItem($this->current);
        if (!$this->currentItem) return $this->previous();
        return $this->currentItem;
    }
    /**
     * Traverse to the previous element
     * @return Turn
     */
    public function previous(): Turn
    {
        $this->current--;
        $this->currentItem = $this->collection->getItem($this->current);
        return $this->currentItem;
    }
    /**
     * Traverse all the way back to the collection's first element. This method will set the current element to the beggining
     * @return Turn
     */
    public function getInitial(): Turn
    {
        $this->goToInitial();
        return $this->collection->getItem($this->current);
    }
    /**
     Traverse all the way forward to the collection's last item. This method will set the current element to the end
     * @return Turn
     */
    public function getLast(): Turn
    {
        $this->goToEnd();
        return $this->collection->getItem($this->current);
    } 
        /**
     * Get current element of the Iterator
     * @return Turn
     */
    public function getCurrentItem(): Turn
    {
        return $this->currentItem;
    }
}