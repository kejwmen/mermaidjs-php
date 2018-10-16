<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart;

use function Functional\map;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\DefaultStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\TextNodeStyle;
use Sip\MermaidJsPhp\Transitions;

final class TextNode implements FlowchartNode
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var Transitions
     */
    private $next;

    /**
     * @var string
     */
    private $content;

    /**
     * @var TextNodeStyle
     */
    private $style;

    private function __construct(string $identifier, string $content, Transitions $next, ?TextNodeStyle $style = null)
    {
        $this->identifier = $identifier;
        $this->next = $next;
        $this->content = $content;
        $this->style = $style ?? new DefaultStyle();
    }

    public static function withTransitions(string $identifier, string $content, Transitions $next, ?TextNodeStyle $style = null): self
    {
        return new self($identifier, $content, $next, $style);
    }

    public static function withoutTransitions(string $identifier, string $content, ?TextNodeStyle $style = null): self
    {
        return new self($identifier, $content, Transitions::end(), $style);
    }

    public function toIdentifiableNode(): IdentifiableNode
    {
        return IdentifiableNode::withTransitions($this->identifier, $this->next);
    }

    public function describe(): string
    {
        if ($this->next->notEmpty()) {
            $identifiableNode = $this->toIdentifiableNode();

            $describedTransitions = map($this->next, function (FlowchartTransition $transition, int $i) use ($identifiableNode) {
                if ($i === 0) {
                    return \sprintf('%s %s', $this->style->decorate($this), $transition->describe());
                }

                return $identifiableNode->describe();
            });

            return implode("\n", $describedTransitions);
        }

        return $this->style->decorate($this);
    }

    public function getId(): string
    {
        return $this->identifier;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function next(): Transitions
    {
        return $this->next;
    }
}
