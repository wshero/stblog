<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
// PRE SYSTEM HOOKS
$hook['pre_system'] = array(
	'function' => 'clean_uri',
	'filename' => 'query_string.php',
	'filepath' => 'hooks'
);

// PRE CONTROLLER HOOKS
$hook['pre_controller'][] = array(
	'function' => 'recreate_get',
	'filename' => 'query_string.php',
	'filepath' => 'hooks'
);

// PRE CONTROLLER Constructor HOOKS
$hook['pre_controller_constructor'][] = array(
	'function' => 'detect_lang',
	'filename' => 'detect_lang.php',
	'filepath' => 'hooks'
);


/* End of file hooks.php */
/* Location: ./application/config/hooks.php */