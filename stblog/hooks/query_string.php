<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 开启GET传递查询字符串的功能
 * 
 * 此Hook允许开发者在程序中使用AUTO作为uri protocol时，仍能方便使用$_GET。且无需在config.php中将
 * $config['enable_query_strings'] 设置为 True。
 *
 *	原理：
 *		1. 在系统启动初期（Pre-System Hook）获取$_GET数组，将其备份到静态变量
 *		2. 清除uri上面的查询字符串（clean_uri），以实现AUTO的uri_protocol
 * 		3. CI的INPUT类销毁$_GET
 * 		4. 在每个控制器被调用之前 (Pre-Controller Hook)，恢复$_GET
 *	使用方法：
 *		在需要获取查询字符串的控制器任何位置：
 *			$foo = $this->input->get('bar'); //不推荐：未进行XSS Clean
 *			$bar = $this->input->get('foo', TRUE); //推荐：XSS Clean后的变量
 *
 *
 * @author Dan Horrigan
 * @modifed Saturn
 * @link   http://github.com/dhorrigan/codeigniter-query-string
 * @link   http://codeigniter.com/user_guide/libraries/input.html
 * @link   http://codeigniter.com/user_guide/general/hooks.html
 * 
 * $Id$
 */
function clean_uri()
{
	$_GET = null;
	
	foreach(array('REQUEST_URI', 'PATH_INFO', 'ORIG_PATH_INFO') as $uri_protocol)
	{
		if(!isset($_SERVER[$uri_protocol]))
		{
			continue;
		}
		
		if(strpos($_SERVER[$uri_protocol], '?') !== FALSE)
		{
			$_SERVER[$uri_protocol] = str_replace('?'.$_SERVER['QUERY_STRING'], '', $_SERVER[$uri_protocol]);
		}
	}
}

function recreate_get()
{
	parse_str($_SERVER['QUERY_STRING'],$_GET);
}

/* End of file get_query_string.php */
/* Location: ./system/stcms/hooks/get_query_string.php */