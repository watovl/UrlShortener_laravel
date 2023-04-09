<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\CreatorShortLink;
use App\Interfaces\{Hash, ValidatorHttp};

class CreatorShortLinkTest extends TestCase
{
    public function testMakeShortLink(): void
    {
        // Arrange
        $expectedHash = '1a';
        $url = 'http://url.com';

        $mockHash = $this->createMock(Hash::class);
        $mockHash->method('getHash')->willReturn($expectedHash);

        $mockValidator = $this->createMock(ValidatorHttp::class);
        $mockValidator->method('validingUrl')->willReturn($url);

        $creator = new CreatorShortLink($mockHash, $mockValidator);

        //Act
        $actualHash = $creator->makeShortLink($url);

        // Assert
        $this->assertEquals($expectedHash, $actualHash);
    }
}
