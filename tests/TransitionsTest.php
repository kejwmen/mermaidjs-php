<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests;

use Sip\MermaidJsPhp\Flowchart\IdentifiableNode;
use Sip\MermaidJsPhp\Flowchart\TransitionWithoutText;
use Sip\MermaidJsPhp\Transition;
use Sip\MermaidJsPhp\Transitions;
use PHPUnit\Framework\TestCase;

class TransitionsTest extends TestCase
{
    public function testConvertsToAndFromArray(): void
    {
        $transitions = Transitions::fromArray([
            $this->createExampleTransition()
        ]);

        $array = $transitions->toArray();

        $recreated = Transitions::fromArray($array);

        $this->assertEquals($transitions, $recreated);
    }

    public function testCalculatesQuantityOfEmptyTransitions(): void
    {
        $transitions = Transitions::end();

        $this->assertFalse($transitions->notEmpty());
        $this->assertCount(0, $transitions);
    }

    public function testCalculatesQuantityOfNotEmptyTransitions(): void
    {
        $transitions = Transitions::fromArray([
            $this->createExampleTransition()
        ]);

        $this->assertTrue($transitions->notEmpty());
        $this->assertCount(1, $transitions);
    }

    private function createExampleTransition(): Transition
    {
        return new TransitionWithoutText(
            IdentifiableNode::withoutTransitions('foo')
        );
    }
}
