<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\UrlShortenerService;
use App\Models\UrlShortener;

class UrlShortenerServiceTest extends TestCase
{
    /**
     * @dataProvider inputDataProvider
     */
    public function testFindShortLinkByUrl($expectedResult): void
    {
        // Arrange
        $returningMock = new \stdClass;
        $returningMock->short_link = $expectedResult;
        $inputUrl = 'foo';

        $mockModel = $this->getMockBuilder(UrlShortener::class)
            ->addMethods(['firstWhere'])
            ->getMock();
        $mockModel->method('firstWhere')
            ->with($this->equalTo('url'), $this->equalTo($inputUrl))
            ->willReturn($returningMock);
        $service = new UrlShortenerService($mockModel);

        // Act
        $actualResult = $service->findShortLinkByUrl($inputUrl);

        // Assert
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @dataProvider inputDataProvider
     */
    public function testFindUrlByShortLink($expectedResult): void
    {
        // Arrange
        $returningMock = new \stdClass;
        $returningMock->url = $expectedResult;
        $inputLink = 'foo';

        $mockModel = $this->getMockBuilder(UrlShortener::class)
            ->addMethods(['firstWhere'])
            ->getMock();
        $mockModel->method('firstWhere')
            ->with($this->equalTo('short_link'), $this->equalTo($inputLink))
            ->willReturn($returningMock);
        $service = new UrlShortenerService($mockModel);

        // Act
        $actualResult = $service->findUrlByShortLink($inputLink);

        // Assert
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testCreateUrlShortener(): void
    {
        $inputUrl = 'url';
        $inputShortLink = 'shortLink';

        $mockModel = $this->getMockBuilder(UrlShortener::class)
            ->addMethods(['create'])
            ->getMock();
        $mockModel->method('create')
            ->with($this->isType('array'))
            ->will($this->returnCallback(function($array) use($inputUrl, $inputShortLink) {
                self::assertArrayHasKey('url', $array);
                self::assertArrayHasKey('short_link', $array);
                self::assertEquals($inputUrl, $array['url']);
                self::assertEquals($inputShortLink, $array['short_link']);
            })
        );
        $service = new UrlShortenerService($mockModel);

        $service->createUrlShortener($inputUrl, $inputShortLink);
    }

    public static function inputDataProvider()
    {
        return [['data'], [null]];
    }
}
