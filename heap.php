<?php
/**
 * 最小堆(SplMinHeap)
 */
$heap = new SplMinHeap();
$heap->insert("123");
$heap->insert("456");
$heap->insert("789");
echo $heap->extract();//123
echo $heap->extract();//456
echo $heap->extract();//789
/**
 * 最大堆(SplMaxHeap)
 */
$heap2 = new SplMaxHeap();
$heap2->insert("123");
$heap2->insert("456");
$heap2->insert("789");
echo $heap2->extract();//789
echo $heap2->extract();//456
echo $heap2->extract();//123
echo "<hr>";

/**
 * 实现heap
 * 最大堆和最小堆
 */
//初始化数组堆
class Heap{
    public $heap_arr = array();
    public $heap_arr2 = array();
    //定义向堆中添加元素的方法
    function heap_add(&$heap_arr,$value){
        $heap_arr[] = $value;
        $count_arr = count($heap_arr);
        if ($count_arr > 0) {
            $n = $count_arr - 1;
            while ($n >= 1) {
                //查找父节点id
                $parent_n = floor($n / 2);
                //如果子节点的value大于其父节点的value,就进行交换
                if ($heap_arr[$n] > $heap_arr[$parent_n]) {
                    //进行数据的交换
                    $temp = $heap_arr[$n];
                    $heap_arr[$n] = $heap_arr[$parent_n];
                    $heap_arr[$parent_n] = $temp;
                    $n = $parent_n;
                } else {
                    //如果子节点的value小于等于父节点的value,直接退出
                    break;
                }
            }
        }
    }
    function heap_add2(&$heap_arr2,$value2){
        $heap_arr2[] = $value2;
        $count_arr2 = count($heap_arr2);
        //进行堆的调整
        if($count_arr2 > 0){
            $n2 = $count_arr2-1;
            while($n2 >= 1){
                //查找父节点id
                $parent_n2 = floor($n2/2);
                //如果子节点的value小于其父节点的value,就进行交换
                if($heap_arr2[$n2]<$heap_arr2[$parent_n2]){
                    //进行数据的交换
                    $temp2 = $heap_arr2[$n2];
                    $heap_arr2[$n2] = $heap_arr2[$parent_n2];
                    $heap_arr2[$parent_n2] = $temp2;
                    $n2 = $parent_n2;
                }else{
                    //如果子节点的value大于等于父节点的value,直接退出
                    break;
                }
            }
        }
    }
}

/**
 * 最大堆
 */
$heap = new Heap();
$heap -> heap_add($heap_arr,1);
$heap -> heap_add($heap_arr,7);
$heap -> heap_add($heap_arr,5);
$heap -> heap_add($heap_arr,4);
$heap -> heap_add($heap_arr,2);
$heap -> heap_add($heap_arr,6);
$heap -> heap_add($heap_arr,9);
print_r($heap_arr);
//输出Array ( [0] => 9 [1] => 7 [2] => 5 [3] => 6 [4] => 1 [5] => 2 [6] => 4 )
echo "<hr>";
/**
 * 最小堆
 */
$heap2 = new Heap();
$heap2 -> heap_add2($heap_arr2,1);
$heap2 -> heap_add2($heap_arr2,7);
$heap2 -> heap_add2($heap_arr2,5);
$heap2 -> heap_add2($heap_arr2,4);
$heap2 -> heap_add2($heap_arr2,2);
$heap2 -> heap_add2($heap_arr2,6);
$heap2 -> heap_add2($heap_arr2,9);
print_r($heap_arr2);
//输出Array ( [0] => 1 [1] => 2 [2] => 4 [3] => 5 [4] => 7 [5] => 6 [6] => 9 )
echo "<hr>";
