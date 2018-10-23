<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\Direction;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\Direction\BottomTopDirection;

class BottomTopDirectionTest extends TestCase
{
    public function testDescribe() : void
    {
        $direction = new BottomTopDirection();

        $this->assertSame('BT', $direction->describe());
    }
}
