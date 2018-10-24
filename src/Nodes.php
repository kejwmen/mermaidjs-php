<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp;

use Countable;
use IteratorAggregate;
use function array_map;
use function count;
use function implode;

final class Nodes implements IteratorAggregate, Countable, Describable
{
    /** @var Node[] */
    private $nodes;

    public function __construct(Node ...$nodes)
    {
        $this->nodes = $nodes;
    }

    /**
     * @return Node[]
     */
    public function getIterator() : iterable
    {
        yield from $this->nodes;
    }

    public function count() : int
    {
        return count($this->nodes);
    }

    public function describe() : string
    {
        return implode("\n", array_map(static function (Node $node) {
            return $node->describe();
        }, $this->nodes));
    }
}
