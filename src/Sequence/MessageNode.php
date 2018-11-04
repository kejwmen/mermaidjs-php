<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Sequence;

use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\MessageArrowStyle;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\SolidLine;
use function sprintf;

final class MessageNode implements SequenceNode
{
    /** @var string */
    private $from;

    /** @var string */
    private $to;

    /** @var string */
    private $message;

    /** @var MessageArrowStyle */
    private $style;

    public function __construct(
        string $from,
        string $to,
        string $message,
        ?MessageArrowStyle $style = null
    ) {
        $this->from    = $from;
        $this->to      = $to;
        $this->message = $message;
        $this->style   = $style ?? new SolidLine();
    }

    public function describe() : string
    {
        return sprintf(
            '%s%s%s: %s',
            $this->from,
            $this->style->describe(),
            $this->to,
            $this->message
        );
    }
}
