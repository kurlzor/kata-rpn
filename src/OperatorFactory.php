<?php

namespace Kurlzor\Arolla\RPN;

use Kurlzor\Arolla\RPN\Operator\Operator;

class OperatorFactory
{
    private $operators = [];

    public function isOperator(Token $token) {
        return isset($this->operators[(string) $token]);
    }

    /**
     * @param Token $token
     * @return Operator
     * @throws \Exception
     */
    public function fromToken(Token $token)
    {
        if(!isset($this->operators[(string) $token])) {
            throw new \Exception('Token is not registered');
        }

        return new $this->operators[(string) $token]();
    }

    public function registerOperator(Token $token, $class)
    {
        $this->operators[(string) $token] = $class;
    }
}