<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence\MessageArrowStyle;

use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\MessageArrowStyle;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\SolidLineWithArrow;

class SolidLineWithArrowTest extends MessageArrowStyleTest
{
    public function expectedDescription() : string
    {
        return '->>';
    }

    protected function createStyle() : MessageArrowStyle
    {
        return new SolidLineWithArrow();
    }
}
