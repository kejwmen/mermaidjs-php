<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart;

use Sip\MermaidJsPhp\Flowchart\FlowchartNode;
use Sip\MermaidJsPhp\Flowchart\FlowchartTransition;
use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\OpenStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\TransitionStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;

class TransitionWithoutTextTest extends FlowchartTransitionTest
{
    public function describingExamples(): iterable
    {
        yield  'simple' => [
            $this->createTransition(IdentifiableNode::withoutTransitions('bar')),
            '--> bar'
        ];

        yield 'with style' => [
            $this->createTransition(IdentifiableNode::withoutTransitions('bar'), null, new OpenStyle()),
            '--- bar'
        ];
    }

    protected function createTransition(
        FlowchartNode $target,
        ?string $text = null,
        ?TransitionStyle $style = null
    ): FlowchartTransition {
        return new TransitionWithoutText($target, $style);
    }

    public function testContract(): void
    {
        $target = IdentifiableNode::withoutTransitions('foo');

        $transition = $this->createTransition($target);

        $this->assertNull($transition->text());
        $this->assertSame($target, $transition->target());
    }
}
