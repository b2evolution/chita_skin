<?php
/**
 * tq-framework 0.1
 * extensions.php
 * for more information and Terms of use contact: admin@tilqi.com
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

	global $xmlsrv_url, $skins_url, $skin, $Hit, $current_User,  $app_version, $Blog, $baseurl;

	$skin_base_url 		= $skins_url.$skin.'/';/* relative skin url*/
	$jq_loaded 			= $Skin->get_setting( 'load_jquery' ) == 1;/*jQuery loaded*/
	$no_jq 				= $Skin->get_setting( 'load_jquery' ) == 0;/*jQuery loaded*/
	$tq_super_admin 	= !is_logged_in() || ( $current_User->ID == $Blog->owner_user_ID && $current_User->grp_ID ==  1 );/* user is logged in, owns the blog and is administrator*/
	$tq_admin 			= is_logged_in() && ($current_User->grp_ID ==  1 );/*user is admin*/
	$slider_on 			= $Skin->get_setting( 'use_slider' ) != "No"; /*using a slider*/
	$infinite_scroll_on = $Skin->get_setting( 'infinite_scroll' ); /*using a slider*/
	$ver5x 				= round($app_version) >= 5; 
	$ver4x 				= round($app_version) < 5 && round($app_version) >= 4; 
	$ver3x 				= round($app_version) < 4 && round($app_version) >= 3; 
	$ver2x 				= round($app_version) < 3;
	$ver2earlier 		= round($app_version) < 2;
?>