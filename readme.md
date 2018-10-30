## 项目概述

* 产品名称：江西师范大学Cubing魔方协会
* 项目代号：Cubing-JXNU
* 官方地址：http://www.cubingstart.studio

Cubing-JXNU 是江西师范大学Cubing魔方协会官方网站。

协会正式成立于2017年9月，由罗鑫、吴健坤创立。  

该网址由吴健坤、罗鑫共同维护。

![](http://www.cubingstart.studio/img/logo/icon.png)

### 联系方式：

吴健坤：wujiankun1998@qq.com  
罗鑫：591404144@qq.com

## 功能如下

- 用户认证 —— 注册、登录、退出；
- 个人中心 —— 用户个人中心，编辑资料；
- 上传图片 —— 修改头像和编辑话题时候上传图片；
- 表单验证 —— 使用表单验证类；
- 多角色权限管理 —— 允许站长，管理员权限的存在；

## 运行环境要求

- Nginx 1.8+ / Apache 2.4+
- PHP 7.0+
- Mysql 5.7+

## 开发环境部署/安装

推荐环境：
- Windows10
- Wamp Server 3.0.6+

### 基础安装

#### 1. 克隆源代码

克隆 `Cubing-JXNU` 源代码到本地（例如wamp_www下）：

    > git clone https://git.dev.tencent.com/MGGJ/cubing-jxnu.git

#### 2. 配置本地的 Wamp 环境

##### 编辑 Wamp 中 Apache 的 `https_vhosts.conf` 文件，加入对应修改，添加一个虚拟主机，方式所下：

```
...
<VirtualHost *:80> 
	ServerName cubing.jxnu.club
	DocumentRoot C:/Users/MGGJ/Documents/wamp_www/Cubing-JXNU/public
	<Directory  "C:/Users/MGGJ/Documents/wamp_www/Cubing-JXNU/public/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>
```

`VirtualHost` 即主机端口号，与实际 Apache 端口号保持一致，这里为默认的 `80` 端口。

`ServerName` 指的是浏览器中地址栏的地址，例如 `Localhost` ，这里使用一个虚假的域名 `cubing.jxnu.club` 。

`DocumentRoot` 文件目录，指向项目目录内的 `public` 文件夹。

`<Directory>` 内目录与 `DocumentRoot` 保持一致。
注意：末尾多一了个 `/` 。

#####修改完成后保存，重启 Wamp Server

#### 3. 安装扩展包依赖

	composer install

#### 4. 生成配置文件

```
cp .env.example .env
```

你可以根据情况修改 `.env` 文件里的内容，如数据库连接、缓存、邮件设置等：

```
APP_URL=http://cubing.jxnu.club
...
DB_HOST=127.0.0.1
DB_DATABASE=cubing-jxnu
DB_USERNAME=[数据库登录名]
DB_PASSWORD=[数据库密码]

MAIL_DRIVER=smtp
MAIL_HOST=smtp.qq.com
MAIL_PORT=465
MAIL_USERNAME=[邮箱]
MAIL_PASSWORD=[邮箱密码]
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=[邮箱]
MAIL_FROM_NAME=Cubing-JXNU
```

#### 5. 生成数据表及生成测试数据

在 Homestead 的网站根目录下运行以下命令

```shell
$ php artisan migrate --seed
```

初始的用户角色权限已使用数据迁移生成。

#### 7. 生成秘钥

```shell
php artisan key:generate
```

#### 8. 配置 hosts 文件

手动在 `hosts` 文件中添加一行（地址与上一步中 `ServerName`相同）：

```
    127.0.0.1    cubing.jxnu.club
```

Linux下可执行下方命令
```
echo "127.0.0.1    cubing.jxnu.club" | sudo tee -a /etc/hosts
```

### 前端框架安装

### 链接入口

## 服务器架构说明

## 扩展包使用情况

| 扩展包 | 一句话描述 | 本项目应用场景 |
| --- | --- | --- |
| [overtrue/laravel-lang](https://github.com/overtrue/laravel-lang) | 语言包 | 配置提示信息语言 |
| [spatie/laravel-permission](https://github.com/spatie/laravel-permission) | 角色权限管理 | 角色和权限控制 |
| [doctrine/dbal](https://github.com/doctrine/dbal) | 数据库抽象层 | 上传图片用 |
| [summerblue/administrator](https://github.com/summerblue/administrator) | 管理后台 | 模型管理后台、配置信息管理后台 |

## 自定义 Artisan 命令

| 命令行名字 | 说明 | Cron | 代码调用 |
| --- | --- | --- | --- |

## 队列清单

| 名称 | 说明 | 调用时机 |
| --- | --- | --- |
