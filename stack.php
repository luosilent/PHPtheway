<?php
/**直接使用SplStack
 * 后进先出
 */
$stack = new SplStack();
$stack->push('123');
$stack->push('456');
$stack->push('789');
echo $stack->pop();//输出789
echo $stack->pop();//输出456
echo $stack->pop();//输出123
echo "<hr>";

/**
 * 实现stack
 */
class StackData{
    private $data;
    public function __construct($data){
        $this->data=$data;
        echo $data.":进<br>";
    }

    public function getData(){
        return $this->data;
    }
    public function __destruct(){
        echo $this->data.":出<br>";
    }
}
class Stack{
    private $size;
    private $top;
    private $stack=array();
    public function __construct($size){
        $this->Init_Stack($size);
    }
    //初始化栈
    public function Init_Stack($size){
        $this->size=$size;
        $this->top=-1;
    }
    //判断栈是否为空
    public function Empty_Stack(){
        if($this->top==-1)return 1;
        else return 0;
    }
    //判断栈是否已满
    public function Full_Stack(){
        if($this->top<$this->size-1)return 0;
        else return 1;
    }
    //入栈
    public function Push_Stack($data){
        if($this->Full_Stack())echo "栈满<br />";
        else $this->stack[++$this->top]=new StackData($data);
    }
    //出栈
    public function Pop_Stack(){
        if($this->Empty_Stack())echo "栈空<br />";
        else unset($this->stack[$this->top--]);
    }
    //读取栈顶元素
    public function Top_Stack(){
        return $this->Empty_Stack()?"栈空无数据！":"栈顶元素为：".$this->stack[$this->top]->getData();
    }
    //读取栈底元素
    public function Bottom_Stack(){
        return $this->Empty_Stack()?"栈空无数据！":"栈底元素为：".$this->stack[$this->top==-1]->getData();
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
 * 栈空
 * 1:进
 * 2:进
 * 3:进
 * 4:进
 * 5:进
 * 栈顶元素为：5
 * 栈满
 * 5:出
 * 4:出
 * 3:出
 * 2:出
 * 栈底元素为：1
 * 1:出
 * 栈空
 */