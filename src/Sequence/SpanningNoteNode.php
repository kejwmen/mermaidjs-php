<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Sequence;

use function sprintf;

final class SpanningNoteNode implements SequenceNode
{
    /** @var string */
    private $content;

    /** @var string */
    private $firstSubject;

    /** @var string */
    private $secondSubject;

    public function __construct(string $firstSubject, string $secondSubject, string $content)
    {
        $this->content       = $content;
        $this->firstSubject  = $firstSubject;
        $this->secondSubject = $secondSubject;
    }

    public function describe() : string
    {
        return sprintf(
            'Note over %s,%s: %s',
            $this->firstSubject,
            $this->secondSubject,
            $this->content
        );
    }
}
