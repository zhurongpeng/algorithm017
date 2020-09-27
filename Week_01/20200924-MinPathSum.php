<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $height = count($grid);
        $length = count($grid[0]);

        $dp = [];

        for ($i=0; $i<$height; $i++) {
            for ($j=0; $j<$length; $j++) {
                if ($i==0 && $j==0) {
                    $dp[$i][$j] = $grid[$i][$j];
                } else if ($i == 0) {
                    $dp[$i][$j] = $dp[$i][$j-1] + $grid[$i][$j];
                } else if ($j == 0) {
                    $dp[$i][$j] = $dp[$i-1][$j] + $grid[$i][$j];
                } else {
                    $dp[$i][$j] = min($dp[$i-1][$j]+$grid[$i][$j], $dp[$i][$j-1] + $grid[$i][$j]);
                }
            }
        }

        return $dp[$height-1][$length-1];
    }
}

$grid = [
    [1,3,1],
    [1,6,1],
    [4,2,1]
];
var_dump((new Solution())->minPathSum($grid));
