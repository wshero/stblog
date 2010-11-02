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
 *	请求路由和转发类 Router Class
 *
 *	拓展CI默认的Router规则，使其系统架构模块化。
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
 
require_once APPPATH . "third_party/MX/Router.php";

class ST_Router extends MX_Router {}

/* End of file ST_Router.php */
/* Location: ./stblog/core/ST_Router.php */