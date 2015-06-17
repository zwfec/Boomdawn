##Boomdawn 个人网站程序
基于 laravel 5.1 开发，是一个简单优雅的博客程序。
网站演示：[www.boomdawn.com](http://www.boomdawn.com "boomdawn")
###环境要求
- PHP >= 5.5.9
- OpenSSL PHP 扩展
- Mbstring PHP 扩展
- Tokenizer PHP 扩展
- 服务端 ( apache/nginx ) 需要开启rewrite

###下载方法

方法一：`git clone https://github.com/Boomdawn/Boomdawn.git`

方法二：点击右侧 ZIP 下载

###安装程序

1.将主目录下 `.env.example` 重命名为 `.env`

2.打开 `.env` 修改以下信息

> APP_DEBUG = false
DB_HOST = 数据库地址
DB_DATABASE = 数据库名称
DB_USERNAME = 数据库用户名
DB_PASSWORD = 数据库密码

3.命令行进入项目目录 输入 `php artisan key:generate` 生成安全密匙

4.初始化数据 输入 `php artisan migrate:refresh --seed` 

5.配置主机域名，目录需要指向项目子目录 `public` 例如 `D:/www/Boomdawn/public`

6.现在已经可以访问了 后台地址 `/login` 默认用户名密码都是 `admin`

