<?php
/**
 * ��С��(SplMinHeap)
 */
$heap = new SplMinHeap();
$heap->insert("123");
$heap->insert("456");
$heap->insert("789");
echo $heap->extract();//123
echo $heap->extract();//456
echo $heap->extract();//789
/**
 * ����(SplMaxHeap)
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
 * ʵ��heap
 * ���Ѻ���С��
 */
//��ʼ�������
class Heap{
    public $heap_arr = array();
    public $heap_arr2 = array();
    //������������Ԫ�صķ���
    function heap_add(&$heap_arr,$value){
        $heap_arr[] = $value;
        $count_arr = count($heap_arr);
        if ($count_arr > 0) {
            $n = $count_arr - 1;
            while ($n >= 1) {
                //���Ҹ��ڵ�id
                $parent_n = floor($n / 2);
                //����ӽڵ��value�����丸�ڵ��value,�ͽ��н���
                if ($heap_arr[$n] > $heap_arr[$parent_n]) {
                    //�������ݵĽ���
                    $temp = $heap_arr[$n];
                    $heap_arr[$n] = $heap_arr[$parent_n];
                    $heap_arr[$parent_n] = $temp;
                    $n = $parent_n;
                } else {
                    //����ӽڵ��valueС�ڵ��ڸ��ڵ��value,ֱ���˳�
                    break;
                }
            }
        }
    }
    function heap_add2(&$heap_arr2,$value2){
        $heap_arr2[] = $value2;
        $count_arr2 = count($heap_arr2);
        //���жѵĵ���
        if($count_arr2 > 0){
            $n2 = $count_arr2-1;
            while($n2 >= 1){
                //���Ҹ��ڵ�id
                $parent_n2 = floor($n2/2);
                //����ӽڵ��valueС���丸�ڵ��value,�ͽ��н���
                if($heap_arr2[$n2]<$heap_arr2[$parent_n2]){
                    //�������ݵĽ���
                    $temp2 = $heap_arr2[$n2];
                    $heap_arr2[$n2] = $heap_arr2[$parent_n2];
                    $heap_arr2[$parent_n2] = $temp2;
                    $n2 = $parent_n2;
                }else{
                    //����ӽڵ��value���ڵ��ڸ��ڵ��value,ֱ���˳�
                    break;
                }
            }
        }
    }
}

/**
 * ����
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
//���Array ( [0] => 9 [1] => 7 [2] => 5 [3] => 6 [4] => 1 [5] => 2 [6] => 4 )
echo "<hr>";
/**
 * ��С��
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
//���Array ( [0] => 1 [1] => 2 [2] => 4 [3] => 5 [4] => 7 [5] => 6 [6] => 9 )
echo "<hr>";
