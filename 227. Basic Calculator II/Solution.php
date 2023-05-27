<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) {
        $expression = $this->parse($s);
        return $this->evaluate($expression);
    }

    private function parse(string $s) {
        $symbols = [];
        $numeric = '';
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            if ($this->isOperator($s[$i])) {
                $symbols[] = (int)$numeric;
                $symbols[] = $s[$i];
                $numeric = '';
            } else {
                $numeric .= $s[$i];
            }
        }
        $symbols[] = (int)$numeric;
        $expression = [];
        $lengthSymbols = count($symbols);
        for ($i = 0; $i < $lengthSymbols; $i++) {
            $number = $symbols[$i];
            $operator = $symbols[$i + 1];
            if (in_array($operator,  ['+', '-'])) {
                $expression[] = $number;
                $expression[] = $operator;
                $i++;
                continue;
            }
            if (in_array($operator, ['*', '/'])) {
                $innerResult = $this->extractInnerExpression($symbols, $i);
                $i = $innerResult['i'];
                $expression[] = $innerResult['expression'];
                $nextOperator = $symbols[$i];
                if ($nextOperator !== null) {
                    $expression[] = $nextOperator;
                }
                continue;
            }
            $expression[] = $number;
        }

        return $expression;
    }

    private function isOperator($symbol) {
        return in_array($symbol, ['+', '-', '*', '/']);
    }

    private function extractInnerExpression($symbols, $i) {
        $expression = [$symbols[$i]];
        $operator = $symbols[$i + 1];
        $i++;
        while (in_array($operator, ['*', '/'])) {
            $expression[] = $operator;
            $expression[] = $symbols[$i + 1];
            $i += 2;
            $operator = $symbols[$i];
        }

        return ['i' => $i, 'expression' => $expression];
    }

    private function evaluate(array $expression) {
        $result = 0;
        $operator = '+';
        foreach ($expression as $item) {
            if ($this->isOperator($item)) {
                $operator = $item;
                continue;
            }
            if (is_array($item)) {
                $value = $this->evaluate($item);
            } else {
                $value = (int)$item;
            }
            switch ($operator) {
                case '+': $result += $value; break;
                case '-': $result -= $value; break;
                case '*': $result *= $value; break;
                default: $result = intdiv($result, $value);
            }
        }

        return $result;
    }
}