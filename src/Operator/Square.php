<?php

namespace Kurlzor\Arolla\RPN\Operator;

use Kurlzor\Arolla\RPN\Operand;
use Kurlzor\Arolla\RPN\OperandCollection;

class Square implements Operator
{
    public function calculate(OperandCollection $operands)
    {
        $operand1 = $operands->pop();

        $operands->add(new Operand($operand1->toInt() * $operand1->toInt()));

        return $operands;
    }
}