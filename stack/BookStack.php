<?php


class BookStack implements Countable
{
    /**
     * ʹ������ʵ��ջ�ṹ
     *
     * @var array
     */
    protected $stack;
    /**
     * ջ��С��Ĭ�� 10
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
        //��ʼ������
        $this->stack = array();

        //����ջ��С
        $this->limit = $limit;
    }

    /**
     * @param $item
     */

    public function push($item)
    {
        // ����Ƿ񳬳�ջ��С
        if (count($this->stack) < $this->limit  ) {
            //����β�����Ԫ��
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
        // ����Ƿ��ѿ�
        if ($this->isEmpty()) {
            throw new RuntimeException("Stack is Empty");
        } else {
            // ������β���Ƴ����������һ��Ԫ��
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