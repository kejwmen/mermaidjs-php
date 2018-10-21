<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart;

use Sip\MermaidJsPhp\Flowchart\FlowchartNode;
use Sip\MermaidJsPhp\Flowchart\FlowchartTransition;
use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\TransitionWithText;

class TransitionWithTextTest extends FlowchartTransitionTest
{
    public function describingExamples(): iterable
    {
        yield  'simple' => [
            $this->createTransition(IdentifiableNode::withoutTransitions('bar'), 'foo'),
            '-- foo --> bar'
        ];
    }

    protected function createTransition(FlowchartNode $target, ?string $text = null): FlowchartTransition
    {
        return new TransitionWithText($text, $target);
    }

    public function testContract(): void
    {
        $target = IdentifiableNode::withoutTransitions('foo');

        $transition = $this->createTransition($target, 'bar');

        $this->assertSame('bar', $transition->text());
        $this->assertSame($target, $transition->target());
    }
}
