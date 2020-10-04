<?php

// 有效括号字符串为空 ("")、"(" + A + ")" 或 A + B，其中 A 和 B 都是有效的括号字符串，+ 代表字符串的连接。例如，""，"()"，"(())()" 和 "(()(()))" 都是有效的括号字符串。
//
// 如果有效字符串 S 非空，且不存在将其拆分为 S = A+B 的方法，我们称其为原语（primitive），其中 A 和 B 都是非空有效括号字符串。
//
// 给出一个非空有效字符串 S，考虑将其进行原语化分解，使得：S = P_1 + P_2 + ... + P_k，其中 P_i 是有效括号字符串原语。
//
// 对 S 进行原语化分解，删除分解中每个原语字符串的最外层括号，返回 S 。
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/remove-outermost-parentheses
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

class Solution {

    /**
     * @param String $S
     * @return String
     */
    function removeOuterParentheses($S) {
        $result = '';
        $stack = [];

        $S = str_split($S); // 字符串转数组
        foreach ($S as $s) {
            if ($s == '(') {
                if ($stack) { // 如果stack有值，则将左括号拼接到result
                    $result .= $s;
                }
                array_push($stack, $s); // 如果为"("，则将左括号加入栈
            }

            if ($s == ')') {
                array_pop($stack); // 如果为")"，则将栈中的左括号去掉一个
                if ($stack) {
                    $result .= $s; // 如果stack有值，则将右括号拼接到result
                }
            }
        }

        return $result;
    }
}

var_dump((new Solution())->removeOuterParentheses($S));
