<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Sequence;

use function sprintf;

final class AliasedParticipantNode implements SequenceNode
{
    /** @var string */
    private $name;

    /** @var string */
    private $alias;

    public function __construct(string $name, string $alias)
    {
        $this->name  = $name;
        $this->alias = $alias;
    }

    public function describe() : string
    {
        return sprintf(
            'participant %s AS %s',
            $this->name,
            $this->alias
        );
    }
}
