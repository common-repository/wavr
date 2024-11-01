<?php
/*
Plugin Name: Wavr
Plugin URI: http://open-source.triplesmart.com/wavr-google-wave-for-wordpress.html
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
	
	$wavr_default_server = get_option('wavr_default_server');
	$wavr_default_bgcolor = get_option('wavr_default_bgcolor');
	$wavr_default_color = get_option('wavr_default_color');
	$wavr_default_font = get_option('wavr_default_font');
	$wavr_default_font_size = get_option('wavr_default_font_size');
	$default_width = get_option('wavr_default_width');
	$default_height = get_option('wavr_default_height');

	if($_POST['update_wavr_options']=='Y'){

		$wavr_default_server = $_POST['wavr_default_server'];
		update_option('wavr_default_server',$wavr_default_server);

		$wavr_default_bgcolor = $_POST['wavr_default_bgcolor'];
		update_option('wavr_default_bgcolor',$wavr_default_bgcolor);

		$wavr_default_color = $_POST['wavr_default_color'];
		update_option('wavr_default_color',$wavr_default_color);

		$wavr_default_font = $_POST['wavr_default_font'];
		update_option('wavr_default_font',$wavr_default_font);

		$wavr_default_font_size = $_POST['wavr_default_font_size'];
		update_option('wavr_default_font_size',$wavr_default_font_size);

		$wavr_default_width = $_POST['wavr_default_width'];
		update_option('wavr_default_width',$wavr_default_width);

		$wavr_default_height = $_POST['wavr_default_height'];
		update_option('wavr_default_height',$wavr_default_height);

		e_notice('Options saved.');
	}

?>
<div class="wrap">

<h2><?php  echo __('Wavr Options', 'mt_trans_domain');?></h2>
<p>
	<?php  echo __('This is the options page for Wavr.
	You can set defaults here.', 'mt_trans_domain');?>
</p>
<p>
    <em>
	New:
    </em>
	<?php  echo __('You can now set the wave server to use
	(sandbox, preview or custom). Just write your server on the
	corresponding text box. You can also specify the server in the
	shortcode, just write server="server_url" in your post.', 'mt_trans_domain');?>
</p>
<hr />
<form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="update_wavr_options" value="Y">

<p><?php _e("Default Server:", 'mt_trans_domain' ); ?>
<br />
<input type="text" name="wavr_default_server" value="<?php echo $wavr_default_server; ?>" size="40">
(http://wave.google.com/a/wavesandbox.com/ or https://wave.google.com/wave/)
<br /><strong>Don't forget the last /</strong>
</p>

<p><?php _e("Default Font:", 'mt_trans_domain' ); ?>
<br />
<input type="text" name="wavr_default_font" value="<?php echo $wavr_default_font; ?>" size="40">
</p>

<p><?php _e("Default Background Color:", 'mt_trans_domain' ); ?>
<br />
<input type="text" name="wavr_default_bgcolor" value="<?php echo $wavr_default_bgcolor; ?>" size="10"> (#ffffff)
</p>

<p><?php _e("Default Color:", 'mt_trans_domain' ); ?>
<br />
<input type="text" name="wavr_default_color" value="<?php echo $wavr_default_color; ?>" size="10"> (#000000)
</p>

<p><?php _e("Default Font Size:", 'mt_trans_domain' ); ?>
<br />
<input type="text" name="wavr_default_font_size" value="<?php echo $wavr_default_font_size; ?>" size="10">pt
</p>

<p><?php _e("Default Width:", 'mt_trans_domain' ); ?>
<br />
<input type="text" name="wavr_default_width" value="<?php echo $wavr_default_width; ?>" size="10"> (100%)
</p>

<p><?php _e("Default Height:", 'mt_trans_domain' ); ?>
<br />
<input type="text" name="wavr_default_height" value="<?php echo $wavr_default_height; ?>" size="10"> 500px
</p>

<hr />

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Update Options', 'mt_trans_domain' ) ?>" />
</p>

</form>


</div>
