<?php

/**
 * 节点类
 */
class Node
{
    public $value = null;
    public $next = null;
    public $weakNext = null;

    public function __construct($value, $next=null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}

class SinglyLinkedCircularList
{
    public $head;
    public $length;

    /**
     * 添加头节点
     */
    public function addHeadNode($value)
    {
        $newNode = new Node($value);

        if ($this->head != null) {
            // 获取尾节点
            $node = $this->head;

            for ($i=0; $i<$this->length-1; $i++) {
                $node = $node->next;
            }

            // 尾节点上weakNext指向新节点
            $node->weakNext = $newNode;
        } else {
            $newNode->weakNext = $newNode;
        }

        // 新节点的next指向原头节点
        $newNode->next = $this->head;

        // head头指针指向新节点
        $this->head = $newNode;

        $this->length++;
    }

    /**
     * 添加尾节点
     */
    public function addTailNode($value)
    {
        $node = $this->head;

        // 获取尾节点
        for ($i=0; $i<$this->length-1; $i++) {
            $node = $node->next;
        }

        $newNode = new Node($value);

        // 新节点的weakNext指针指向头节点
        $newNode->weakNext = $node->weakNext;

        // 尾节点的next指针指向新节点
        $node->next = $newNode;

        // 尾节点的weakNext为null
        $node->weakNext = null;

        $this->length++;
    }

    /**
     * 添加指定位置节点
     */
    public function addNode($index, $value)
    {
        // 获取尾节点
        for ($i=0; $i<$index; $i++) {
            $node = $node->next;
        }

        $newNode = new Node($value);

        // 新节点的weakNext指针指向头节点
        $newNode->weakNext = $node->weakNext;

        // 尾节点的next指针指向新节点
        $node->next = new Node($value);

        // 尾节点的weakNext为null
        $node->weakNext = null;
    }
}


$list = new SinglyLinkedCircularList();
$list->addHeadNode(1);
$list->addHeadNode(2);
$list->addTailNode(3);
var_dump($list);
// 添加头节点
// 添加尾节点
// 添加指定节点
// 在确定节点后添加
