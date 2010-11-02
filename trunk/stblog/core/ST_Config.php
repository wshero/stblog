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
 *	配置类 Config Class
 *
 *	拓展CI默认的Config规则。
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
 
require_once APPPATH . "third_party/MX/Config.php";

class ST_Config extends MX_Config
{
	/**
	 * Site URL 
	 * 
	 * Modified to stop double extensions eg: .rss.html
	 *
	 * @access	public
	 * @param	string	the URI string
	 * @return	string
	 */
	function site_url($uri = '')
	{
		if ($uri == '')
		{
			return $this->slash_item('base_url').$this->item('index_page');
		}
		
		if ($this->item('enable_query_strings') == FALSE)
		{
			if (is_array($uri))
			{
				$uri = implode('/', $uri);
			}
	
			// newer version, pipe syntax in Dwoo template
			if(strpos($uri, '|') > 0)
			{
				// Split the pipe
				list($uri, $suffix) = explode('|', $uri);
				
				// Dont forget the period
				$suffix = '.'.$suffix;
			}
			
			else
			{
				$suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
			}
			// end newer version
			
			return $this->slash_item('base_url').$this->slash_item('index_page').preg_replace("|^/*(.+?)/*$|", "\\1", $uri).$suffix;

		}
		else
		{
			if (is_array($uri))
			{
				$i = 0;
				$str = '';
				foreach ($uri as $key => $val)
				{
					$prefix = ($i == 0) ? '' : '&';
					$str .= $prefix.$key.'='.$val;
					$i++;
				}

				$uri = $str;
			}

			if ($this->item('base_url') == '')
			{
				return $this->item('index_page').'?'.$uri;
			}
			else
			{
				return $this->slash_item('base_url').$this->item('index_page').'?'.$uri;
			}
		}
	}

}

/* End of file ST_Config.php */
/* Location: ../stblog/core/ST_Config.php */