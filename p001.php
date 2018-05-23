<?php
/**
 * 面向对象编程
 * PHP 拥有完整的面向对象编程的特性，包括类，抽象类，接口，继承，构造函数，克隆和异常等。
 * self、parent和$this关键字的区别，
 * self关键字用来指向当前的类，而且该关键字通常用来访问类的静态成员、方法和常量。
 * parent关键字用来指向父类，所以可以使用该关键字调用父类的属性和方法。
 * $this变量用来在类体内调用自身的属性和方法。
 */
/**
 * 例1
 * Class SimpleClass
 */
class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo "p001.1 输出变量的值";
        echo "<br>";
        echo $this->var;

    }
}
$a = new SimpleClass();
$a->displayVar();
echo "<hr>";

/**
 * 当一个方法在类定义内部被调用时，有一个可用的伪变量 $this。
 * $this 是一个到主叫对象的引用
 * （通常是该方法所从属的对象，但如果是从第二个对象静态调用时也可能是另一个对象）。
 */

/**
 * 例2
 *  $this 伪变量的示例
 */
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this is not defined.\n";
        }
    }
}

class B
{
    function bar()
    {
        // Note: 如果启用E_STRICT，下一行将发出警告。
        // E_STRICT提供了对用户代码的协同性和向前兼容性的运行时 PHP 建议
        A::foo();
    }
}
echo 'p001.2 $this 伪变量的示例';
echo "<br>";
$a = new A();
$a->foo();
echo "<br>";

A::foo();
echo "<br>";

$b = new B();
$b->bar();
echo "<br>";

B::bar();
echo "<hr>";