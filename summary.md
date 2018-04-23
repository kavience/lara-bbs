# lara-bbs项目总结

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