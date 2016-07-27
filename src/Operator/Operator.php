<?php

namespace Kurlzor\Arolla\RPN\Operator;

use Kurlzor\Arolla\RPN\OperandCollection;

interface Operator
{
    public function calculate(OperandCollection $operands);
}