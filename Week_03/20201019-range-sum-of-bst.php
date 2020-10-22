<?php

// 938. 二叉搜索树的范围和
// 给定二叉搜索树的根结点 root，返回 L 和 R（含）之间的所有结点的值的和。
//
// 二叉搜索树保证具有唯一的值。

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $L
     * @param Integer $R
     * @return Integer
     */
    function rangeSumBST($root, $L, $R) {
        if (is_null($root)) {
            return 0;
        }

        if ($root->val < $L) {
            return $this->rangeSumBST($root->right, $L, $R);
        }

        if ($root->val > $R) {
            return $this->rangeSumBST($root->left, $L, $R);
        }

        return $root->val + $this->rangeSumBST($root->left, $L, $R) + $this->rangeSumBST($root->right, $L, $R);
    }
}
