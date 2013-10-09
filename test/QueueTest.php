<?php
/**
 * Author: Maciek Wegrecki
 * Date: 10/10/13
 * Time: 12:30 AM
 */

require(__DIR__.'/../lib/Model/Queue.php');

class QueueTest extends \PHPUnit_Framework_TestCase {

    /**
     * Test enqueue method
     */
    public function testEnqueueMethod()
    {
        $queue = new Queue();

        $queue->enqueue("Foo1");
        $queue->enqueue("Foo2");

        $this->assertEquals($queue->dequeue(), "Foo1");
    }

    /**
     * Test dequeue method
     */
    public function testDequeueMethod()
    {
        $queue = new Queue();

        $this->setExpectedException(
            'RunTimeException', 'Queue is empty!'
        );
        $queue->dequeue();

        $queue->enqueue("Foo1");
        $queue->enqueue("Foo2");

        $this->assertEquals($queue->dequeue(), "Foo1");
    }

    /**
     * Test isEmpty method
     */
    public function testIsEmptyMethod()
    {
        $queue = new Queue();

        $this->assertTrue($queue->isEmpty());

        $queue->enqueue("Foo");

        $this->assertFalse($queue->isEmpty());
    }

    /**
     * Test
     *
     * @dataProvider dataSetsProvider
     */
    public function testBasicDataSets($dataSet)
    {
        $queue = new Queue();

        foreach($dataSet as $data){
            $queue->enqueue($data);
        }

        foreach($dataSet as $data){
            $this->assertEquals($queue->dequeue(), $data);
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

    /**
     * @dataProvider dataSizeProvider
     */
    public function testPerformance($dataSize)
    {
        $queue = new Queue();

        $start = microtime(true);
        for($i = 0; $i <= $dataSize; $i++){
            $queue->enqueue($i);
        }

        for($i = 0; $i <= $dataSize; $i++){
            $queue->dequeue();
            //$this->assertEquals($queue->dequeue(), $i);
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

}
