<?php

/**
 * 节点类
 */
class Node
{
    public $value = '';
    public $next = null;
    public $prev = null;

    public function __construct($value, $prev=null, $next=null)
    {
        $this->value = $value;
        $this->prev = $prev;
        $this->next = $next;
    }
}

/**
 * 双向链表
 */
class DoubleLinkedList
{
    public $head = null;
    public $tail = null;
    public $length = 0;

    /**
     * 添加头节点 复杂度O(1)
     */
    public function addHeadNode($value)
    {
        $newNode = new Node($value, $this->head);

        // 第一步：将新节点的next指向原头节点
        $newNode->next = $this->head;

        if ($this->head != null) {
            // 第二步：将原头节点的prev指向新节点
            $this->head->prev = $newNode;
        }

        // 第三步：将链表的的head指向新节点, prev为null
        $this->head = $newNode;


        if (is_null($this->tail)) {
            $this->tail = $newNode;
        }

        $this->length++;
    }

    /**
     * 添加尾节点 复杂度O(1)
     */
    public function addTailNode($value)
    {
        $newNode = new Node($value, $this->tail);

        // 第一步：将新节点的prev指向原尾节点
        $newNode->prev = $this->tail;

        if ($this->tail != null) {
            // 第二步：将原尾节点的next指向新节点
            $this->tail->next = $newNode;
        }

        // 第三步：将链表的tail指向新节点
        $this->tail = $newNode;

        if ($this->head == null) {
            $this->head = $newNode;
        }

        $this->length++;
    }

    /**
     * 添加指定节点 复杂度O(n)
     */
    public function addNode($index, $value)
    {
        if ($index > $this->length) {
            throw new Exception('超过链表范围');
        }

        // 如果位置=0，则为在头部添加节点
        if ($index == 0) {
            $this->addHeadNode($value);
        }

        // 如果位置与链表长度一致，则在尾部添加节点
        if ($index == $this->length) {
            $this->addTailNode($value);
        }

        // 如果在中间添加节点，则查询该节点是要放在在上半部分还是下半部分
        if ($index <= ($this->length / 2)) {
            // 第一步：从头部开始，查询到该节点要插入位置的上一个节点
            $node = $this->head;

            for ($i=0; $i<$index-1; $i++) {
                $node = $node->next;
            }

            $newNode = new Node($value, $node, $node->next);

            // $node为上一节点 $newNode 为要添加节点 $node->next为下一节点
            // 第二步：将下一节点的prev指向新节点
            $node->next->prev = $newNode;

            // 第三步：将上一节点的next指向新节点
            $node->next = $newNode;
        } else {
            // 第一步：从尾部开始，查询到要插入节点的下一个节点
            $node = $this->tail;

            for ($i=$this->length-2; $i>$index; $i--) {
                $node = $node->prev;
            }

            $newNode = new Node($value, $node->prev, $node);

            // 第二步：将上一节点的next指向新节点
            $node->prev->next = $newNode;

            // 第三步：将下一节点的prev指向新节点
            $node->prev = $newNode;
        }

        $this->length++;
    }

    /**
     * 查询头节点 复杂度O(1)
     */
    public function selectHeadNode()
    {
        return $this->head->value;
    }

    /**
     * 查询尾节点 复杂度O(1)
     */
    public function selectTailNode()
    {
        return $this->tail->value;
    }

    /**
     *  查询指定节点 复杂度O(n)
     */
    public function selectNode($index)
    {
        if ($index <= ($this->length / 2)) {
            $node = $this->head;

            for ($i=0; $i<$index; $i++) {
                $node = $node->next;
            }

            return $node->value;
        } else {
            $node = $this->tail;

            for ($i=$this->length; $i>$index; $i--) {
                $node = $node->prev;
            }

            return $node->value;
        }
    }

    /**
     * 删除头节点 复杂度O(1)
     */
    public function deleteHeadNode()
    {
        $this->head->next->prev = null;

        $this->head = $this->head->next;
    }

    /**
     * 删除尾节点 复杂度O(1)
     */
    public function deleteTailNode()
    {
        $this->tail->prev->next = null;

        $this->tail = $this->tail->prev;
    }

    /**
     * 删除指定节点 复杂度O(n)
     */
    public function deleteNode($index)
    {
        // 如果位置=0，则删除头节点
        if ($index == 0) {
            $this->deleteHeadNode($value);
        }

        // 如果位置与链表长度一致，则删除尾节点
        if ($index == $this->length) {
            $this->deleteTailNode($value);
        }

        // 如果在中间删除节点，则先查询该节点是在上半部分还是下半部分
        if ($index <= ($this->length / 2)) {
            // 第一步：查询要删除节点的上一节点
            $node = $this->head;

            for ($i=0; $i<$index-1; $i++) {
                $node = $node->next;
            }

            // $node为上一节点 $node->next 为要删除节点 $node->next->next为下一节点
            // 第二步：将上一节点的next指向要下一节点
            $node->next = $node->next->next;

            // 第三步：将下一节点的prev指向上一节点
            $node->next->prev = $node;
        } else {
            // 第一步：查询删除节点的后一节点
            $node = $this->tail;

            for ($i=$this->length; $i>$index; $i--) {
                $node = $node->prev;
            }

            // $node为下一节点 $node->prev 为要删除节点 $node->prev->prev为上一节点
            // 第二步：将下一节点的prev指向上一节点
            $node->prev = $node->prev->prev;

            // 第三步：将上一节点的next指针指向下一节点
            $node->prev->next = $node;
        }
    }
}

$list = new DoubleLinkedList();
$list->addHeadNode(1);
$list->addHeadNode(2);
$list->addTailNode(3);
$list->addNode(1, 4);
$list->addNode(2, 5);
$list->addNode(3, 6);
var_dump($list);
var_dump($list->selectHeadNode());
var_dump($list->selectTailNode());
var_dump($list->selectNode(1));
var_dump($list->selectNode(4));
$list->deleteHeadNode();
$list->deleteTailNode();
$list->deleteNode(2);
$list->deleteNode(1);
var_dump($list);
