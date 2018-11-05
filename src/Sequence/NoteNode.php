<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Sequence;

use function sprintf;

final class NoteNode implements SequenceNode
{
    private const SIDE_LEFT  = 'left';
    private const SIDE_RIGHT = 'right';

    /** @var string */
    private $side;

    /** @var string */
    private $subject;

    /** @var string */
    private $content;

    private function __construct(string $side, string $subject, string $content)
    {
        $this->side    = $side;
        $this->subject = $subject;
        $this->content = $content;
    }

    public static function left(string $subject, string $content) : self
    {
        return new self(self::SIDE_LEFT, $subject, $content);
    }

    public static function right(string $subject, string $content) : self
    {
        return new self(self::SIDE_RIGHT, $subject, $content);
    }

    public function describe() : string
    {
        return sprintf(
            'Note %s of %s: %s',
            $this->side,
            $this->subject,
            $this->content
        );
    }
}
