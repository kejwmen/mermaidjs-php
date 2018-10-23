<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\TransitionStyle;

use Sip\MermaidJsPhp\Flowchart\TransitionStyle\ThickStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\TransitionStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;
use Sip\MermaidJsPhp\Flowchart\TransitionWithText;

class ThickStyleTest extends TransitionStyleTest
{
    /**
     * @return mixed[]
     */
    public function decoratingTransitionWithoutTextExamples() : iterable
    {
        yield 'simple' => [
            new TransitionWithoutText($this->createExampleTargetNode(), $this->style),
            '==>',
        ];
    }

    /**
     * @return mixed[]
     */
    public function decoratingTransitionWithTextExamples() : iterable
    {
        yield 'simple' => [
            new TransitionWithText('bar', $this->createExampleTargetNode(), $this->style),
            '== bar ==>',
        ];
    }

    protected function createStyle() : TransitionStyle
    {
        return new ThickStyle();
    }
}
