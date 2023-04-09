<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\HashUrl;
use InvalidArgumentException;

class HashUrlTest extends TestCase
{
    public function testGetHash(): void
    {
        $expectedResult = '737985d45861851c6eb5f145fb76cf9f';
        $hash = new HashUrl('ripemd128');

        $actualResult = $hash->getHash('foo');

        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testThrowExpectionAlgorithm() :void
    {
        $hash = new HashUrl('invalidAlgo');

        $this->expectException(InvalidArgumentException::class);

        $hash->getHash('foo');
    }
}
