<?php

class MyQueue {
    private $endIsBack = [];
    private $endIsFront = [];
    private $frontElement;

    private function toFront() {
        while (!empty($this->endIsFront)) {
            $value = array_pop($this->endIsFront);
            $this->endIsBack[] = $value;
        }
    }

    private function toBack() {
        while (!empty($this->endIsBack)) {
            $value = array_pop($this->endIsBack);
            $this->endIsFront[] = $value;
        }
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        if (empty($this->endIsFront)) {
            $this->frontElement = $x;
        }
        $this->toFront();
        array_push($this->endIsBack, $x);
        $this->toBack();
    }

    /**
     * @return Integer
     */
    function pop() {
        $element = array_pop($this->endIsFront);
        if (!empty($this->endIsFront)) {
            $this->frontElement = end($this->endIsFront);
        }
        return $element;
    }

    /**
     * @return Integer
     */
    function peek() {
        return $this->frontElement;
    }

    /**
     * @return Boolean
     */
    function empty() {
        return empty($this->endIsFront);
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