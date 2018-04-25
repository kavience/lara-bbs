# lara-bbs
基于laravel的一个bbs论坛项目

###项目逐渐完善中...

# lara-bbs项目总结

## API资源路由

## 中间件
- Laravel 中间件 (Middleware) 为我们提供了一种非常棒的过滤机制来过滤进入应用的 HTTP 请求，例如，当我们使用 Auth 中间件来验证用户的身份时，如果用户未通过身份验证，则 Auth 中间件会把用户重定向到登录页面。如果用户通过了身份验证，则 Auth 中间件会通过此请求并接着往下执行。Laravel 框架默认为我们内置了一些中间件，例如身份验证、CSRF 保护等。所有的中间件文件都被放在项目的 app/Http/Middleware 文件夹中。
- 
## 授权策略
- 当 id 为 2 的用户去尝试更新 id 为 1 的用户信息时，我们应该返回一个 403 禁止访问的异常。在 Laravel 中可以使用 授权策略 (Policy) 来对用户的操作权限进行验证，在用户未经授权进行操作时将返回 403 禁止访问的异常。

## yarn的安装与使用
- 各个版本参考 https://yarn.bootcss.com/docs/install.html

- 安装
在 Debian 或者 Ubuntu 操作系统上，你可以通过我们提供的 Debian 包仓库来安装 Yarn。 在这之前，你需要先配置仓库：
```curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
   echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list
```
- 执行
```
sudo apt-get update && sudo apt-get install yarn
```
- 
## 验证码的安装与使用
- 安装
 ```
 composer require "mews/captcha:~2.0"
 ``` 
- 运行以下命令生成配置文件 config/captcha.php：
```
php artisan vendor:publish --provider='Mews\Captcha\CaptchaServiceProvider' 
```
- 打开配置文件，查看其内容。
## 语言提示包
- 安装
``` 
composer require "overtrue/laravel-lang:~3.0"
```
##  laravel默认安装的Carbon包
- 在AppServiceProvider中配置为中文
```
 \Carbon\Carbon::setLocale('zh');
 ```
## 图片裁切的包
- 安装
```
composer require intervention/image
```
- 配置信息
```
php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravel5"
```

## 代码生成器
- 开发时遵守的代码风格是 Laravel 项目开发规范。遵照此规范，在实际操作中，有许多重复，接下来推荐一款专为此规范量身定制的代码生成器 —— Laravel 5.x Scaffold Generator 。代码生成器能让你通过执行一条 Artisan 命令，完成注册路由、新建模型、新建表单验证类、新建资源控制器以及所需视图文件等任务，不仅约束了项目开发的风格，还能极大地提高我们的开发效率。
- 安装
``` 
composer require "summerblue/generator:~0.5" --dev
```
- 版本标记
``` 
git add -A
git commit -m "Add generator"
```
- 试运行(谨慎！会产生不必要的字段，记得执行之前提交版本，然后在返回到该版本)
``` 
php artisan make:scaffold Projects --schema="name:string:index,description:text:nullable,subscriber_count:integer:unsigned:default(0)"
```

## 安装 Debugbar
- 使用 Composer 安装：
``` 
composer require "barryvdh/laravel-debugbar:~3.1" --dev
```
- 生成配置文件，存放位置 config/debugbar.php：
``` 
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
```
## 判断『路由命名』和『路由参数』为导航栏添加 active 类
- 安装
``` 
composer require "hieu-le/active:~3.5"
```
- 使用
``` 
active_class($condition, $activeClass = 'active', $inactiveClass = '')
```
- 该包的其他函数
    - if_route() - 判断当前对应的路由是否是指定的路由；
    - if_route_param() - 判断当前的 url 有无指定的路由参数。
    - if_query() - 判断指定的 GET 变量是否符合设置的值；
    - if_uri() - 判断当前的 url 是否满足指定的 url；
    - if_route_pattern() - 判断当前的路由是否包含指定的字符；
    - if_uri_pattern() - 判断当前的 url 是否含有指定的字符；
## Laravel 本地作用域 。
- 介绍
    - 本地作用域允许我们定义通用的约束集合以便在应用中复用。
    
- 使用
    - 要定义这样的一个作用域，只需简单在对应 Eloquent 模型方法前加上一个 scope 前缀，作用域总是返回 查询构建器。一旦定义了作用域，则可以在查询模型时调用作用域方法。在进行方法调用时不需要加上 scope 前缀。
     