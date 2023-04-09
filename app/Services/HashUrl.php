<?php

namespace App\Services;
use InvalidArgumentException;

class HashUrl implements \App\Interfaces\Hash
{
    public static $listAlgos;
    private readonly string $algorithm;

    function __construct(string $algo = 'ripemd128')
    {
        $this->algorithm = $algo;
        HashUrl::$listAlgos = hash_algos();
    }

    public function getHash(string $value) : string
    {
        if (!$this->isValidAlgo($this->algorithm))
        {
            throw new InvalidArgumentException('The specified algorithm is not valid');
        }
        return hash($this->algorithm, $value);
    }

    private function isValidAlgo(string $algo) : bool
    {
        return in_array($algo, HashUrl::$listAlgos);
    }
}
