<?php

namespace Src\Core;

interface Observer {
    public function update(Subject $subject);
}