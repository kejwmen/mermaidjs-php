<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use Sip\MermaidJsPhp\Sequence\AliasedParticipantNode;
use Sip\MermaidJsPhp\Sequence\SequenceNode;

class AliasedParticipantNodeTest extends AbstractParticipantNodeTest
{
    /**
     * @return mixed[]
     */
    public function describingExamples() : iterable
    {
        yield 'simple' => [
            new AliasedParticipantNode('Foo', 'Bar'),
            'participant Foo AS Bar',
        ];
    }

    protected function createNode(string $name, ?string $alias) : SequenceNode
    {
        return new AliasedParticipantNode($name, $alias);
    }
}
