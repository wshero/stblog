# 介绍及注意事项 #

如何通过URL重写去除路径中的index.php？

在开始之前，请先保证你的web服务器支持URL重写功能，具体来说就是：

  * 如果服务器是Apache，请确认其开启了mod\_rewrite功能模块
  * 如果服务器是IIS，请确认其安装了ISAPI\_Rewrite拓展

如果你使用的是虚拟主机，可以向IDC咨询相关情况。

# 方法 #

**以下方法使用于服务器是Apache的情况，如果服务器为IIS，某些步骤可能有所不同。**

1. 打开文本编辑器，创建一个新文件，并复制以下代码:

```
    RewriteEngine On
    RewriteBase /
	
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /index.php/$1 [L]
```

2. 保存文件为.htaccess，并上传到博客程序的根目录下。

3. 完成.

# 额外信息 #

在你下载的源码安装包下的"相关文档"文件夹中，提供了一份.htaccess示例写法。