<?php  defined('BASEPATH') OR exit('No direct script access allowed');
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
 *	加载类 Loader Class
 *
 *	拓展CI默认的Loader规则，以满足系统架构模块化的要求。
 *	
 *
 *
 *	@package	STCMS
 *	@subpackage Libraries
 *	@category	Libraries
 *	@author		Saturn <huyanggang@gmail.com>
 *	@link	
 *
 *	$Id$	   
 */

require_once APPPATH . "third_party/MX/Loader.php";

class ST_Loader extends MX_Loader {}

/**
 * Global CI super object for PHP5 ONLY
 *
 * Example:
 * CI()->db->get('table');
 *
 * @staticvar	object	$ci
 * @return		object
 */
function CI()
{
    return CI_Base::get_instance();
}

/* End of file ST_Loader.php */
/* Location: ./stblog/core/ST_Loader.php */