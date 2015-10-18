# 概述 #

本文主要介绍STBlog的首次安装过程，适用版本: 0.1.x。需要注意的是，目前版本的stblog不支持自动安装，所有步骤均须手动。


# 详细步骤 #

1. 下载并解压stblog源代码压缩文件，将其上传到WEB SERVER（Apache/IIS）所在的WEB目录中（比如www或者htdocs）。

2. 创建程序所需的数据库

  * 在服务器的Mysql数据库中创建一个新数据库，名称可以自定义，比如：stblog\_db
  * 打开解压后的stblog源代码文件夹，找到并打开"user\_guide"文件夹，将DB.SQL导入你上一步创建好的数据库中

3. 程序和权限的配置

**基本配置**

使用文本编辑器，打开application/config.php文件，做以下设置并保存.

修改以下配置项为stblog程序根目录所对应的URL， **注意结尾要加左斜杠** 。

```
$config['base_url']= "http://www.example.com/stblog/";
```

比如以上配置我将stblog安装在www.example.com所在服务器的一个叫做stblog的目录下。

**数据库配置**

使用文本编辑器，打开application/database.php文件，找到以下区块设置并保存.

```
$db['default']['hostname'] = "localhost";//你的mysql数据库所在的主机名，可以为域名或IP地址
$db['default']['username'] = "root";//你的mysql数据库用户名
$db['default']['password'] = "root";//你的mysql数据库密码
$db['default']['database'] = "stblog";//你在第2步中创建的数据库的名称
```

**目录权限设置**

请保证以下目录/文件夹的可读可写权限，比如在linux主机下设置其权限为777：

```
./uploads
./themes
./application/cache
./application/dbcache
```

**4. 打开你的浏览器，输入博客的URL，使用如下默认用户名和密码登陆stblog后台系统：**

```
用户名：admin
密码： STBLOG
```

请第一时间修改你的用户名和登陆密码。

5. 设置完成，开始享用stblog给你提供的博客盛宴吧!