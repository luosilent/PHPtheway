<?php
/**
 * 面向对象编程
 * 基本概念
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
/**
 * 属性
 * 在类的成员方法里面，可以用 ->（对象运算符）：$this->property（其中 property 是该属性名）
 * 这种方式来访问非静态属性。静态属性则是用 ::（双冒号）：self::$property 来访问。
 * 更多静态属性与非静态属性的区别参见 Static 关键字。
 */

class SimpleClass2
{
    // 错误的属性声明
    /*  public $var1 = 'hello ' . 'world';
        public $var2 = <<<EOD
    hello world
    EOD;
        public $var3 = 1+2;
        public $var4 = self::myStaticMethod();
        public $var5 = $myVar;*/


    // 正确的属性声明
    public $var6 = myConstant;
    public $var7 = array(true, false);

    //在 PHP 5.3.0 及之后，下面的声明也正确
    public $var8 = <<<'EOD'
hello world
EOD;
    // 跟 heredocs 不同，nowdocs 可在任何静态数据上下文中使用，包括属性声明。
}

/**
 * 类常量
 * Class MyClass
 */
class MyClass
{
    const constant = 'constant value';

    function showConstant() {
        echo  self::constant . "\n";
    }
}
echo 'p001.3 类常量的示例';
echo "<br>";

echo MyClass::constant . "\n";
echo "<br>";

$classname = "MyClass";
echo $classname::constant . "\n"; // 自 5.3.0 起
echo "<br>";

$class = new MyClass();
$class->showConstant();
echo "<br>";

echo $class::constant."\n"; // 自 PHP 5.3.0 起
echo "<hr>";

/**
 * 类的自动加载
 *  spl_autoload_register() 函数可以注册任意数量的自动加载器，
 *  当使用尚未被定义的类（class）和接口（interface）时自动去加载。
 *  通过注册自动加载器，脚本引擎在 PHP 出错失败前有了最后一个机会加载所需的类。
 *  尽管 __autoload() 函数也能自动加载类和接口，但更建议使用 spl_autoload_register() 函数。
 */

// 本例尝试分别从 MyClass1.php 和 MyClass2.php 文件中加载 MyClass1 和 MyClass2 类。
/**
 * <?php
 * spl_autoload_register(function ($class_name) {
 * require_once $class_name . '.php';
 * });
 * $obj  = new MyClass1();
 * $obj2 = new MyClass2();
 * ?>
 */
/*spl_autoload_register(function ($name) {
    echo "Want to load $name.\n";
    echo "<br>";
    throw new MissingException("Unable to load $name.");
});

try {
    echo 'p001.4 类的自动加载的示例';
    echo "<br>";
    $obj = new NonLoadableClass();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}*/
/**
 * 构造函数和析构函数
 */
/**
 * PHP 5 允行开发者在一个类中定义一个方法作为构造函数。
 * 具有构造函数的类会在每次创建新对象时先调用此方法，所以非常适合在使用对象之前做一些初始化工作。
 */

class BaseClass {
    function __construct() {
        print "In BaseClass constructor\n";
        echo "<br>";
    }
}

class SubClass extends BaseClass {
    function __construct() {
        parent::__construct();
        print "In SubClass constructor\n";
        echo "<br>";
    }
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}
echo 'p001.5 类的构造函数的示例';
echo "<br>";
// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();
echo "<hr>";

/**
 * PHP 5 引入了析构函数的概念，这类似于其它面向对象的语言，
 * 如 C++。析构函数会在到某个对象的所有引用都被删除或者当对象被显式销毁时执行。
 */
/**
 * 使用和理解多个构造的简单方法
 */

class ABC
{
    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }

    function __construct1($a1)
    {
        echo('__construct with 1 param called: '.$a1.PHP_EOL);
    }

    function __construct2($a1,$a2)
    {
        echo('__construct with 2 params called: '.$a1.','.$a2.PHP_EOL);
    }

    function __construct3($a1,$a2,$a3)
    {
        echo('__construct with 3 params called: '.$a1.','.$a2.','.$a3.PHP_EOL);
    }
}
echo 'p001.6 类的构造函数简单示例';
echo "<br>";
$outputABC = new ABC('sheep');
echo "<br>";
$outputABC = new ABC('sheep','cat');
echo "<br>";
$outputABC = new ABC('sheep','cat','dog');
echo "<hr>";
// results:
// __construct with 1 param called: sheep
// __construct with 2 params called: sheep,cat
// __construct with 3 params called: sheep,cat,dog

/**
 * 类的析构函数的示例
 * Class MyDestructableClass
 */
class MyDestructableClass {
    function __construct() {
        print "In constructor\n";
        $this->name = "MyDestructableClass";
        echo "<br>";
    }

    function __destruct() {
        echo "我总是最后执行的！！";
        echo "<br>";
        print "Destroying " . $this->name . "\n";

    }
}
echo 'p001.7 类的析构函数的示例';
echo "<br>";
$obj = new MyDestructableClass();
echo "<hr>";

/**
 * 访问控制（可见性）
 * 对属性或方法的访问控制，是通过在前面添加关键字 public，protected或 private来实现的。
 * public（公有）被定义为公有的类成员可以在任何地方被访问。
 * protected（受保护）被定义为受保护的类成员则可以被其自身以及其子类和父类访问。
 * private（私有）被定义为私有的类成员则只能被其定义所在的类访问。
 */

/**
 * 例子
 * Class Item
 */
class Item
{
    protected $label = 'Unknown Item'; // Rule 1 - protected.
    protected $price = 0.0;            // Rule 1 - protected.

    public function getLabel() {       // Rule 2 - public function.
        return $this->label;             // Rule 3 - string OUT for $label.
    }

    public function getPrice() {       // Rule 2 - public function.
        return $this->price;             // Rule 4 - float OUT for $price.
    }

    public function setLabel($label)   // Rule 2 - public function.
    {

        if(is_string($label))
        {
            $this->label = (string)$label; // Rule 3 - string IN for $label.
        }
    }

    public function setPrice($price)   // Rule 2 - public function.
    {

        if(is_numeric($price))
        {
            $this->price = (float)$price; // Rule 4 - float IN for $price.
        }
    }
    public function __toString()
    {
        return "label:"."$this->label  "."$this->price".'$';
    }
}
$item = new Item();
$item->setLabel( 'apples');
$item->setPrice(49.99);
print $item;
echo "<hr>";

/**
 * 对象继承
 * 继承已为大家所熟知的一个程序设计特性，PHP 的对象模型也使用了继承。
 * 继承将会影响到类与类，对象与对象之间的关系。比如，当扩展一个类，子类就会继承父类所有公有的和受保护的方法。
 * 除非子类覆盖了父类的方法，被继承的方法都会保留其原有功能。
 */

class foo
{
    public function printItem($string)
    {
        echo 'Foo: ' . $string . PHP_EOL;// 文本换行，windows平台相当于echo "\r\n";
    }

    public function printPHP()
    {
        echo 'PHP is great.' . PHP_EOL;
    }
}

class bar extends foo
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new foo();
$bar = new bar();
$foo->printItem('baz'); // Output: 'Foo: baz'
echo "<br>";
$foo->printPHP();       // Output: 'PHP is great'
echo "<br>";
$bar->printItem('baz'); // Output: 'Bar: baz'
echo "<br>";
$bar->printPHP();       // Output: 'PHP is great'
echo "<hr>";

/**
 * 范围解析操作符 （::）
 */