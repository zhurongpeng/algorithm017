<?php

// 剑指 Offer 10- II. 青蛙跳台阶问题
// 一只青蛙一次可以跳上1级台阶，也可以跳上2级台阶。求该青蛙跳上一个 n 级的台阶总共有多少种跳法。
//
// 答案需要取模 1e9+7（1000000007），如计算初始结果为：1000000008，请返回 1。
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/qing-wa-tiao-tai-jie-wen-ti-lcof
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


class Solution {
    public $data = [];
    public $const = 1000000007;

    /**
     * @param Integer $n
     * @return Integer
     */
    function numWays($n) {
        if ($n < 2) {
            return 1;
        }

        if (isset($this->data[$n])) {
            return $this->data[$n];
        }

        $this->data[$n] = ($this->numWays($n-1) + $this->numWays($n-2)) % $this->const;

        return $this->data[$n];
    }
}

var_dump((new Solution())->numWay(10));
