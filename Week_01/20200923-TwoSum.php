<?php

// 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
//
// 你可以假设每种输入只会对应一个答案。但是，数组中同一个元素不能使用两遍。
// 示例:
//
// 给定 nums = [2, 7, 11, 15], target = 9
//
// 因为 nums[0] + nums[1] = 2 + 7 = 9
// 所以返回 [0, 1]
//
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/two-sum
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum1($nums, $target) {
        $data = [];

        for ($i=0; $i<count($nums); $i++) {
            if (isset($data[$target - $nums[$i]])) {
                return [$i, $data[$target - $nums[$i]]];
            }

            $data[$nums[$i]] = $i;
        }
    }

    function twoSum2($nums, $target) {
        $data = [];

        foreach ($nums as $key => $value) {
            $difference = $target - $value;

            if (isset($data[$difference])) {
                return [$key, $data[$difference]];
            }

            $data[$value] = $key;
        }
    }

    function twoSum3($nums, $target) {
        $count = count($nums);

        for ($i=0; $i<$count; $i++) {
            for ($j=$i+1; $j<$count; $j++) {
                if ($target == $nums[$i] + $nums[$j]) {
                    return [$i, $j];
                }
            }
        }
    }
}

$nums = [2, 7, 11, 15];
$target = 9;

var_dump((new Solution())->twoSum1($nums, $target));
var_dump((new Solution())->twoSum2($nums, $target));
var_dump((new Solution())->twoSum3($nums, $target));
