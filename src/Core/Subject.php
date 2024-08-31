<?php

namespace Src\Core;

abstract class Subject {
    public Collection $observers;

    public function subscribe(Observer $observer) {
        $this->observers->push($observer);
    }
    public function removeSubscription(Observer $observer) {
        $itemFound = $this->observers->find($observer);
        $this->observers->delete($itemFound); 
    }
    public function notify() {
        $this->observers->forEach(function(Observer $observer) {
            $observer->update($this);
        });
    }
}