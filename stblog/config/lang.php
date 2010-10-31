<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| 系统支持的语言配置
|--------------------------------------------------------------------------
|
| 本文件包含Stblog支持的所有语言列表。其结构是一个二维数组，其中一维key是语言的英文代码，一维
| value是另一个数组，包含：每个语言对应的名称（用该语言书写）和文件夹英文名称。
| 
| Check for HTML equivilents for characters such as � with the URL below:
|    http://htmlhelp.com/reference/html40/entities/latin1.html
|
|
|	array('zh-cn' => '简体中文', 'zh-tw' => '正體中文', 'en'=> 'English')
|
*/
$config['supported_langs'] = array(
	'en'=> array('name' => 'English', 'folder' => 'english'),
	'zh-cn'=> array('name' => 'Simplified Chinese (简体中文)', 'folder' => 'zh-cn'),
	'zh-tw'=> array('name' => 'Traditional Chinese (繁體中文)', 'folder' => 'zh-tw')
);

/*
|--------------------------------------------------------------------------
| 默认语言代码
|--------------------------------------------------------------------------
|
| 如果没有指定语言，系统将会选用的语言代码。必须是上面数组出现过的语言代码。
|
|	en
|
*/
$config['default_lang'] = 'en';

/* End of file language.php */
/* Location: ./stblog/config/language.php */