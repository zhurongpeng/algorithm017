<?php

// 给定两个字符串, A 和 B。
//
// A 的旋转操作就是将 A 最左边的字符移动到最右边。 例如, 若 A = 'abcde'，在移动一次之后结果就是'bcdea' 。如果在若干次旋转操作之后，A 能变成B，那么返回True。
//
// 示例 1:
// 输入: A = 'abcde', B = 'cdeab'
// 输出: true
//
// 示例 2:
// 输入: A = 'abcde', B = 'abced'
// 输出: false
// 注意：
//
// A 和 B 长度不超过 100。
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/rotate-string
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


class Solution {

    /**
     * @param String $A
     * @param String $B
     * @return Boolean
     */
    function rotateString1($A, $B) {
        $result = false;
        $aLength = strlen($A);
        $bLength = strlen($B);

        // 如果长度不一致，A无法转成B
        if ($aLength != $bLength) {
            return $result;
        }

        // 如果长度一致，且长度为0，A等于B
        if ($aLength == 0 && $bLength == 0) {
            return true;
        }

        // 如果长度一致，且长度不为空
        for ($i=0; $i<$aLength; $i++) {
            $first = substr($A, 0, 1);
            $A = substr($A, 1, $aLength-1) . $first;;

            if ($A == $B) {
                $result = true;
                break;
            };
        }

        return $result;
    }

    function rotateString2($A, $B) {
        // 如果长度不一致，A无法转成B
        if (strlen($A) != strlen($B)) {
            return false;
        }

        // 如果长度一致，且长度为0，A等于B
        if (strlen($A) == 0 && strlen($B) == 0) {
            return true;
        }

        $A = $A . $A;

        if (strpos($A, $B)) {
            return true;
        } else {
            return false;
        }
    }
}

$A = 'abcde';
$B = 'abced';

var_dump((new Solution())->rotateString1($A, $B));
var_dump((new Solution())->rotateString2($A, $B));
