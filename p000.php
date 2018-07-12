<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/9
 * Time: 13:55
 */

/**
 * 三元运算符的应用
 */

$a = 10;
$b = 15;
echo $a > $b ? 1 : 0;

//注:php7新添加的运算符比较运算符x<=>y
//如果x和y相等,就返回0,如果x>y,就返回1,如果x的值小于y,就返回-1


$a = "aaa";
$b = "bbb";
echo $a.$b;


/**
 * 预定义常量
 */


class A{
    function showName(){
        echo __METHOD__;
        echo "<hr>";
        echo __FUNCTION__;
        echo "<hr>";
        echo __CLASS__;
        echo __FILE__;
        echo __DIR__;
    }
}
$b = new A();
$b->showName();




/**
 * switch分支语句
 */


switch (2){
    case 1:
        echo "11";
        break;
    case 2:
        echo "12";
        break;
    default :
        echo "13";
        break;
}



/**
 * while循环
 * 需要注意,while循环必须进行变量初始化
 */


$i = 1;
while ($i <= 10) {
    echo $i." ";
    $i++;
}




/**
 * do while循环
 */

$i = 0;
do{
    $i++;
    echo $i." ";
}while($i<10);


/**
 * for循环
 */
for ($i = 0; $i < 10; $i++) {
    echo $i." ";
}

/**
 * foreach循环
 */


$arr = [
    'name'=>'xiaobudiu',
    'age'=>25,
    'hobby'=>[
        '1'=>'hobby',
        '2'=>'code'
    ]
];
foreach ($arr as $k=>$v){
    echo $k."=>".$v;
    echo " ";
}




/**
 * 跳转语句之goto (还有break,continue)
 * goto
 * goto a直接跳到a 中间部分的代码不执行
 */

/*
goto a;
echo 'kkk';
echo '123';
a:
echo 'bbb';
echo '525';
*/
//此部分代码浏览器显示为
//bbb525


/**
 * goto跳转语句
 */

/*
for($i = 0; $i < 10; $i++) {
    if($i == 3){
        goto a;
    }
    echo $i;
}
a:
echo "跳出循环";
*/
//浏览器显示为
//012跳出循环



/**
 * 引用传递
 */

function test(&$a) {
    $a = $a + 1;
    return $a;
}
$x = 1;
echo test($x);//2
echo "<hr>";
echo $x;//2




/**
 * 函数的默认参数
 * 为了避免意外情况发生,一般,默认参数放在非默认参数的右侧
 */
/*
function aa($a = 2, $b){
    echo $a+$b;
}
aa(3,5);
//浏览器显示8
//这里,如果调用时aa(3)只给了一个参数,则会报错
*/


/**
 * 可变参数变量
 * 参数可包含'...'来表示函数可接受一个可变数量的参数
 * 可变参数将会被当做一个数组传递给函数
 */
/*
function test(...$num){
    $sum = 0;
    foreach ($num as $k=>$value){
        $sum += $value;
    }
    return $sum;
}

echo test(1,3,4,5);
//结果1+3+4+5 = 13
*/


/**
 * return跳转语句
 * return 本身只能返回一个值,不能返回数组,我们通过这种方法来实现返回数组,并在调用时用list接收
 * return之后的代码不在执行,这里,echo "111"代码执行不了,所以浏览器只返回了28 11
 */
/*
function aak($a,$b){
    $sum = $a * $b;
    $sum2 = $a + $b;
    return array($sum,$sum2);
}
list($a1,$a2) = aak(4,7);
echo $a1." ".$a2;
//浏览器显示 28 11
*/



/**
 * 使用get_loaded_extensions 我们来查看一下现在的php程序加载了哪些拓展
 */
//var_dump(get_loaded_extensions());



/**
 * 匿名函数(也叫闭包函数)
 * 允许临时创建一个没有指定名称的函数,经常用作回调函数(callback)参数的值
 * 闭包函数也可以作为变量的值来使用(比如此例)
 */
/*
$greet = function ($name){
    echo "hello,$name";
};
$greet('xiaobudiu'); //浏览器显示 hello,xiaobudiu
*/


/**
 * 递归思想
 * 斐波那契数列
 * 1,1,2,3,5,8...
 *$n表示第几个数
 */
/*
function compute($n) {
    if ($n > 2) {
        $arr[$n] = compute($n - 1) + compute($n - 2);
        return $arr[$n];
    }else{
        return 1;
    }
}
echo compute(5);
*/


/**
 * 迭代思想
 * 利用变量的原值推算出变量的一个新值
 */
/*
function diedai($n){
    for ($i = 0 , $j = 0; $i < $n; $i++) {
        $j = $i + $j;
    }
    return $j;
}
echo diedai(50);
*/


/**
 * 单引号和双引号
 */
/*
$str = "i dont't want to go shoping";
echo ucwords($str);
*/


/**
 * 字符串替换
 *str_ireplace();str_replace()
 */
/*
$str = "hello,world,hello,world";
//echo str_replace('or','dd',$str);
$replace = 'hi';
echo substr_replace($str,$replace,0,7);//将第0到第7个字符替换成$replace字符
//浏览器显示hiorld,hello,world
*/


/**
 *
 * 截取字符串
 */
/*
$str = 'abcdefg';
echo substr($str,0,4);
//浏览器显示:abcd
*/



/**
 * 去掉字符串首尾特殊字符
 * trim();ltrim();rtrim()
 */
/*
$str = ' .abcded  .gk.';
echo $str;
echo "<hr>";
$str = trim($str);
echo $str;//.abcded .gk.(空格去掉了)
echo '<hr>';
$str = ltrim($str,'.');//abcded .gk.(左边的点被去掉了)
echo $str;
echo '<hr>';
$str = rtrim($str,'.');//（右侧的点被去掉了）
echo $str;
*/


/**
 * str_replace()
 */
/*
$str = 'hello,world,d,hello,world,ef';
//要求把第二个hello替换成hi
echo str_replace('hello','hi',$str);
*/
//str_replace()单独实现不了替换限制次数的需求,要替换,都替换,无法替换单独一个



/**
 * 对字符串执行指定次数替换
 * @param Mixed $search  查找目标值
 * @param Mixed $replace 替换值
 * @param Mixed $subject 执行替换的字符串／数组
 * @param Int  $limit  允许替换的次数，默认为-1，不限次数
 * @return Mixed
 */
/*
function str_replace_limit($search, $replace, $subject, $limit=-1){
    if (is_array($search)) {
        foreach ($search as $k=>$v) {
            $search[$k] = '`'. preg_quote($search[$k], '`'). '`';
        }
    } else {
        $search = '`'. preg_quote($search, '`'). '`';
    }
    return preg_replace($search, $replace, $subject, $limit);
}
$str = "abccddefccggcccg";
echo str_replace_limit('cc','c',$str,2);
echo '<hr>';
*/
//浏览器显示:abcddefcggcccg(前两个cc都被替换了,最后一个ccc没有被替换)


/**
 * 截取字符串
 * substr
 */
/*
$str = "abcdefghijklmn";
echo substr($str,-4,2);//kl
*/


/*
 * 计算字符串长度
 * str_len
 */
/*
$str = "abcdefghijklmn我";
echo strlen($str);//17 (中文3个字符,英文1个字符)
*/


/**
 * 转义和还原字符串
 * 转义:addslashes()  还原:stripslashes
 * 两个参数 第一个参数字符串,第二个参数要进行转义的字符
 */
/*
$str = "I Don't wang to go shopping..";
$str = ucwords($str);
echo $str;//I Don't Wang To Go Shopping..
echo "<hr>";
//$str = addslashes($str);
$str = addcslashes($str,'.');
echo $str;//I Don't Wang To Go Shopping\.\.
*/



/**
 * 重复字符串
 * str_repeat
 */
/*
$str = 'abcd';
echo str_repeat($str,2);
*/



/**
 * 随机打乱字符串
 * str_shuffle()
 */
/*
$str = "abcdefghijklmn";
echo str_shuffle($str);
*/



/**
 * 分割字符串
 * explode()
 */
/*
$str = "piece1,piece2,piece3";
$str = explode(',',$str);
var_dump($str); //array(3) { [0]=> string(6) "piece1" [1]=> string(6) "piece2" [2]=> string(6) "piece3" }
echo "<hr>";
$str = implode('-',$str);
echo $str; //piece1-piece2-piece3
*/



/**
 * 创建一个指定范围的数组
 * range() 第三个参数step 步进值
 */
/*
$arr = range('0','9',2);
var_dump($arr); //array(5) { [0]=> int(0)  [1]=> int(2)  [2]=> int(4)  [3]=> int(6)  [4]=> int(8) }
*/



/**
 * 检查数组中是否存在某个值
 * in_array
 */
/*
$arr = [
    'beijing',
    'shanghai',
    'hangzhou',
    'shenzhen'
];
var_dump(in_array('hangzhou',$arr));//bool(true)
*/



/**
 * 数组转换成字符串
 * implode()
 */
/*
$arr = [
    'beijing',
    'shanghai',
    'hangzhou',
    'shenzhen'
];
$arr = implode('-',$arr);
echo $arr; // beijing-shanghai-hangzhou-shenzhen
*/



/**
 * 计算数组中的单元数目
 * count()
 * 第二个参数可选,默认0,识别不了无限递归,1:可以识别无限递归
 * 此例中,输出的count就是6
 */
/*
$arr = [
    'beijing',
    'shanghai'=>[
        'pudong',
        'jiaoda'
    ],
    'hangzhou',
    'shenzhen'
];
echo count($arr);//4
echo "<hr>";
echo count($arr,1);//6
*/



/**
 * 数组当前单元和指针
 * current(),next(),prev(),end(),reset()
 */
/*
$foods = ['banana','apple','orange'];
var_dump(current($foods));
var_dump(next($foods));//将数组指针向后移动一位
var_dump(current($foods));
*/



/**
 * 数组中的键名和值
 * key() next()
 */

/**
 * 检查给定键名或索引是否存在于数组中
 * array_key_exits
 */


/**
 * 获取数组中键名
 * array_keys()
 */


/**
 * 获取数组中所有的值
 * array_values
 */
/*
$arr = [
    '12' => 'beijing',
    '25' => 'shanghai',
    '3' => 'hangzhou',
    '4' => 'shenzhen'
];
var_dump(array_values($arr));//获取数组所有键值
*/


/**
 * 搜索给定值返回键名
 * array_search
 */
/*
$arr = [
    '0' => 'blue',
    '2' => 'red',
    '3' => 'green'
];
var_dump(array_search('red',$arr)); // 2
*/


/**
 * 填补数组
 * array_pad()
 * pad_size:填补后数组的长度(若为负数,则填补到左侧)
 * pad_value:填补的内容
 */
/*
$arr = [
    '0' => 'blue',
    '2' => 'red',
    '3' => 'green'
];
$arr = array_pad($arr,6,'orange');
var_dump($arr);
*/



/**
 * 使用指定的键和值填充数组
 * array_fill_keys
 */
/*
$arr = ['banana','apple',2,5];
$arr = array_fill_keys($arr,array('hangzhou','shanghai','beijing'));
print_r($arr);
*/

/*
 * 浏览器显示
 Array
(
    [banana] => Array
        (
            [0] => hangzhou
            [1] => shanghai
            [2] => beijing
        )

    [apple] => Array
        (
            [0] => hangzhou
            [1] => shanghai
            [2] => beijing
        )

    [2] => Array
        (
            [0] => hangzhou
            [1] => shanghai
            [2] => beijing
        )

    [5] => Array
        (
            [0] => hangzhou
            [1] => shanghai
            [2] => beijing
        )

)
*/



/**
 * 从数组中随机取出一个或多个单元
 * array_rand
 * 注:返回随机条目的一个或多个键
 */
/*
$arr = [
    '0' => 'blue',
    '2' => 'red',
    '3' => 'green',
    '4' => 'color'
];
$arrs = array_rand($arr,3);
var_dump($arrs);
*/




/**
 * 数组排序与打乱数组
 * sort(),asort() shuffle()
 */
/*
$arr = range('a','z');
shuffle($arr);
foreach($arr as $k=>$v){
    echo $v;
    echo " ";
}
*/



/**
 * 遍历数组
 * for,foreach(),each() list()
 */
/*
$arrs=['beijing','shanghai','guangzhou','hangzhou','shenzhen'];
$arrss=['haerbin','zhengzhou'=>'henan','nanjing'];

//for循环写法
for($i = 0; $i < count($arrs); $i++){
    echo $arrs[$i];
    echo '<br>';
}
echo "<hr>";

//foreach写法
foreach($arrss as &$v){
    echo $v;
    echo ' ';
}
*/



/**
 * list() 将数组的值分给赋给变量
 *
 */
/*
$arrs=['beijing','shanghai','guangzhou','hangzhou','shenzhen'];
list($a[1], $a[2], $a[3]) = $arrs;
var_dump($a);
*/


/**
 *数组的拆分,拆分成几组，每组几个元素
 * array_chunk()
 */
/*
$arrs = ['beijing','shanghai','guangzhou','hangzhou','shenzhen'];
$arrs = array_chunk($arrs,2,true);
var_dump($arrs);
*/

//浏览器显示
/**
array(3) {
[0]=>
array(2) {
[0]=>
string(7) "beijing"
[1]=>
string(8) "shanghai"
}
[1]=>
array(2) {
[2]=>
string(9) "guangzhou"
[3]=>
string(8) "hangzhou"
}
[2]=>
array(1) {
[4]=>
string(8) "shenzhen"
}
}
 */



/**
 * 合并数组
 * array_merge()
 */
/*
$arrs=['beijing','shanghai','guangzhou','hangzhou','shenzhen'];
$arrss=['haerbin','zhengzhou'=>'henan','nanjing','hangzhou'];
$arr = array_merge($arrs,$arrss);
var_dump($arr);
*/



/**
 *增加删除数组中的元素
 *array_shift() 可在数组开头插入一个1或多个单元
 *array_unshift() 可将数组开头的单元移除数组
 * array_push()   用来将一个或多个单元压入数组的末尾(入栈)
 * array_pop()    可将数组的最后一个单元弹出(出栈)
 */



/**
 * 从数组中取出一段
 * array_slice()  字符串 substr
 */
/*
$arrs = ['beijing','shanghai','guangzhou','hangzhou','shenzhen'];
var_dump(array_slice($arrs,2,3,true));
//array(3) { [2]=> string(9) "guangzhou" [3]=> string(8) "hangzhou" [4]=> string(8) "shenzhen" }
*/



/**
 * 把数组中的一部分去掉,并用其他值取代
 * array_splice()
 */
/*
$arrss = ['haerbin','zhengzhou'=>'henan','nanjing','hangzhou'];
array_splice($arrss,1,2,'code');
var_dump($arrss); //array(3) { [0]=> string(7) "haerbin" [1]=> string(4) "code" [2]=> string(8) "hangzhou" }
*/
/*
$arrss = ['haerbin','zhengzhou'=>'henan','nanjing','hangzhou'];
$arr3 = [3,6,9,12,13,1,21,22,4,23];
array_splice($arrss,2);
var_dump($arrss); //array(2) { [0]=> string(7) "haerbin" ["zhengzhou"]=> string(5) "henan" }
echo array_sum($arr3);//获得数组内所有数的总和
*/


/**
 * 系统预定义数组 $_SERVER $_GET $_POST
 */

//var_dump($_SERVER);
//var_dump($_POST);
//var_dump($_GET);
/*
$name = $_POST['name'];
$pass = $_POST['pass'];
var_dump($_POST);
*/


/**
 * 获取通过post方式上传文件的相关信息
 * $_FILES
 */

/*
session_start();
session_id();
var_dump(session_id());
echo "<hr>";
$_COOKIE['name'] = 'xiaobudiu';
$_COOKIE['pass'] = '56611';
var_dump($_COOKIE);
setcookie('session_id','');
*/


/**
 * 获取当前时间
 * time();
 */
//var_dump(date('Y-m-d  H:i:s',time()));


/**
 *取得日期时间信息
 * getdate()
 */
/*$arr=getdate();
var_dump($arr);*/
/*
array(11) {
  ["seconds"]=>
  int(57)
  ["minutes"]=>
  int(58)
  ["hours"]=>
  int(18)
  ["mday"]=>
  int(4)
  ["wday"]=>
  int(4)
  ["mon"]=>
  int(1)
  ["year"]=>
  int(2018)
  ["yday"]=>
  int(3)
  ["weekday"]=>
  string(8) "Thursday"
    ["month"]=>
  string(7) "January"
    [0]=>
  int(1515063537)
}
*/

/**
 * 常用时间处理
 *
 */

/**
 * 默认时区设置
 * date_default_timezone_set()
 */
//date_default_timezone_set('PRC');


/**
 * 计算两个日期的时间差
 * 2017年1月4日20时28分30秒 2018年5月6日19时30分15秒
 * @param $hour_start int 起始小时 (这里填20)
 * @param $minutes_start int 起始分钟数 (这里填28)
 * @param $seconds_start  int 起始秒数 (这里填30)
 * @param $month_start int 起始月份 (这里填1)
 * @param $day_start int 起始日期(这里填4)
 * @param $year_start int 起始年份(这里填2017)
 * @param $hour_end
 * @param $minutes_end
 * @param $second_end
 * @param $month_end
 * @param $day_end
 * @param $year_end
 */
/*
function diff_time($year_start,$month_start,$day_start,$hour_start,$minutes_start,$seconds_start,
                   $year_end,$month_end,$day_end,$hour_end,$minutes_end,$second_end)
{
    //2016年1月1日19点30分0秒时间戳
    //$start=mktime(19,30,0,1,1,2016)
    $start=mktime($hour_start,$minutes_start,$seconds_start,$month_start,$day_start,$year_start);

    //2016年7月7日7点30分0秒时间戳
    //$end=mktime(7,30,0,7,7,2016);
    $end=mktime($hour_end,$minutes_end,$second_end,$month_end,$day_end,$year_end);

    //时间戳之差
    $diff_seconds=$end-$start;

    //一周的秒数是24*60*60*7=604800
    $diff_weeks=floor($diff_seconds/604800);

    //一天的秒数是24*60*60=86400
    $diff_days=floor($diff_seconds/86400);

    $diff_hours=floor($diff_seconds/3600);
    $diff_minutes=floor($diff_seconds/60);

    echo "两个时间相差"."：".$diff_weeks."个星期，".$diff_days."天，".$diff_hours."小时，".$diff_minutes."分，". $diff_seconds."秒";
}
//示例: 2016年9月25日18时25分30秒 2017年1月4日20时36分15秒
diff_time(2016,8,25,18,25,30,2017,1,4,20,36,15);
*/

/**
 * 将具体时间日期转化为时间戳
 */
/*
echo mktime(10,25,25,10,25,2016);
echo "<hr>";
echo strtotime('20161025102525');
*/



/**
 * 求两个日期的时间差
 * 求2016.9.4 10:32:33 与2017.1.4 21:22:23
 * @param $start int 起始日期 20160904103233
 * @param $end int 结束日期  20170104212223
 * 注:也可以不用strtotime,用mktime()去转化时间戳,其他步骤一样
 */
/*
function diff_time($start,$end)
{
    $start=strtotime($start);
    $end=strtotime($end);
    //计算两个时间的时间戳
    $diff_seconds=$end-$start;
    //求相差多少个星期
    $diff_weeks=floor($diff_seconds/(24*60*60*7));
    //求相差多少天
    $diff_days=floor($diff_seconds/(24*60*60));
    //求相差多少小时
    $diff_hours=floor($diff_seconds/(60*60));
    //求相差多少分
    $diff_minutes=floor($diff_seconds/60);
    //输出结果
    echo "两个时间相差"."：".$diff_weeks."个星期，".$diff_days."天，".$diff_hours."小时，".$diff_minutes."分，". $diff_seconds."秒";
}
diff_time('20160904103233','20170104212223');
*/


/*
$start = 'last Friday';
$time1 = strtotime("$start + 1days");
echo date('Y-m-d  H:i:s',$time1);
*/


/*
$start = '20170430122531';
$end = '20180104224925';
//求两个时间戳的差
$diff_time = strtotime($end) - strtotime($start);
//求相差多少天
$diff_days = floor($diff_time/(24*60*60));
echo "两个时间相差".$diff_days."天";
*/




/**
 * 验证日期
 * checkdate()
 */
//var_dump(checkdate(12,32,2016));  //bool(false)


/**
 * 表单的种类
 *input文本域
 *
 */

/*
var_dump($_POST);
echo "<hr>";
var_dump($_FILES);
*/


/**
 * 处理文件上传
 * 在html页面上传文件到本方法所在php文件,在php文件中,调用方法即可(html页面中type为file的input name值为file
 * 如果想更改,本方法中$_FILES['file']也要对应更改
 */

//function upfiles(){
//    if ($_FILES['file']['error'] > 0) {
//        echo "Error:".$_FILES['file']['error']."<br />";
//    } else {
//        echo "<pre>";
//        print_r($_FILES['file']);
//        //将临时文件移动到永久文件
//        //判断文件是否是通过http post上传的
//        if(is_uploaded_file($_FILES['file']['tmp_name'])){
//            $upfile = $_FILES['file'];
//            //获取数组里的值
//            $name = $upfile['name'];
//            $tmp_name = $upfile['tmp_name'];
//            //移动上传文件到指定目录(这里用绝对路径,也可以用相对路径,但要注意在文件夹前加上网站根目录)
//           /* define('ROOT',dirname(__FILE__)); //E:\PHP\phpstudy\WWW\Project\kk
//            //对移动临时文件是否成功做判断
//            if(!move_uploaded_file($tmp_name,ROOT."\Upload\\".$name)){
//                echo "Error:移动文件失败,请确认文件名全为英文";
//            }*/
//            if(@!move_uploaded_file($tmp_name,"E:\PHP\phpstudy\WWW\Project\kk\Upload\\".$name)){
//                echo "Error:移动文件失败,请确认文件名全为英文";
//            }
//
//        }
//    }
//
//}
//upfiles();
//var_dump(__FILE__);
//var_dump(dirname(__FILE__));


/**
 * Class myclass
 * 静态属性(类属性)
 * 类内用self调用,类外使用类名调用
 */
/*
class myclass {
    static $staticVal = 10;
    function getStatic(){
        echo self::$staticVal;
        echo "<hr>";
        self::$staticVal++;
    }
}
echo myclass::$staticVal;//10
echo "<hr>";
$a = new myclass();
var_dump($a->getStatic());//null
*/



/**
 * 静态方法(类方法)
 *
 */
//class myclass{
//    static $staticVal = 10;
//    public $val = 100;
//
//    /**
//     * 获取类属性(静态属性 $staticVal)
//     */
//    static function getStaticVal(){
//        echo self::$staticVal;
//    }
//
//
//    /**
//     * 类内调用类属性,并对类属性进行改变
//     */
//    static function changeStaicVal(){
//        self::$staticVal++;
//        echo self::$staticVal;
//
//    }
//
//
//}
//
//myclass::getStaticVal();//10
//myclass::changeStaicVal();//11



/**
 * 文件名操作
 * basename()
 */
/*
echo __FILE__; //E:\PHP\phpstudy\WWW\Project\kk\index.php
echo "<hr>";
$a = basename(__FILE__,".php");
echo $a;  //index
*/



/**
 * 构造方法
 * 创建对象时自动调用的方法
 * __construct
 * 构造方法常用的场景是在创建对象时给变量赋值
 */

//class yourclass{
//
//    public $name;
//    public $age;
//
//    /**
//     * yourclass constructor.
//     * 构造方法
//     * 创建对象时自动调用此方法
//     */
//    function __construct($name,$age)
//    {
//        $this->name = $name;
//        $this->age = $age;
//    }
//
//    /**
//     * 析构方法
//     * __destruct
//     * 析构方法是在对象被销毁前自动执行的方法
//     *
//     */
//    function __destruct()
//    {
//
//
//    }
//
//}
//
//$a = new yourclass('xiaoming',25);
//echo $a->name;



/**
 * 封装和继承
 * public 任何地方都可以调用
 * protected 本类和子类中可以被调用
 * private 只有本类可以调用
 */


/**
 * 封装,就是将类中的成员属性和方法内容细节尽量隐藏起来,确保类外部代码不能随意访问类内内容
 */

/**
 * 继承
 * extends
 */

/**
 * 多态
 * 多态,通过继承,复用代码实现 可编写出健壮可扩展的的代码 减少流程控制语句的使用
 * 在运行时,根据传递的对象参数,决定调用不用的方法
 */


/**
 * 回顾函数总结:
 * 函数的三个特性:封装,继承,多态
 * 封装:将函数的成员属性成员方法内容细节尽可能隐藏起来,确保类外部代码不能随意访问类中内容
 * 继承:一个类作为公共基类,其他类继承这个类,则其他类都具有这个类的属性和方法
 * 多态:通过继承复用代码而实现 运行时根据传递的参数对象,决定调用哪一个对象的方法
 */


/**
 * 魔术方法
 * php提供了内置的拦截器,他可以'发送'到未定义方法和属性的消息
 * __set()  __get() __isset() __unset() __call()  __toString()
 *
 */



/**
 * __set()
 * 在代码要给未定义的属性赋值时调用,或在类外部修改被private修饰的类属性时被调用
 * 它会传递两个参数;属性名和属性值
 * 通过__set()方法也可以实现对private关键词修饰的属性值进行更改
 */


/**
 * __get()
 * 当在类外部访问被private或proteced修饰的属性或访问一个类中原本不存在的属性时被调用
 */


/**
 * __isset()
 * 当在类外部对未定义的属性或者非公有属性使用isset()函数时,__isset()将会被调用
 */

//注:结合 property_exists() property_exists()用来检测类中是否定义了该属性
//用法:property_exists('magic',$key)  检测在magic类中是否定义了$key属性

/**
 * __unset()
 * 对类中未定义的属性或非公有属性进行unset()操作时,将会触发__unset()方法.
 * 如果属性存在,unset操作会销毁这个属性,释放该属性在内存中占用的空间
 * 再用对象访问这个属性时,将会返回NULL
 */

/**
 * __call()
 * 当试图调用不存在的方法时会触发__call()
 * __call()有两个参数,即方法名和参数,参数以索引形式存在
 */

//class magic{
//    function __call($func,$param)
//    {
//        echo "$func method not exists";
//        var_dump($param);
//    }
//}
//$obj = new magic();
//$obj-> register('param1','param2','param3'); //实例化的对象调用不存在的register()方法


/*
 * 浏览器结果显示:
 * register method not exist
   sarray(3) {
   [0]=>
   string(6) "param1"
   [1]=>
   string(6) "param2"
   [2]=>
   string(6) "param3"
  }
 */


/**
 * toString()
 * 当使用echo或print打印对象时会被调用__toString()方法将对象转化为字符串
 */
/*
class magic{
    function __toString()
    {
       return 'when you want to echo or print the object, __toString() will be called';
    }
}

$obj = new magic();
print $obj; //浏览器显示 when you want to echo or print the object, __toString() will be called
*/




/**
 * 自动加载
 * __autoload()
 * 当在代码尝试加载未定义的类时会触发__autoload()函数
 * 用法简单示例:
 */
//假设有两个文件为myclass.php和yourclass.php,另外,在同一目录下写一个autoload.php文件,代码如下

//////////////////////中间代码不起作用,不用解除注释/////////////////////////
//myclass.php代码
/*
 class myclass{
    function myname(){
        echo "My Name Is xiaobudiu";
    }
}

//yourclass.php代码
class yourclass{
    function yourname(){
        echo "Your Name Is pgone";
    }
}
*/
/////////////////////中间代码不起作用,不用解除注释////////////////////////////////
/*
//autoload.php代码
function __autoload($name){
    if(file_exists($name.".php")){
        require_once $name.'php';
    }else{
        echo "The Path Is Error";
    }
}
$my = new myclass();
$my -> myname();
$your = new yourclass();
$your -> yourname();
*/



/**
 * 自动加载
 * spl_autoload_register(),和__autoload()方法功能相似,实现自动加载二选其一即可
 * 可以实现自动加载以及注册给定的函数作为__autoload()的实现
 * 两个参数 第一个参数autoload_function为要注册的自动装载函数,第二个参数throw为布尔值,true为默认,抛出异常;false不抛出异常
 * 实例:假设当前目录下存在myclass.php和yourclass.php,并且代码和上面一样,autoload.php代码进行更改
 */
/*function my_autoloader($class){
    include $class.'.php';
}
spl_autoload_register('my_autoloader');
$my=new myclass();
$my->myname();
$your=new yourclass();
$your->yourname();*/
//此时运行autoload.php 执行结果 My Name Is xiaobudiu Your Name Is pgone



/**
 * 抽象类
 * abstract
 * 一种对下级代码的规范
 * 抽象类和接口都是不能被实例化的特殊类
 * 可以在抽象类和接口中保留公共的方法,将抽象类和接口作为公共的基类
 * 一个抽象类必须至少包含一个抽象方法,抽象类中的方法不能被定义为私有的(private),因为抽象类中的方法需要被子类覆盖
 * 同样抽象类中的方法也不能用final修饰,因为其需要被子类继承
 * 抽象类中的抽象方法不包括方法实体.如果一个类中包含了一个抽象方法,那么这个类也必须声明为抽象类
 * 抽象方法不实现具体的功能，由子类来完成
 * 子类必须实现抽象类中的所有方法,否则会报错
 *
语法:
abstract class class_name{
abstract public function func_name1(arg1,arg2);
abstract public function func_name2(arg1,arg2,arg3);
}
 *
 */


//示例:计算矩形的周长

/*
 abstract class Shape {
    abstract protected function get_area();
//和一般的方法不同的是，这个方法没有大括号
//你不能创建这个抽象类的实例：$Shape_Rect = new Shape();
}
class Rectangle extends Shape
{
    private $width;
    private $height;

    function __construct($width = 0, $height = 0)
    {
        $this->width = $width;
        $this->height = $height;
    }

    function get_area()
    {
        echo ($this->width + $this->height) * 2;
    }
}
$Shape_Rect = new Rectangle(20,10);
$Shape_Rect->get_area();
*/



/**
 * 接口
 * interface
 * 一种对下级代码的规范
 * 与抽象类不同,一个子类可以继承自多个接口,接口之间用','隔开,
 * 接口实现了php的多重继承
 * 接口需要被继承,所以接口中定义的方法不能为私有方法或被final修饰
 * 接口中定义的全部方法都必须被子类实现,并且不能包含实体
 *
 */
//示例:定义database接口
/*
interface Database{
    function connect($host,$username,$pwd,$db);
    function query($sql);
    function fetch();
    function close();
    function test();
}

class mysql implements Database {

    protected $conn;
    protected $query;

    function connect($host, $username, $pwd, $db)
    {
        $this->conn = new mysqli($host,$username,$pwd,$db);
    }

    function query($sql)
    {
        return $this->conn->query($sql);
    }

    function fetch()
    {
        return $this->query->fetch();
    }

    function close()
    {
        $this->conn->close();
    }

    function test()
    {
        echo "test";
    }
}
*/




//类中的关键字

/**
 * final
 * 子类可覆写父类中的方法,但是在有些时候并不希望父类中的方法被重写,这时只要在父类中的方法前加上final控制符,
 * 该方法便不能被子类重写,否则会报错
 */

//错误示范:
/*
 class father{
    final function test(){
        echo "My Name Is xiaobudiu";
    }
}

class son extends father{
    function test(){
        echo "My Name Is PGone";
    }
}
*/
//执行程序,浏览器会报错 Fatal error: Cannot override final method father::test()


/**
 * clone
 * 可通过clone关键字克隆一个对象,克隆后的对象相当于在内存中重新开辟了一个空间
 * 克隆得到的对象拥有和原来对象相同的属性和方法
 * 修改克隆得到的对象不会影响到原来的对象
 */
//示例:
/*
class father{
    public $name='xiaobudiu';
    function test(){
        echo "test";
    }
}
$obj = new father();
$obj_clone = clone $obj;
$obj_clone->name = 'PGone';
echo $obj_clone->name; //PGone
echo $obj->name //xiaobudiu
*/
///////////////////////////////////////////
//注:如果使用"="将一个对象赋给一个变量,那么得到的将是一个对象得引用,通过这个变量改变属性的值将会影响原来的对象
//示例:
/*
class father{
    public $name = 'xiaobudiu';
    function test() {
        echo "test";
    }
}
$obj = new father();
$obj_clone = $obj;
$obj_clone->name = 'PGone';
echo $obj->name,$obj_clone->name;
//PGonePGone
*/



/**
 * __clone()
 * 可以使用__clone()魔术方法将克隆后的副本初始化
 * 可以理解为当对象被克隆时自动调用这个方法
 */

//示例:
/*
class father{
    public $name = 'xiaobudiu';
    function test(){
        echo "test";
    }

    function __clone(){
        echo "hi,shuaige";
        $this->name = 'PGone';
        //当克隆对象时,克隆后的对象得到的将是此处的name属性值
    }
}
$obj = new father();
$obj_clone = clone $obj; //触发__clone()方法 //hi,shuaige
echo $obj->name,$obj_clone->name;//xiaobudiuPGone
*/



/**
 * instanceof关键字
 * instanceof可以检测对象属于哪个类
 * 也可以用于检测生成实例的类是否继承自某个接口
 */
//示例:
/*
class father {
    public $name = 'xiaobudiu';
    function test(){
        echo "test";
    }
}

interface Database {
    function test();
}

class mysql implements Database{
    function test(){
        echo "test";
    }
}

$obj = new father();
$mysql = new mysql();
var_dump($obj instanceof father);
var_dump($mysql instanceof Database);
var_dump($obj instanceof Database);
//bool(true) bool(true) bool(false)
*/



/**
 * 正则表达式
 * php中有两套函数库支持正则表达式
 * PCRE(Perl Compatible Regular Expression)库提供,与Perl语言兼容的正则表达式函数,以"preg_"为函数的前缀名称
 * POSIX(Portable Operating System Interface)扩展语法正则表达式函数,以"ereg_"为函数的前缀名称
 * PCRE的执行效率高于POSIX
 */

/**
 * 普通字符
 * 如 'A','B','C'等
 */

/**
 * 元字符
 * 分为单字元字符和多字元字符
 * 如;\d 与数字字符相匹配
 */

/*单字符元字符
//* 零次或多次匹配前面的字符或表达式    zo* 与"z"和"zoo"匹配  {0,}
//+ 一次或多次匹配前面的字符或表达式    zo+ 与"zo"和"zoo"匹配,但与"z"不匹配  {1,}
//? 零次或一次匹配前面的字符或表达式    zo? 与"z"和"zo"匹配,但与"zoo"不匹配  {0,1}
//^ 匹配搜索字符串开始的位置    ^\d{3} 与搜索字符串开始处的3个数字匹配
//^ 如果将^用作括号表达式的第一个字符,就会对字符集求反 比如: [^abc] 匹配除abc以外的任何字符
//$ 匹配搜索字符串结尾的位置    \d{3}$ 与搜索字符串结尾处的3个数字匹配
//. 匹配除换行符\n之外的任何单个字符   a.c与"abc","alc"和"a-c"匹配
//. 若要匹配包括\n在内的任意字符,可以使用[\s\S]之类的模式(\s \S属于'非打印字符')
//[] 标记括号表达式的开始和结尾  [1-4]与"1","2","3","4"匹配  [^aeiouAEIOU]与任何非元音字符匹配
//{} 标记限定符表达式的开始和结尾   a{2,3}与"aa"和"aaa"匹配
//() 标记子表达式的开始和结尾,可以保存子表达式,以备将来之用   A(\d)与"A0"至"A9"匹配
//|  指示在两个或多个选项之间进行选择   z|food 与"z"或"food"匹配; (z|f)ood与"zood"或"food"匹配
///  表示JScript中的文本正则表达式模式的开始或结尾.在第二个"/"后添加单字符标志可以指定搜索行为
///  /abc/gi 是与"abc"匹配的JScript文本正则表达式.g(全局)标志指定查找模式的所有匹配项,i(忽略大小写)标志使搜索不区分大小写
//\  转义字符 \\与"\"匹配, \(与"("匹配, \n与换行符匹配
*/

/*多字符元字符
\b 与一个字边界匹配(即字与空格间的位置) er\b与"never"中的"er"匹配,但与"verb"中的"er"不匹配
\B 与非边界字匹配  er\B与"verb"中的er匹配,但与"never"中的er不匹配
\d 与数字字符匹配,等效于[0-9]  \d{2}与"12 345"中的"12"和"34"匹配
\D 与非数字匹配,等效于[^0-9]   \D+与"abc123 def"中的'abc"和"def"匹配
\w 与a-z,A-Z,0-9,和下划线中的任意字符匹配   在"my name is xiaobudiu..."中，\w与"my","name","is","xiaobudiu"匹配
\W 与除a-z,A-Z,0-9,和下划线中的任意字符匹配 等效于[^a-zA-Z0-9]
[xyz] 字符集,与任何一个指定字符匹配  [abc]与"plane"中的a匹配
[^xyz] 反向字符集,与未指定的任何字符匹配
[a-z] 字符范围,匹配指定范围内的任何字符
[^a-z] 反向字符范围,与不在指定范围内的任何字符匹配
{n} 正好匹配n次,n是非负整数 o{2}与'Bob'中的"o"不匹配,但与"food"中的"oo"匹配
{n,} 至少匹配n次,n是非负整数 o{2,}与'Bob'中的'o'不匹配,但与"fooood"中的所有"o"匹配
{n,m} 匹配至少n次,至多m次   在搜索字符串"1234567"中,\d{1,3}与"123","456"和"7"匹配
(模式) 与模式匹配并保存匹配项  (Chapter|Section) [1-9]与"Chapter 5"匹配,保存"Chapter"以备将来之用
(?:模式) 与模式匹配,但不保存匹配项以备将来之用  industr(?:y|ies)与industry|industries相等
*/


/*非打印字符
\f 换页符
\n 换行符
\r 回车符
\t Tab字符
\v 垂直制表符
\s 任何空白字符,包括空格,制表符,换页符 等效于[\f\n\r\t\v]
\S 任何非空白字符  等效于[^\f\n\r\t\v]
*/

//////////////////////////////正则表达式正式部分//////////////////////////////
/**
 * php中使用正则表达式
 *
 * 匹配与查找
 * preg_match()
 * preg_match_all()
 * preg_grep()
 *
 * 搜索与替换
 * preg_replace()
 * preg_filter()
 *
 * 分割与转义
 * preg_split()
 * preg_quote()
 */

/**
 * 匹配与查找
 * preg_match
 * 返回int
 * 语法: preg_match($pattern,$subject [array & $matches[,$flags=0 [,$offset=0]]])
 * pattern是要搜索的模式,例如'/^def/';
 * subject是指定的被搜索的字符串
 * 它的值是0或1,在匹配一次后就会停止搜索
 */

/*
$subject="abcdefghijkdef";
$pattern_1='/def/';
$num=preg_match($pattern_1,$subject);
var_dump($num);
*/
// int(1)

/**
 * 匹配与查找
 * preg_match_all()函数
 * 返回int
 * 与preg_match功能相似,只不过在搜索到一次结果之后会继续搜索,知道末尾
 */

/**
 * 匹配与查找
 * preg_grep()函数
 * 返回array
 * 可返回匹配模式的数组条目
 */
/*
//代码示例:
$subject = ['abc','def','efg','hijk','abcdef','defabc'];
$pattern = '/def$/';
$grep_1 = preg_grep($pattern,$subject);//返回与$pattern匹配的元素组成的数组
var_dump($grep_1);
$grep_2 = preg_grep($pattern,$subject,PREG_GREP_INVERT);//返回与$pattern不匹配的元素组成的数组
var_dump($grep_2);
*/

/*
//浏览器显示:
 array(2) {
  [1]=>
  string(3) "def"
  [4]=>
  string(6) "abcdef"
}
array(4) {
  [0]=>
  string(3) "abc"
  [2]=>
  string(3) "efg"
  [3]=>
  string(4) "hijk"
  [5]=>
  string(6) "defabc"
}
*/

/**
 * 搜索与替换
 * preg_replace()
 * 返回替换之后的字符串
 * 三个参数,第一个参数:$pattern 搜索模式(规则) 可以是一个字符串或字符串数组
 * 第二个参数:$replacement 用于替换的字符串或字符串数组
 * 第三个参数:$subject 要进行搜索和替换的字符串或字符串数组
 * limit 每个模式在每个subject上进行替换的最大次数 默认-1(无限)
 * count 如果指定,就会被填充为完成的替换次数
 */
/*
$string_1 = 'lily likes apple,no reason';
$pattern_1 = ['/lily/','/likes/','/apple/'];
$replacement_1 = ['tom','hates','orange'];
echo preg_replace($pattern_1,$replacement_1,$string_1); //tom hates orange,no reason
$arr = ['lily likes apple,no reason','Tom hates orange,no reason'];
$pattern_2 = ['/no/','/reason/'];
$replacement_2 = ['why','?'];
var_dump(preg_replace($pattern_2,$replacement_2,$arr)); //array(2) { [0]=> string(22) "lily likes apple,why ?" [1]=> string(22) "Tom hates orange,why ?" }
*/

/**
 * 搜索与替换
 * preg_filter()
 * 与preg_replace()功能相似
 * preg_filter()只返回执行替换的元素(替换后的)(没执行替换的不返回)
 * 而preg_replace()返回全部元素(替换后的)(替没替换都返回)
 */


/**
 * 分割
 * preg_split
 * 通过一个正则表达式分割字符串
 * array preg_split($pattern $subject[,$limit=-1 [,$flag=0]])
 * $patern  用于搜索的模式(规则)
 * $subject 输入字符串
 * $limit 如果指定,就将限制分隔得到的子串最多只有limit个,返回的最后一个子串将包含所有剩余部分 limit为-1,0,null时都代表不限制
 */
//示例:

//$subject = "I LIKE  APPLE,AND YOU";
//$patern = '/[\s,]+/';
//var_dump(preg_split($patern,$subject));

/*
 array(5) {
  [0]=>
  string(1) "I"
  [1]=>
  string(4) "LIKE"
  [2]=>
  string(5) "APPLE"
  [3]=>
  string(3) "AND"
  [4]=>
  string(3) "YOU"
}
 */



/**
 * 转义
 * preg_quote()
 * 函数转义正则表达式
 * preg_quote($str [,$delimiter])
 * $str 函数会向字符串中的每一个特殊字符前增加一个反斜线
 * 如果指定了$delimiter,则在指定的$delimiter前也加反斜线
 * 正则表达式特殊字符包括  . \ + * ? [ ? ] $ ( ) {  } = ! < > | : -
 */
//示例:
/*
$keywords = "$40 for \a g3/400*10/x";
$keywords = preg_quote($keywords,'x');
echo $keywords; //\$40 for \\a g3/400\*10/\x
*/


/**
 * 异常处理
 * php自带的Exception异常类
 */

/*error_reporting(0);//设置错误级别为0,不报错
function theDatabaseObj() {
    $mysql = mysqli_connect('127.0.0.1','root2','root');
    if($mysql){
        return $mysql;
    }else{
        throw new Exception("could't connect to the database,try again");
    }

}

function db(){
    try{
        $db = theDatabaseObj();
        var_dump($db);
    }
    catch (Exception $e){
        echo $e->getMessage();
//        echo $e->getCode();
//        echo $e->getLine();
    }
}

db();*/


/**
 * 创建自己的异常类
 *
 */
/*class aException extends Exception{
    function aEX(){
        return "This is the bad way";
    }
}
class aaa {
    function a() {
        if (2<1) {
            echo "wrong";
        } else {
            throw new aException('你错了,太笨了le');
        }
    }

    function b() {
        try{
           $b = $this->a();
            var_dump($b);
        }catch (Exception $E) {
            echo $E->getMessage();
        }
    }
}

$obj = new aaa();
$obj->b();*/

//实现的功能,调用exception异常处理
/*function aaa(){
    if($_GET['name'] == 'xiaobudiu'){
        return "尊贵的管理员,请登录";
    }else{
        throw new Exception('你没有权限登录');
    }
}

function upload() {
    try{
        $upload = aaa();
        var_dump($upload);
    }catch (Exception $e) {
        echo $e->getMessage();
    }
}
upload();*/


/**.
 * php7中的错误处理
 * 大多数错误开始被当做Error异常抛出,而不是Exception异常
 * catch($Error $e)
 */
/*try {
    $a = new zoo();
}catch (Error $E){
    echo "error_msg:".$E->getMessage();
}*/
//error_msg:Class 'zoo' not found
//注:这种Error异常处理方式只适用于php7,php5版本还是要用Exception异常类来处理错误及异常


/////////////////////////////////图像处理////////////////////////////
/**
 * 图像处理
 * 图像处理要求GD库
 */
//使用函数查看一下当前安装没有GD库
//echo "<pre>";
//var_dump(get_loaded_extensions());

/**
 * 取得图像大小
 * getimagesize()
 * 返回图像的尺寸以及文件类型
 */
//print_r(getimagesize('./Upload/IGS09651F94M.jpg'));

/*浏览器结果
Array
(
    [0] => 740 //宽度像素值
    [1] => 1166 //高度像素值
    [2] => 2 //图像标记,gif是1,jpg是2,png是3,swf是4,psd是5....
    [3] => width="740" height="1166" //文本字符串
    [bits] => 8 //每种颜色的位数
    [channels] => 3 //RGB图像是3,CMVK图像是4
    [mime] => image/jpeg
)
 */

/**
 * getimagesizefromstring()
 * 从字符串中获取图像尺寸信息
 * 与getimagesize()函数的参数和返回结果相同,区别是getimagesizefromstring()的第一个参数是图像数据的字符串表达,而不是文件名
 */
//$img = file_get_contents('./Upload/IGS09651F94M.jpg');
//var_dump(getimagesizefromstring($img));


/*浏览器结果:
 array(7) {
  [0]=>
  int(740)
  [1]=>
  int(1166)
  [2]=>
  int(2)
  [3]=>
  string(25) "width="740" height="1166""
  ["bits"]=>
  int(8)
  ["channels"]=>
  int(3)
  ["mime"]=>
  string(10) "image/jpeg"
}
 */

/**
 * imagesx,imagesy
 * 取得图像的宽度和高度
 */
/*$img = imagecreatetruecolor(300,200);
echo imagesx($img);//300
echo imagesy($img);//200*/

/**
 * 图像绘制
 * imagecreate(),可创建一个基于调色板的图像
 * 与imagecreateturecolor()作用和参数相同
 * 返回一个图像标识符,代表了一幅大小为x_size和y_size的空白图像
 * 1.创建画布
 * 2.在画布上绘制图形
 * 3.保存并输出结果图像
 * 4.销毁图像资源
 */

/*
//创建一个空白画布,并输出一个png格式的图片
header("Content-type:image/png");//设置mime类型
$image = @imagecreate(120,30) or die("Cannot Initialize new GD image stream"); //创建画布

$background_color = imagecolorallocate($image,255,255,0);//定义颜色

imagepng($image);//输出png格式图像

imagedestroy($image);//销毁图像资源,释放内存
*/

/**
 * 定义颜色
 * imagecolorallocate()
 * 给图像的边框背景和文字等元素指定颜色
 * 返回一个标识符,代表由给定的RGB成分组成的颜色
 * 与imagecolorallocate()功能相似的第一个函数是imagecolorallocatealpha(),区别在于后者多了一个透明度参数0-127 127表示完全透明
 */

/**
 * 绘制椭圆
 * imageellipse()
 */
//新建一个空白的图像
/*
$image = imagecreatetruecolor(400,300);
//填充背景色
$bg = imagecolorallocate($image,255,255,255);
//选择椭圆的颜色
$col_ellipse = imagecolorallocate($image,55,55,255);
//画一个椭圆
imageellipse($image,200,150,300,200,$col_ellipse);
//输出图像
header("Content-type:image/png");
imagepng($image);
*/

/**
 * 将文字写入图像
 * imagefttext()
 */

//echo "<img src=code.php>";//生成图片


////////////////////////////////////目录文件操作//////////////////////////////////
/**
 * 判断文件类型
 * filetype()
 * 返回文件的类型.可能值有fifo,char,dir,block,link,file和unknown,出错返回false
 */
//echo filetype('code.php');//file
//echo filetype('./Public');//filedir


/**
 * 判断是否是一个目录
 * is_dir()
 */
//var_dump(is_dir('Upload'));//bool(true)
//var_dump(is_dir('index.php'));//bool(false)
//var_dump(is_dir('Upload/aa.jpg'));//bool(false)


/**
 * 创建目录
 * mkdir()
 * 创建成功返回true recursive值为true时,表示允许递归创建目录
 */
/*/
error_reporting(0);
function mkd($name){
    if (file_exists($name)) {
       echo "file already exists";
    } else {
        try{
            mkdir($name,0777,true);
            echo "创建成功";
        }catch (Exception $e){
            throw new Exception('创建目录失败,请核查后重试');
        }
    }
}
mkd('./aa/bb');
*/

/**
 * 删除目录
 * rmdir
 * 尝试删除dir所指定的目录.该目录必须为空,并且要拥有相应权限
 */
/*
error_reporting(0);
$dir = './aa/bb';
if (rmdir($dir)) {
    echo "Remove Dir Successfuly";
} else {
    die('failes to delete folders...');
}
//注:只能删除一个文件夹,例如$dir中的'./aa/bb',就只删除了一个bb文件夹,aa仍在
*/



/**
 * scandir
 * 列出指定路径中的文件和目录
 * 第二个参数shorting可选,设为1,即按字母降序,默认升序
 *
 */
//$dir = './';
//$dir1 = scandir($dir,1);
//var_dump($dir1);
/*
array(16) {
  [0]=>
  string(9) "test.html"
  [1]=>
  string(11) "option.html"
  [2]=>
  string(11) "indexx.html"
  [3]=>
  string(9) "index.php"
  [4]=>
  string(5) "index"
  [5]=>
  string(11) "favicon.ico"
  [6]=>
  string(8) "code.php"
  [7]=>
  string(2) "aa"
  [8]=>
  string(6) "Upload"
  [9]=>
  string(6) "Public"
  [10]=>
  string(5) "2.css"
  [11]=>
  string(5) "1.php"
  [12]=>
  string(5) "1.css"
  [13]=>
  string(5) ".idea"
  [14]=>
  string(2) ".."
  [15]=>
  string(1) "."
}
 */

/**
 * dirname()
 * 返回路径中的目录部分
 */
//echo dirname('./Public/favicon.ico'); // ./Public

/**
 * 查看磁盘空间
 * disk_free_space(); 返回磁盘分区可用字节数
 * disk_total_space();返回磁盘分区总容量
 */

//echo disk_total_space('/');//191392714752

/**
 * 打开文件
 * fopen()
 * 有参数r,r+,w,w+,a,a+,x,x+,c,c+
 */

/**
 * 读取文件
 * fgets()
 * 第一个参数表示资源
 * 第二个参数表示读取多少字节,默认1kb(1024字节)
 */
/*
$file = fopen("code.php", "r");
//输出文本中所有的行，直到文件结束为止。
//feof() 函数检测是否已到达文件末尾 (eof)。
//如果文件指针到了 EOF 或者出错时则返回 TRUE，否则返回一个错误（包括 socket 超时），其它情况则返回 FALSE
while(! feof($file))
{
    echo fgets($file). "<br />";
}

fclose($file);
*/
/*
//要求:读取code.php中所有行数内容
//打开文件
$file = fopen('code.php',"r");
//读取文件
while(!feof($file)){//只要不读到末尾,就输出本行
   echo fgets($file)."<br>";
}
fclose($file);
*/

/**
 * 获取文件上次访问的时间
 * fileatime()
 */
/*
$file = 'code.php';
if(file_exists($file)){
    echo $file."上次访问的时间是".date("Y-m-d H:i:s",fileatime($file));
}else{
    echo "您所访问的文件不存在,请核查后重新操作";
}
//code.php上次访问的时间是2018-01-08 00:17:28
*/

/**
 * 获取文件上次被修改的时间
 * filemtime()
 */
/*
$file = "code.php";
if(file_exists($file)){
    echo $file."上次修改的时间为".date("Y-m-d H:i:s",filemtime($file));
}else{
    echo "您所访问的文件不存在,请核查后重新操作";
}
//code.php上次修改的时间为2018-01-08 00:17:28
*/

/**
 * filesize()
 *获取文件的大小
 * 返回文件大小的字节数
 */
//echo filesize('./code.php');//1937

/**
 * filetype()
 * 返回文件的类型
 */
//echo filetype('./code.php');//file

/**
 * stat()
 * 给出文件的详细信息
 * 能返回上次访问,上次修改,文件大小等各种信息
 */
//var_dump(stat("./code.php"));
/*
 array(26) {
  [0]=>
  int(4)
  [1]=>
  int(0)
  [2]=>
  int(33206)
  [3]=>
  int(1)
  [4]=>
  int(0)
  [5]=>
  int(0)
  [6]=>
  int(4)
  [7]=>
  int(1937)
  [8]=>
  int(1515341848)
  [9]=>
  int(1515341848)
  [10]=>
  int(1515334800)
  [11]=>
  int(-1)
  [12]=>
  int(-1)
  ["dev"]=>
  int(4)
  ["ino"]=>
  int(0)
  ["mode"]=>
  int(33206)
  ["nlink"]=>
  int(1)
  ["uid"]=>
  int(0)
  ["gid"]=>
  int(0)
  ["rdev"]=>
  int(4)
  ["size"]=>
  int(1937)
  ["atime"]=>
  int(1515341848)
  ["mtime"]=>
  int(1515341848)
  ["ctime"]=>
  int(1515334800)
  ["blksize"]=>
  int(-1)
 */

/**
 * 复制文件
 * copy()
 * 第一个参数是resource,第二个参数dist表示复制到哪里
 */
/*
$file = './code.php';
$newfile = 'aa/code2.php';
if (copy($file,$newfile)){
    echo "复制文件".$file."到".$newfile."成功";
}else{
    echo "复制文件".$file."失败";
}
*/

/**
 * 删除文件
 * unlink()
 */
/*
$file = './aa/code2.php';
if(unlink($file)){
    echo "删除文件".$file."成功";
}else{
    echo "删除文件失败";
}
*/

/**
 *移动或重命名文件
 * rename()
 */
/*
error_reporting(0);
if(rename('2.php','1.php')){
    echo "文件重命名成功";
}else{
    echo "Rename Failed";
}
*/

/**
 * 文件指针
 * 可以实现文件指针的定位和 查询,从而实现所需信息的快速查询
 * rewind() 将文件位置指针设为文件流的开头
 * fseek()  在文件指针中定位
 * ftell()  返回文件指针读写的位置
 */
/*
$file = "./code.php";
$file = fopen($file,"r");
echo ftell($file);
*/

///////////////////////////////////////COOKIE 及 SESSION///////////////////////////
/**
 * COOKIE
 * 一种存储在客户端的数据,能存储cookie的客户端不只是浏览器,但绝大多数都是由浏览器来实现的
 * 浏览器通过HTTP协议和服务端进行Cookie交互
 * 在实现过程中,编程语言是通过指令通知浏览器,然后是浏览器实现设置Cookie的功能的
 * 读取cookie则是通过浏览器请求服务端时携带的HTTP头部中的Cookie信息得来的
 */

/**
 * 设置cookie
 * setcookie()
 * 第一个参数name是必选参数,表示cookie名称
 * 第二个参数可选,value表示值
 * 第三个参数可选,expire表示cookie的有效时间,以秒为单位,不设置此值,浏览器关闭,cookie随之失效
 * 第四个参数可选,path,设置有效目录,设置为'/'表示当前目录下均可用,设置为'/aa'表示只有aa目录下可用
 * 第五个参数可选,domain,设置cookie的作用域名,默认在本域名下有效,比如设置为example.com表示在example域名下的所有子域名都有效
 * 第六个参数可选,secure,用来设置是否对Cookie进行加密传输,默认false,如果设置为true,则只有使用https时候才会设置Cookie
 * 第七个参数为true表示只能通过HTTP协议才能访问Cookie,意味着客户端javascipt不可以操作这个cookie,使用此参数可减少xss攻击的风险
 * 注:php和javascript都可以设置cookie,不同的是,php设置的cookie需要刷新页面后的下一次请求中才有效,而javascript设置的cookie在本次请求中就有效
 */

/**
 * cookie经常用来存储一些不敏感的信息,如用来防止刷票,记录用户名,限制重复提交等
 * 示例:限制重复提交
 * 原理:当用户第一次提交表单时,设置cookie有效时间1分钟,当再次提交时,判断cookie是否过期来限制用户的提交
 */

/**
 * Session设置
 * $_SESSION[key] = value
 * Session存储在服务器,本质上和Cookie没有区别,都是针对HTTP协议的局限性而提出的一种保持客户端和服务端间会话状态的机制.
 *
 */
//开启session会话
/*
session_start();
//设置session
$_SESSION['name'] = 'xiaobudiu';
session_id();
var_dump($_SESSION);
echo "<hr>";
var_dump($_COOKIE);
*/

//var_dump(get_loaded_extensions());
/**
 * 使用Redis存储Session
 * 对于大访问量的网站来说,会有许多客户端和服务端建立连接,就会生成许多session文件,由于session文件是存储在硬盘上的,因此每次
 * 服务器去读取这些session文件都要经过许多I/O操作.
 * PHP可以使用session_set_save_handle()函数自定义session保存函数(如打开,关闭,写入,读取等),如果想使用php内置的会话机制之外的方式,
 * 可以使用本函数.例如,可以自定义会话存储函数来将会话数据存储到数据库.函数参数说明如下:
 *
 */

///////////////////////Mysql数据库的使用//////////////////////////////
/**
 * 关系型数据库,数据以表格的形式出现
 * 每行为各种记录名称
 * 每列为记录名称所对应的数据域,许多的行和列构成一张数据表,许多的表构成一个数据库
 *
 */

/**
 * MYSQLi连接操作数据库
 *
 */
/**
 * Mysqli执行插入数据操作
 *
 */
/*
$db = new mysqli('localhost','root','root','test');
$sql = "insert into `user` (`username`,`email`) VALUES (?,?)";
//定义参数
$username = "xiaobudiu";
$email = "xiaobudiu163@126.com";
//预处理
$sm = $db->prepare($sql);
//绑定参数
$sm->bind_param('ss',$username,$email);
//执行语句
if($sm->execute()){
    echo "Insert Successfully";
}
$db->close();
*/

/**
 *MYSQLi查询数据
 */
/*
$db = new mysqli('localhost','root','root','test');
$sql = "select * from user where uid<4";
$re = $db->query($sql);
echo "<pre>";
while($arr = $re->fetch_assoc()){
    var_dump($arr);
}
//释放查询结果
$re->free();
//断开数据库连接
$db->close();
*/
/*
 array(3) {
  ["uid"]=>
  string(1) "1"
  ["username"]=>
  string(4) "kate"
  ["email"]=>
  string(12) "kate@126.com"
}
array(3) {
  ["uid"]=>
  string(1) "2"
  ["username"]=>
  string(5) "admin"
  ["email"]=>
  string(12) "admin@qq.com"
}
array(3) {
  ["uid"]=>
  string(1) "3"
  ["username"]=>
  string(4) "mary"
  ["email"]=>
  string(14) "mary@itcast.cn"
}
 */

/**
 * pdo连接操作mysql数据库
 */
/*
$dsn = 'mysql:dbname=test;host=127.0.0.1';
$user = 'root';
$pass = 'root';
try{
    $pdo = new PDO($dsn,$user,$pass);
//    var_dump($pdo);
}catch(PDOException $e){
    echo "Connection failed:".$e->getMessage();
}
*/
/*
//向数据表中插入数据
$dsn='mysql:dbname=test;host=127.0.0.1';
$user = 'root';
$pass = 'root';
//实例化pdo对象,连接数据库
$pdo = new PDO($dsn,$user,$pass);
//向数据库插入数据
$sql = "insert into user (`username`,`email`) VALUES ('xiaowangba','sandjdsa@163.com')";
$re = $pdo->exec($sql);
if($re) {
    echo "向数据库插入数据成功";
} else {
    var_dump($pdo->errorInfo());
}
*/

/**
 * 修改数据表数据
 */
/*
$dsn='mysql:dbname=test;host=localhost';
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);
$sql = "update user set username='wangxiaoping' where uid=8";
if($pdo->exec($sql)) {
    echo "修改数据成功";
} else {
    echo "<pre>";
    var_dump($pdo->errorInfo());
}
*/

/**
 * 删除数据表中的数据
 *
 */
/*
$dsn='mysql:dbname=test;host=127.0.0.1';
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);
$sql = "delete from user where uid=7";
if($pdo->exec($sql)) {
    echo "删除数据成功";
} else {
    var_dump($pdo->errorInfo());
}
*/

/**
 * 查询数据表
 */
/**
$dsn='mysql:dbname=test;host=localhost';
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);
$sql = "select `username`,`email` from user where `uid` BETWEEN 2 AND 8";
//预处理
$re = $pdo->prepare($sql);
$re->execute();
$arrs = $re->fetchAll();
echo "<pre>";
var_dump($arrs);
 */


//////////////////////////////////////PHP 与 Redis///////////////////////////////////////
/**
 * 关系型数据库能满足编程中一般的存储查询需求,随着网站业务量的增加,我们还需要存储许多数据,并且要求能够很快的将数据查询出来,这时,关系型数据库mysql
 * 就会稍显吃力.
 * 当网站用户并发性非常高(高并发读写往往达到每秒上万次请求)时,对于传统关系型数据库来说,硬盘I/O是一个很大的瓶颈,因为mysql的数据存储是写入磁盘上的.
 * 同时,网站每天产生的数据量是巨大的,对于关系型数据库来说,在一张包含海量数据表中查询效率也是非常低的
 * 针对关系型数据库的不足,出现了很多NOSQL产品,这些数据库中很大一部分都是针对某些特定应用需求出现的,对于该类应用具有极高性能,依据结构化方法以及应用
 * 场合不同,主要分为以下几类:
 * 面向高性能并发读写的key-value数据库,主要特点是具有极高的并发读写性能.Redis,TokyoCabinet,Flare是这类数据库的代表
 * 面向海量数据访问的面向文档数据库,这类数据库的特点是可以在海量的数据中快速查询数据,典型代表为MongoDB和CouchDB
 * 面向可扩展性的分布式数据库,相对于传统数据库存在的可扩展性缺陷,这类数据库可以适应数据量的增加以及数据结构的变化
 */

/**
 * Redis是一个高级开源的key-value数据库存储系统.支持string,list,set,zset,hash 5种数据存储类型,支持对数据的多种操作,能够满足绝大部分业务需求.
 * Redis中的数据都是缓存在内存中的,比读取存储在硬盘上的数据速度要快很多.
 * Redis支持数据的持久化操作,可通过配置,周期性的将内存中的数据写入磁盘,提高了数据的安全性
 * Redis还支持主从同步,更好的解决了高并发的问题
 * Redis支持在Linux,Windows,MacOS系统中运行,但在实际应用场景中,推荐使用Linux系统.
 */


/**
 * 在Linux系统使用Redis
 * http://redis.io/   下载Redis安装包
 * Redis采用"主版本号,次版本号,补丁版本号"的命名规则.次版本号的位置,偶数表示稳定版本,如1.2  2.0 ，奇数表示测试版本,如2.9代表测试版本,n那么3.0将会是2.9.x的稳定版本
 *这里建议lnamp或者lnmp一键安装包
 * lnamp默认网站根目录 /data/wwwroot/default/index.php
 */

///////////////////////////XML///////////////////////
/**
 * 使用字符串生成xml
 *
 */
/*
header('Content-type:text/xml');
$xmlstr=<<<XML
<?xml version='1.0' standalone='yes'?>
<movies>
    <movie>
        <title>shanpaojincheng</title>
        <content>Two shan pao jin cheng</content>
    </movie>
    <plot>
        <name>演的不错</name>
    </plot>
</movies>
XML;
echo $xmlstr;
//注: <<<xml 作用:将"<<<xml"和最后的"xml"之间的内容转换成字符串;
*/
/*
<movies>
  <movie>
      <title>shanpaojincheng</title>
      <content>Two shan pao jin cheng</content>
  </movie>
  <plot>
      <name>演的不错</name>
  </plot>
</movies>
 */

/**
 * 使用数组循环遍历生成xml
 * 与使用字符串生成xml相比,数组生成xml则不用写那么多<>标签,轻松很多
 *
 */
/*
header('Content-type:text/xml');
echo '<?xml version="1.0" ?>'."\n";
echo "<books>\n";
$books = array(
    array(
        'bookname'=>'微信小程序开发实战与应用实例',
        'press'=>'清华大学出版社',
        'publishtime'=>'2016-07'
    ),
    array(
        'bookname'=>'一周微信公众号开发入门到精通',
        'press'=>'延安出版社',
        'publishtime'=>'2017-5'
    )
);
foreach($books as $book){
    echo "    <book>\n";
    foreach ($book as $tag=>$value){
        echo "    <$tag>".htmlspecialchars($value)."</$tag>\n";
    }
    echo "    </book>\n";
}
echo "</books>";
*/

/*
<books>
    <book>
        <bookname>微信小程序开发实战与应用实例</bookname>
        <press>清华大学出版社</press>
        <publishtime>2016-07</publishtime>
    </book>
    <book>
        <bookname>一周微信公众号开发入门到精通</bookname>
        <press>延安出版社</press>
        <publishtime>2017-5</publishtime>
    </book>
</books>
 */

/**
 * 通过PHP SimpleXML()解析xml,将字符串解析成对象,采用对象调用属性的方式获取值
 * SimpleXML()是用来处理XML最便捷的方案
 * 简化了与xml的交互,可以把元素转换成对象属性,位于标签之间的文本被指定给属性
 * 如果同一个位置上有多个同名元素,n那么这些元素会被放在一个列表中.元素的属性会被转换成一个数组元素,其中
 * 数组的键是属性名,键的值就是属性值
 */
//示例:
/*
$xmlstr=<<<XML
<?xml version="1.0" standalone='yes' ?>
<movies attr="qwe" ha="hahah属性值">
    <movie a="shiyanshuxing">
        <title tt="tt属性值">PHP从中阶进阶到大神</title>
        <characters>
            <character>
                <name age="22 years old" country="china">lixiaoming</name>
                <acter>onlivia actora</acter>
            </character>
            <character>
                <name>Mr.coder</name>
                <acter>xiaobudiu</acter>
            </character>
        </characters>
    </movie>
</movies>
XML;
$xml = simplexml_load_string($xmlstr);
var_dump($xml);//将字符串变成xml对象
echo $xml->movie->title;
echo ":";
echo $xml->movie->characters->character[0]->name;
//获取属性值
echo $xml->movie->title['tt']
*/


////////////////////////////////////////json的使用////////////////////////////////////////////
/**
 * json_encode() 将数组转换成json编码数据
 * json_decode() 对json格式的字符串进行解码
 * PHP作为一门服务端语言,常被用来写服务端接口逻辑,向客户端返回json格式的数据
 * 与xml相比,在很多语言中,json数据的处理都比xml数据的处理简单得多,json数据和数组可以实现非常方便的转换
 * 在包含同样信息的情况下,json数据字节数要比xml少很多
 * json这种便捷性和简洁性使其可以取代xml成为互联网信息的规范数据格式
 */

/**
 * json_encode() 将数组转换成json编码数据
 */
/*
echo "连续数组";
$a = array('foo','zoo','xiaoming','xiaodong');
var_dump(json_encode($a));
//连续数组string(35) "["foo","zoo","xiaoming","xiaodong"]"

echo "非连续数组";
$b = array(
    1=>'foo',
    2=>'zoo',
    3=>'XIAOMING',
    4=>'XIAODONG'
);
var_dump(json_encode($b));
//非连续数组string(51) "{"1":"foo","2":"zoo","3":"XIAOMING","4":"XIAODONG"}"

echo "删除一个连续数组值的方式产生的非连续数组";
unset($a[1]);
var_dump(json_encode($a));
//删除一个连续数组值的方式产生的非连续数组string(41) "{"0":"foo","2":"xiaoming","3":"xiaodong"}"

echo "二维数组";
$arr = array(
    array(
        'name'=>'xiaobudiu',
        'age'=>25,
        'sex'=>'man'
    ),
    array(
        'name'=>'PGone',
        'age'=>25,
        'sex'=>'woman'
    )
);
var_dump(json_encode($arr));
//二维数组string(81) "[{"name":"xiaobudiu","age":25,"sex":"man"},{"name":"PGone","age":25,"sex":"woman"}]"
*/


/**
 * json_decode()
 * 将json格式的字符串解码
 * 第二个参数可选,选择为true表示 将json字符串解码成数组
 * 第二个参数默认false,解码成对象object
 */
//$json = '{"0":"foo","2":"xiaoming","3":"xiaodong"}';
//var_dump(json_decode($json));
/*
object(stdClass)#1 (3) {
["0"]=>
  string(3) "foo"
["2"]=>
  string(8) "xiaoming"
["3"]=>
  string(8) "xiaodong"
}
*/
//var_dump(json_decode($json,true));
/*array(3) {
  [0]=>
  string(3) "foo"
  [2]=>
  string(8) "xiaoming"
  [3]=>
  string(8) "xiaodong"
}
*/

////////////////////////////MVC与Thinkphp框架///////////////////
/**
 * mvc 一种软件设计典范,用业务逻辑/数据/界面显示分离 的方法组织代码,将业务逻辑聚集到一个页面里面,使得各部分的代码做各自的事情,
 * 各个人员编写的代码负责特定的功能,降低了耦合度
 * 由mvc架构系统的程序执行流程:
 * controller截获用户发出的请求,调用model完成状态的读写操作
 * controller把数据传给view,view渲染最终效果并呈现给用户.
 * 另外,php经常用来写一些接口程序,提供接口返回特定格式的数据(一般是json),不同的客户端(网页前端,桌面客户端,手机客户端等)可通过调用接口
 * 获得数据.
 */

/**
 * 常用的php开源框架
 * ThinkPHP tp是为了简化企业级应用开发和敏捷Web应用开发而诞生.
 * Yii 用于开发大型web应用.基于组件的高性能php框架通过一个简单的命令行工具yiic可以快速创建一个web应用程序的代码框架.
 * CI 组件的导入和函数的执行只有在被要求执行的时候才执行,而不是在全局范围,因此默认的系统非常轻量级,为了达到最大的用途,每个类和它的功能都是高度自治的.
 * Laravel 一套简洁,优雅的php web开发框架
 * Yaf (yet another framework) 提供了bootstrap,路由,分发,视图,插件 ,是一个全功能的php框架
 */

/**
 * tp5支持使用composer安装
 *
 */

////////////////////设计模式/////////////////////////////
/**
 * 分为3大类:创建型模式,结构型模式,行为型模式,还有一种J2EE设计模式,共23种设计模式(设计模式-可复用的面向对象软件元素)
 * 工厂模式以及单例模式属于创建型模式.
 * 创建型模式的描述:这些设计模式提供了一种在创建对象的同时,隐藏创建逻辑的方式,而不是使用新的运算符直接实例化对象.
 * 这使得程序在判断针对某个给定实例需要创建哪些对象时更加灵活
 */
/**
 * 工厂模式
 * 工厂模式属于创建型模式,提供了一种创建对象的方式.
 * 工厂模式是先定义一个创建对象的接口,让其子类自己决定实例化哪一个工厂类.
 * 工厂模式的精髓就是可以根据不同的参数生成不同的类实例
 */
//示例:加减乘除工厂类实例
//定义接口
/*
interface Calc{
    public function getValue($num1,$num2);
}

//创建实现接口的实体类
class Add implements Calc {
    public function getValue($num1, $num2)
    {
       return $num1+$num2;
    }
}

class Sub implements Calc {
    public function getValue($num1, $num2)
    {
        return $num1-$num2;
    }
}

class Mul implements Calc {
    public function getValue($num1, $num2)
    {
        return $num1*$num2;
    }
}

class Div implements Calc {
    public function getValue($num1, $num2)
    {
       try {
           if($num2==0){
               throw new Exception('除数不能为0');
           }else{
               return $num1/$num2;
           }

       }catch (Exception $e){
           echo "错误信息:".$e->getMessage();
       }
    }
}
//创建一个工厂,生成基于给定信息的实体类的对象
class Factory{
    public static function creatObj($operate){
        switch ($operate){
            case '+':
                return new Add();
                break;
            case '-':
                return new Sub();
                break;
            case '*':
                return new Mul();
                break;
            case '/':
                return new Div();
                break;
        }
    }
}

$test=Factory::creatObj('-');
echo $test->getValue(1,4);
//注:其实想实现本功能,定义一个类,一个公共方法,方法里采用switch也可以实现本功能,但为了代码的可读性以及代码的执行效率,所以采用工厂类;
//注;这样,我们就实现了根据用户输入的操作符实例化相应的对象,进而完成接下来相应的操作.在软件开发中,php可能要链接mysql,也可能链接sqlserver.
//或者其他数据库,这样我们就可以定义一个工厂类,动态生成不同的数据库连接对象;
//再比如设计一个连接服务器的框架,需要三个协议,即pop3,imap,http,可以把这三个作为产品类,共同实现一个接口.工厂模式使用场景很多,需要在实
//际开发中尝试1应用
*/

/**
 * 单例模式
 * 单例模式涉及一个单一的类,该类负责创建自己的对象,同时确保只有单个对象被创建
 * 单例模式主要解决一个全局使用的类被频繁创建与销毁的问题
 * 由于只创建了一个类的实例,因此减少了内存的开销,节省了系统资源
 * php中,单例模式经常被用在数据库应用中.
 */
//代码示例:
/*
class Student{
    //私有的静态属性, 作用是为了存储对象的.
    private static $_instance=null;
    //私有的构造方法,保证不允许在类外 new
    private function __construct(){}
    //私有的克隆方法, 保证不允许在类外 通过 clone 来创建新对象
    private function __clone(){}
    //公有的静态方法, 作用,就是用来实例化对象
    public static function getIntance(){
        //将创建的新对象存储到静态属性中
        //判断静态属性中是否为空
        if(is_null(self::$_instance)){
            //如果为空,则创建新对象,并将新存储赋给静态属性$instance
            self::$_instance = new self;
        }
        //如果$instance不为空,则直接将对象返回
        return self::$_instance;
    }
}
//调用静态方法来创建对象
$obj = Student::getIntance();
$obj2 = Student::getIntance();//此行不再创建新对象
//var_dump($obj);
//var_dump($obj2);
*/


/**
 * 观察者模式
 * 一种事件系统.有两个类,a类和b类,a类允许b类观察,获取a类的状态,当a类状态发生改变的时候,b类可以收到通知,并作出相应的动作
 * 观察者模式提供了避免组件之间紧密耦合的另一种方法
 * 比如要实现用户注册后发送邮件通知管理员和用户自己填写的邮箱的功能,我们可以将发送邮件给管理员和用户自己都写在这个实现用户注册
 * 的类里(使用观察者实现),这样,即使在以后更改了用户注册逻辑也不会影响到发送邮件的功能实现
 * 再比如当用户下单购买一件商品时,我们需要将购买记录写入文本日志,数据库日志,还要发送短信,送抵兑换券积分等,我们可以在主体类中实
 * 现下单购买的流程并定义一个观察者接口,当用户下单后通知各个观察者对象执行自己的业务逻辑.
 */

//示例1
//观察者模式设计两个类
//男人类和女人类
//男人类对象 xiaoming 女人类对象 xiaohua mother
/*
class man{
    //定义数组属性,用于存放观察者对象
    protected $observers=[];
    //将传进来的观察者对象存入观察者数组中的方法
    function addObserver($observer){
        $this->observers[]=$observer;
    }
    //删除观察者的方法
    function delObserver($observer){
        //查找观察者在数组中的键值
        $key=array_search($observer,$this->observers);
        //根据键值删除对应观察者
        unset($this->observers[$key]);
    }

    //男人buy()方法
    function buy(){
        foreach ($this->observers as $girl){
            //当被观察者作出buy()这个行为时,让观察者得到通知,并作出相应的反应
            $girl->dongjie();
        }
    }
}

class woman{
    function dongjie(){
        echo "你的儿子或者男朋友正在花钱<br>";
    }
}
//创建被观察着对象
$xiaoming = new man();
//创建观察者对象
$xiaohua = new woman();
$mother = new woman();
//为xiaoming添加观察者
$xiaoming->addObserver($mother);
$xiaoming->addObserver($xiaohua);
//$xiaoming->delObserver($xiaohua);
//xiaomign执行buy()之后,看观察者xiaohua和mother是否能得到通知,并作出相应反应
$xiaoming->buy();
*/

//示例2:
/**
 * 场景描述：
 * 哈票以购票为核心业务(此模式不限于该业务)，但围绕购票会产生不同的其他逻辑，如：
 * 1、购票后记录文本日志
 * 2、购票后记录数据库日志
 * 3、购票后发送短信
 * 4、购票送抵扣卷、兑换卷、积分
 * 5、其他各类活动等
 *
 * 传统解决方案:
 * 在购票逻辑等类内部增加相关代码，完成各种逻辑。
 *
 * 存在问题：
 * 1、一旦某个业务逻辑发生改变，如购票业务中增加其他业务逻辑，需要修改购票核心文件、甚至购票流程。
 * 2、日积月累后，文件冗长，导致后续维护困难。
 *
 * 存在问题原因主要是程序的"紧密耦合"，使用观察者模式将目前的业务逻辑优化成"松耦合"，达到易维护、易修改的目的，
 * 同时也符合面向接口编程的思想。
 *
 * 观察者模式典型实现方式：
 * 1、定义2个接口：观察者（通知）接口、被观察者（主题）接口
 * 2、定义2个类，观察者对象实现观察者接口、主题类实现被观者接口
 * 3、主题类注册自己需要通知的观察者
 * 4、主题类某个业务逻辑发生时通知观察者对象，每个观察者执行自己的业务逻辑。
 */

#===================定义观察者、被观察者接口============
/*
//观察者接口(通知接口)
interface guancha
{
    function onBuyTicketOver($sender, $args); //得到通知后调用的方法
}

//被观察者接口(主题接口)
interface beiguancha
{
    function addObserver($observer); //提供添加观察者的方法
}

/////////////////////////主题类实现///////////////////

//主题类（购票）
class buyPiao implements beiguancha { //实现主题接口（被观察者）
    private $_observers = []; //数组存放观察者对象
    public function buyTicket($ticket) //购票核心类，处理购票流程
    {
        //购票逻辑
        //循环通知，调用其onBuyTicketOver实现不同业务逻辑
        foreach ( $this->_observers as $obs )
            $obs->onBuyTicketOver ( $this, $ticket ); //$this 可用来获取主题类句柄，在通知中使用
    }
    //添加通知
    public function addObserver($observer) //添加N个通知
    {
        $this->_observers [] = $observer;
    }
}

///////////////////////////////定义多个通知/////////////////////////

//短信日志通知
class HipiaoMSM implements guancha {
    public function onBuyTicketOver($sender, $ticket) {
        echo (date ( 'Y-m-d H:i:s' ) . " 短信日志记录：购票成功:$ticket<br>");
    }
}
//文本日志通知
class HipiaoTxt implements guancha {
    public function onBuyTicketOver($sender, $ticket) {
        echo (date ( 'Y-m-d H:i:s' ) . " 文本日志记录：购票成功:$ticket<br>");
    }
}
//抵扣卷赠送通知
class HipiaoDiKou implements guancha {
    public function onBuyTicketOver($sender, $ticket) {
        echo (date ( 'Y-m-d H:i:s' ) . " 赠送抵扣卷：购票成功:$ticket 赠送10元抵扣卷1张。<br>");
    }
}

/////////////////////////////用户购票///////////////////////////
$buy = new buyPiao ();
$buy->addObserver ( new HipiaoMSM () ); //根据不同业务逻辑加入各种通知
$buy->addObserver ( new HipiaoTxt () );
$buy->addObserver ( new HipiaoDiKou () );
//购票
$buy->buyTicket ( "一排一号" );
*/

/**
 * 策略模式
 * 与工厂模式实现的功能相似,区别是工厂模式关注的是对象的创建,提供创建对象的接口,是创建型的设计接口,接收指令,创建出符合要求的实例
 * 策略模式是行为型的设计模式,接受已经创建好的实例,实现不同的行为
 *
 */


///////////////////////////////开始进入API的世界//////////////////////////////
/**
 * 随着移动网络的发展,多终端的出现,为了降低服务端的工作量,和以后的维护量,我们希望开发一套可适用于多个终端的接口.
 * 面向接口编程要求我们将定义和实现分开,尽可能编写粒度更细的接口,降低各个接口之间的依赖度,这些接口通过一定的组合能够对外提供一套系统服务
 *
 */

/////////////////////////////////传输消息加解密//////////////////////////
/**
 * 单向散列加密
 * 常用的单向散列加密:MD5,SHA等
 * 单向加密是对不同输入长度的信息进行散列计算,得到固定长度的散列计算值.输入信息的任何微小变化都会导致散列的很大不同,并且这种计算是不可逆的
 * 即无法根据散列值获得明文信息.这种单向散列加密可用于用户密码的保存.即不将用户输入的密码直接保存到数据库,而是对密码进行单向散列加密.将密文
 * 存入数据库,用户登陆时进行密码验证,同样对输入的密码进行散列加密,与数据库中密码的密文进行对比,若一致,则验证通过
 * 虽然不能通过算法从散列密文解出明文,但是由于人们设置的密码具有一定的模式(比如使用生日或名字作为密码),因此通过彩虹表(密码和对应的密文关系表)
 * 等手段都可以猜测式的1破解.为了增加单向散列被破解的难度,还可以给散列算法加盐值(salt),salt相当于加密时的钥匙,增加破解时的难度
 */

/**
 * 对称加密
 * 对称加密是指加密和解密使用的是同一个秘钥.对称加密类似接口签名验证,将明文和密钥按照一定的算法进行加密,同样使用密钥和一定的算法对密文进行解密
 * 获得明文.
 * PHP提供了一个MCRYPT扩展,可用于对称加密.
 * 注:php7开始,已经对mcrypt加密方式进行删除,官方不推荐此方式了.
 *
 */
/**
 * mycrpt加密需要以下几个步骤:
 *
 */
//示例1
/*
$str = "我的名字是？一般人我不告诉他！"; //加密内容
$key = "key25111"; //密钥
$cipher = MCRYPT_DES; //密码类型
$modes = MCRYPT_MODE_ECB; //密码模式
$iv = mcrypt_create_iv(mcrypt_get_iv_size($cipher,$modes),MCRYPT_RAND);//初始化向量
echo "加密明文：".$str."<p>";
$str_encrypt = mcrypt_encrypt($cipher,$key,$str,$modes,$iv); //加密函数
echo "加密密文：".$str_encrypt." <p>";
$str_decrypt = mcrypt_decrypt($cipher,$key,$str_encrypt,$modes,$iv); //解密函数
echo "还原：".$str_decrypt;
*/

/**
 *非对称加密
 * RSA是目前最有影响力的公钥加密算法
 *与对称加密不同的是,非对称加密和解密使用的是不同的密钥,其中一个对外公开作为公钥,另一个只有私有者私有,成为私钥.用私钥加密的
 *信息只有公钥能够解开,反之用公钥加密的信息只有私钥能够解开.
 *常用的非对称加密有RSA算法
 *RSA算法基于一个非常简单的数论事实,将两个大质数相乘十分容易,但是想要对其乘积进行因式分解却极其困难,因此可以将乘积公开作为加密密钥
 *PHP中,提供基于RSA算法的openssl扩展可实现对数据的非对称加密
 */


/////////////////////////////////////使用ajax进行交互/////////////////////////////////////
/**
 * 把网页看成客户端,服务端以提供接口的形式向客户端提供数据的增删改查服务.
 * 在网页开发中,经常使用ajax技术实现客户端与服务端的数据交互
 * ajax是一种在无须重新加载整个网页的情况下能够更新部分网页的技术.
 * ajax通过在后台与服务器进行少量的数据交换可以使网页实现异步更新.
 */

//检测用户名是否可用
//假设用户名为zhangsan和lisi已经被使用了
/**
 *html代码
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>检测用户名是否被使用</title>
</head>
<body>
用户名:<input type="text" name="name" id="name"><span id="span"></span>
</body>
<!--实现的功能是:当用户输入完用户名,失去焦点时,自动检测是否被使用了-->
<script>
//获取input元素
var input=document.getElementById('name');
//给其绑定失去焦点事件
input.onblur=function () {
//创建xhr对象
xhr = new XMLHttpRequest();
//获取用户输入的用户名
var name = this.value;
//状态确认后才接收数据
xhr.onreadystatechange=function () {
if(xhr.readyState == 4 && xhr.status == 200){
if(xhr.responseText == 1){
document.getElementById('span').innerHTML = "<font color='red'>baoqian,您输入的用户名已经有人注册</font>"
}else{
document.getElementById('span').innerHTML = "<font color='#7fffd4'>gongxi,可以注册此用户名</font>"
}
}
}
//设置请求
xhr.open('get','index.php?name='+name,true);
//发送请求
xhr.send();
}
</script>
</html>
 */
/**
 *php代码
 */
/*
$name = $_GET['name'];
if($name == 'zhangsan'){
    echo 1;
}else{
    echo 2;
}
*/



?>