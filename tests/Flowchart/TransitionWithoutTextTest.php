<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart;

use Sip\MermaidJsPhp\Flowchart\FlowchartNode;
use Sip\MermaidJsPhp\Flowchart\FlowchartTransition;
use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;

class TransitionWithoutTextTest extends FlowchartTransitionTest
{
    public function describingExamples(): iterable
    {
        yield  'simple' => [
            $this->createTransition(IdentifiableNode::withoutTransitions('bar')),
            '--> bar'
        ];
    }

    protected function createTransition(FlowchartNode $target, ?string $text = null): FlowchartTransition
    {
        return new TransitionWithoutText($target);
    }

    public function testContract(): void
    {
        $target = IdentifiableNode::withoutTransitions('foo');

        $transition = $this->createTransition($target);

        $this->assertNull($transition->text());
        $this->assertSame($target, $transition->target());
    }
}
