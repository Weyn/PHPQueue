<?php
/**
 * Author: Maciek Wegrecki
 * Date: 10/9/13
 * Time: 10:41 PM
 */
require(__DIR__.'/../lib/Model/Stack.php');

// PHPUnit 3.6.10
class StackTest extends \PHPUnit_Framework_TestCase {

    /**
     * Test push method
     */
    public function testPushMethod()
    {
        $stack = new Stack();

        $stack->push("Foo1");
        $stack->push("Foo2");

        $this->assertEquals($stack->pop(), "Foo2");
    }

    /**
     * Test pop method
     */
    public function testPopMethod()
    {
        $stack = new Stack();

        $this->setExpectedException(
            'RunTimeException', 'Stack is empty!'
        );

        $stack->pop();

        $stack->push("Foo1");
        $stack->push("Foo2");

        $this->assertEquals($stack->pop(), "Foo2");
    }

    /**
     * Test top method
     */
    public function testTopMethod()
    {
        $stack = new Stack();

        $stack->push("Foo1");
        $stack->push("Foo2");

        $this->assertEquals($stack->top(), "Foo2");
    }

    /**
     * Test isEmpty method
     */
    public function testIsEmptyMethod()
    {
        $stack = new Stack();

        $this->assertTrue($stack->isEmpty());

        $stack->push("Foo");

        $this->assertFalse($stack->isEmpty());
    }

    /**
     * @dataProvider dataSizeProvider
     */
    public function testPerformance($dataSize)
    {
        $stack = new Stack();

        $start = microtime(true);
        for($i = $dataSize; $i >= 0; $i--){
            $stack->push($i);
        }

        for($i = 0; $i <= $dataSize; $i++){
            $this->assertEquals($stack->pop(), $i);
        }
        $total = microtime(true) - $start;
        $avg = $total / $dataSize;

        echo sprintf("Time spend while pushing and poping %s element/s: %s s\n", $dataSize, round($total , 5));

    }

    public function dataSizeProvider()
    {
        return array(
            array(1),
            array(10),
            array(100),
            array(1000),
            array(10000),
        );
    }

    /**
     * Test
     *
     * @dataProvider dataSetsProvider
     */
    public function testBasicDataSets($dataSet)
    {
        $stack = new Stack();

        foreach($dataSet as $data){
            $stack->push($data);
        }

        $dataSet = array_reverse($dataSet);

        foreach($dataSet as $data){
            $this->assertEquals($stack->pop(), $data);
        }
    }

    public function dataSetsProvider()
    {
        return array(
            array(array()),
            array(array('Cormen', 'Oncle Bob', 'Cichon')),
            array(array(10, 20, 30, 40, 50, 60, 70, 80, 90)),
            array(array(1.1, 2.2, 3.3, 4.4, 5.5, 6.6, 7.7, 8.8, 9.9)),
        );
    }

}
