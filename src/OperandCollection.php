<?php

namespace Kurlzor\Arolla\RPN;

class OperandCollection
{
    private $elements = [];

    public function add(Operand $operand) {
        $this->elements[] = $operand;
    }

    /**
     * @return Operand
     */
    public function first() {
        return $this->elements[0];
    }

    /**
     * @return Operand
     * @throws \Exception
     */
    public function pop() {
        $value = array_pop($this->elements);

        if(is_null($value)) {
            throw new \Exception('No more elements');
        }

        return $value;
    }
}