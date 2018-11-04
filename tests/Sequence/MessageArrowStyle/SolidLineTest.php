<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence\MessageArrowStyle;

use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\DottedLine;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\MessageArrowStyle;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\SolidLine;

class SolidLineTest extends MessageArrowStyleTest
{
    public function expectedDescription(): string
    {
        return '->';
    }

    protected function createStyle(): MessageArrowStyle
    {
        return new SolidLine();
    }
}
