<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\DottedLine;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\MessageArrowStyle;
use Sip\MermaidJsPhp\Sequence\MessageNode;

class MessageNodeTest extends TestCase
{
    /**
     * @dataProvider describingExamples
     */
    public function testDescribesExampleNodes(
        string $from,
        string $to,
        string $message,
        ?MessageArrowStyle $style,
        string $expectedResult
    ) : void {
        $node = new MessageNode($from, $to, $message, $style);

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
            'Hi!',
            null,
            'Foo->Bar: Hi!',
        ];

        yield 'custom style' => [
            'Foo',
            'Bar',
            'Hi!',
            new DottedLine(),
            'Foo-->Bar: Hi!',
        ];
    }
}
