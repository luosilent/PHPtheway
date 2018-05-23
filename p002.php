<?php

 /**
  * 闭包是一个匿名函数，可以访问从外部范围导入的变量，而不使用任何全局变量。
  * 从理论上讲，闭包是一个函数，当它被定义时，环境会被一些参数关闭（例如固定）。
  */

$input = array(1,2,3,4,5,6);

// 创建一个新的匿名函数并将其赋值给变量
$filter_even = function($item){
	return ($item % 2) == 0;
};

// 内置的array筛选器同时接受数据和函数
$output1 = array_filter($input,$filter_even);

//函数不需要分配给变量。这也是有效的
$output2 = array_filter($input,function($item){
	return ($item % 2) ==0;
});
echo "p002.1 输出偶数";
echo "</br>";
print_r($output1);
echo "</br>";
print_r($output2);
echo "<hr>";

/**
 * 创建一个匿名过滤函数接受项目> $min
 *
 * 从“大于N”滤波器族中返回单个滤波器
 */
function criteria_greater_than($min)
{
    return function($item) use ($min) {
        return $item > $min;
    };
}


// 在具有选定筛选函数的输入上使用array筛选器
$output3 = array_filter($input, criteria_greater_than(3));

echo "p002.2 输出大于3";
echo "</br>";
print_r($output3); // items > 3
echo "<hr>";

/**
 * 系列中的每个过滤器功能只接受大于某个最小值的元素。
 * 返回的单个过滤器 criteria_greater_than是一个闭包，
 * 其$min参数由范围中的值关闭（在调用时作为参数给出 criteria_greater_than）。
 */


$greet = function($name)
{
    echo "p002.3 输出hello world";
    echo "</br>";
    printf("Hello %s\r\n", $name);
    echo "<hr>";
};

$greet('World');


/**
 * Class Cart
 *  一个基本的购物车，包括一些已经添加的商品和每种商品的数量。
 * 其中有一个方法用来计算购物车中所有商品的总价格，该方法使用了一个 closure 作为回调函数。
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
                // 匿名函数中的use，其作用就是从父作用域继承变量。
                // constant 获取常量的值
                $pricePerItem = constant(__CLASS__ . "::PRICE_" .
                    strtoupper($product));
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
            };

        array_walk($this->products, $callback);
        return round($total, 2);;
    }
}

$my_cart = new Cart;

// 往购物车里添加条目
$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

// 打出出总价格，其中有 5% 的销售税.
echo "p002.4 输出总价格";
echo "</br>";
print "总价格是".$my_cart->getTotal(0.05) . "$"."\n";
// 最后结果是 48.3
