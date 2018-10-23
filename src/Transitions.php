<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp;

use Countable;
use IteratorAggregate;
use function count;

final class Transitions implements IteratorAggregate, Countable
{
    /** @var Transition[] */
    private $transitions;

    private function __construct(Transition ...$transitions)
    {
        $this->transitions = $transitions;
    }

    public static function fromArray(array $transitions) : self
    {
        return new self(...$transitions);
    }

    /**
     * @return Transition[]
     */
    public function toArray() : array
    {
        return $this->transitions;
    }

    public static function end() : self
    {
        return new self();
    }

    public function notEmpty() : bool
    {
        return ! empty($this->transitions);
    }

    /**
     * @return Transition[]
     */
    public function getIterator() : iterable
    {
        yield from $this->transitions;
    }

    public function count()
    {
        return count($this->transitions);
    }
}
