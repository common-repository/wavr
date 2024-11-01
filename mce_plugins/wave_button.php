<?php

//include('buttonsnap.php');
//
//add_action('init', 'wave_button_init');
//
//function wave_button_init() {
//	$wave_button_code_image_url = buttonsnap_dirname(__FILE__)
//	. '/images/wave.png';
//
//	buttonsnap_ajaxbutton($wave_button_code_image_url,
//	 'Wave', 'wave_insert_hook');
//	add_filter('wave_insert_hook', 'wave_insert_sink');
//
//}
//
//function wave_insert_sink($selectedtext){
//	return '[wave id="'.stripslashes($selectedtext).'"]';
//}

function plugin_uri(){
	return get_settings('siteurl') . '/wp-content/plugins/wavr/';
}
function easywave_addbuttons(){
	// Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;

   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
		add_filter('mce_buttons_2','add_wavr_mce_button');
		add_filter('mce_external_plugins','add_wavr_mce_plugin');
	}
}

function add_wavr_mce_button($buttons){
	$buttons[]='easywave';
	return $buttons;
}

function add_wavr_mce_plugin($plugins){
	$plugins['easywave']=plugin_uri().'mce_plugins/easywave/editor_plugin_src.js';
	return $plugins;
}

add_action('init', 'easywave_addbuttons');
