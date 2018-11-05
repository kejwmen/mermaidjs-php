<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Sequence\NoteNode;

class NoteNodeTest extends TestCase
{
    /**
     * @dataProvider describingExamples
     */
    public function testDescribe(callable $nodeFactory, string $expectedResult) : void
    {
        /** @var NoteNode $node */
        $node = $nodeFactory();

        $result = $node->describe();

        $this->assertSame($expectedResult, $result);
    }

    /**
     * @return mixed[]
     */
    public function describingExamples() : iterable
    {
        yield 'left' => [
            static function () : NoteNode {
                return NoteNode::left('Foo', 'Bar');
            },
            'Note left of Foo: Bar',
        ];

        yield 'right' => [
            static function () : NoteNode {
                return NoteNode::right('Foo', 'Bar');
            },
            'Note right of Foo: Bar',
        ];
    }
}
