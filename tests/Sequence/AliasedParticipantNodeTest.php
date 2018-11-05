<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Sequence\AliasedParticipantNode;

class AliasedParticipantNodeTest extends TestCase
{
    /**
     * @dataProvider describingExamples
     */
    public function testDescribesExamples(string $name, string $alias, string $expectedResult) : void
    {
        $node = new AliasedParticipantNode($name, $alias);

        $this->assertSame($expectedResult, $node->describe());
    }

    /**
     * @return mixed[]
     */
    public function describingExamples() : iterable
    {
        yield 'simple' => [
            'Foo',
            'Bar',
            'participant Foo AS Bar',
        ];
    }
}
