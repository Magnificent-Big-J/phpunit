<?php


namespace App\Calculator;


use App\Calculator\Exceptions\NoOperandException;

class Division extends OperationAbstract implements OperationInterface
{

    public function calculate()
    {
        if (empty($this->operands)) {
            throw new NoOperandException();
        }

        return array_reduce(array_filter($this->operands), function ($a, $b) {
            if (!is_null($a)) {
                return $a / $b;
            }

            return  $b;

        }, null);

    }
}