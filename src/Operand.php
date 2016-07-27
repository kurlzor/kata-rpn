<?php

namespace Kurlzor\Arolla\RPN;

class Operand
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function toInt()
    {
        return $this->value;
    }
}