<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\ArrowStyle;
use Sip\MermaidJsPhp\Nodes;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\DottedLine;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\SolidLineWithArrow;
use Sip\MermaidJsPhp\Sequence\MessageNode;
use Sip\MermaidJsPhp\Sequence\ParticipantNode;
use Sip\MermaidJsPhp\Sequence\Sequence;

class SequenceTest extends TestCase
{
    public function testContract() : void
    {
        $nodes = new Nodes(
            IdentifiableNode::withoutTransitions('foo')
        );

        $flowchart = new Sequence($nodes);

        $this->assertSame($nodes, $flowchart->root());
    }

    /**
     * @dataProvider descriptionExamples
     */
    public function testDescribesExampleSequences(Sequence $sequence, string $expectedResult) : void
    {
        $this->assertSame($expectedResult, $sequence->describe());
    }

    /**
     * @return mixed[]
     */
    public function descriptionExamples() : iterable
    {
        yield 'demo example' => [
            new Sequence(
                new Nodes(
                    new ParticipantNode('Alice'),
                    new ParticipantNode('Bob'),
                    new MessageNode(
                        'Alice',
                        'John',
                        'Hello John, how are you?'
                    ),
                    // TODO: Implement loop node
                    // TODO: Implement note node
                    new MessageNode(
                        'John',
                        'Alice',
                        'Great!',
                        new SolidLineWithArrow()
                    ),
                    new MessageNode(
                        'John',
                        'Bob',
                        'How about you?'
                    ),
                    new MessageNode(
                        'Bob',
                        'John',
                        'Jolly good!',
                        new DottedLine()
                    )
                )
            ),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<RESULT
sequenceDiagram
    participant Alice
    participant Bob
    Alice->John: Hello John, how are you?
    loop Healthcheck
        John->John: Fight against hypochondria
    end
    Note right of John: Rational thoughts <br/>prevail...
    John-->Alice: Great!
    John->Bob: How about you?
    Bob-->John: Jolly good!
RESULT
            //phpcs:enable
        ];
    }
}
