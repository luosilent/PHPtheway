<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/12
 * Time: 14:45
 */
header("Content-type: text/html; charset=utf-8");

/**
 * Class Stack
 */
class NumStack {

    /**
     * 用数组表示栈
     * @var array
     */
    protected $stack;
    /**
     * 定义栈的大小
     * @var int
     */
    protected $size;

    /**
     * 初始化栈
     * Stack constructor.
     * @param int $size
     */
    public function __construct($size)
    {
        $this->stack = array();
        $this->size = $size;
    }

    /**
     * 计算栈大小
     * @return int
     */
    public function count()
    {
        return count($this->stack);
    }

    /**
     * 判断栈为空
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->stack);
    }

    /**
     * 入栈
     * @param $data
     */
    public function push($data)
    {

        try {
            // 判断栈的大小是否超出
            if (count($this->stack) < $this->size) {
                //向数组的尾部添加元素
                array_push($this->stack, $data);
            } else {
                throw new RuntimeException();
            }
        }catch (RuntimeException $e) {
            echo "栈满".PHP_EOL;
        }

    }

    /**
     * @return mixed
     */
    public function pop()
    {
        // 判断栈是否为空
        try {
            if ($this->isEmpty()) {
                throw new RuntimeException();
           }
        }catch (RuntimeException $e) {
            echo "栈空".PHP_EOL;
        }
        // 移除并返回数组的最后一个元素
        return array_pop($this->stack);
    }

    /**
     * 读取栈顶
     * @return mixed
     */
    public function top()
    {
        end($this->stack);
        return current($this->stack);
    }

}