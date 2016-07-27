<?php

namespace Kurlzor\Arolla\RPN;

class TokenCollection extends \ArrayObject
{
    public function __construct($string)
    {
        foreach (explode(' ', $string) as $part) {
            $this->append(new Token($part));
        }
    }

    public static function fromString($string)
    {
        return new static($string);
    }
}