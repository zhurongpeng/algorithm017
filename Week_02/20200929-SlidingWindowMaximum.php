<?php

// 给定一个数组 nums 和滑动窗口的大小 k，请找出所有滑动窗口里的最大值。
//
// 示例:
//
// 输入: nums = [1,3,-1,-3,5,3,6,7], 和 k = 3
// 输出: [3,3,5,5,6,7] 
// 解释: 
//
//   滑动窗口的位置                最大值
// ---------------               -----
// [1  3  -1] -3  5  3  6  7       3
//  1 [3  -1  -3] 5  3  6  7       3
//  1  3 [-1  -3  5] 3  6  7       5
//  1  3  -1 [-3  5  3] 6  7       5
//  1  3  -1  -3 [5  3  6] 7       6
//  1  3  -1  -3  5 [3  6  7]      7
//  
//
// 提示：
//
// 你可以假设 k 总是有效的，在输入数组不为空的情况下，1 ≤ k ≤ 输入数组的大小。
//
// 注意：本题与主站 239 题相同：https://leetcode-cn.com/problems/hua-dong-chuang-kou-de-zui-da-zhi-lcof/
//
//
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/hua-dong-chuang-kou-de-zui-da-zhi-lcof
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


class Solution {

    /**
     * 暴力求解
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow1($nums, $k) {
        $result = [];

        $count = count($nums);

        for ($i=0; $i<$count; $i++) {
            if ($i > $count-$k) { // 当i小于($count-$k)时，后面的元素已经比对过最大数，故无需重复比对
                break;
            }

            $max = $nums[$i];

            for ($j=1; $j<$k; $j++) {
                if ($i+$j >= $count) { // 当($i+$j)>=$count时，数组$num[$i+$j]已无元素，故直接退出循环
                    break;
                }

                $max = max($max, $nums[$i], $nums[$i+$j]); // 比对最近$k个数的最大值
            }

            $result[] = $max;
        }

        return $result;
    }

    function maxSlidingWindow2($nums, $k) {
        if(empty($nums)) return [];
        $window = [];
        $ret = [];
        foreach($nums as $key=>$v){
            //当数组索引大于窗口大小时需要判断窗口的第一个元素的索引是否需要移除
            if($key>=$k && $window[0]<=$key-$k){
                array_shift($window);
            }
            //窗口不为空的时候需要判断遍历的元素是否大于等于当前窗口顶部元素，如果大于等于则pop出去
            while($window && $nums[$window[count($window)-1]]<=$v){
                array_pop($window);
            }
            $window[] = $key;
            if($key>=$k-1){
                $ret[] = $nums[$window[0]];
            }
        }
        return $ret;
    }
}

$nums = [1,3,-1,-3,5,3,6,7];
$k = 3;

var_dump((new Solution())->maxSlidingWindow1($nums, $k));
var_dump((new Solution())->maxSlidingWindow2($nums, $k));
