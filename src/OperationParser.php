<?php

namespace Kurlzor\Arolla\RPN;

class OperationParser
{
    private $operatorFactory;

    public function __construct(OperatorFactory $operatorFactory)
    {
        $this->operatorFactory = $operatorFactory;
    }

    public function parse(string $string)
    {
        $tokenCollection = TokenCollection::fromString($string);
        $operands = new OperandCollection();

        foreach ($tokenCollection as $token) {
            $this->processToken($token, $operands);
        }

        return $operands->first();
    }

    private function processToken(Token $token, OperandCollection $operands) {
        if(!$this->operatorFactory->isOperator($token)) {
            $operands->add(new Operand(intval((string) $token)));
            return;
        }
        $operator = $this->operatorFactory->fromToken($token);
        $operator->calculate($operands);
    }
}