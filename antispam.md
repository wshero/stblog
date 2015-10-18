# 介绍 #

本文介绍如何在后台开启SPAM防治插件，默认的SPAM插件采用Akismet机制来过滤和屏蔽垃圾留言和引用。

[Akismet](http://akismet.com/)是著名博客系统Wordpress母公司[Automattic](http://automattic.com/)开发的一套SPAM防治机制，它试图在全球范围内创建一个的垃圾留言黑名单，每一个存在于此黑名单的Spammer都将自动被阻挡在使用akismet API的网站之外。

# 原理 #

在此版本的stblog中，作者编写了几个默认的插件，Akismet Antispam插件就是其中一个。通过在后台的设置，你可以轻松的激活和禁用，甚至更换一种SPAM防治逻辑。

# 方法 #

**配置**

1. 申请一个Akismet API Key。你可以[在这里](http://akismet.com/personal/)免费申请。

2. 用文本编辑器打开stblog源文件根目录下的st\_plugins/antispam/Antispam.php文件，找到并修改API\_KEY为你第1步中申请的KEY值:

```
const API_KEY = 'e967c5f40d01'; //这里修改为你从注册wordpress.com所获得到的key
```

3. 保存文件并上传到服务器。

**激活插件**

使用你的管理员账号和密码登陆后台管理界面。

找到"控制台"/“插件”，进入插件管理界面，点击“激活”按钮激活"Antispam: SPAM防治插件(Akismet)"。