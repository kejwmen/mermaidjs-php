<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp;

interface TransitionableNode extends Node
{
    public function next() : Transitions;
}
