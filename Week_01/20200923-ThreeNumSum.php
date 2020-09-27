<?php

// 给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？请你找出所有满足条件且不重复的三元组。
//
// 注意：答案中不可以包含重复的三元组。
//
// 示例：
//
// 给定数组 nums = [-1, 0, 1, 2, -1, -4]，
//
// 满足要求的三元组集合为：
// [
//   [-1, 0, 1],
//   [-1, -1, 2]
// ]
//
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/3sum
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum1($nums) {
        sort($nums);
        $count = count($nums);

        $result = [];

        for ($i=0; $i<$count; $i++) {
            for ($j=$i+1; $j<$count; $j++) {
                $sum = $nums[$i] + $nums[$j];

                if (isset($data[-$sum])) {
                    $value = [$nums[$i], $nums[$j], -$sum];
                    sort($value);
                    $result[$nums[$i] . $nums[$j] . -$sum] = $value;
                }
            }

            $data[$nums[$i]] = $i;
        }

        return $result;
    }

    function threeSum2($nums) {
        sort($nums);
        $count = count($nums);

        $result = [];

        if ($count < 3) {
            return $result;
        }


        foreach ($nums as $key => $value) {
            $left = $key + 1; // 定义左指针
            $right = $count - 1; // 定义右指针

            if ($value > 0) { // 如果值大于0，和后面数据相加肯定大于0，直接结束循环
                break;
            }

            if (isset($nums[$key-1]) && $value == $nums[$key-1]) { // 重复值，则跳过该循环
                continue;
            }

            while ($left < $right) {
                $sum = $value + $nums[$left] + $nums[$right];

                if ($sum == 0) {
                    $data = [$value, $nums[$left], $nums[$right]];
                    sort($data);
                    $result[$data[0]. $data[1] . $data[2]] = $data;
                    $left++;
                } else if ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }

        return $result;
    }
}

// $nums = [-1, 0, 1, 2, -1, -4];
// var_dump((new Solution())->threeSum1($nums));
$nums = [1,1,-2];
var_dump((new Solution())->threeSum2($nums));
$nums = [0, 0, 0];
var_dump((new Solution())->threeSum2($nums));
$nums = [-1, 0, 1, 2, -1, -4];
var_dump((new Solution())->threeSum2($nums));
