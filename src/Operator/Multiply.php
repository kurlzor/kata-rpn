<?php

namespace Kurlzor\Arolla\RPN\Operator;

use Kurlzor\Arolla\RPN\Operand;
use Kurlzor\Arolla\RPN\OperandCollection;

class Multiply implements Operator
{
    public function calculate(OperandCollection $operands)
    {
        $operand2 = $operands->pop();
        $operand1 = $operands->pop();

        $operands->add(new Operand($operand1->toInt() * $operand2->toInt()));

        return $operands;
    }
}