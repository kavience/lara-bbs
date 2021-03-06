# 全书总结
- 用户认证 —— 注册、登录、退出；
- 个人中心 —— 用户个人中心，编辑资料；
- 用户授权 —— 作者才能删除自己的内容；
- 上传图片 —— 修改头像和编辑话题时候上传图片；
- 表单验证 —— 使用表单验证类；
- 模型监控 —— 自动 Slug 翻译；
- 使用第三方 API —— 请求百度翻译 API ；
- 队列任务 —— 将百度翻译 API 请求和发送邮件放到队列中，以提高响应；
- 计划任务 —— 『活跃用户』计算，一小时计算一次；
- 多角色权限管理 —— 允许站长，管理员权限的存在；
- 后台管理 —— 后台数据模型管理；
- 邮件通知 —— 发送新回复邮件通知；
- 站内通知 —— 话题有新回复；
- 自定义 Artisan 命令行 —— 自定义活跃用户计算命令；
- 自定义 Trait —— 活跃用户的业务逻辑实现；
- 自定义中间件 —— 记录用户的最后登录时间；
- 模型修改器；
- XSS 安全防御；

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
     
## 使用『预加载』修复 N +1 问题；
- N + 1问题：
    - 当使用模型关联时，存在sql多次重复查询
- 解决方案
    - 使用预加载，在控制器中使用模型的时候，添加with()函数，进行预加载 
    
## 模型观察器
- Eloquent模型会触发许多事件（Event），我们可以对模型的生命周期内多个时间点进行监控：创建，创建，更新，更新，保存，保存，删除，删除，恢复，恢复。有特定的模型类在数据库保存或更新时，执行代码。一个当新模型被初次保存将会触发creating以及created事件。如果模型一个已经存在于数据库御姐调用了save方法，触发将会updating状语从句：updated事件。在这两种下情况都会触发saving状语从句：saved事件。
  
- Eloquent观察器允许我们对给定模型中进行事件监控，观察者类里的方法名对应Eloquent想监听的事件。每种方法接收model作为其唯一的参数。

## Simditor编辑器
- 手动安装
``` 
https://github.com/mycolorway/simditor/
```

## 解决XSS(跨站攻击)跨站攻击
- 安装purifier
``` 
 composer require "mews/purifier:~2.0"
```
- 配置信息
``` 
php artisan vendor:publish --provider="Mews\Purifier\PurifierServiceProvider"
```
- 修改配置 \
修改config/purifier.php为
``` 
return [
    'encoding'      => 'UTF-8',
    'finalize'      => true,
    'cachePath'     => storage_path('app/purifier'),
    'cacheFileMode' => 0755,
    'settings'      => [
        'user_topic_body' => [
            'HTML.Doctype'             => 'XHTML 1.0 Transitional',
            'HTML.Allowed'             => 'div,b,strong,i,em,a[href|title],ul,ol,ol[start],li,p[style],br,span[style],img[width|height|alt|src],*[style|class],pre,hr,code,h2,h3,h4,h5,h6,blockquote,del,table,thead,tbody,tr,th,td',
            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,margin,width,height,font-family,text-decoration,padding-left,color,background-color,text-align',
            'AutoFormat.AutoParagraph' => true,
            'AutoFormat.RemoveEmpty'   => true,
        ],
    ],
];
```
- 使用配置
``` 
clean($topic->body, 'user_topic_body');
```
##安装http请求套件
- 安装
``` 
composer require "guzzlehttp/guzzle:~6.3"
```
- 安装完即可使用

## 安装依赖PinYin
PinYin 是 安正超 开发的，基于 CC-CEDICT 词典的中文转拼音工具，是一套优质的汉字转拼音解决方案。
- 安装
``` 
composer require "overtrue/pinyin:~3.0"
```

## 安装predis 作为请求队列
- 安装
``` 
composer require "predis/predis:~1.0"

```
- 修改env配置
``` 
QUEUE_DRIVER=redis
```
- 有时候队列中的任务会失败。Laravel 内置了一个方便的方式来指定任务重试的最大次数。当任务超出这个重试次数后，它就会被插入到 failed_jobs 数据表里面。我们可以使用 queue:failed-table 命令来创建 failed_jobs 表的迁移文件：
``` 
php artisan queue:failed-table
```

- 执行migrate
``` 
php artisan migrate
```
- 生成任务类
``` 
php artisan make:job TranslateSlug
```

- 启动监听
``` 
php artisan queue:listen
```
## Laravel 自带的一套极具扩展性的消息通知系统
- 解释
``` 
什么是通知频道？
通知频道是通知传播的途径，Laravel 自带的有数据库、邮件、短信（通过 Nexmo）以及 Slack。本章节中我们将使用数据库通知频道，后面也会使用到邮件通知频道。
```
- 准备数据库
``` 
php artisan notifications:table
php artisan migrate
```
- 生成通知类
``` 
php artisan make:notification TopicReplied
```
## 安装laravel-permission控制权限
- 安装
``` 
composer require "spatie/laravel-permission:~2.7"

```
- 配置
``` 
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
```
## 安装用户切换工具
- 安装
``` 
composer require "viacreative/sudo-su:~1.1"
```

- 配置。修改AppServiceProvider的register方法
``` 
public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }
```
## 安装后台管理页面
- 安装
``` 
composer require "summerblue/administrator:~1.1"
```
- 提取配置
``` 
php artisan vendor:publish --provider="Frozennode\Administrator\AdministratorServiceProvider
```
