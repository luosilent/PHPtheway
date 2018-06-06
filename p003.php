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