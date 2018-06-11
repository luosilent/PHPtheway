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
     * ʹ������ʵ�ֶ��нṹ
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
        //��ʼ������
        $this->queue = array();

        //���ö��д�С
        $this->limit = $limit;
    }

    /**
     * @param $item
     */
    public function enqueue($item)
    {
        // ����Ƿ񳬳����д�С
        if (count($this->queue) < $this->limit) {
            //����β�����Ԫ��
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
        // ����Ƿ��ѿ�
        if ($this->isEmpty()) {
            throw new RuntimeException("Queue is Empty");
        } else {
            // ������ͷ���Ƴ����������һ��Ԫ��
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