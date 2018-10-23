<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\FlowchartNode;
use Sip\MermaidJsPhp\Flowchart\FlowchartTransition;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\TransitionStyle;

abstract class FlowchartTransitionTest extends TestCase
{
    abstract public function testContract() : void;

    /**
     * @dataProvider describingExamples
     */
    public function testDescribesExamples(FlowchartTransition $transition, string $expectedResult) : void
    {
        $this->assertSame($expectedResult, $transition->describe());
    }

    /**
     * @return mixed[]
     */
    abstract public function describingExamples() : iterable;

    abstract protected function createTransition(
        FlowchartNode $target,
        ?string $text = null,
        ?TransitionStyle $style = null
    ) : FlowchartTransition;
}
