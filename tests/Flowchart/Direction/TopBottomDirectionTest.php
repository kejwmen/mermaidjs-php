<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\Direction;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\Direction\TopBottomDirection;

class TopBottomDirectionTest extends TestCase
{
    public function testDescribe() : void
    {
        $direction = new TopBottomDirection();

        $this->assertSame('TB', $direction->describe());
    }
}
