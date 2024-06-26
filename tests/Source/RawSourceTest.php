<?php

declare(strict_types = 1);

namespace Cideale\Libmergepdf\Source;

use Cideale\Libmergepdf\PagesInterface;

class RawSourceTest extends \PHPUnit\Framework\TestCase
{
    public function testGetName()
    {
        $this->assertSame(
            'raw-content',
            (new RawSource(''))->getName()
        );
    }

    public function testgetContents()
    {
        $this->assertSame(
            'foobar',
            (new RawSource('foobar'))->getContents()
        );
    }

    public function testGetPages()
    {
        $pages = $this->createMock(PagesInterface::CLASS);
        $this->assertSame(
            $pages,
            (new RawSource('', $pages))->getPages()
        );
    }
}
