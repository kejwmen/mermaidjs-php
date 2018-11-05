<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence\MessageArrowStyle;

use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\DottedLineWithCross;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\MessageArrowStyle;

class DottedLineWithCrossTest extends MessageArrowStyleTest
{
    public function expectedDescription() : string
    {
        return '--x';
    }

    protected function createStyle() : MessageArrowStyle
    {
        return new DottedLineWithCross();
    }
}
