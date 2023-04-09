<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\ValidatorUrl;

class ValidatorUrlTest extends TestCase
{
    public function testHttpTemplate(): void
    {
        $expectedUrl = 'http://url.com';
        $url = 'http://url.com';
        $validator = new ValidatorUrl();

        $actualUrl = $validator->validingUrl($url);

        $this->assertEquals($expectedUrl, $actualUrl);
    }

    public function testHttpsTemplate(): void
    {
        $expectedUrl = 'https://url.com';
        $url = 'https://url.com';
        $validator = new ValidatorUrl();

        $actualUrl = $validator->validingUrl($url);

        $this->assertEquals($expectedUrl, $actualUrl);
    }

    public function testTemplateWithoutProtocol(): void
    {
        $expectedUrl = 'https://url.com';
        $url = 'url.com';
        $validator = new ValidatorUrl();

        $actualUrl = $validator->validingUrl($url);

        $this->assertEquals($expectedUrl, $actualUrl);
    }
}
