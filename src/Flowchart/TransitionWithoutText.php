<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart;

use Sip\MermaidJsPhp\Flowchart\TransitionStyle\ArrowStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\TransitionStyle;
use Sip\MermaidJsPhp\Node;

final class TransitionWithoutText implements FlowchartTransition
{
    /**
     * @var FlowchartNode
     */
    private $targetNode;

    /**
     * @var TransitionStyle
     */
    private $style;

    public function __construct(FlowchartNode $targetNode, ?TransitionStyle $style = null)
    {
        $this->targetNode = $targetNode;
        $this->style = $style ?? new ArrowStyle();
    }

    public function describe(): string
    {
        return sprintf('%s %s', $this->style->decorate($this), $this->targetNode->describe());
    }

    public function target(): Node
    {
        return $this->targetNode;
    }

    public function text(): ?string
    {
        return null;
    }
}
