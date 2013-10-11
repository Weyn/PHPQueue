<?php
/**
 * Author: Maciek Wegrecki
 * Date: 10/9/13
 * Time: 10:36 PM
 */
require_once(__DIR__.'/../Interface/StackInterface.php');

class Stack implements StackInterface {

    protected $stack = array();

    public function push($data)
    {
        $this->stack[] = $data;
    }

    public function pop()
    {
        if($this->isEmpty()){
            throw new \RunTimeException('Stack is empty!');
        }
        return array_pop($this->stack);
    }

    public function top()
    {
        return end($this->stack);
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }

}