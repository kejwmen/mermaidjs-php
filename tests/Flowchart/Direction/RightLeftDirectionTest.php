<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\Direction;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\Direction\RightLeftDirection;

class RightLeftDirectionTest extends TestCase
{
    public function testDescribe() : void
    {
        $direction = new RightLeftDirection();

        $this->assertSame('RL', $direction->describe());
    }
}
