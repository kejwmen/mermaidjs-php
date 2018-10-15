<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart\Direction;

final class BottomTopDirection implements Direction
{
    public function describe(): string
    {
        return 'BT';
    }
}
