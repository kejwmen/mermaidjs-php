<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Sequence;

use Sip\MermaidJsPhp\Nodes;
use function sprintf;

final class LoopNode implements SequenceNode
{
    /** @var string */
    private $label;

    /** @var Nodes */
    private $nodes;

    public function __construct(string $label, Nodes $nodes)
    {
        $this->label = $label;
        $this->nodes = $nodes;
    }

    public function describe() : string
    {
        return sprintf(
            "loop %s\n    %s\nend",
            $this->label,
            $this->nodes->describe()
        );
    }
}
