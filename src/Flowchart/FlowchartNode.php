<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart;

use Sip\MermaidJsPhp\Node;

interface FlowchartNode extends Node
{
    public function getId(): string;
    public function getContent(): ?string;
}