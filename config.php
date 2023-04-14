<?php

# protect against hack attempts
if (!defined('NGCMS')) die ('HAL');

pluginsLoadConfig();
LoadPluginLang('seo_robot', 'config', '', '', '#');

if (engineVersion < '0.9.7'){
	msg(['type' => 'error', 'text' => $lang['seo_robot']['error']]);
	return print_msg( 'warning', $lang['seo_robot']['error'], str_replace('%version%', engineVersion, $lang['seo_robot']['error_descr']), 'javascript:history.go(-1)' );
}else{
	switch ($_REQUEST['action']) {
		case 'about':			about();		break;
		default: main();
	}
}

function about()
{global $twig, $lang, $breadcrumb;
	$tpath = locatePluginTemplates(array('main', 'about'), 'seo_robot', 1);
	$breadcrumb = breadcrumb('<i class="fa fa-code btn-position"></i><span class="text-semibold">'.$lang['seo_robot']['seo_robot'].'</span>', array('?mod=extras' => '<i class="fa fa-puzzle-piece btn-position"></i>'.$lang['extras'].'', '?mod=extra-config&plugin=seo_robot' => '<i class="fa fa-code btn-position"></i>'.$lang['seo_robot']['seo_robot'].'',  '<i class="fa fa-exclamation-circle btn-position"></i>'.$lang['seo_robot']['about'].'' ) );

	$xt = $twig->loadTemplate($tpath['about'].'about.tpl');
	$tVars = array();
	$xg = $twig->loadTemplate($tpath['main'].'main.tpl');
	
	$about = 'версия 0.1';
	
	$tVars = array(
		'global' => 'О плагине',
		'header' => $about,
		'entries' => $xt->render($tVars)
	);
	
	print $xg->render($tVars);
}

function metaDropDown($options, $name, $selected){
	$output = "<select name=\"$name\">\r\n";
	foreach($options as $value=>$description){
	$output .= "<option value=\"$value\"";
		if($selected == $value){
			$output .= " selected ";
		}
		$output .= ">$description</option>\n";
	}
	$output .= "</select>";
	return $output;
}

function main()
{global $twig, $lang, $breadcrumb;
	
	$tpath = locatePluginTemplates(array('main', 'general.from'), 'seo_robot', 1);
	$breadcrumb = breadcrumb('<i class="fa fa-code btn-position"></i><span class="text-semibold">'.$lang['seo_robot']['seo_robot'].'</span>', array('?mod=extras' => '<i class="fa fa-puzzle-piece btn-position"></i>'.$lang['extras'].'', '?mod=extra-config&plugin=seo_robot' => '<i class="fa fa-code btn-position"></i>'.$lang['seo_robot']['seo_robot'].'' ) );

	if (isset($_REQUEST['submit'])){
		pluginSetVariable('seo_robot', 'robo_main', intval($_REQUEST['robo_main']));
		pluginSetVariable('seo_robot', 'meta_main', $_REQUEST['meta_main']);
		pluginSetVariable('seo_robot', 'robo_search', intval($_REQUEST['robo_search']));
		pluginSetVariable('seo_robot', 'meta_search', $_REQUEST['meta_search']);
		pluginSetVariable('seo_robot', 'robo_lostpas', intval($_REQUEST['robo_lostpas']));
		pluginSetVariable('seo_robot', 'meta_lostpas', $_REQUEST['meta_lostpas']);
		pluginSetVariable('seo_robot', 'robo_registr', intval($_REQUEST['robo_registr']));
		pluginSetVariable('seo_robot', 'meta_registr', $_REQUEST['meta_registr']);
		pluginSetVariable('seo_robot', 'robo_static', intval($_REQUEST['robo_static']));
		pluginSetVariable('seo_robot', 'meta_static', $_REQUEST['meta_static']);
		pluginSetVariable('seo_robot', 'robo_news', intval($_REQUEST['robo_news']));
		pluginSetVariable('seo_robot', 'meta_news', $_REQUEST['meta_news']);
		pluginSetVariable('seo_robot', 'robo_cat', intval($_REQUEST['robo_cat']));
		pluginSetVariable('seo_robot', 'meta_cat', $_REQUEST['meta_cat']);
		pluginSetVariable('seo_robot', 'robo_tags', intval($_REQUEST['robo_tags']));
		pluginSetVariable('seo_robot', 'meta_tags', $_REQUEST['meta_tags']);
		pluginsSaveConfig();
		msg(array("type" => "info", "info" => "сохранение прошло успешно"));
		return print_msg( 'info', ''.$lang['seo_robot']['seo_robot'].'', 'Cохранение прошло успешно', 'javascript:history.go(-1)' );
	}

	$robo_main = pluginGetVariable('seo_robot', 'robo_main');
	$robo_main = '<option value="0" '.($robo_main==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($robo_main==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$robo_search = pluginGetVariable('seo_robot', 'robo_search');
	$robo_search = '<option value="0" '.($robo_search==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($robo_search==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$robo_lostpas = pluginGetVariable('seo_robot', 'robo_lostpas');
	$robo_lostpas = '<option value="0" '.($robo_lostpas==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($robo_lostpas==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$robo_registr = pluginGetVariable('seo_robot', 'robo_registr');
	$robo_registr = '<option value="0" '.($robo_registr==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($robo_registr==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$robo_static = pluginGetVariable('seo_robot', 'robo_static');
	$robo_static = '<option value="0" '.($robo_static==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($robo_static==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$robo_news = pluginGetVariable('seo_robot', 'robo_news');
	$robo_news = '<option value="0" '.($robo_news==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($robo_news==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$robo_cat = pluginGetVariable('seo_robot', 'robo_cat');
	$robo_cat = '<option value="0" '.($robo_cat==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($robo_cat==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$robo_tags = pluginGetVariable('seo_robot', 'robo_tags');
	$robo_tags = '<option value="0" '.($robo_tags==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($robo_tags==1?'selected':'').'>'.$lang['yesa'].'</option>';

	$xt = $twig->loadTemplate($tpath['general.from'].'general.from.tpl');
	$xg = $twig->loadTemplate($tpath['main'].'main.tpl');
	
	$tVars = array(
		'robo_main'   	=> $robo_main,
		'meta_main'   	=> MakeDropDown(array('all' => $lang['seo_robot']['meta_1'], 'index,nofollow' => $lang['seo_robot']['meta_2'], 'noindex,follow' => $lang['seo_robot']['meta_3'], 'index,follow' => $lang['seo_robot']['meta_4'], 'noindex,nofollow' => $lang['seo_robot']['meta_5'], 'none' => $lang['seo_robot']['meta_6']), 'meta_main', pluginGetVariable('seo_robot', 'meta_main')),
		'robo_search'   => $robo_search,
		'meta_search'   => MakeDropDown(array('all' => $lang['seo_robot']['meta_1'], 'index,nofollow' => $lang['seo_robot']['meta_2'], 'noindex,follow' => $lang['seo_robot']['meta_3'], 'index,follow' => $lang['seo_robot']['meta_4'], 'noindex,nofollow' => $lang['seo_robot']['meta_5'], 'none' => $lang['seo_robot']['meta_6']), 'meta_search', pluginGetVariable('seo_robot', 'meta_search')),
		'robo_lostpas'  => $robo_lostpas,
		'meta_lostpas'  => MakeDropDown(array('all' => $lang['seo_robot']['meta_1'], 'index,nofollow' => $lang['seo_robot']['meta_2'], 'noindex,follow' => $lang['seo_robot']['meta_3'], 'index,follow' => $lang['seo_robot']['meta_4'], 'noindex,nofollow' => $lang['seo_robot']['meta_5'], 'none' => $lang['seo_robot']['meta_6']), 'meta_lostpas', pluginGetVariable('seo_robot', 'meta_lostpas')),
		'robo_registr'  => $robo_registr,
		'meta_registr'  => MakeDropDown(array('all' => $lang['seo_robot']['meta_1'], 'index,nofollow' => $lang['seo_robot']['meta_2'], 'noindex,follow' => $lang['seo_robot']['meta_3'], 'index,follow' => $lang['seo_robot']['meta_4'], 'noindex,nofollow' => $lang['seo_robot']['meta_5'], 'none' => $lang['seo_robot']['meta_6']), 'meta_registr', pluginGetVariable('seo_robot', 'meta_registr')),
		'robo_static'   => $robo_static,
		'meta_static'   => MakeDropDown(array('all' => $lang['seo_robot']['meta_1'], 'index,nofollow' => $lang['seo_robot']['meta_2'], 'noindex,follow' => $lang['seo_robot']['meta_3'], 'index,follow' => $lang['seo_robot']['meta_4'], 'noindex,nofollow' => $lang['seo_robot']['meta_5'], 'none' => $lang['seo_robot']['meta_6']), 'meta_static', pluginGetVariable('seo_robot', 'meta_static')),
		'robo_news'   	=> $robo_news,
		'meta_news'   	=> MakeDropDown(array('all' => $lang['seo_robot']['meta_1'], 'index,nofollow' => $lang['seo_robot']['meta_2'], 'noindex,follow' => $lang['seo_robot']['meta_3'], 'index,follow' => $lang['seo_robot']['meta_4'], 'noindex,nofollow' => $lang['seo_robot']['meta_5'], 'none' => $lang['seo_robot']['meta_6']), 'meta_news', pluginGetVariable('seo_robot', 'meta_news')),
		'robo_cat'   	=> $robo_cat,
		'meta_cat'   	=> MakeDropDown(array('all' => $lang['seo_robot']['meta_1'], 'index,nofollow' => $lang['seo_robot']['meta_2'], 'noindex,follow' => $lang['seo_robot']['meta_3'], 'index,follow' => $lang['seo_robot']['meta_4'], 'noindex,nofollow' => $lang['seo_robot']['meta_5'], 'none' => $lang['seo_robot']['meta_6']), 'meta_cat', pluginGetVariable('seo_robot', 'meta_cat')),
		'robo_tags'   	=> $robo_tags,
		'meta_tags'   	=> MakeDropDown(array('all' => $lang['seo_robot']['meta_1'], 'index,nofollow' => $lang['seo_robot']['meta_2'], 'noindex,follow' => $lang['seo_robot']['meta_3'], 'index,follow' => $lang['seo_robot']['meta_4'], 'noindex,nofollow' => $lang['seo_robot']['meta_5'], 'none' => $lang['seo_robot']['meta_6']), 'meta_tags', pluginGetVariable('seo_robot', 'meta_tags')),
									
	);
	
	$tVars = array(
		'global' => 'Общие',
		'header' => '<i class="fa fa-exclamation-circle"></i> <a href="?mod=extra-config&plugin=seo_robot&action=about">'.$lang['seo_robot']['about'].'</a>',
		'entries' => $xt->render($tVars)
	);
	
	print $xg->render($tVars);
}
