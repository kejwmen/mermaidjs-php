<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\NodeStyle;

use Sip\MermaidJsPhp\Flowchart\NodeStyle\CircleStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\TextNodeStyle;
use Sip\MermaidJsPhp\Flowchart\TextNode;

class CircleStyleTest extends TextNodeStyleTest
{
    /**
     * @return mixed[]
     */
    public function decoratingExamples() : iterable
    {
        yield 'simple example' => [
            TextNode::withoutTransitions('Sunn', 'o'),
            'Sunn((o))',
        ];
    }

    protected function createStyle() : TextNodeStyle
    {
        return new CircleStyle();
    }
}
