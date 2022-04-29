<?php
// /tests/unit/calculatorTest.php (choose name as you wish)
require_once "./classes/sandwich.php";
class SandwichTest extends \PHPUnit\Framework\TestCase {
   
    public function testAdd() {
        //Instantiate the class to be tested
        $calculator = new Sandwich(1,[1,2,3]);
        //Fetch a method
        
        $this->assertIsObject($calculator);
        }

        public function testCalculate() {
            //Instantiate the class to be tested
            $calculator = new Sandwich(1,[1,2,3]);
            //Fetch a method
            
            $this->assertIsString($calculator->calculate());
            }
}
?>
