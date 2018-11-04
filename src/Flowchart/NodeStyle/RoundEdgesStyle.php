<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Flowchart\NodeStyle;

use Sip\MermaidJsPhp\Flowchart\TextNode;
use function sprintf;

final class RoundEdgesStyle implements TextNodeStyle
{
    public function decorate(TextNode $textNode) : string
    {
        return sprintf(
            '%s(%s)',
            $textNode->id(),
            $textNode->content()
        );
    }
}
