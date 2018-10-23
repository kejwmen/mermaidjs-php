<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Flowchart\NodeStyle;

use Sip\MermaidJsPhp\Flowchart\NodeStyle\AsymmetricStyle;
use Sip\MermaidJsPhp\Flowchart\NodeStyle\TextNodeStyle;
use Sip\MermaidJsPhp\Flowchart\TextNode;

class AsymmetricStyleTest extends TextNodeStyleTest
{
    /**
     * @return mixed[]
     */
    public function decoratingExamples() : iterable
    {
        yield 'simple example' => [
            TextNode::withoutTransitions('Foo', 'bar'),
            'Foo>bar]',
        ];
    }

    protected function createStyle() : TextNodeStyle
    {
        return new AsymmetricStyle();
    }
}
