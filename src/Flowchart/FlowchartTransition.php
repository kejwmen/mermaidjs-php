<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart;

use Sip\MermaidJsPhp\Transition;

interface FlowchartTransition extends Transition
{
    public function text(): ?string;
}