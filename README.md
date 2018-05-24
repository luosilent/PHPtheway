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
  <li>学习更多 <a href="https://laravel-china.github.io/php-the-right-way/pages/Functional-Programming.html">PHP 函数式编程</a></li>
  <li><a href="http://php.net/functions.anonymous">阅读匿名函数</a></li>
  <li><a href="http://php.net/class.closure">阅读闭包类</a></li>
  <li><a href="https://wiki.php.net/rfc/closures">更多关于 Closures RFC</a></li>
  <li><a href="http://php.net/language.types.callable">阅读 Callables</a></li>
  <li><a href="http://php.net/function.call-user-func-array">阅读动态调用函数 <code class="highlighter-rouge">call_user_func_array()</code></a></li>
</ul>
<h3 id="元编程">元编程</h3>

<p>PHP 通过反射 API 和魔术方法，可以实现多种方式的元编程。开发者通过魔术方法，如 <code class="highlighter-rouge">__get()</code>, <code class="highlighter-rouge">__set()</code>, <code class="highlighter-rouge">__clone()</code>, <code class="highlighter-rouge">__toString()</code>, <code class="highlighter-rouge">__invoke()</code>，等等，可以改变类的行为。Ruby 开发者常说 PHP 没有 <code class="highlighter-rouge">method_missing</code> 方法，实际上通过 <code class="highlighter-rouge">__call()</code> 和 <code class="highlighter-rouge">__callStatic()</code> 就可以完成相同的功能。</p>

<ul>
  <li><a href="http://php.net/language.oop5.magic">阅读魔术方法</a></li>
  <li><a href="http://php.net/intro.reflection">阅读反射</a></li>
  <li><a href="http://php.net/language.oop5.overloading">阅读重载</a></li>
</ul>


</section>


<section class="chapter" id="namespaces">
    <h2 id="namespaces_title">命名空间</h2>

<p>如前所述，PHP 社区已经有许多开发者开发了大量的代码。这意味着一个类库的 PHP 代码可能使用了另外一个类库中相同的类名。如果他们使用同一个命名空间，那将会产生冲突导致异常。</p>

<p><em>命名空间</em> 解决了这个问题。如 PHP 手册里所描述，命名空间好比操作系统中的目录，两个同名的文件可以共存在不同的目录下。同理两个同名的 PHP 类可以在不同的 PHP 命名空间下共存，就这么简单。</p>

<p>因此把你的代码放在你的命名空间下就非常重要，避免其他开发者担心与第三方类库冲突。</p>

<p><a href="http://www.php-fig.org/psr/psr-4/">PSR-4</a> 提供了一种命名空间的推荐使用方式，它提供一个标准的文件、类和命名空间的使用惯例，进而让代码做到随插即用。</p>

<p>2014 年 10 月，PHP-FIG 废弃了上一个自动加载标准： <a href="http://www.php-fig.org/psr/psr-0/">PSR-0</a>，而采用新的自动加载标准 <a href="http://www.php-fig.org/psr/psr-4/">PSR-4</a>。但 PSR-4 要求 PHP 5.3 以上的版本，而许多项目都还是使用 PHP 5.2，所以目前两者都能使用。</p>

<p>如果你在新应用或扩展包中使用自动加载标准，应优先考虑使用 PSR-4。</p>

<ul>
  <li><a href="http://php.net/language.namespaces">阅读命名空间</a></li>
  <li><a href="http://www.php-fig.org/psr/psr-0/">阅读 PSR-0</a></li>
  <li><a href="http://www.php-fig.org/psr/psr-4/">阅读 PSR-4</a></li>
</ul>


</section>


<section class="chapter" id="standard_php_library">
    <h2 id="standard_php_library_title">PHP 标准库</h2>

<p>PHP 标准库 (Standard PHP Library 简写为 SPL) 随着 PHP 一起发布，提供了一组类和接口。包含了常用的数据结构类 (堆栈，队列，堆等等)，以及遍历这些数据结构的迭代器，或者你可以自己实现 SPL 接口。</p>

<ul>
  <li><a href="http://php.net/book.spl">阅读 SPL</a></li>
  <li><a href="http://www.lynda.com/PHP-tutorials/Up-Running-Standard-PHP-Library/175038-2.html">Lynda.com 上的 SPL 视频教程(付费)</a></li>
</ul>


</section>


<section class="chapter" id="command_line_interface">
    <h2 id="command_line_interface_title">命令行接口</h2>

<p>PHP 是为开发 Web 应用而创建，不过它的命令行脚本接口(CLI)也非常有用。PHP 命令行编程可以帮你完成自动化的任务，如测试，部署和应用管理。</p>

<p>CLI PHP 编程非常强大，可以直接调用你自己的程序代码而无需创建 Web 图形界面，需要注意的是 <strong>不要</strong> 把 CLI PHP 脚本放在公开的 web 目录下！</p>

<p>在命令行下运行 PHP :</p>

<figure class="highlight"><pre><code class="language-console" data-lang="console"><span class="err">&gt; php -i</span></code></pre></figure>

<p>选项 <code class="highlighter-rouge">-i</code> 将会打印 PHP 配置，类似于 <a href="http://php.net/function.phpinfo"><code class="highlighter-rouge">phpinfo()</code></a> 函数。</p>

<p>选项 <code class="highlighter-rouge">-a</code> 提供交互式 shell，和 Ruby 的 IRB 或 python 的交互式 shell 相似，此外还有很多其他有用的<a href="http://php.net/features.commandline.options">命令行选项</a>。</p>

<p>接下来写一个简单的 “Hello, $name” CLI 程序，先创建名为 <code class="highlighter-rouge">hello.php</code> 的脚本：</p>

<figure class="highlight"><pre><code class="language-php" data-lang="php"><span class="cp">&lt;?php</span>
<span class="k">if</span><span class="p">(</span><span class="nv">$argc</span> <span class="o">!=</span> <span class="mi">2</span><span class="p">)</span> <span class="p">{</span>
    <span class="k">echo</span> <span class="s2">"Usage: php hello.php [name].</span><span class="se">\n</span><span class="s2">"</span><span class="p">;</span>
    <span class="k">exit</span><span class="p">(</span><span class="mi">1</span><span class="p">);</span>
<span class="p">}</span>
<span class="nv">$name</span> <span class="o">=</span> <span class="nv">$argv</span><span class="p">[</span><span class="mi">1</span><span class="p">];</span>
<span class="k">echo</span> <span class="s2">"Hello, </span><span class="nv">$name</span><span class="se">\n</span><span class="s2">"</span><span class="p">;</span></code></pre></figure>

<p>PHP 会在脚本运行时根据参数设置两个特殊的变量，<a href="http://php.net/reserved.variables.argc"><code class="highlighter-rouge">$argc</code></a> 是一个整数，表示参数<em>个数</em>，<a href="http://php.net/reserved.variables.argv"><code class="highlighter-rouge">$argv</code></a> 是一个数组变量，包含每个参数的<em>值</em>，
它的第一个元素一直是 PHP 脚本的名称，如本例中为 <code class="highlighter-rouge">hello.php</code>。</p>

<p>命令运行失败时，可以通过 <code class="highlighter-rouge">exit()</code> 表达式返回一个非 0 整数来通知 shell，常用的 exit 返回码可以查看<a href="http://www.gsp.com/cgi-bin/man.cgi?section=3&amp;topic=sysexits">列表</a>.</p>

<p>运行上面的脚本，在命令行输入：</p>

<figure class="highlight"><pre><code class="language-console" data-lang="console">&gt; php hello.php
Usage: php hello.php [name]
&gt; php hello.php world
<span class="err">Hello, world</span></code></pre></figure>

<ul>
  <li><a href="http://php.net/features.commandline">学习如何在命令行运行 PHP</a></li>
  <li><a href="http://php.net/install.windows.commandline">学习如何在 Windows 环境下运行 PHP 命令行程序</a></li>
</ul>


</section>


<section class="chapter" id="xdebug">
    <h2 id="xdebug_title">Xdebug</h2>

<p>合适的调试器是软件开发中最有用的工具之一，它使你可以跟踪程序执行结果并监视程序堆栈中的信息。Xdebug 是一个 php 的调试器，它可以被用来在很多 IDE(集成开发环境) 中做断点调试以及堆栈检查。它还可以像 PHPUnit 和 KCacheGrind 一样，做代码覆盖检查或者程序性能跟踪。</p>

<p>如果你仍在使用 <code class="highlighter-rouge">var_dump()</code>/<code class="highlighter-rouge">print_r()</code> 调错，经常会发现自己处于困境，并且仍然找不到解决办法。这时，你该使用调试器了。</p>

<p><a href="http://xdebug.org/docs/install">安装 Xdebug</a> 可能很费事，但其中一个最重要的「远程调试」特性 —— 如果你在本地开发，并在虚拟机或者其他服务器上测试，远程调试可能是你想要的一种方式。</p>

<p>通常，你需要修改你的 Apache VHost 或者 .htaccess 文件的这些值:</p>

<figure class="highlight"><pre><code class="language-ini" data-lang="ini"><span class="err">php_value</span> <span class="py">xdebug.remote_host</span><span class="p">=</span><span class="s">192.168.?.?</span>
<span class="err">php_value</span> <span class="py">xdebug.remote_port</span><span class="p">=</span><span class="s">9000</span></code></pre></figure>

<p>「remote host」 和 「remote port」 这两项对应和你本地开发机监听的地址和端口。然后将你的 IDE 设置成「listen for connections」模式，并访问网址：</p>

<div class="highlighter-rouge"><pre class="highlight"><code>http://your-website.example.com/index.php?XDEBUG_SESSION_START=1
</code></pre>
</div>

<p>你的 IDE 将会拦截当前执行的脚本状态，运行你设置的断点并查看内存中的值。</p>

<p>图形化的调试器可以让你非常容易的逐步的查看代码、变量，以及运行时的 evel 代码。许多 IDE 已经内置或提供了插件支持 XDebug 图形化调试器。比如 MacGDBp 是 Mac 上的一个免费，开源的单机调试器。</p>

<ul>
  <li><a href="http://xdebug.org/docs/">学习更多 Xdebug</a></li>
  <li><a href="http://www.bluestatic.org/software/macgdbp/">学习更多 MacGDBp</a></li>
</ul>


</section>
