# PHP The Right Way的学习笔记
<h2 id="programming_paradigms_title">编程范式</h2>

<p>PHP 是一个灵活的动态语言，支持多种编程技巧。这几年一直不断的发展，重要的里程碑包含 PHP 5.0 (2004) 增加了完善的面向对象模型，PHP 5.3 (2009) 增加了匿名函数与命名空间以及 PHP 5.4 (2012) 增加的 traits。</p>

<h3 id="面向对象编程">面向对象编程</h3>

<p>PHP 拥有完整的面向对象编程的特性，包括类，抽象类，接口，继承，构造函数，克隆和异常等。</p>

<ul>
  <li><a href="http://php.net/language.oop5">阅读 PHP 面向对象编程</a></li>
  <li><a href="http://php.net/language.oop5.traits">阅读 Traits</a></li>
</ul>

<h3 id="函数式编程-functional-programming">函数式编程 Functional Programming</h3>

<p>PHP 支持函数是「第一等公民」，即函数可以被赋值给一个变量，包括用户自定义的或者是内置函数，然后动态调用它。函数可以作为参数传递给其他函数（称为_高阶函数_），也可以作为函数返回值返回。</p>

<p>PHP 支持递归，也就是函数自己调用自己，但多数 PHP 代码使用迭代。</p>

<p>自从 PHP 5.3 (2009) 之后开始引入对闭包以及匿名函数的支持。</p>

<p>PHP 5.4 增加了将闭包绑定到对象作用域中的特性，并改善其可调用性，如此即可在大部分情况下使用匿名函数取代一般的函数。</p>

<ul>
  <li>学习更多 <a href="/php-the-right-way/pages/Functional-Programming.html">PHP 函数式编程</a></li>
  <li><a href="http://php.net/functions.anonymous">阅读匿名函数</a></li>
  <li><a href="http://php.net/class.closure">阅读闭包类</a></li>
  <li><a href="https://wiki.php.net/rfc/closures">更多关于 Closures RFC</a></li>
  <li><a href="http://php.net/language.types.callable">阅读 Callables</a></li>
  <li><a href="http://php.net/function.call-user-func-array">阅读动态调用函数 <code class="highlighter-rouge">call_user_func_array()</code></a></li>
</ul>
