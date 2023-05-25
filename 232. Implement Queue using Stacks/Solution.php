<?php

/** @source Editorial */
class MyQueue {
    private $endIsBack = [];
    private $endIsFront = [];
    private $frontElement;

    private function toEndIsFront() {
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
        if (empty($this->endIsBack)) {
            $this->frontElement = $x;
        }
        array_push($this->endIsBack, $x);
    }

    /**
     * @return Integer
     */
    function pop() {
        if (empty($this->endIsFront)) {
            $this->toEndIsFront();
        }
        return array_pop($this->endIsFront);
    }

    /**
     * @return Integer
     */
    function peek() {
        if (!empty($this->endIsFront)) {
            return end($this->endIsFront);
        }
        return $this->frontElement;
    }

    /**
     * @return Boolean
     */
    function empty() {
        return empty($this->endIsBack) && empty($this->endIsFront);
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