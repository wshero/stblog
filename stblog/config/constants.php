<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Stblog Version
|--------------------------------------------------------------------------
|
| Major Version . Minor Version . Bug-fix Updates
|
*/
define('STB_VERSION', '0.2.0');
define('STB_RELEASE', '20101111');


/*
|--------------------------------------------------------------------------
| Automatically detect the current server env without dirty your hands!
|--------------------------------------------------------------------------
|
|
*/
// Local environment for test or dev purpose
if(strpos($_SERVER['SERVER_NAME'], 'local.') !== FALSE || strpos($_SERVER['SERVER_NAME'], '.local') !== FALSE || $_SERVER['SERVER_NAME'] == 'localhost' OR $_SERVER['SERVER_NAME'] == '127.0.0.1')
{
  define('ENV', 'local');
}
// Live environment for production purpose
else
{
  define('ENV', 'live');
}

/*
|--------------------------------------------------------------------------
| 自动检测系统的根目录Web Root
|--------------------------------------------------------------------------
|
| 通过当前URL推测系统安装的Web Root: 可以避免每次在config/config.php中手动定义base_url。
| 注意：
|	base_url 和 base_uri 并不相同。
|	base_url包含完整主机域名或IP地址信息和Web路径，比如http://localhost/~Saturn/stcms/。
|	base_uri仅包含web地址，比如/~Saturn/stcms/。
|
*/
if(isset($_SERVER['HTTP_HOST']))
{
	$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ? 'https' : 'http';
	$base_url .= '://'. $_SERVER['HTTP_HOST'];
	$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	$base_uri = parse_url($base_url, PHP_URL_PATH);
	
	if(substr($base_uri, 0, 1) != '/') $base_uri = '/'.$base_uri;
	if(substr($base_uri, -1, 1) != '/') $base_uri .= '/';
}
else
{
	$base_url = 'http://localhost/';
	$base_uri = '/';
}

// 将 $base_url 和 $base_uri 两个本地 Web Root 变量赋值给常量备用
define('BASE_URL', $base_url);
define('BASE_URI', $base_uri);
define('APPPATH_URI', BASE_URI . APPPATH);

// 销毁本地变量
unset($base_url, $base_uri);

/* End of file constants.php */
/* Location: ./application/config/constants.php */