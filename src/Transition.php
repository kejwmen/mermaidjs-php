<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp;

interface Transition extends Describable
{
    public function target() : Node;
}
