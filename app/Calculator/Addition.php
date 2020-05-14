<?php


namespace App\Calculator;


use App\Calculator\Exceptions\NoOperandException;

class Addition extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if (empty($this->operands)) {
            throw new NoOperandException();
        }

        return array_sum($this->operands);
    }
}