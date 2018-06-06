<?php

/**
 * PHP核心技术与最佳实践
 */

/**
 * 第一章 面向对象的核心概念
 */

class Person {
    public $name;
    public $gender;
    public function say(){
        echo $this -> name," is ",$this -> gender;
    }
}
$student = new Person();
$student -> name ='Tom';
$student -> gender = 'male';
$student -> say();
$teacher = new Person();
$teacher -> name ='Jame';
$teacher -> gender = 'man';
$teacher -> say();

print_r((array)$student);
echo "<br>";
var_dump($student);
echo '<br>';
$stu = serialize($student); //序列化对象
$tea = serialize($teacher);
$str = $stu.$tea;
echo $str.'<br>';
file_put_contents('store.txt',$str);
//O:6:"Person":2:{s:4:"name";s:3:"Tom";s:6:"gender";s:4:"male";}
//O:6:"Person":2:{s:4:"name";s:4:"Jame";s:6:"gender";s:3:"man";}
$str = file_get_contents('store.txt');
$student = unserialize($stu); //反序列化对象
$student -> say();//Tom is male
$teacher = unserialize($tea);
$teacher -> say();//Jame is man

/**
 * 类是定义一系列属性和操作的模板。而对象把属性进行具体化，然后交给类处理。
 * 对象就是数据，对象本身不包含方法。但对象有一个“指针”指向一个类。类里有方法。
 * 方法描述不同的属性所导致的不同表现。
 * 类和对象是不可分割的，有对象就必定有一个类和其对应
 */

/**
 * Class Account
 * 使用__set()和__get()魔法方法访问私有属性
 */
/**
 * 使用call和callStatic防止调用不存在的方法
 */

/**
 * toString方法输出定制结果
 */
class Account {
    private $user = 1;
    private $pwd = 2;
    private $jame;
    private $big;
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        echo "setting $name to $value<br>";
        $this -> $name = $value;
    }
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (!isset($this ->$name)){
            echo "$name 未设置<br>";
            $this -> $name = "0";
        }
        return " $name 值为".$this -> $name;
    }
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        switch (count($arguments)){
            case 2:
                echo $arguments[0] * $arguments[1],PHP_EOL;
                break;
            case 3:
                echo array_sum($arguments),PHP_EOL;
                break;
            default:
                echo "参数不对",PHP_EOL;
                break;
        }
    }

    public function __toString(){
        return "当前对象的用户名是{$this -> user},密码是{$this -> pwd}";
    }
}
$a = new Account();

echo "<br>";
echo $a -> user;
echo "<br>";
echo $a -> pwd;
echo "<br>";
$a -> jame = 3;
echo $a -> jame;
echo "<br>";
echo $a -> big;
echo "<br>";
echo $a;
echo "<br>";
echo  PHP_EOL;
print_r($a);
echo "<br>";
$a -> make(5);
$a -> make(5,6);
$a -> make(5,6,7);
$a -> make(5,6,7,8);



/**
 * 求字符串长度
 * $str = "sada";
 * echo strlen(trim($str));
 */

