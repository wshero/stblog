# STBLOG 版本更新日志 #

本wiki用来记录Stblog一路走来的发布版本及其更新日志

# stblog v0.1.0 #

2010/03/14

stblog第一个版本正式发布

# stblog v0.1.1 #

2010/03/16

此版本以BUG修复为主：

  1. 修复Windows主机路径问题的bug (感谢huboo82)
  1. 修复激活编辑器插件前后分段不统一的bug
  1. 修复url中文字符过滤的问题
  1. 修复若干typo

# stblog v0.1.2 #

2010/04/18

此版本修复几个重要BUG：

  1. 添加用户时用户验证的逻辑错误，users\_mdl.php | controllers/admin/users.php ([issue 2](https://code.google.com/p/stblog/issues/detail?id=2))
  1. 附件没有删除但显示成功删除附件的BUG ([issue 3](https://code.google.com/p/stblog/issues/detail?id=3)#2)
  1. 语义化时间显示出错的BUG ([issue 3](https://code.google.com/p/stblog/issues/detail?id=3)#6)
  1. 若干typo ([issue 3](https://code.google.com/p/stblog/issues/detail?id=3)#2)
  1. 汉化了Syntaxhighlighter for ckeditor代码高亮插件
  1. htmlspecialchars重复转换bug
  1. 其他若干细小bug

增加功能：

  1. 后台批量审核普通用户提交的文章

感谢参与本版本测试的朋友zycbob/huboo82/flexbeer