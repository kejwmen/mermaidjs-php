<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart;

use function Functional\map;
use Sip\MermaidJsPhp\Transitions;

final class IdentifiableNode implements FlowchartNode
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var Transitions
     */
    private $next;

    private function __construct(string $identifier, Transitions $next)
    {
        $this->identifier = $identifier;
        $this->next = $next;
    }

    public static function withTransitions(string $identifier, Transitions $next): self
    {
        return new self($identifier, $next);
    }

    public static function withoutTransitions(string $identifier): self
    {
        return new self($identifier, Transitions::end());
    }

    public function describe(): string
    {
        if ($this->next->notEmpty()) {
            $describedTransitions = map($this->next, function (FlowchartTransition $transition, int $i) {
                return \sprintf('%s %s', $this->identifier, $transition->describe());
            });

            return implode("\n", $describedTransitions);
        }

        return $this->identifier;
    }

    public function getId(): string
    {
        return $this->identifier;
    }

    public function getContent(): ?string
    {
        return null;
    }

    public function next(): Transitions
    {
        return $this->next;
    }
}
