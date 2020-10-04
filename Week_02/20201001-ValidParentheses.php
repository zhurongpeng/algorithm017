<?php

// 20. 有效的括号
// 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
//
// 有效字符串需满足：
//
// 左括号必须用相同类型的右括号闭合。
// 左括号必须以正确的顺序闭合。
// 注意空字符串可被认为是有效字符串。

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        if (empty($s)) { // 当字符串为空时，直接返回true
            return true;
        }

        if (strlen($s) % 2 != 0) { // 当字符串不为偶数时，直接返回false
            return false;
        }

        $pairs = ['(' => ')', '[' => ']', '{' => '}'];

        $stack = new SplStack(); // 定义一个栈

        foreach (str_split($s) as $value) {
            $pair = $pairs[$value] ?? null;

            if (isset($pairs[$value])) { // 当为左括号时，入栈
                $stack->push($value);
            } else {
                // 当为右括号时，如果栈不为空，且元素等于栈顶元素，则栈顶元素出栈，否则返回false
                if (!$stack->isEmpty() && $stack->top() == array_search($value, $pairs)) {
                    $stack->pop();
                } else {
                    return false;
                }
            }
        }

        var_dump($stack->isEmpty());exit;
        return $stack->isEmpty() ? true : false;
    }
}

$s = '()';
var_dump((new Solution())->isValid($s));
