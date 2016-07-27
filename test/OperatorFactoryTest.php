<?php

namespace Kurlzor\Arolla\RPN;

use Kurlzor\Arolla\RPN\Operator\Plus;

class OperatorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OperatorFactory
     */
    private $SUT;

    protected function setUp()
    {
        $this->SUT = new OperatorFactory();
    }

    /**
     * @test
     */
    public function it_instantiates_previously_registered_operators()
    {
        $this->SUT->registerOperator(new Token('+'), Plus::class);

        $this->assertInstanceOf(Plus::class, $this->SUT->fromToken(new Token('+')));
    }

    /**
     * @test
     */
    public function it_throws_an_exception_when_token_is_unknown()
    {
        $this->expectException(\Exception::class);

        $this->SUT->fromToken(new Token('+'));
    }
}
