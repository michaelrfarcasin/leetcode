<?php

class MyQueue {
    private $front = [];
    private $back = [];

    private function toFront() {
        while (!empty($this->back)) {
            $value = array_pop($this->back);
            $this->front[] = $value;
        }
    }

    private function toBack() {
        while (!empty($this->front)) {
            $value = array_pop($this->front);
            $this->back[] = $value;
        }
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->toFront();
        array_push($this->front, $x);
    }

    /**
     * @return Integer
     */
    function pop() {
        $this->toBack();
        return array_pop($this->back);
    }

    /**
     * @return Integer
     */
    function peek() {
        $this->toBack();
        return end($this->back);
    }

    /**
     * @return Boolean
     */
    function empty() {
        return empty($this->front) && empty($this->back);
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */