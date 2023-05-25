<?php

class MinStack {
    private $stack = [];
    private $min = INF;

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        if ($val < $this->min) {
            $this->min = $val;
        }
        array_push($this->stack, $val);
    }

    /**
     * @return NULL
     */
    function pop() {
        return array_pop($this->stack);
    }

    /**
     * @return Integer
     */
    function top() {
        return end($this->stack);
    }

    /**
     * @return Integer
     */
    function getMin() {
        return $this->min;
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