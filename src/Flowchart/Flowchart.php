<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart;

use Sip\MermaidJsPhp\Diagram;
use Sip\MermaidJsPhp\Flowchart\Direction\Direction;
use Sip\MermaidJsPhp\Nodes;

final class Flowchart implements Diagram
{
    /**
     * @var Direction
     */
    private $direction;

    /**
     * @var Nodes
     */
    private $rootNodes;

    public function __construct(Direction $direction, Nodes $rootNodes)
    {
        $this->direction = $direction;
        $this->rootNodes = $rootNodes;
    }

    public function describe(): string
    {
        return sprintf(
            "graph %s\n    %s",
            $this->direction->describe(),
            str_replace("\n", "\n    ", $this->rootNodes->describe())
        );
    }

    public function root(): Nodes
    {
        return $this->rootNodes;
    }
}
