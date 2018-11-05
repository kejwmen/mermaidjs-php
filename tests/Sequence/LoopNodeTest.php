<?php

declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use PHPUnit\Framework\TestCase;
use Sip\MermaidJsPhp\Nodes;
use Sip\MermaidJsPhp\Sequence\LoopNode;
use Sip\MermaidJsPhp\Sequence\MessageArrowStyle\DottedLine;
use Sip\MermaidJsPhp\Sequence\MessageNode;

class LoopNodeTest extends TestCase
{
    /**
     * @dataProvider describingExamples
     */
    public function testDescribe(string $label, Nodes $nodes, string $expectedResult) : void
    {
        $node = new LoopNode($label, $nodes);

        $result = $node->describe();

        $this->assertSame($expectedResult, $result);
    }

    /**
     * @return mixed[]
     */
    public function describingExamples() : iterable
    {
        yield 'simple' => [
            'Every minute',
            new Nodes(
                new MessageNode('John', 'Alice', 'Great!', new DottedLine())
            ),
            //phpcs:disable SlevomatCodingStandard.Arrays.TrailingArrayComma
            <<<RESULT
loop Every minute
    John-->Alice: Great!
end
RESULT
            //phpcs:enable
        ];
    }
}
