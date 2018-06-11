<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 16:34
 */


class BookQueue implements Countable
{
    /**
     * 使用数组实现队列结构
     *
     * @var array
     */
    protected $queue;

    protected $limit;

    /**
     * BookStack constructor.
     * @param int $limit
     */
    public function __construct($limit = 10)
    {
        //初始化数组
        $this->queue = array();

        //设置队列大小
        $this->limit = $limit;
    }

    /**
     * @param $item
     */
    public function enqueue($item)
    {
        // 检查是否超出队列大小
        if (count($this->queue) < $this->limit) {
            //数组尾部添加元素
            array_push($this->queue, $item);
        } else {
            throw new RuntimeException("Queue is Full");
        }
    }

    /**
     * @return mixed
     */
    public function dequeue()
    {
        // 检查是否已空
        if ($this->isEmpty()) {
            throw new RuntimeException("Queue is Empty");
        } else {
            // 从数组头部移除并返回最后一个元素
            return array_shift($this->queue);
        }
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

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->queue);
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
        return count($this->queue);
    }
}