<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence\MessageArrowStyle;

use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\MessageArrowStyle;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\SolidLineWithCross;

class SolidLineWithCrossTest extends MessageArrowStyleTest
{
    public function expectedDescription() : string
    {
        return '-x';
    }

    protected function createStyle() : MessageArrowStyle
    {
        return new SolidLineWithCross();
    }
}
