<?php


class BookStack implements Countable
{
    /**
     * 使用数组实现栈结构
     *
     * @var array
     */
    protected $stack;
    /**
     * 栈大小：默认 10
     *
     * @var int
     */
    protected $limit = 10;

    /**
     * BookStack constructor.
     * @param int $limit
     */
    public function __construct($limit = 10)
    {
        //初始化数组
        $this->stack = array();

        //设置栈大小
        $this->limit = $limit;
    }

    /**
     * @param $item
     */

    public function push($item)
    {
        // 检查是否超出栈大小
        if (count($this->stack) < $this->limit  ) {
            //数组尾部添加元素
            array_push($this->stack, $item);
        } else {
            throw new RuntimeException("Stack is Full");
        }
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        // 检查是否已空
        if ($this->isEmpty()) {
            throw new RuntimeException("Stack is Empty");
        } else {
            // 从数组尾部移除并返回最后一个元素
            return array_pop($this->stack);
        }
    }

    /**
     * @return mixed
     */
    public function top()
    {
        end($this->stack);
        return current($this->stack);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->stack);
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->stack);
    }
}