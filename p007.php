<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/9
 * Time: 8:41
 */
//数组去重
$arr = array(1, 2, 6, 6, 7, 7, 8, 8, 8, 3, 3, 4, 4, 5);
$arr = array_flip($arr);
$arr = array_keys($arr);
$a = sort($arr);
print_r($arr);
echo "<br>";
var_dump($a);//返回的是bool(true)
echo "<br>";
foreach ($arr as $value) {
    echo $value . "<br>";
}

//遍历多维数组
$data = [
    1, 2, 3, 4,
    [
        11, 22, 33, 44,
        [
            111, 222, 333, 444,
            [
                1111,2222,3333,4444
            ]
        ]
    ],
];

function eatArr(array $arr)
{
    foreach ($arr as $value) {
        if (is_array($value)) {
            eatArr($value);
        } else {
            echo $value . ' ';
        }
    }
}

eatArr($data);