<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\CircleStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\RhombusStyle;
use Sip\MermaidJsPhp\Flowchart\TextNode;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\ArrowStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\DottedStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\OpenStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;
use Sip\MermaidJsPhp\Nodes;
use Sip\MermaidJsPhp\Transitions;

class NodesTest extends TestCase
{
    public function testIteratesThroughPassedNodes() : void
    {
        $nodeArray = [
            IdentifiableNode::withoutTransitions('foo'),
        ];

        $nodes = new Nodes(...$nodeArray);

        $iteratedNodes = [];

        foreach ($nodes as $node) {
            $iteratedNodes[] = $node;
        }

        $this->assertEquals($nodeArray, $iteratedNodes);
    }

    public function testCalculatesQuantityOfEmptyNodes() : void
    {
        $nodes = new Nodes();

        $this->assertCount(0, $nodes);
    }

    public function testCalculatesQuantityOfNotEmptyNodes() : void
    {
        $nodes = new Nodes(
            IdentifiableNode::withoutTransitions('foo')
        );

        $this->assertCount(1, $nodes);
    }

    /**
     * @dataProvider descriptionExamples
     */
    public function testDescribeExampleNodes(Nodes $nodes, string $expectedDescription) : void
    {
        $result = $nodes->describe();

        $this->assertSame($expectedDescription, $result);
    }

    /**
     * @return mixed[]
     */
    public function descriptionExamples() : iterable
    {
        yield 'empty' => [
            new Nodes(),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<DIAGRAM

DIAGRAM
            //phpcs:enable
        ];

        yield 'identifiable node' => [
            new Nodes(IdentifiableNode::withoutTransitions('FOO')),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<DIAGRAM
FOO
DIAGRAM
            //phpcs:enable
        ];

        yield 'text node' => [
            new Nodes(TextNode::withoutTransitions('FOO', 'bar')),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<DIAGRAM
FOO[bar]
DIAGRAM
            //phpcs:enable
        ];

        yield 'text node with style' => [
            new Nodes(TextNode::withoutTransitions('FOO', 'bar', new CircleStyle())),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<DIAGRAM
FOO((bar))
DIAGRAM
            //phpcs:enable
        ];

        $transitions = Transitions::fromArray([new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR'))]);

        yield 'identifiable node with transition' => [
            new Nodes(IdentifiableNode::withTransitions('FOO', $transitions)),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<DIAGRAM
FOO --> BAR
DIAGRAM
            //phpcs:enable
        ];

        yield 'identifiable node with multiple transitions' => [
            new Nodes(
                IdentifiableNode::withTransitions(
                    'FOO',
                    Transitions::fromArray(
                        [
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR')),
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAZ')),
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('ZAZ')),
                        ]
                    )
                )
            ),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<DIAGRAM
FOO --> BAR
FOO --> BAZ
FOO --> ZAZ
DIAGRAM
            //phpcs:enable
        ];

        yield 'identifiable node with multiple transitions using different styles' => [
            new Nodes(
                IdentifiableNode::withTransitions(
                    'FOO',
                    Transitions::fromArray(
                        [
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR'), new DottedStyle()),
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAZ'), new OpenStyle()),
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('ZAZ')),
                        ]
                    )
                )
            ),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<DIAGRAM
FOO -.-> BAR
FOO --- BAZ
FOO --> ZAZ
DIAGRAM
            //phpcs:enable
        ];

        yield 'multiple nodes with multiple transitions' => [
            new Nodes(
                IdentifiableNode::withTransitions(
                    'FOO',
                    Transitions::fromArray(
                        [
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR'), new DottedStyle()),
                            new TransitionWithoutText(TextNode::withoutTransitions('BAZ', 'lorem'), new OpenStyle()),
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('ZAZ')),
                        ]
                    )
                ),
                TextNode::withTransitions(
                    'woof',
                    'bork',
                    Transitions::fromArray(
                        [
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR'), new ArrowStyle()),
                            new TransitionWithoutText(IdentifiableNode::withoutTransitions('bazinga'), new OpenStyle()),
                        ]
                    ),
                    new RhombusStyle()
                )
            ),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<DIAGRAM
FOO -.-> BAR
FOO --- BAZ[lorem]
FOO --> ZAZ
woof{bork} --> BAR
woof --- bazinga
DIAGRAM
            //phpcs:enable
        ];
    }
}
