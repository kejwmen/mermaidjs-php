<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart;

use Sip\MermaidJsPhp\Flowchart\FlowchartNode;
use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;
use Sip\MermaidJsPhp\Transitions;

class IdentifiableNodeTest extends FlowchartNodeTest
{
    public function testContractWithTransitions() : void
    {
        $transitions = Transitions::end();

        $node = $this->createNodeWithTransitions('foo', null, $transitions);

        $this->assertSame('foo', $node->getId());
        $this->assertNull($node->getContent());
        $this->assertSame($transitions, $node->next());
    }

    public function testContractWithoutTransitions() : void
    {
        $node = $this->createNodeWithoutTransitions('foo', null);

        $this->assertSame('foo', $node->getId());
        $this->assertNull($node->getContent());
        $this->assertFalse($node->next()->notEmpty());
    }

    /**
     * @return mixed[]
     */
    public function describingExamples() : iterable
    {
        yield 'with transition' => [
            $this->createNodeWithTransitions('foo', null, Transitions::fromArray([new TransitionWithoutText(
                IdentifiableNode::withoutTransitions('bar')
            ),
            ])),
            'foo --> bar',
        ];

        yield 'without transitions' => [
            $this->createNodeWithoutTransitions('foo', null),
            'foo',
        ];
    }

    protected function createNodeWithTransitions(string $id, ?string $content, Transitions $next) : FlowchartNode
    {
        return IdentifiableNode::withTransitions($id, $next);
    }

    protected function createNodeWithoutTransitions(string $id, ?string $content) : FlowchartNode
    {
        return IdentifiableNode::withoutTransitions($id);
    }
}
