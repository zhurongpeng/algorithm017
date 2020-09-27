<?php

// 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
//
// 示例:
//
// 输入: [0,1,0,3,12]
// 输出: [1,3,12,0,0]
// 说明:
//
// 必须在原数组上操作，不能拷贝额外的数组。
// 尽量减少操作次数。
//
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/move-zeroes
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

/**
 * 2020-09-26
 */
class Solution {
    public function moveZeroes1($nums)
    {
        $data = [];

        foreach ($nums as $key => $value) {
            if ($value == 0) {
                unset($nums[$key]);
                $data[] = $value;
            }
        }

        foreach ($data as $value) {
            $nums[] = $value;
        }

        return $nums;
    }

    public function moveZeroes2($nums)
    {
        $zeroe_count = 0;

        foreach ($nums as $key => $value) {
            if ($value == 0) {
                unset($nums[$key]);
                $zeroe_count++;
            }
        }

        for ($i=0; $i<$zeroe_count; $i++) {
            $nums[] = 0;
        }

        return $nums;
    }

    public function moveZeroes3($nums)
    {
        $no_zero_key = 0;

        foreach ($nums as $key => $value) {
            if ($value != 0) {
                $nums[$no_zero_key] = $value;

                if ($key != $no_zero_key) {
                    $nums[$key] = 0;
                }

                $no_zero_key++;
            }
        }

        return $nums;
    }
}
$nums = [0,1,0,3,12];
var_dump((new Solution())->moveZeroes1($nums));
var_dump((new Solution())->moveZeroes2($nums));
var_dump((new Solution())->moveZeroes3($nums));
exit;

/**
 * 2020-09-21
 */
class Solution1 {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    public function moveZeroes1($nums)
    {
        $j = 0;

        for ($i=0; $i<count($nums); $i++) {
            if ($nums[$i] != 0) {
                $nums[$j] = $nums[$i];
                if ($i != $j) {
                    $nums[$i] = 0;
                }
                $j++;
            }
        }

        return $nums;
    }

    public function moveZeroes2($nums)
    {
        $data = [];
        $zeroes = [];

        foreach ($nums as $key => $value) {
            if ($value) {
                $data[] = $value;
            } else {
                $zeroes[] = $value;
            }
        }

        foreach ($zeroes as $value) {
            $data[] = $value;
        }

        return $data;
    }

    public function moveZeroes3($nums)
    {
        $no_zero_key = 0;

        foreach ($nums as $key => $value) {
            if ($value != 0) {
                $nums[$no_zero_key] = $nums[$key];

                if ($key != $no_zero_key) {
                    $nums[$key] = 0;
                }

                $no_zero_key++;
            }
        }

        return $nums;
    }
}


$nums = [0,1,0,3,12];
var_dump((new Solution())->moveZeroes1($nums));
var_dump((new Solution())->moveZeroes2($nums));
var_dump((new Solution())->moveZeroes3($nums));
