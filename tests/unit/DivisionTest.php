<?php


namespace unit;


use App\Calculator\Division;
use App\Calculator\Exceptions\NoOperandException;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    /** @test **/
    public function divides_given_operands()
    {
        $divison = new Division();
        $divison->setOperands([100,2]);

        $this->assertEquals(50, $divison->calculate());
    }
    /** @test **/
    public function removes_division_by_zero()
    {
      $division = new Division();
      $division->setOperands([10, 0, 0, 5, 0]);

      $this->assertEquals(2, $division->calculate());
    }
    /** @test **/
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandException::class);

        $division = new Division();
        $division->calculate();
    }
}