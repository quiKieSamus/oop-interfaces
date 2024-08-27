<?php

namespace Src\Core;

abstract class Subject {
    public Collection $observers;

    public function subscribe(Observer $observer) {
        $this->observers->push($observer);
    }

    public function removeSubscription() {
        
    }
}