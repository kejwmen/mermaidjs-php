<?php

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

    /**
     * @dataProvider descriptionExamples
     */
    public function testDescribeExampleNodes(Nodes $nodes, string $expectedDescription): void
    {
        $result = $nodes->describe();

        $this->assertSame($expectedDescription, $result);
    }

    public function descriptionExamples(): iterable
    {
        yield 'empty' => [
            new Nodes(),
            <<<DIAGRAM
DIAGRAM
        ];

        yield 'identifiable node' => [
            new Nodes(IdentifiableNode::withoutTransitions('FOO')),
            <<<DIAGRAM
FOO
DIAGRAM
        ];

        yield 'text node' => [
            new Nodes(TextNode::withoutTransitions('FOO', 'bar')),
            <<<DIAGRAM
FOO[bar]
DIAGRAM
        ];

        yield 'text node with style' => [
            new Nodes(TextNode::withoutTransitions('FOO', 'bar', new CircleStyle())),
            <<<DIAGRAM
FOO((bar))
DIAGRAM
        ];

        yield 'identifiable node with transition' => [
            new Nodes(IdentifiableNode::withTransitions('FOO', Transitions::fromArray([
                new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR'))
            ]))),
            <<<DIAGRAM
FOO --> BAR
DIAGRAM
        ];

        yield 'identifiable node with multiple transitions' => [
            new Nodes(IdentifiableNode::withTransitions('FOO', Transitions::fromArray([
                new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR')),
                new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAZ')),
                new TransitionWithoutText(IdentifiableNode::withoutTransitions('ZAZ'))
            ]))),
            <<<DIAGRAM
FOO --> BAR
FOO --> BAZ
FOO --> ZAZ
DIAGRAM
        ];

        yield 'identifiable node with multiple transitions using different styles' => [
            new Nodes(IdentifiableNode::withTransitions('FOO', Transitions::fromArray([
                new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR'), new DottedStyle()),
                new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAZ'), new OpenStyle()),
                new TransitionWithoutText(IdentifiableNode::withoutTransitions('ZAZ'))
            ]))),
            <<<DIAGRAM
FOO -.-> BAR
FOO --- BAZ
FOO --> ZAZ
DIAGRAM
        ];

        yield 'multiple nodes with multiple transitions' => [
            new Nodes(
                IdentifiableNode::withTransitions('FOO', Transitions::fromArray([
                    new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR'), new DottedStyle()),
                    new TransitionWithoutText(TextNode::withoutTransitions('BAZ', 'lorem'), new OpenStyle()),
                    new TransitionWithoutText(IdentifiableNode::withoutTransitions('ZAZ'))
                ])),
                TextNode::withTransitions('woof', 'bork', Transitions::fromArray([
                    new TransitionWithoutText(IdentifiableNode::withoutTransitions('BAR'), new ArrowStyle()),
                    new TransitionWithoutText(IdentifiableNode::withoutTransitions('bazinga'), new OpenStyle())
                ]), new RhombusStyle())
            ),
            <<<DIAGRAM
FOO -.-> BAR
FOO --- BAZ[lorem]
FOO --> ZAZ
woof{bork} --> BAR
woof --- bazinga
DIAGRAM
        ];
    }
}
