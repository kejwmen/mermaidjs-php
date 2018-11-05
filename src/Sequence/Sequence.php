<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Sequence;

use Sip\MermaidJsPhp\Diagram;
use Sip\MermaidJsPhp\Nodes;
use function sprintf;
use function str_replace;

final class Sequence implements Diagram
{
    /** @var Nodes */
    private $nodes;

    public function __construct(Nodes $nodes)
    {
        $this->nodes = $nodes;
    }

    public function describe() : string
    {
        return sprintf(
            "sequenceDiagram\n    %s",
            str_replace("\n", "\n    ", $this->nodes->describe())
        );
    }

    public function root() : Nodes
    {
        return $this->nodes;
    }
}
