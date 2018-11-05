<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart;

use Sip\MermaidJsPhp\TransitionableNode;

interface FlowchartNode extends TransitionableNode
{
    public function id() : string;
    public function content() : ?string;
}
