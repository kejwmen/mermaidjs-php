<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\NodeStyle;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\TextNodeStyle;
use Sip\MermaidJsPhp\Flowchart\TextNode;

abstract class TextNodeStyleTest extends TestCase
{
    /**
     * @var TextNodeStyle
     */
    private $style;

    public function setUp()
    {
        $this->style = $this->createStyle();
    }

    /**
     * @dataProvider decoratingExamples
     */
    public function testDecoratesExampleNodes(TextNode $node, string $expectedResult)
    {
        $result = $this->style->decorate($node);

        $this->assertSame($expectedResult, $result);
    }

    abstract public function decoratingExamples(): iterable;

    abstract protected function createStyle(): TextNodeStyle;

    protected function createTextNode(string $identifier, string $context): TextNode
    {
        return TextNode::withoutTransitions($identifier, $context, $this->style);
    }
}
