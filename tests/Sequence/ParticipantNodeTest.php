<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Sequence\ParticipantNode;

final class ParticipantNodeTest extends TestCase
{
    /**
     * @dataProvider describingExamples
     */
    public function testDescribesExamples(string $name, string $expectedResult) : void
    {
        $node = new ParticipantNode($name);

        $this->assertSame($expectedResult, $node->describe());
    }

    /**
     * @return mixed[]
     */
    public function describingExamples() : iterable
    {
        yield 'simple' => [
            'Foo',
            'participant Foo',
        ];
    }
}
