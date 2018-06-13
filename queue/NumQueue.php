<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13
 * Time: 10:37
 */
class NumQueue
{
    /**
     * 使用数组实现队列结构
     * @var array
     */
    protected $queue;
    protected $size;

    /**
     * 初始化队列
     * NumQueue constructor.
     * @param $size
     */
    public function __construct($size)
    {
        $this->queue = array();
        $this->size = $size;
    }
    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->queue);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->queue);
    }

    /**
     * @param $data
     */
    public function addQueue($data)
    {
        try {
            // 检查是否超出队列大小
            if (count($this->queue) < $this->size) {
                //数组尾部添加元素
                array_push($this->queue, $data);
            } else {
                throw new RuntimeException();
            }
        }catch (RuntimeException $e) {
            echo "队列满".PHP_EOL;
        }
    }

    /**
     * @return mixed
     */
    public function delQueue()
    {
        try {
            // 检查是否已空
            if ($this->isEmpty()) {
                throw new RuntimeException("Queue is Empty");
            }
        }catch (RuntimeException $e) {
            echo "队列空".PHP_EOL;
        }
        // 从数组头部移除并返回最后一个元素
        return array_shift($this->queue);

    }

    /**
     * @return mixed
     */
    public function top()
    {
        end($this->queue);
        return current($this->queue);
    }

    /**
     * @return mixed
     */
    public function bottom()
    {
        reset($this->queue);
        return current($this->queue);
    }

}