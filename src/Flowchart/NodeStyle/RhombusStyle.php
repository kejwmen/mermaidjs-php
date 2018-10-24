<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart\NodeStyle;

use Sip\MermaidJsPhp\Flowchart\TextNode;
use function sprintf;

final class RhombusStyle implements TextNodeStyle
{
    public function decorate(TextNode $textNode) : string
    {
        return sprintf(
            '%s{%s}',
            $textNode->getId(),
            $textNode->getContent()
        );
    }
}
