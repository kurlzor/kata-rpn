<?php

namespace Kurlzor\Test\Arolla\RPN;

use Exception;
use Kurlzor\Arolla\RPN\OperationParser;
use Kurlzor\Arolla\RPN\Operator\Divide;
use Kurlzor\Arolla\RPN\Operator\Minus;
use Kurlzor\Arolla\RPN\Operator\Multiply;
use Kurlzor\Arolla\RPN\Operator\Plus;
use Kurlzor\Arolla\RPN\Operator\Square;
use Kurlzor\Arolla\RPN\OperatorFactory;
use Kurlzor\Arolla\RPN\Token;

class OperationParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OperationParser
     */
    private $SUT;
    private $operatorFactory;

    protected function setUp()
    {
        $this->operatorFactory = new OperatorFactory();
        $this->operatorFactory->registerOperator(new Token('+'), Plus::class);
        $this->operatorFactory->registerOperator(new Token('-'), Minus::class);
        $this->operatorFactory->registerOperator(new Token('x'), Multiply::class);
        $this->operatorFactory->registerOperator(new Token('*'), Multiply::class);
        $this->operatorFactory->registerOperator(new Token('/'), Divide::class);
        $this->operatorFactory->registerOperator(new Token('^'), Square::class);
        $this->SUT = new OperationParser($this->operatorFactory);
    }

    /**
     * @test
     */
    public function it_parses_a_2_operand_addition()
    {
        $this->assertEquals(8, $this->SUT->parse("5 3 +")->toInt());
    }

    /**
     * @test
     */
    public function it_parses_a_combination_of_addition_and_substraction()
    {
        $this->assertEquals(10, $this->SUT->parse("7 5 2 - +")->toInt());
    }

    /**
     * @test
     */
    public function it_parses_the_most_complex_example()
    {
        $this->assertEquals(17, $this->SUT->parse("5 4 1 2 + x +")->toInt());
    }

    /**
     * @test
     */
    public function it_parses_square_operator()
    {
        $this->assertEquals(16, $this->SUT->parse("4 ^")->toInt());
    }

    /**
     * @test
     */
    public function it_parses_square_operator_combined_with_something_else()
    {
        $this->assertEquals(9, $this->SUT->parse("9 3 / ^")->toInt());
    }

    /**
     * @test
     */
    public function it_throws_an_exception_when_the_input_is_invalid()
    {
        $this->expectException(Exception::class);

        $this->SUT->parse("+ -")->toInt();
    }
}