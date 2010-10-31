<?php
/**
 * Detect language based on user preference or browser's setting
 *
 * @access	public
 * @return	void
 */
function detect_lang()
{
	// 加载语言配置文件
	$config = CI()->load->config('lang', TRUE);
	
	// 获取 URL 中的语言参数，比如 somepage?lang=zh-cn
	$lang = CI()->input->get('lang') ? CI()->input->get('lang', TRUE) : '';
	
	// 是否为空？
	if(!empty($lang))
	{
		// 安全过滤
		$lang = get_lang_code($lang);
		
		// 记住用户的语言选择，一年后过期
		set_cookie(array(
			'name'	=> 'lang',
			'value'	=> $lang,
			'expire' => 31536000
			));
	}
	// 已经自动检测过语言 或 用户选择过语言 了，而且同步在了session中
	elseif( CI()->session->userdata('lang') )
	{
		$lang = CI()->session->userdata('lang');
	}
	// 用户已经手动选择过语言
	elseif( get_cookie('lang') )
	{
		$lang = get_cookie('lang', TRUE);
	}
	// 仍然不知道采用何种语言？开始检测浏览器参数
	else if (!empty( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ))
	{
		// 将浏览器接收的全部语言分隔成数组
		$accept_langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

		log_message('debug', 'Checking browser languages: '.implode(', ', $accept_langs));

		// 依次检查，直到我们找到STCMS支持的那一种语言
		foreach ($accept_langs as $lang)
		{
			// 将en-gb,en-us,en-au统统转化成en，但需要保留zh-tw,zh-cn,zh-hk这样的中文语系代码
			$lang = get_lang_code($lang);

			// 检查是否有语言包支持，如果有则完成检测
			if(in_array($lang, array_keys($config['supported_langs'])))
			{
				break;
			}
		}
	}
	
	// 没有检测到任何语言的支持，只能使用默认的语言
	if(empty($lang) or ! array_key_exists($lang, $config['supported_langs']))
	{
		$lang = $config['default_lang'];
	}
	
	// 将最后决定的语言代码保存在session中
	CI()->session->userdata('lang') OR CI()->session->set_userdata('lang', $lang);
	
	// 动态设置语言
	CI()->config->set_item('language', $config['supported_langs'][$lang]['folder']);

	// 设置一个应用程序级的语言代码常数
	define('CURRENT_LANG', $lang);
}

// 去除多余的字符：除了中文系语言代码有zh-cn,zh-tw,zh-hk,zh-sg外，其他国家语言代码均只接收由 2 个字符组成的代码
function get_lang_code($lang)
{
	$lang = strtolower(trim($lang));
	return (strpos($lang, 'zh') !== FALSE) ? substr($lang, 0, 5) : substr($lang, 0, 2);
}		
