<?php

 namespace App\Services;

 use App\Interfaces\{Hash, ValidatorHttp};

 class CreatorShortLink implements \App\Interfaces\GeneratorShortLink
 {
    private Hash $hash;
    private ValidatorHttp $validator;

    function __construct(Hash $hash, ValidatorHttp $validator)
    {
        $this->hash = $hash;
        $this->validator = $validator;
    }

    public function makeShortLink(string $url): string
    {
        $validUrl = $this->validator->validingUrl($url);
        return $this->hash->getHash($validUrl);
    }
 }
