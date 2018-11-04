<?php
declare(strict_types=1);

namespace Sip\MermaidJsPhp\Tests\Sequence;

use Sip\MermaidJsPhp\Sequence\MessageNode;
use PHPUnit\Framework\TestCase;

class MessageNodeTest extends TestCase
{

    /**
     * @dataProvider describingExamples
     */
    public function testDescribesExampleNodes(MessageNode $node, string $expectedResult)
    {
        $result = $node->describe();

        $this->assertSame($expectedResult, $result);
    }

    public function describingExamples(): iterable
    {
        yield 'simple' => [
            new MessageNode(
                'Foo',
                'Bar',
                'Hi!'
            ),
            'Foo->Bar: Hi!'
        ];
    }
}
