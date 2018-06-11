<?php
/**
 * ���������
 * ��������
 * PHP ӵ����������������̵����ԣ������࣬�����࣬�ӿڣ��̳У����캯������¡���쳣�ȡ�
 * self��parent��$this�ؼ��ֵ�����
 * self�ؼ�������ָ��ǰ���࣬���Ҹùؼ���ͨ������������ľ�̬��Ա�������ͳ�����
 * parent�ؼ�������ָ���࣬���Կ���ʹ�øùؼ��ֵ��ø�������Ժͷ�����
 * $this���������������ڵ�����������Ժͷ�����
 */

/**
 * ��1
 * Class SimpleClass
 */
class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo "p001.1 ���������ֵ";
        echo "<br>";
        echo $this->var;

    }
}
$a = new SimpleClass();
$a->displayVar();
echo "<hr>";

/**
 * ��һ���������ඨ���ڲ�������ʱ����һ�����õ�α���� $this��
 * $this ��һ�������ж��������
 * ��ͨ���Ǹ÷����������Ķ��󣬵�����Ǵӵڶ�������̬����ʱҲ��������һ�����󣩡�
 */

/**
 * ��2
 *  $this α������ʾ��
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
        // Note: �������E_STRICT����һ�н��������档
        // E_STRICT�ṩ�˶��û������Эͬ�Ժ���ǰ�����Ե�����ʱ PHP ����
        A::foo();
    }
}
echo 'p001.2 $this α������ʾ��';
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
 * ����
 * ����ĳ�Ա�������棬������ ->���������������$this->property������ property �Ǹ���������
 * ���ַ�ʽ�����ʷǾ�̬���ԡ���̬���������� ::��˫ð�ţ���self::$property �����ʡ�
 * ���ྲ̬������Ǿ�̬���Ե�����μ� Static �ؼ��֡�
 */

class SimpleClass2
{
    // �������������
    /*  public $var1 = 'hello ' . 'world';
        public $var2 = <<<EOD
    hello world
    EOD;
        public $var3 = 1+2;
        public $var4 = self::myStaticMethod();
        public $var5 = $myVar;*/


    // ��ȷ����������
    public $var6 = myConstant;
    public $var7 = array(true, false);

    //�� PHP 5.3.0 ��֮�����������Ҳ��ȷ
    public $var8 = <<<'EOD'
hello world
EOD;
    // �� heredocs ��ͬ��nowdocs �����κξ�̬������������ʹ�ã���������������
}

/**
 * �ೣ��
 * Class MyClass
 */
class MyClass
{
    const constant = 'constant value';

    function showConstant() {
        echo  self::constant . "\n";
    }
}
echo 'p001.3 �ೣ����ʾ��';
echo "<br>";

echo MyClass::constant . "\n";
echo "<br>";

$classname = "MyClass";
echo $classname::constant . "\n"; // �� 5.3.0 ��
echo "<br>";

$class = new MyClass();
$class->showConstant();
echo "<br>";

echo $class::constant."\n"; // �� PHP 5.3.0 ��
echo "<hr>";

/**
 * ����Զ�����
 *  spl_autoload_register() ��������ע�������������Զ���������
 *  ��ʹ����δ��������ࣨclass���ͽӿڣ�interface��ʱ�Զ�ȥ���ء�
 *  ͨ��ע���Զ����������ű������� PHP ����ʧ��ǰ�������һ���������������ࡣ
 *  ���� __autoload() ����Ҳ���Զ�������ͽӿڣ���������ʹ�� spl_autoload_register() ������
 */

// �������Էֱ�� MyClass1.php �� MyClass2.php �ļ��м��� MyClass1 �� MyClass2 �ࡣ
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
    echo 'p001.4 ����Զ����ص�ʾ��';
    echo "<br>";
    $obj = new NonLoadableClass();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}*/
/**
 * ���캯������������
 */
/**
 * PHP 5 ���п�������һ�����ж���һ��������Ϊ���캯����
 * ���й��캯���������ÿ�δ����¶���ʱ�ȵ��ô˷��������Էǳ��ʺ���ʹ�ö���֮ǰ��һЩ��ʼ��������
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
echo 'p001.5 ��Ĺ��캯����ʾ��';
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
 * PHP 5 ���������������ĸ�������������������������ԣ�
 * �� C++�������������ڵ�ĳ��������������ö���ɾ�����ߵ�������ʽ����ʱִ�С�
 */
/**
 * ʹ�ú����������ļ򵥷���
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
echo 'p001.6 ��Ĺ��캯����ʾ��';
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
 * �������������ʾ��
 * Class MyDestructableClass
 */
class MyDestructableClass {
    function __construct() {
        print "In constructor\n";
        $this->name = "MyDestructableClass";
        echo "<br>";
    }

    function __destruct() {
        echo "���������ִ�еģ���";
        echo "<br>";
        print "Destroying " . $this->name . "\n";

    }
}
echo 'p001.7 �������������ʾ��';
echo "<br>";
$obj = new MyDestructableClass();
echo "<hr>";

/**
 * ���ʿ��ƣ��ɼ��ԣ�
 * �����Ի򷽷��ķ��ʿ��ƣ���ͨ����ǰ����ӹؼ��� public��protected�� private��ʵ�ֵġ�
 * public�����У�������Ϊ���е����Ա�������κεط������ʡ�
 * protected���ܱ�����������Ϊ�ܱ��������Ա����Ա��������Լ�������͸�����ʡ�
 * private��˽�У�������Ϊ˽�е����Ա��ֻ�ܱ��䶨�����ڵ�����ʡ�
 */

/**
 * ����
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
echo 'p001.8 ���ʾ��';echo "<br>";
print $item;
echo "<hr>";

/**
 * ����̳�
 * �̳���Ϊ�������֪��һ������������ԣ�PHP �Ķ���ģ��Ҳʹ���˼̳С�
 * �̳н���Ӱ�쵽�����࣬���������֮��Ĺ�ϵ�����磬����չһ���࣬����ͻ�̳и������й��еĺ��ܱ����ķ�����
 * �������า���˸���ķ��������̳еķ������ᱣ����ԭ�й��ܡ�
 */

class foo
{
    public function printItem($string)
    {
        echo 'Foo: ' . $string . PHP_EOL;// �ı����У�windowsƽ̨�൱��echo "\r\n";
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
echo 'p001.9 ����ļ̳�';echo "<br>";
$foo->printItem('baz'); // Output: 'Foo: baz'
echo "<br>";
$foo->printPHP();       // Output: 'PHP is great'
echo "<br>";
$bar->printItem('baz'); // Output: 'Bar: baz'
echo "<br>";
$bar->printPHP();       // Output: 'PHP is great'
echo "<hr>";

/**
 * ��Χ���������� ��::��
 */
/**
 * ��Χ������������Ҳ�ɳ��� Paamayim Nekudotayim�����߸��򵥵�˵��һ��ð�ţ�
 * �������ڷ��ʾ�̬��Ա���ೣ�������������ڸ������е����Ժͷ�����
 * �����ඨ��֮�����õ���Щ��Ŀʱ��Ҫʹ������
 */

class MyClassT {
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClassT';
echo 'p001.10  ������ⲿʹ�� :: ������';echo "<br>";
echo $classname::CONST_VALUE; // �� PHP 5.3.0 ��
echo "<br>";
echo MyClassT::CONST_VALUE;
echo "<hr>";

class OtherClass extends MyClassT
{
    public static $my_static = 'static var';

    public static function doubleColon() {
        echo parent::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}

$classname = 'OtherClass';
echo 'p001.11   ���ඨ���ڲ�ʹ�� ::';echo "<br>";
echo $classname::doubleColon(); // �� PHP 5.3.0 ��
echo "<br>";
OtherClass::doubleColon();
echo "<hr>";


class MyClassY
{
    protected function myFunc() {
        echo "MyClassY::myFunc()\n";
    }
}

class OtherClassY extends MyClassY
{
    // �����˸���Ķ���
    public function myFunc()
    {
        // �����ǿ��Ե��ø����б����ǵķ���
        parent::myFunc();
        echo "OtherClassY::myFunc()\n";
    }
}
echo 'p001.10 ���ø���ķ���';echo "<br>";
$class = new OtherClassY();
$class->myFunc();
echo "<hr>";

/**
 * ���������Ի򷽷�Ϊ��̬���Ϳ��Բ�ʵ�������ֱ�ӷ��ʡ�
 * ��̬���Բ���ͨ��һ������ʵ�����Ķ��������ʣ�����̬�������ԣ���
 * ���ھ�̬��������Ҫͨ�����󼴿ɵ��ã�����α���� $this �ھ�̬�����в����á�
 * ��̬���Բ������ɶ���ͨ�� -> �����������ʡ�
 * �þ�̬��ʽ����һ���Ǿ�̬�����ᵼ��һ�� E_STRICT ����Ĵ���
 * �����������е� PHP ��̬����һ������̬����ֻ�ܱ���ʼ��Ϊ���ֻ���������ʹ�ñ��ʽ��
 * ���Կ��԰Ѿ�̬���Գ�ʼ��Ϊ���������飬�����ܳ�ʼ��Ϊ��һ��������������ֵ��Ҳ����ָ��һ������
 * �� PHP 5.3.0 �𣬿�����һ����������̬�����ࡣ���ñ�����ֵ����Ϊ�ؼ��� self��parent �� static��
 */
class FooY
{
    public static $my_static = 'fooY';

    public function staticValue() {
        return self::$my_static;
    }
}

class BarY extends FooY
{
    public function fooStatic() {
        return parent::$my_static;
    }
}
echo 'p001.11 ��̬����ʾ��';echo "<br>";

print FooY::$my_static . "\n";

$fooY = new FooY();
print $fooY->staticValue() . "\n";
//print $fooY->my_static . "\n";      // Undefined "Property" my_static

print $fooY::$my_static . "\n";
$classname = 'FooY';
print $classname::$my_static . "\n"; // As of PHP 5.3.0

print BarY::$my_static . "\n";
$barY = new BarY();
print $barY->fooStatic() . "\n";
echo "<hr>";

/**
 *
 */

