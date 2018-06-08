<?php
/**ֱ��ʹ��SplStack
 * ����ȳ�
 */
$stack = new SplStack();
$stack->push('123');
$stack->push('456');
$stack->push('789');
echo $stack->pop();//���789
echo $stack->pop();//���456
echo $stack->pop();//���123
echo "<hr>";

/**
 * ʵ��stack
 */
class StackData{
    private $data;
    public function __construct($data){
        $this->data=$data;
        echo $data.":��<br>";
    }

    public function getData(){
        return $this->data;
    }
    public function __destruct(){
        echo $this->data.":��<br>";
    }
}
class Stack{
    private $size;
    private $top;
    private $stack=array();
    public function __construct($size){
        $this->Init_Stack($size);
    }
    //��ʼ��ջ
    public function Init_Stack($size){
        $this->size=$size;
        $this->top=-1;
    }
    //�ж�ջ�Ƿ�Ϊ��
    public function Empty_Stack(){
        if($this->top==-1)return 1;
        else return 0;
    }
    //�ж�ջ�Ƿ�����
    public function Full_Stack(){
        if($this->top<$this->size-1)return 0;
        else return 1;
    }
    //��ջ
    public function Push_Stack($data){
        if($this->Full_Stack())echo "ջ��<br />";
        else $this->stack[++$this->top]=new StackData($data);
    }
    //��ջ
    public function Pop_Stack(){
        if($this->Empty_Stack())echo "ջ��<br />";
        else unset($this->stack[$this->top--]);
    }
    //��ȡջ��Ԫ��
    public function Top_Stack(){
        return $this->Empty_Stack()?"ջ�������ݣ�":"ջ��Ԫ��Ϊ��".$this->stack[$this->top]->getData();
    }
    //��ȡջ��Ԫ��
    public function Bottom_Stack(){
        return $this->Empty_Stack()?"ջ�������ݣ�":"ջ��Ԫ��Ϊ��".$this->stack[$this->top==-1]->getData();
    }
}
$stack=new stack(5);
$stack->Pop_Stack();
$stack->Push_Stack("1");
$stack->Push_Stack("2");
$stack->Push_Stack("3");
$stack->Push_Stack("4");
$stack->Push_Stack("5");
echo $stack->Top_Stack(),'<br />';
$stack->Push_Stack("6");
$stack->Pop_Stack();
$stack->Pop_Stack();
$stack->Pop_Stack();
$stack->Pop_Stack();
echo $stack->Bottom_Stack(),'<br />';
$stack->Pop_Stack();
$stack->Pop_Stack();
/**
 * ջ��
 * 1:��
 * 2:��
 * 3:��
 * 4:��
 * 5:��
 * ջ��Ԫ��Ϊ��5
 * ջ��
 * 5:��
 * 4:��
 * 3:��
 * 2:��
 * ջ��Ԫ��Ϊ��1
 * 1:��
 * ջ��
 */