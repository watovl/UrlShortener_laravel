<?php

namespace App\Interfaces;

interface Hash
{
    public function getHash(string $input) : string;
}
