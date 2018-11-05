<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Sequence\MessageArrowStyle;

final class DottedLine implements MessageArrowStyle
{
    public function describe() : string
    {
        return '-->';
    }
}
