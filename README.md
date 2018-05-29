# PHP The Right Way的学习笔记
<section class="chapter" id="code_style_guide">
    <h1 id="code_style_guide_title">代码风格指南</h1>

<p>PHP 社区百花齐放，拥有大量的函数库、框架和组件。PHP 开发者通常会在自己的项目中使用若干个外部库，因此 PHP 代码遵循（尽可能接近）同一个代码风格就非常重要，这让开发者可以轻松地将多个代码库整合到自己的项目中。</p>

<p><a href="https://psr.phphub.org/">PHP标准组</a> 提出并发布了一系列的风格建议。其中有部分是关于代码风格的，即 <a href="http://www.php-fig.org/psr/psr-0/">PSR-0</a>, <a href="https://laravel-china.org/topics/2078">PSR-1</a>, <a href="https://laravel-china.org/topics/2079">PSR-2</a> 和 <a href="https://laravel-china.org/topics/2081">PSR-4</a>。这些推荐只是一些被其他项目所遵循的规则，如 Drupal, Zend, Symfony, CakePHP, phpBB, AWS SDK, FuelPHP, Lithium 等。你可以把这些规则用在自己的项目中，或者继续使用自己的风格。</p>

<p>通常情况下，你应该遵循一个已知的标准来编写 PHP 代码。可能是 PSR 的组合或者是 PEAR 或 Zend 编码准则中的一个。这代表其他开发者能够方便的阅读和使用你的代码，并且使用这些组件的应用程序可以和其他第三方的组件保持一致。</p>

<ul>
  <li><a href="http://www.php-fig.org/psr/psr-0/">阅读 PSR-0</a></li>
  <li><a href="https://laravel-china.org/topics/2078">阅读 PSR-1</a></li>
  <li><a href="https://laravel-china.org/topics/2079">阅读 PSR-2</a></li>
  <li><a href="https://laravel-china.org/topics/2081">阅读 PSR-4</a></li>
  <li><a href="http://pear.php.net/manual/en/standards.php">阅读 PEAR 编码准则</a></li>
  <li><a href="http://symfony.com/doc/current/contributing/code/standards.html">阅读 Symfony 编码准则</a></li>
</ul>

<p>你可以使用 <a href="http://pear.php.net/package/PHP_CodeSniffer/">PHP_CodeSniffer</a> 来检查代码是否符合这些准则，文本编辑器 <a href="https://github.com/benmatselby/sublime-phpcs">Sublime Text</a> 的插件也可以提供实时检查。</p>

<p>你可以通过任意以下两个工具来自动修正你的程序语法，让它符合标准：</p>

<ul>
  <li>一个是 <a href="http://cs.sensiolabs.org/">PHP Coding Standards Fixer</a>，它具有良好的测试。</li>
  <li>另一个是随 PHP_CodeSniffer 安装的 <a href="https://github.com/squizlabs/PHP_CodeSniffer/wiki/Fixing-Errors-Automatically">PHP Code 美化修整器</a>。</li>
</ul>

<p>你也可以手动运行 phpcs 命令：</p>

<div class="highlighter-rouge"><pre class="highlight"><code>phpcs -sw --standard=PSR2 file.php
</code></pre>
</div>

<p>它会显示出相应的错误以及如何修正的方法。同时，这条命令你也可以用在 git hook 中，如果你的分支代码不符合选择的代码标准则无法提交。</p>

<p>如果你已经安装了 PHP_CodeSniffer，你将可以使用
<a href="https://github.com/squizlabs/PHP_CodeSniffer/wiki/Fixing-Errors-Automatically">PHP Code 美化修整器</a> 来格式化代码：</p>

<div class="highlighter-rouge"><pre class="highlight"><code>phpcbf -w --standard=PSR2 file.php
</code></pre>
</div>

<p>另一个选项是使用 <a href="http://cs.sensiolabs.org/">PHP 编码标准修复器</a>，他可以让你预览编码不合格的部分：</p>

<div class="highlighter-rouge"><pre class="highlight"><code>php-cs-fixer fix -v --level=psr2 file.php
</code></pre>
</div>

<p>所有的变量名称以及代码结构建议用英文编写。注释可以使用任何语言，只要让现在以及未来的小伙伴能够容易阅读理解即可。</p>

<h2 id="programming_paradigms_title">编程范式</h2>

<p>PHP 是一个灵活的动态语言，支持多种编程技巧。这几年一直不断的发展，重要的里程碑包含 PHP 5.0 (2004) 增加了完善的面向对象模型，PHP 5.3 (2009) 增加了匿名函数与命名空间以及 PHP 5.4 (2012) 增加的 traits。</p>

<h1 id="language_highlights_title">语言亮点</h1>
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


<section class="chapter" id="composer_and_packagist">
    <h2 id="composer_and_packagist_title">Composer 与 Packagist</h2>

<p>Composer 是一个 <strong>杰出</strong> 的依赖管理器。在 <code class="highlighter-rouge">composer.json</code> 文件中列出你项目所需的依赖包，加上一点简单的命令，Composer 将会自动帮你下载并设置你的项目依赖。Composer 有点类似于 Node.js 世界里的 NPM，或者 Ruby 世界里的 Bundler。</p>

<p>现在已经有许多 PHP 第三方包已兼容 Composer，随时可以在你的项目中使用。这些「packages(包)」都已列在 <a href="http://packagist.org/">Packagist</a>，这是一个官方的 Composer 兼容包仓库。</p>

<blockquote>
  <p>为了提高国内 Composer 的使用体验，Laravel China 社区维护了 <a href="https://laravel-china.org/composer">Composer 中文镜像 /Packagist 中国全量镜像</a> ，此镜像使用了又拍云的 CDN 加速，将会极大加速 Composer 依赖的下载速度。</p>
</blockquote>

<h3 id="如何安装-composer">如何安装 Composer</h3>

<p>最安全的下载方法就是使用 <a href="https://getcomposer.org/download/">官方的教程</a>。
此方法会验证安装器是否安全，是否被修改。</p>

<p>安装器安装 Composer 的应用范围为 <em>本地</em>，也就是在你当前项目文件夹。</p>

<p>我们推荐你 <em>全局</em> 安装，即把可执行文件复制到 <code class="highlighter-rouge">/usr/local/bin</code> 路径中：</p>

<figure class="highlight"><pre><code class="language-console" data-lang="console"><span class="err">mv composer.phar /usr/local/bin/composer</span></code></pre></figure>

<p><strong>注意:</strong> 以上命令如果失败，请尝试使用<code class="highlighter-rouge">sudo</code> 来增加权限。</p>

<p><em>本地</em> 使用 Composer 的话，你可以运行 <code class="highlighter-rouge">php composer.phar</code> ，全局的话是：<code class="highlighter-rouge">composer</code>。</p>

<h4 id="windows环境下安装">Windows环境下安装</h4>

<p>对于Windows 的用户而言最简单的获取及执行方法就是使用 <a href="https://getcomposer.org/Composer-Setup.exe">ComposerSetup</a> 安装程序，它会执行一个全局安装并设置你的 <code class="highlighter-rouge">$PATH</code>，所以你在任意目录下在命令行中使用 <code class="highlighter-rouge">composer</code>。</p>

<h3 id="如何手动安装-composer">如何手动安装 Composer</h3>

<p>手动安装 Composer 是一个高端的技术。仅管如此还是有许多开发者有各种原因喜欢使用这种交互式的应用程序安装 Composer。在安装前请先确认你的 PHP 安装项目如下：</p>

<ul>
  <li>正在使用一个满足条件的 PHP 版本</li>
  <li><code class="highlighter-rouge">.phar</code> 文件可以正确的被执行</li>
  <li>相关的目录有足够的权限</li>
  <li>相关有问题的扩展没有被载入</li>
  <li>相关的 <code class="highlighter-rouge">php.ini</code> 设置已完成</li>
</ul>

<p>由于手动安装没有执行这些检查，你必须自已衡量决定是否值得做这些事，以下是如何手动安装 Composer ：</p>

<figure class="highlight"><pre><code class="language-console" data-lang="console">curl -s https://getcomposer.org/composer.phar -o $HOME/local/bin/composer
<span class="err">chmod +x $HOME/local/bin/composer</span></code></pre></figure>

<p>路径 <code class="highlighter-rouge">$HOME/local/bin</code> (或是你选择的路径) 应该在你的 <code class="highlighter-rouge">$PATH</code> 环境变量中。这将会影响 <code class="highlighter-rouge">composer</code> 这个命令是否可用.</p>

<p>当你遇到文档指出执行 Composer 的命令是 <code class="highlighter-rouge">php composer.phar install</code>时，你可以使用下面命令替代:</p>

<figure class="highlight"><pre><code class="language-console" data-lang="console"><span class="err">composer install</span></code></pre></figure>

<p>本章节会假设你已经安装了全局的 Composer。</p>

<h3 id="如何设置及安装依赖">如何设置及安装依赖</h3>

<p>Composer 会通过一个 <code class="highlighter-rouge">composer.json</code> 文件持续的追踪你的项目依赖。 如果你喜欢，你可以手动管理这个文件，或是使用 Composer 自己管理。<code class="highlighter-rouge">composer require</code> 这个指令会增加一个项目依赖，如果你还没有 <code class="highlighter-rouge">composer.json</code> 文件, 将会创建一个。这里有个例子为你的项目加入 <a href="http://twig.sensiolabs.org">Twig</a> 依赖。</p>

<figure class="highlight"><pre><code class="language-console" data-lang="console"><span class="err">composer require twig/twig:~1.8</span></code></pre></figure>

<p>另外 <code class="highlighter-rouge">composer init</code> 命令将会引导你创建一个完整的 <code class="highlighter-rouge">composer.json</code> 文件到你的项目之中。无论你使用哪种方式，一旦你创建了 <code class="highlighter-rouge">composer.json</code> 文件，你可以告诉 Composer 去下载及安装你的依赖到 <code class="highlighter-rouge">vendor/</code> 目录中。这命令也适用于你已经下载并已经提供了一个 <code class="highlighter-rouge">composer.json</code> 的项目：</p>

<figure class="highlight"><pre><code class="language-console" data-lang="console"><span class="err">composer install</span></code></pre></figure>

<p>接下来，添加这一行到你应用的主要 PHP 文件中，这将会告诉 PHP 为你的项目依赖使用 Composer 的自动加载器。</p>

<figure class="highlight"><pre><code class="language-php" data-lang="php"><span class="cp">&lt;?php</span>
<span class="k">require</span> <span class="s1">'vendor/autoload.php'</span><span class="p">;</span></code></pre></figure>

<p>现在你可以使用你项目中的依赖，且它们会在需要时自动完成加载。</p>

<h3 id="更新你的依赖">更新你的依赖</h3>

<p>Composer 会建立一个 <code class="highlighter-rouge">composer.lock</code> 文件，在你第一次执行 <code class="highlighter-rouge">php composer install</code> 时，存放下载的每个依赖包精确的版本编号。假如你要分享你的项目给其他开发者，并且 <code class="highlighter-rouge">composer.lock</code> 文件也在你分享的文件之中的话。 当他们执行 <code class="highlighter-rouge">php composer.phar install</code> 这个命令时，他们将会得到与你一样的依赖版本。 当你要更新你的依赖时请执行 <code class="highlighter-rouge">php composer update</code>。请不要在部署代码的时候使用 <code class="highlighter-rouge">composer update</code>，只能使用 <code class="highlighter-rouge">composer install</code> 命令，否则你会发现你在生产环境中用的是不同的扩展包依赖版本。</p>

<p>当你需要灵活的定义你所需要的依赖版本时，这是最有用。 举例来说需要一个版本为 ~1.8 时，意味着 “任何大于 1.8.0 ，但小于 2.0.x-dev 的版本”。你也可以使用通配符 <code class="highlighter-rouge">*</code> 在 <code class="highlighter-rouge">1.8.*</code> 之中。现在Composer在<code class="highlighter-rouge">composer update</code> 时将升级你的所有依赖到你限制的最新版本。</p>

<h3 id="更新通知">更新通知</h3>

<p>要接收关于新版本的更新通知。你可以注册 <a href="https://www.versioneye.com/">VersionEye</a>，这个 web 服务可以监控你的 Github 及 BitBucket 帐号中的 <code class="highlighter-rouge">composer.json</code> 文件，并且当包有新更新时会发送邮件给你。</p>

<h3 id="检查你的依赖安全问题">检查你的依赖安全问题</h3>

<p><a href="https://security.sensiolabs.org/">Security Advisories Checker</a> 是一个 web 服务和一个命令行工具，二者都会仔细检查你的 <code class="highlighter-rouge">composer.lock</code> 文件，并且告诉你任何你需要更新的依赖。</p>

<h3 id="处理-composer-全局依赖">处理 Composer 全局依赖</h3>

<p>Composer 也可以处理全局依赖和他们的二进制文件。用法很直接，你所要做的就是在命令前加上<code class="highlighter-rouge">global</code>前缀。如果你想安装 PHPUnit 并使它全局可用，你可以运行下面的命令：</p>

<figure class="highlight"><pre><code class="language-console" data-lang="console"><span class="err">composer global require phpunit/phpunit</span></code></pre></figure>

<p>这将会创建一个 <code class="highlighter-rouge">~/.composer</code> 目录存放全局依赖，要让已安装依赖的二进制命令随处可用，你需要添加 <code class="highlighter-rouge">~/.composer/vendor/bin</code> 目录到你的 <code class="highlighter-rouge">$PATH</code> 变量。</p>

<ul>
  <li><a href="http://getcomposer.org/doc/00-intro.md">其他学习 Composer 相关资源</a></li>
</ul>


</section>
