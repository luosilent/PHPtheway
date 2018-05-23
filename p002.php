<?php

 /**
  * �հ���һ���������������Է��ʴ��ⲿ��Χ����ı���������ʹ���κ�ȫ�ֱ�����
  * �������Ͻ����հ���һ������������������ʱ�������ᱻһЩ�����رգ�����̶�����
  */

$input = array(1,2,3,4,5,6);

// ����һ���µ��������������丳ֵ������
$filter_even = function($item){
	return ($item % 2) == 0;
};

// ���õ�arrayɸѡ��ͬʱ�������ݺͺ���
$output1 = array_filter($input,$filter_even);

//��������Ҫ�������������Ҳ����Ч��
$output2 = array_filter($input,function($item){
	return ($item % 2) ==0;
});
echo "p002.1 ���ż��";
echo "</br>";
print_r($output1);
echo "</br>";
print_r($output2);
echo "<hr>";

/**
 * ����һ���������˺���������Ŀ> $min
 *
 * �ӡ�����N���˲������з��ص����˲���
 */
function criteria_greater_than($min)
{
    return function($item) use ($min) {
        return $item > $min;
    };
}


// �ھ���ѡ��ɸѡ������������ʹ��arrayɸѡ��
$output3 = array_filter($input, criteria_greater_than(3));

echo "p002.2 �������3";
echo "</br>";
print_r($output3); // items > 3
echo "<hr>";

/**
 * ϵ���е�ÿ������������ֻ���ܴ���ĳ����Сֵ��Ԫ�ء�
 * ���صĵ��������� criteria_greater_than��һ���հ���
 * ��$min�����ɷ�Χ�е�ֵ�رգ��ڵ���ʱ��Ϊ�������� criteria_greater_than����
 */


$greet = function($name)
{
    echo "p002.3 ���hello world";
    echo "</br>";
    printf("Hello %s\r\n", $name);
    echo "<hr>";
};

$greet('World');


/**
 * Class Cart
 *  һ�������Ĺ��ﳵ������һЩ�Ѿ���ӵ���Ʒ��ÿ����Ʒ��������
 * ������һ�������������㹺�ﳵ��������Ʒ���ܼ۸񣬸÷���ʹ����һ�� closure ��Ϊ�ص�������
 */
class Cart
{
    const PRICE_BUTTER  = 1.00;
    const PRICE_MILK    = 3.00;
    const PRICE_EGGS    = 6.00;

    protected   $products = array();

    public function add($product, $quantity)
    {
        $this->products[$product] = $quantity;
    }

    public function getQuantity($product)
    {
        return isset($this->products[$product]) ? $this->products[$product] :
            FALSE;
    }

    public function getTotal($tax)
    {
        $total = 0.00;

        $callback =
            function ($quantity, $product) use ($tax, &$total)
            {
                // ���������е�use�������þ��ǴӸ�������̳б�����
                // constant ��ȡ������ֵ
                $pricePerItem = constant(__CLASS__ . "::PRICE_" .
                    strtoupper($product));
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
            };

        array_walk($this->products, $callback);
        return round($total, 2);;
    }
}

$my_cart = new Cart;

// �����ﳵ�������Ŀ
$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

// ������ܼ۸������� 5% ������˰.
echo "p002.4 ����ܼ۸�";
echo "</br>";
print "�ܼ۸���".$my_cart->getTotal(0.05) . "$"."\n";
// ������� 48.3
