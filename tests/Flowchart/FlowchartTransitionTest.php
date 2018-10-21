<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart;

use Sip\MermaidJsPhp\Flowchart\FlowchartNode;
use Sip\MermaidJsPhp\Flowchart\FlowchartTransition;
use PHPUnit\Framework\TestCase;

abstract class FlowchartTransitionTest extends TestCase
{
    abstract public function testContract(): void;

    /**
     * @dataProvider describingExamples
     */
    public function testDescribesExamples(FlowchartTransition $transition, string $expectedResult): void
    {
        $this->assertSame($expectedResult, $transition->describe());
    }

    abstract public function describingExamples(): iterable;

    abstract protected function createTransition(FlowchartNode $target, ?string $text = null): FlowchartTransition;
}
