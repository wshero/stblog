<?php
/**
 *	Stblog 
 *
 *	Stblog is an open source blogging system built on the 
 *	well-known PHP framework Codeigniter.
 *
 *	@package	STCMS
 *	@author		Saturn <huyanggang@gmail.com>
 *	@copyright	Copyright (c) 2009 - 2010, cnsaturn.com.
 *	@since		Version 0.1
 *	@link		http://stblog.googlecode.com/
 *	@filesource
 */

// ------------------------------------------------------------------------

/**
 *	Entry point of the app
 *
 *	对CI原入口index.php文件做相应修改，以提高程序兼容性和稳定性
 *
 *
 *	@package	STCMS
 *	@subpackage Miscellaneous
 *	@category	Miscellaneous
 *	@author 	Saturn <yangg.hu@gmail.com>
 *	@link	
 *
 *	$Id$	
 */
 
/*
 *---------------------------------------------------------------
 * PHP ERROR REPORTING LEVEL
 *---------------------------------------------------------------
 *
 * By default CI runs with error reporting set to ALL.	For security
 * reasons you are encouraged to change this when your site goes live.
 * For more info visit:	 http://www.php.net/error_reporting
 *
 */
	error_reporting(E_ALL);
	
	ini_set('display_errors', 1);


/*
|---------------------------------------------------------------
| 启动程序时动态修改PHP.ini的部分设置
|---------------------------------------------------------------
|
| 很多虚拟主机屏蔽或疏忽了一些PHP非常核心的功能，比如时区设置。以下设置可提高
| 程序的兼容性和稳定性，并避免上述问题的发生。
|
*/
	// 某些Windows主机会忘记设置include_path
	set_include_path(dirname(__FILE__));
	
	// Web服务器为Nginx时，为了支持PATH_INFO，很多人会将此选项打开，但此种设置
	// 可能会导致上传安全漏洞，必须关闭。
	@ini_set('cgi.fix_pathinfo', 0);
	
	// Be 100% sure the timezone is set
	if (ini_get("date.timezone") === "" && function_exists("date_default_timezone_set")) {
		 date_default_timezone_set("UTC");
	}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
	$system_path = "stblog/system";

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 *
 */
	$application_folder = "stblog";
	
/*
 *---------------------------------------------------------------
 * Vendors FOLDER NAME
 *---------------------------------------------------------------
 *
 * 第三方模块，插件和主题所在目录的文件夹名称。如果你移动或更改了该目录的名称，
 * 请将下面的变量修改为对应的路径和名称。
 *
 *
 *
 *
 * NO TRAILING SLASH!
 *
 */
	$vendors_folder = 'vendors';


/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here.	 For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT:  If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller.	 Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 *
 */
	// The directory name, relative to the "controllers" folder.  Leave blank
	// if your controller is not in a sub-folder within the "controllers" folder
	// $routing['directory'] = '';

	// The controller class file name.	 Example:  Mycontroller.php
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *	CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 *
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------




/*
 * ---------------------------------------------------------------
 *	Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */
	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

/*
 * -------------------------------------------------------------------
 *	Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));
	
	// The path to the "application" folder
	define('APPPATH', $application_folder.'/');
	
	// The path to the "vendors" folder
	define('VENDORSPATH', $vendors_folder . '/');

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
require_once BASEPATH.'core/CodeIgniter'.EXT;

/* End of file index.php */
/* Location: ./index.php */