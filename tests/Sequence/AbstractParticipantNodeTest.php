<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Sequence\SequenceNode;

abstract class AbstractParticipantNodeTest extends TestCase
{
    /**
     * @dataProvider describingExamples
     */
    public function testDescribesExamples(SequenceNode $node, string $expectedResult) : void
    {
        $this->assertSame($expectedResult, $node->describe());
    }

    /**
     * @return mixed[]
     */
    abstract public function describingExamples() : iterable;

    abstract protected function createNode(
        string $name,
        ?string $alias
    ) : SequenceNode;
}
