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

function e_notice($message){
	echo '<div class="updated"><p><strong>'.__($message, 'mt_trans_domain' ).'</strong></p></div>';
}