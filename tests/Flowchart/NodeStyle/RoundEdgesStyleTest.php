<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\NodeStyle;

use Sip\MermaidJsPhp\Flowchart\NodeStyle\CircleStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\DefaultStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\RoundEdgesStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\TextNodeStyle;
use Sip\MermaidJsPhp\Flowchart\TextNode;

class RoundEdgesStyleTest extends TextNodeStyleTest
{
    public function decoratingExamples(): iterable
    {
        yield 'simple example' => [
            TextNode::withoutTransitions('Foo', 'bar'),
            'Foo(bar)'
        ];
    }

    protected function createStyle(): TextNodeStyle
    {
        return new RoundEdgesStyle();
    }
}
