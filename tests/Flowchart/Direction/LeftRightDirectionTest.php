<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\Direction;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\Direction\LeftRightDirection;

class LeftRightDirectionTest extends TestCase
{
    public function testDescribe() : void
    {
        $direction = new LeftRightDirection();

        $this->assertSame('LR', $direction->describe());
    }
}
