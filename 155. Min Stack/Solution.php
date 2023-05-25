<?php

class Pair {
    public $val;
    public $min;

    public function __construct($val, $min) {
        $this->val = $val;
        $this->min = $min;
    }
}

/** @source https://www.youtube.com/watch?v=qkLl7nAwDPo */
class MinStack {
    private $stack = [];

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        $min = INF;
        if (!empty($this->stack)) {
            $min = $this->getMin();
        }
        $min = min($min, $val);
        array_push($this->stack, new Pair($val, $min));
    }

    /**
     * @return NULL
     */
    function pop() {
        return array_pop($this->stack)->val;
    }

    /**
     * @return Integer
     */
    function top() {
        return end($this->stack)->val;
    }

    /**
     * @return Integer
     */
    function getMin() {
        return end($this->stack)->min;
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */