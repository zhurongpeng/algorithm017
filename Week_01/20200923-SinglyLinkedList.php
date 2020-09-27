<?php

/**
 * 节点类
 */
class Node
{
    public $value;
    public $next;

    public function __construct($value=null, $next=null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}

/**
 * 单向链表实现
 */
class SinglyLinkList
{
    public $head = null;
    public $length = 0;

    /**
     * 插入头部，复杂度O(1)
     */
    public function addHeadNode($value)
    {
        $next = $this->head;

        $this->head = new Node($value, $next);

        $this->length++;
    }

    /**
     * 插入尾部，复杂度O(n)
     */
    public function addTailNode($value)
    {
        $node = $this->head;

        for ($i=0; $i<$this->length-1; $i++) {
            $node = $node->next;
        }

        $node->next = new Node($value);

        $this->length++;
    }

    /**
     * 插入指定位置，复杂度O(n)
     */
    public function addNode($index, $value)
    {
        if ($index > $this->length) {
            throw new Exception('超过链表范围');
        }

        $node = $this->head;

        // 获取指定位置的节点
        for ($i=0; $i<$index-1; $i++) {
            $node = $node->next;
        }

        $node->next = new Node($value, $node->next);


        $this->length++;
    }

    /**
     * 修改头节点
     */
    public function editHeadNode($value)
    {
        $this->head->value = $value;
    }

    /**
     * 修改尾节点
     */
    public function editTailNode($value)
    {
        $node = $this->head;

        for ($i=0; $i<$this->length-1; $i++) {
            $node = $node->next;
        }

        $node->value = $value;
    }

    /**
     * 修改指定节点
     */
    public function editNode($index, $value)
    {
        if ($index >= $this->length) {
            throw new Exception('超过链表范围');
        }

        $node = $this->head;

        // 获取指定节点
        for ($i=0; $i<$index; $i++) {
            $node = $node->next;
        }

        $node->value = $value;
     }
    /**
     * 删除头部，复杂度O(1)
     */
    public function deleteHeadNode()
    {
        $this->head = $this->head->next;

        $this->length--;
    }

    /**
     * 删除尾部，复杂度O(n)
     */
    public function deleteTailNode()
    {
        $node = $this->head;

        for ($i=0; $i<$this->length-2; $i++) {
            $node = $node->next;
        }

        $node->next = null;

        $this->length--;
    }

    /**
     * 删除尾部，复杂度O(n)
     */
    public function deleteNode($index)
    {
        $node = $this->head;

        for ($i=0; $i<$index; $i++) {
            if ($i == $index-1) {
                $node->next = $node->next->next;
            }

            $node = $node->next;
        }

        $this->length--;
    }

    /**
     * 查询头部节点，复杂度O(1)
     */
    public function selectHeadNode()
    {
        return $this->head->value;
    }

    /**
     * 查询尾部节点，复杂度O(n)
     */
    public function selectTailNode()
    {
        $node = $this->head;

        // 遍历获取最后一个节点
        for ($i=0; $i<$this->length-1; $i++) {
            $node = $node->next;
        }

        return $node->value;
    }

    /**
     * 查询节点，复杂度O(n)
     */
    public function selectNode($index)
    {
        $node = $this->head;

        // 遍历获取指定节点
        for ($i=0; $i<$index; $i++) {
            $node = $node->next;
        }

        return $node->value;
    }
}

$list = new SinglyLinkList();

$list->addHeadNode(1);
$list->addNode(1,7);
$list->addNode(2,10);
$list->addHeadNode(3);
$list->addTailNode(4);
$list->addNode(2, 5);
var_dump($list->selectHeadNode());
var_dump($list->selectTailNode());
var_dump($list->selectNode(3));
$list->deleteHeadNode();
$list->deleteTailNode();
$list->deleteNode(2);
$list->editHeadNode(2);
$list->editTailNode(11);
$list->editNode(1, 311);
var_dump($list);

