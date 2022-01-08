<?php

namespace App\Services\Tests;

use App\Services\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * Vérifie si la méthode addition() est bonne ou non
     *
     * @return void
     */
    public function testAddition()
    {
        $calculator = new Calculator();
        $result = $calculator->addition(10, 32);
        
        $this->assertEquals(42, $result);
    }

    /**
     * Vérifie si la méthode soustraction() est bonne ou non
     *
     * @return void
     */
    public function testSoustraction()
    {
        $calculator = new Calculator();
        $result = $calculator->soustraction(32, 10);
        
        $this->assertEquals(20, $result);
    }

    /**
     * Vérifie si la méthode multiplication() est bonne ou non
     *
     * @return void
     */
    public function testMulplication()
    {
        $calculator = new Calculator();
        $result = $calculator->multiplication(5, 5);
        
        $this->assertEquals(25, $result);
    }

    /**
     * Vérifie si la méthode division() est bonne ou non
     *
     * @return void
     */
    public function testDivision()
    {
        $calculator = new Calculator();
        $result = $calculator->division(20, 2);
        
        $this->assertEquals(10, $result);
    }
}