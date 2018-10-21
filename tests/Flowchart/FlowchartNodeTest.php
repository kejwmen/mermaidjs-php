<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart;

use Sip\MermaidJsPhp\Flowchart\FlowchartNode;
use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Transitions;

abstract class FlowchartNodeTest extends TestCase
{
    abstract public function testContractWithTransitions(): void;

    abstract public function testContractWithoutTransitions(): void;

    /**
     * @dataProvider describingExamples
     */
    public function testDescribesExamples(FlowchartNode $node, string $expectedResult): void
    {
        $this->assertSame($expectedResult, $node->describe());
    }

    abstract public function describingExamples(): iterable;

    abstract protected function createNodeWithTransitions(string $id, ?string $content, Transitions $next): FlowchartNode;

    abstract protected function createNodeWithoutTransitions(string $id, ?string $content): FlowchartNode;
}
