<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart\TransitionStyle;

final class ThickStyle extends TextDecoratingStyle
{
    protected function prefix(): string
    {
        return '== ';
    }

    protected function suffix(): string
    {
        return ' ==>';
    }

    protected function withoutText(): string
    {
        return '==>';
    }
}
