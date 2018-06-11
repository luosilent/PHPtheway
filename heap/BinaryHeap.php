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

        // ��ȡ���ڵ����
        $root = array_shift($this->heap);

        if (!$this->isEmpty()) {
            // ��β������뵽�ѵĸ��ڵ�
            $last = array_pop($this->heap);
            array_unshift($this->heap, $last);

            //���µ�����ѽṹ��semi heap�� ʹ���ɶѽṹ
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
        // �Ѹ��ڵ����һ�������ƶ���ֱ����ΪҶ�ӽڵ�
        if (!$this->isLeaf($root)) {
            $left = (2 * $root) + 1; // left child
            $right = (2 * $root) + 2; // right child

            // ������ڵ����ֵС���ӽڵ����ֵ
            $h = $this->heap;
            if ((isset($h[$left]) && $this->compare($h[$root], $h[$left]) < 0)
                || (isset($h[$right]) && $this->compare($h[$root], $h[$right]) < 0)
            ) {
                // �������ӽڵ�
                if (isset($h[$left]) && isset($h[$right])) {
                    $j = ($this->compare($h[$left], $h[$right]) >= 0) ? $left : $right;
                } else if (isset($h[$left])) {
                    $j = $left; // ֻ�������ӽڵ�
                } else {
                    $j = $right; // ֻ�������ӽڵ�
                }
                // ���ڵ�ֵ���ӽڵ�ֵ����
                list($this->heap[$root], $this->heap[$j]) = array($this->heap[$j], $this->heap[$root]);

                // �ݹ鴦�� $j �ڵ��ֱ�����϶ѽṹ
                // node j
                $this->adjust($j);
            }
        }
    }

    public function insert($item)
    {
        // �µ�ֵ���뵽�ѵĵײ�
        $this->heap[] = $item;

        // �����ƶ��²����ֵ��ֱ�����еĸ��ڵ�ֵ�����ӽڵ��ֵ
        $place = $this->count();
        $parent = floor($place / 2);

        // �����û�����ڵ㲢���ӽڵ��ֵ���ڸ��ڵ��ֵ
        while ($place > 0 && $this->compare($this->heap[$place], $this->heap[$parent]) >= 0) {
            // �ӽڵ��ֵ�͸��ڵ��ֵ����λ��
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