<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\TransitionStyle;

use Sip\MermaidJsPhp\Flowchart\TransitionStyle\ArrowStyle;
use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\DottedStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\OpenStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\ThickStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionStyle\TransitionStyle;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;
use Sip\MermaidJsPhp\Flowchart\TransitionWithText;

class ThickStyleTest extends TransitionStyleTest
{
    public function decoratingTransitionWithoutTextExamples(): iterable
    {
        yield 'simple' => [
            new TransitionWithoutText($this->createExampleTargetNode(), $this->style),
            '==>'
        ];
    }

    public function decoratingTransitionWithTextExamples(): iterable
    {
        yield 'simple' => [
            new TransitionWithText('bar', $this->createExampleTargetNode(), $this->style),
            '== bar ==>'
        ];
    }

    protected function createStyle(): TransitionStyle
    {
        return new ThickStyle();
    }
}
