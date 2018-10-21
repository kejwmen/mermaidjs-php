<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp;

interface Diagram extends Describable
{
    public function root(): Nodes;
}
