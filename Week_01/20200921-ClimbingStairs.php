<?php

// 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
//
// 每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
//
// 注意：给定 n 是一个正整数。
//
// 示例 1：
//
// 输入： 2
// 输出： 2
// 解释： 有两种方法可以爬到楼顶。
// 1.  1 阶 + 1 阶
// 2.  2 阶
// 示例 2：
//
// 输入： 3
// 输出： 3
// 解释： 有三种方法可以爬到楼顶。
// 1.  1 阶 + 1 阶 + 1 阶
// 2.  1 阶 + 2 阶
// 3.  2 阶 + 1 阶
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/climbing-stairs
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

/**
 * 2020-09-26
 */
class Solution
{
    /**
     * dp(n) = dp(n-1) + dp(n-2)
     */
    public function climbStairs($n)
    {
        $way_count[0] = 1;
        $way_count[1] = 1;

        for ($i=2; $i<=$n; $i++) {
            $way_count[$i] = $way_count[$i-1] + $way_count[$i-2];
        }

        return $way_count[$n];
    }
}

/**
 * 2020-09-21
 */
// class Solution {
//
//     /**
//      * @param Integer $n
//      * @return Integer
//      */
//     function climbStairs($n) {
//         $dp[0] = 1;
//         $dp[1] = 1;
//
//         for ($i=2; $i<=$n; $i++) {
//             $dp[$i] = $dp[$i-1] + $dp[$i-2];
//         }
//
//         return $dp[$n];
//     }
// }

$n = 10;
var_dump((new Solution())->climbStairs($n));