<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/19
 * Time: 10:49
 */


/**
 * 冒泡排序
 * 时间复杂度（O(n^2)）
 * @param $arr
 * @return mixed
 */

function mySort($arr)
{
    $len=count($arr);
    //该层循环控制 需要冒泡的轮数
    for($i = 1; $i <$len; $i++)
    {
        //该层循环用来控制每轮 冒出一个数 需要比较的次数
        for ($j=0; $j< count($arr) - $i; $j++)
        {
            if($arr[$j] < $arr[$j+1])
            {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp ;
            }
        }
    }
    return $arr;
}

$arr = array(6,1,2,3,7,4,8,9,5,0);
print_r(mySort($arr));
echo "<hr>";

/**
 * 选择排序
 * 时间复杂度是O(n^2)
 * @param $arr
 * @return mixed
 */
function selectSort($arr) {
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        $minIndex = $i;
        // 找出i后面最小的元素与当前元素交换
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        if ($minIndex != $i) {
            $t = $arr[$i];
            $arr[$i] = $arr[$minIndex];
            $arr[$minIndex] = $t;
        }
    }
    return $arr;
}
$arr = array(11,6,1,2,3,7,4,8,9,5,0);
print_r(selectSort($arr));
echo "<hr>";
/**
 * 快速排序
 * 时间复杂度O(N logN)
 * @param $arr
 * @return array
 */
function quickSort($arr)
{
    //先判断是否需要继续进行
    $length = count($arr);
    if($length <= 1)
    {
        return $arr;
    }

    $base_num = $arr[0];//选择一个标尺 选择第一个元素

    //初始化两个数组
    $left_array = array();//小于标尺的
    $right_array = array();//大于标尺的
    for($i=1; $i<$length; $i++)
    {      //遍历 除了标尺外的所有元素，按照大小关系放入两个数组内
        if($base_num > $arr[$i])
        {
            //放入左边数组
            $left_array[] = $arr[$i];
        }
        else
        {
            //放入右边
            $right_array[] = $arr[$i];
        }
    }
    //再分别对 左边 和 右边的数组进行相同的排序处理方式
    //递归调用这个函数,并记录结果
    $left_array = quickSort($left_array);
    $right_array = quickSort($right_array);
    //合并左边 标尺 右边
    return array_merge($left_array, array($base_num), $right_array);
}

$arr = array(6,1,2,3,7,4,8,9,5,0);
print_r(quickSort($arr));
echo "<hr>";

/**
 * 插入排序
 * 时间复杂度也是O(n^2)
 * @param $arr
 * @return mixed
 */
function insertSort($arr) {
    $len=count($arr);
    for($i=1; $i<$len; $i++) {
        $tmp = $arr[$i];
        //内层循环控制，比较并插入
        for($j=$i-1;$j>=0;$j--) {
            if($tmp < $arr[$j]) {
                //发现插入的元素要小，交换位置，将后边的元素与前面的元素互换
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                //如果碰到不需要移动的元素，由于是已经排序好是数组，则前面的就不需要再次比较了。
                break;
            }
        }
    }
    return $arr;
}
$arr = array(6,1,2,3,7,4,8,9,5,14,12,0);
print_r(insertSort($arr));
echo "<hr>";

/**
 * 顺序查找
 * @param $arr
 * @param $k
 * @return string
 */
function seqSearch($arr,$k)
{
    $n = count($arr);
    for($i = 0;$i < $n; $i++)
    {
        if($arr[$i] == $k)
        {
            print("查找的数字是：$k ");
            break;
        }

    }
    if(!isset($arr[$i]))
    {
        return "该查找的数字不存在";
    }else{
        return "对应的数组下标是：$i";
    }

}
$arr = array(6,1,2,3,7,4,8,9,5,0);
print_r(seqSearch($arr,8));
echo "<hr>";

/**
 * 希尔排序
 * 它的时间复杂度为O(N logN)到O(n^2)之间
 * @param $arr
 * @return mixed
 */
function shellSort($arr) {
    $len = count($arr);
    $stepSize = floor($len / 2);
    while ($stepSize >= 1) {
        for ($i = $stepSize; $i < $len; $i++) {
            if ($arr[$i] < $arr[$i - $stepSize]) {
                $t = $arr[$i];
                $j = $i - $stepSize;
                while ($j >= 0 && $t < $arr[$j]) {
                    $arr[$j + $stepSize] = $arr[$j];
                    $j -= $stepSize;
                }
                $arr[$j + $stepSize] = $t;
            }
        }
        // 缩小步长，再进行插入排序
        $stepSize = floor($stepSize / 2);
    }
    return $arr;
}

$arr = array(6,1,2,3,7,4,8,9,5,0,22);
print_r(shellSort($arr));
echo "<hr>";

/**
 * 二分查找
 * 时间复杂度是 O(logN)
 * @param $arr
 * @param $low
 * @param $high
 * @param $k
 * @return int
 */
function binSearch($arr,$low,$high,$k)
{
    if($low <= $high)
    {
        $mid = intval(($low + $high)/2);
        if($arr[$mid] == $k)
        {
            return $mid;
        }
        else if($k < $arr[$mid])
        {
            return binSearch($arr,$low,$mid-1,$k);
        }
        else
        {
            return binSearch($arr,$mid+1,$high,$k);
        }
    }
    return -1;
}

$arr = array(0,1,16,24,35,47,59,62,73,88,99);

print(binSearch($arr,0,10,62));

echo "<hr>";





/**
 * 二分搜索(折半查找)算法(前提是数组必须是有序数组)
 * 时间复杂度是 O(logN)
 * 待查找数组
 * @param $arr
 * 待搜索的数字
 * @param $num
 * 返回的数组下标
 * @return int
 */
$i = 0;
function bSearch($arr,$num){
    $count = count($arr);
    $lower = 0;
    $high = $count - 1;
    global $i;    //存储对比的次数

    while($lower <= $high){

        $i ++; //计数器

        if($arr[$lower] == $num){
            return $lower;
        }
        if($arr[$high] == $num){
            return $high;
        }

        $middle = intval(($lower + $high) / 2);
        if($num < $arr[$middle]){
            $high = $middle - 1;
        }else if($num > $arr[$middle]){
            $lower = $middle + 1;
        }else{
            return $middle;
        }
    }

    //返回-1表示查找失败
    return -1;
}

$arr = array(0,1,16,24,35,47,59,62,73,88,99);
$pos = bSearch($arr,47);
print($pos);
echo "<br>";
echo $i;
echo "<hr>";


