<?php

// 给定一个二叉树, 找到该树中两个指定节点的最近公共祖先。
//
// 百度百科中最近公共祖先的定义为：“对于有根树 T 的两个结点 p、q，最近公共祖先表示为一个结点 x，满足 x 是 p、q 的祖先且 x 的深度尽可能大（一个节点也可以是它自己的祖先）。”
//
// 例如，给定如下二叉树:  root = [3,5,1,6,2,0,8,null,null,7,4]
//
// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/lowest-common-ancestor-of-a-binary-tree
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */


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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        // 如果root不存在或者值等于$p 或$q，则直接返回$root
        if (is_null($root) || $root->val == $p->val || $root->val == $q->val) {
            return $root;
        }

        $left = $this->lowestCommonAncestor($root->left, $p, $q); // 获取
        $right = $this->lowestCommonAncestor($root->right, $p, $q);

        if (is_null($left)) {
            return $right;
        }

        if (is_null($right)) {
            return $left;
        }

        return $root;
    }
}
