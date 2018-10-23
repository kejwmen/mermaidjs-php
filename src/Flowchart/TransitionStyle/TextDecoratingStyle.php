<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart\TransitionStyle;

use Sip\MermaidJsPhp\Flowchart\FlowchartTransition;
use function sprintf;

abstract class TextDecoratingStyle implements TransitionStyle
{
    public function decorate(FlowchartTransition $transition) : string
    {
        $text = $transition->text();

        if ($text) {
            return sprintf(
                '%s%s%s',
                $this->prefix(),
                $text,
                $this->suffix()
            );
        }

        return $this->withoutText();
    }

    abstract protected function prefix() : string;
    abstract protected function suffix() : string;
    abstract protected function withoutText() : string;
}
