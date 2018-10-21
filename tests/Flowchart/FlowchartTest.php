<?php

namespace Sip\MermaidJsPhp\Tests\Flowchart;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\Direction\BottomTopDirection;
use Sip\MermaidJsPhp\Flowchart\Direction\Direction;
use Sip\MermaidJsPhp\Flowchart\Direction\LeftRightDirection;
use Sip\MermaidJsPhp\Flowchart\Direction\RightLeftDirection;
use Sip\MermaidJsPhp\Flowchart\Direction\TopBottomDirection;
use Sip\MermaidJsPhp\Flowchart\Flowchart;
use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\CircleStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\RhombusStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\RoundEdgesStyle;
use Sip\MermaidJsPhp\Flowchart\TextNode;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;
use Sip\MermaidJsPhp\Flowchart\TransitionWithText;
use Sip\MermaidJsPhp\Nodes;
use Sip\MermaidJsPhp\Transitions;

class FlowchartTest extends TestCase
{
    public function testContract()
    {
        $nodes = new Nodes(
            IdentifiableNode::withoutTransitions('foo')
        );

        $flowchart = new Flowchart(new LeftRightDirection(), $nodes);

        $this->assertSame($nodes, $flowchart->root());
    }

    /**
     * @dataProvider descriptionExamples
     */
    public function testDescribesExampleFlowcharts(Flowchart $flowchart, string $expectedResult)
    {
        $this->assertSame($expectedResult, $flowchart->describe());
    }

    public function descriptionExamples(): iterable
    {
        yield 'demo example' => [
            new Flowchart(new LeftRightDirection(), new Nodes(
                TextNode::withTransitions('A', 'Square Rect', Transitions::fromArray([
                    new TransitionWithText(
                        'Link text',
                        TextNode::withoutTransitions('B', 'Circle', new CircleStyle())
                    )
                ])),
                IdentifiableNode::withTransitions('A', Transitions::fromArray([
                    new TransitionWithoutText(
                        TextNode::withoutTransitions('C', 'Round Rect', new RoundEdgesStyle())
                    )
                ])),
                IdentifiableNode::withTransitions('B', Transitions::fromArray([
                    new TransitionWithoutText(
                        TextNode::withoutTransitions('D', 'Rhombus', new RhombusStyle())
                    )
                ])),
                IdentifiableNode::withTransitions('C', Transitions::fromArray([
                    new TransitionWithoutText(
                        IdentifiableNode::withoutTransitions('D')
                    )
                ]))
            )),
            <<<RESULT
graph LR
    A[Square Rect] -- Link text --> B((Circle))
    A --> C(Round Rect)
    B --> D{Rhombus}
    C --> D
RESULT
        ];

        yield 'different direction' => [
            new Flowchart(new TopBottomDirection(), new Nodes(
                IdentifiableNode::withoutTransitions('FOO')
            )),
            <<<RESULT
graph TB
    FOO
RESULT
        ];
    }
}
