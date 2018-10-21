<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart\TransitionStyle;

use Sip\MermaidJsPhp\Flowchart\FlowchartTransition;

interface TransitionStyle
{
    public function decorate(FlowchartTransition $transition): string;
}
