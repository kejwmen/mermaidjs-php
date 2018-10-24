<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp;

interface Node extends Describable
{
    public function next() : Transitions;
}
