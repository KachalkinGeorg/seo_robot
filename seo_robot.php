<?php

# protect against hack attempts
if (!defined('NGCMS')) die ('HAL');

add_act('index', 'seo_robot');

function seo_robot()
{
	global $config, $plugin, $callingParams, $currentCategory, $CurrentHandler, $SYSTEM_FLAGS;

	if (pluginGetVariable('seo_robot', 'robo_tags')) {
		if ($CurrentHandler['handlerName'] == 'tags'){
			$SYSTEM_FLAGS['meta']['robots'] = pluginGetVariable('seo_robot', 'meta_tags');
		}
	}
	
	if (pluginGetVariable('seo_robot', 'robo_cat')) {
		if($currentCategory['id']){
			$SYSTEM_FLAGS['meta']['robots'] = pluginGetVariable('seo_robot', 'meta_cat');
		}
	}
	
	if (pluginGetVariable('seo_robot', 'robo_news')) {
		if (($CurrentHandler['handlerName'] == 'news') || ($CurrentHandler['handlerName'] == 'print')) {
			if (!$SYSTEM_FLAGS['meta']['robots']) {
				$SYSTEM_FLAGS['meta']['robots'] = pluginGetVariable('seo_robot', 'meta_news');
			}
		}
	}
	
	if (pluginGetVariable('seo_robot', 'robo_static')) {
		if ($CurrentHandler['pluginName'] == 'static') {
			$SYSTEM_FLAGS['meta']['robots'] = pluginGetVariable('seo_robot', 'meta_static');
		}
	}
	
	if (pluginGetVariable('seo_robot', 'robo_registr')) {
		if ($CurrentHandler['handlerName'] == 'registration') {
			$SYSTEM_FLAGS['meta']['robots'] = pluginGetVariable('seo_robot', 'meta_registr');
		}
	}
	
	if (pluginGetVariable('seo_robot', 'robo_lostpas')) {
		if ($CurrentHandler['handlerName'] == 'lostpassword') {
			$SYSTEM_FLAGS['meta']['robots'] = pluginGetVariable('seo_robot', 'meta_lostpas');
		}
	}
	
	if (pluginGetVariable('seo_robot', 'robo_search')) {
		if ($_REQUEST['search']) {
			$SYSTEM_FLAGS['meta']['robots'] = pluginGetVariable('seo_robot', 'meta_search');
		}
	}
	
	if (pluginGetVariable('seo_robot', 'robo_main')) {
		if ($_SERVER['REQUEST_URI'] == '/'){
			$SYSTEM_FLAGS['meta']['robots'] = pluginGetVariable('seo_robot', 'meta_main');
		}
	}
}

?>