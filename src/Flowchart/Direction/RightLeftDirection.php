<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart\Direction;

final class RightLeftDirection implements Direction
{
    public function describe() : string
    {
        return 'RL';
    }
}
