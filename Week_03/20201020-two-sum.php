<?php

// 1. 两数之和
// 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
//
// 你可以假设每种输入只会对应一个答案。但是，数组中同一个元素不能使用两遍。

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        foreach ($nums as $key => $value) {
            $diff = $target - $value;
            if (isset($data[$diff])) {
                return [$data[$diff], $key];
            }

            $data[$value] = $key;
        }
    }
}

$nums = [2, 7, 11, 15];
$target = 9;
var_dump((new Solution())->twoSum($nums, $target));
