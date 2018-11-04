<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Sequence;

final class ParticipantNode implements SequenceNode
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function describe() : string
    {
        return 'participant ' . $this->name;
    }
}
