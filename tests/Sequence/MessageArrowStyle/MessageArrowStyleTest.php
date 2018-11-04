<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence\MessageArrowStyle;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\TextNodeStyle;
use Sip\MermaidJsPhp\Flowchart\TextNode;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\MessageArrowStyle;

abstract class MessageArrowStyleTest extends TestCase
{
    /** @var MessageArrowStyle */
    private $style;

    public function setUp() : void
    {
        $this->style = $this->createStyle();
    }

    public function testDescribes() : void
    {
        $result = $this->style->describe();

        $this->assertSame($this->expectedDescription(), $result);
    }

    abstract public function expectedDescription() : string;

    abstract protected function createStyle() : MessageArrowStyle;
}
