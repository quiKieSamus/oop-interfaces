<?php

namespace Src\Core;

interface Factory {
    public function create(string $type, mixed $properties = null);
}