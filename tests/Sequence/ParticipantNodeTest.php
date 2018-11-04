<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use Sip\MermaidJsPhp\Sequence\ParticipantNode;
use Sip\MermaidJsPhp\Sequence\SequenceNode;

final class ParticipantNodeTest extends AbstractParticipantNodeTest
{
    /**
     * @return mixed[]
     */
    public function describingExamples() : iterable
    {
        yield 'simple' => [
            new ParticipantNode('Foo'),
            'participant Foo',
        ];
    }

    protected function createNode(string $name, ?string $alias) : SequenceNode
    {
        return new ParticipantNode($name);
    }
}
