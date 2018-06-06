<?php

/**
 * PHP���ļ��������ʵ��
 */

/**
 * ��һ�� �������ĺ��ĸ���
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
$stu = serialize($student); //���л�����
$tea = serialize($teacher);
$str = $stu.$tea;
echo $str.'<br>';
file_put_contents('store.txt',$str);
//O:6:"Person":2:{s:4:"name";s:3:"Tom";s:6:"gender";s:4:"male";}
//O:6:"Person":2:{s:4:"name";s:4:"Jame";s:6:"gender";s:3:"man";}
$str = file_get_contents('store.txt');
$student = unserialize($stu); //�����л�����
$student -> say();//Tom is male
$teacher = unserialize($tea);
$teacher -> say();//Jame is man

/**
 * ���Ƕ���һϵ�����ԺͲ�����ģ�塣����������Խ��о��廯��Ȼ�󽻸��ദ��
 * ����������ݣ�������������������������һ����ָ�롱ָ��һ���ࡣ�����з�����
 * ����������ͬ�����������µĲ�ͬ���֡�
 * ��Ͷ����ǲ��ɷָ�ģ��ж���ͱض���һ��������Ӧ
 */

/**
 * Class Account
 * ʹ��__set()��__get()ħ����������˽������
 */
/**
 * ʹ��call��callStatic��ֹ���ò����ڵķ���
 */

/**
 * toString����������ƽ��
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
            echo "$name δ����<br>";
            $this -> $name = "0";
        }
        return " $name ֵΪ".$this -> $name;
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
                echo "��������",PHP_EOL;
                break;
        }
    }

    public function __toString(){
        return "��ǰ������û�����{$this -> user},������{$this -> pwd}";
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
 * ���ַ�������
 * $str = "sada";
 * echo strlen(trim($str));
 */

