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