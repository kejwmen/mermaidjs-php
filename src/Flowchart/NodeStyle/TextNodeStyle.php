<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart\NodeStyle;

use Sip\MermaidJsPhp\Flowchart\TextNode;

interface TextNodeStyle
{
    public function decorate(TextNode $textNode) : string;
}
