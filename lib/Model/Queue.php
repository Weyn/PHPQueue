<?php
/**
 * Author: Maciek Wegrecki
 * Date: 10/9/13
 * Time: 10:36 PM
 */
require_once(__DIR__.'/../Interface/QueueInterface.php');
require_once(__DIR__.'/Stack.php');

class Queue implements QueueInterface{

    protected $inputStack;

    protected $outputStack;

    function __construct()
    {
        $this->inputStack = new Stack();
        $this->outputStack = new Stack();
    }

    public function enqueue($data)
    {
        $this->inputStack->push($data);
    }

    public function dequeue()
    {
        if($this->isEmpty()){
            throw new \RunTimeException('Queue is empty!');
        }

        if($this->outputStack->isEmpty()){
            while(!$this->inputStack->isEmpty()){
                $this->outputStack->push($this->inputStack->pop());
            }
        }

        return $this->outputStack->pop();
    }

    public function isEmpty()
    {
        return $this->inputStack->isEmpty() && $this->outputStack->isEmpty();
    }

}