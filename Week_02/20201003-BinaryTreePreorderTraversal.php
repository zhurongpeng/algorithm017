<?php

// 给定一个二叉树，返回它的 前序 遍历。
//
//  示例:
//
// 输入: [1,null,2,3]
//    1
//     \
//      2
//     /
//    3
//
// 输出: [1,2,3]
// 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/binary-tree-preorder-traversal
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。



// Definition for a binary tree node.
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        if (empty($root)) {
            return [];
        }

        $value = [$root->val];

        $left = $this->preorderTraversal($root->left);
        $right = $this->preorderTraversal($root->right);

        return array_merge($value, $left, $right);
    }
}
