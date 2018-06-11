<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 16:26
 */

class BinaryHeap
{
    protected $heap;

    public function __construct()
    {
        $this->heap = array();
    }

    public function isEmpty()
    {
        return empty($this->heap);
    }

    public function count()
    {
        // returns the heap size
        return count($this->heap) - 1;
    }

    public function extract()
    {
        if ($this->isEmpty()) {
            throw new RunTimeException('Heap is empty');
        }

        // 提取根节点的项
        $root = array_shift($this->heap);

        if (!$this->isEmpty()) {
            // 把尾部项插入到堆的根节点
            $last = array_pop($this->heap);
            array_unshift($this->heap, $last);

            //重新调整半堆结构（semi heap） 使其变成堆结构
            $this->adjust(0);
        }

        return $root;
    }

    public function compare($item1, $item2)
    {
        if ($item1 === $item2) {
            return 0;
        }
        return ($item1 > $item2 ? 1 : -1);
    }

    protected function isLeaf($node)
    {
        // there will always be 2n + 1 nodes in the sub-heap
        return ((2 * $node) + 1) > $this->count();
    }

    protected function adjust($root)
    {
        // 把根节点的项一致向下移动，直到成为叶子节点
        if (!$this->isLeaf($root)) {
            $left = (2 * $root) + 1; // left child
            $right = (2 * $root) + 2; // right child

            // 如果根节点项的值小于子节点项的值
            $h = $this->heap;
            if ((isset($h[$left]) && $this->compare($h[$root], $h[$left]) < 0)
                || (isset($h[$right]) && $this->compare($h[$root], $h[$right]) < 0)
            ) {
                // 找最大的子节点
                if (isset($h[$left]) && isset($h[$right])) {
                    $j = ($this->compare($h[$left], $h[$right]) >= 0) ? $left : $right;
                } else if (isset($h[$left])) {
                    $j = $left; // 只存在左子节点
                } else {
                    $j = $right; // 只存在右子节点
                }
                // 跟节点值和子节点值交换
                list($this->heap[$root], $this->heap[$j]) = array($this->heap[$j], $this->heap[$root]);

                // 递归处理 $j 节点项，直到符合堆结构
                // node j
                $this->adjust($j);
            }
        }
    }

    public function insert($item)
    {
        // 新的值插入到堆的底部
        $this->heap[] = $item;

        // 向上移动新插入的值，直到所有的父节点值大于子节点的值
        $place = $this->count();
        $parent = floor($place / 2);

        // 如果还没到根节点并且子节点的值大于父节点的值
        while ($place > 0 && $this->compare($this->heap[$place], $this->heap[$parent]) >= 0) {
            // 子节点的值和父节点的值交换位置
            list($this->heap[$place], $this->heap[$parent]) = array($this->heap[$parent], $this->heap[$place]);
            $place = $parent;
            $parent = floor($place / 2);
        }
    }

    public function dump()
    {
        print_r($this->heap);
    }
}