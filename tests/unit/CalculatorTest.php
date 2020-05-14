<?php


namespace unit;


use App\Calculator\Addition;
use App\Calculator\Calculator;
use App\Calculator\Division;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @test **/
    public function can_set_single_operation()
    {
        $addition = new Addition();
        $addition->setOperands([10, 10]);

        $calculator = new Calculator();
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }
    /** @test **/
    public function can_set_multiple_operations()
    {
        $addition = new Addition();
        $addition->setOperands([10, 10]);

        $addition2 = new Addition();
        $addition2->setOperands([10, 10]);

        $calculator = new Calculator();
        $calculator->setOperations([$addition, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }
    /** @test **/
    public function operations_are_ignored_if_not_instance_of_operation_instance()
    {
        $addition = new Addition();
        $addition->setOperands([10, 10]);

        $calculator = new Calculator();
        $calculator->setOperations([$addition,'not an instance']);
        $this->assertCount(1, $calculator->getOperations());
    }
    /** @test **/
    public function can_calculate_result()
    {
        $addition = new Addition();
        $addition->setOperands([10, 10]);

        $calculator = new Calculator();
        $calculator->setOperation($addition);

        $this->assertEquals(20, $calculator->calculate());
    }
    /** @test **/
    public function calculate_method_returns_multiple_results()
    {
        $addition = new Addition();
        $addition->setOperands([10, 10]);

        $division = new Division();
        $division->setOperands([20, 10]);

        $calculator = new Calculator();
        $calculator->setOperations([$addition, $division]);

        $this->assertIsArray($calculator->calculate());
        $this->assertEquals(20, $calculator->calculate()[0]);
        $this->assertEquals(2, $calculator->calculate()[1]);


    }
}