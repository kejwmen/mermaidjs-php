<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\TransitionStyle;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\TransitionStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;
use Sip\MermaidJsPhp\Flowchart\TransitionWithText;

abstract class TransitionStyleTest extends TestCase
{
    /** @var TransitionStyle */
    protected $style;

    public function setUp() : void
    {
        $this->style = $this->createStyle();
    }

    /**
     * @dataProvider decoratingTransitionWithoutTextExamples
     */
    public function testDecoratesTransitionWithoutText(TransitionWithoutText $transition, string $expectedResult) : void
    {
        $result = $this->style->decorate($transition);

        $this->assertSame($expectedResult, $result);
    }

    /**
     * @dataProvider decoratingTransitionWithTextExamples
     */
    public function testDecoratesTransitionWithText(TransitionWithText $transition, string $expectedResult) : void
    {
        $result = $this->style->decorate($transition);

        $this->assertSame($expectedResult, $result);
    }

    /**
     * @return mixed[]
     */
    abstract public function decoratingTransitionWithoutTextExamples() : iterable;

    /**
     * @return mixed[]
     */
    abstract public function decoratingTransitionWithTextExamples() : iterable;

    abstract protected function createStyle() : TransitionStyle;

    protected function createExampleTargetNode() : IdentifiableNode
    {
        return IdentifiableNode::withoutTransitions('Foo');
    }
}
