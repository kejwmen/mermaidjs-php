<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\Direction;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\Direction\BottomTopDirection;
use Sip\MermaidJsPhp\Flowchart\Direction\LeftRightDirection;
use Sip\MermaidJsPhp\Flowchart\Direction\TopBottomDirection;

class LeftRightDirectionTest extends TestCase
{
    public function testDescribe()
    {
        $direction = new LeftRightDirection();

        $this->assertSame('LR', $direction->describe());
    }
}
