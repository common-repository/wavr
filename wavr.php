<?php
/*
Plugin Name: Wavr
Plugin URI: https://sourceforge.net/projects/wavr/
Description: Wavr is an easy way to embed google wave into wordpress.
Version: 0.2.6
Author: Lucas Caro
Author URI: http://www.triplesmart.com/
*/
?>
<?php
/*
    Copyright 2009  Lucas Caro (email : lucas@triplesmart.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
?>
<?php
//setUIConfig(bgcolor:String, color:String, font:String, fontsize:String)
include('support/common.php');

/* Set the admin options page */
add_action('admin_menu', 'wavr_menu');

add_option("wavr_default_server", 'https://wave.google.com/wave/');
add_option("wavr_default_color", '');
add_option("wavr_default_bgcolor", '');
add_option("wavr_default_font", '');
add_option("wavr_default_font_size", '');
add_option("wavr_default_width", '100%');
add_option("wavr_default_height", '500px');

function wavr_menu(){
	add_options_page('Wavr Setup',"Wavr",'manage_options','wavr','wavr_options');
}

function wavr_options(){
	include("support/options_page.php");
}

$global_waves=0;
function expand_wave($atts){
	global $global_waves;
	$default_bgcolor = get_option('wavr_default_bgcolor');
	$default_color = get_option('wavr_default_color');
	$default_font = get_option('wavr_default_font');
	$default_font_size = get_option('wavr_default_font_size');
	$default_width = get_option('wavr_default_width');
	$default_height = get_option('wavr_default_height');
	$default_server = get_option('wavr_default_server');

	$a = shortcode_atts(array(
			'bgcolor' => $default_bgcolor,
			'color' => $default_color,
			'font' => $default_font,
			'font_size' => $default_font_size,
			'width' => $default_width,
			'height' => $default_height,
			'server' => $default_server,
			'id' =>null,
		),$atts);
	$global_waves++;
	
	$styles =' style="';
	if(!empty($a['width'])){
	    $styles .= "width:{$a['width']};";
	}
	if(!empty($a['height'])){
	    $styles .= "height:{$a['height']};";
	}
	$styles .='" ';
	$wScript = '
		<div id="waveframe-'.$global_waves.'" '.$styles.' ></div>
		 <script type="text/javascript">

				add_wave("waveframe-'.$global_waves.'",{';
		$wScriptOpts=array();
		foreach($a as $k=>$val){

			//This test replaces "%252B" string by "+" in the wave id attribute if needed
			if($k=="id") {
				$val = str_replace('%252B', '+', $val);
			}

				$wScriptOpts[]='
					'.$k.':"'.$val.'"';
		}
		$wScript.=join(',',$wScriptOpts);
	//
	//				bgcolor:"'.$a['bgcolor'].'",
	//				color:"'.$a['color'].'",
	//				font:"'.$a['font'].'",
	//				font_size:"'.$a['font_size'].'",
	//				width:"'.$a['width'].'",


		$wScript .='		});

		</script>
		';
	return $wScript;
}

add_shortcode('wave','expand_wave');



/*
 * Modify head to include the scripts once
 */

function Wavr_ScriptsAction() {
    $wavr_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
    if (!is_admin()) {
	wp_enqueue_script('wavr_embed_script','http://wave-api.appspot.com/public/embed.js');
	wp_enqueue_script('wp_wavr_script',$wavr_plugin_url.'/js/wp_wavr_plugin.js');


    }
}
add_action('wp_print_scripts', 'Wavr_ScriptsAction');



/*Editor Button*/
include "mce_plugins/wave_button.php";
