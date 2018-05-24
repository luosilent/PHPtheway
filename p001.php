<?php
/**
 * ���������
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