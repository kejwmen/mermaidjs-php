<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Sequence\SpanningNoteNode;

class SpanningNoteNodeTest extends TestCase
{
    /**
     * @dataProvider describingExamples
     */
    public function testDescribe(
        string $firstSubject,
        string $secondSubject,
        string $content,
        string $expectedResult
    ) : void {
        $node = new SpanningNoteNode($firstSubject, $secondSubject, $content);

        $result = $node->describe();

        $this->assertSame($expectedResult, $result);
    }

    /**
     * @return mixed[]
     */
    public function describingExamples() : iterable
    {
        yield 'simple' => [
            'Foo',
            'Bar',
            'Baz',
            'Note over Foo,Bar: Baz',
        ];
    }
}
