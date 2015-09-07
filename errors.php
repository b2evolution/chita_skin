<?php
	if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );
	include( 'tq_definitions.php' );

	if  ($slider_on && $no_jq && $tq_admin) 
	{ 
		if ($ver4x)
			echo '<div class="warning">You have chosen to use either an Image or Content Slider , However you have not loaded jQuery, please load jquery from <a href="'.$baseurl.'admin.php?ctrl=coll_settings&tab=skin&blog=1">skin options</a><br/><span class="small">Dont worry, this message is only visible to admins</span></div>';
		if ($ver3x)
			echo '<div class="warning">You have chosen to use either an Image or Content Slider , However you have not loaded jQuery, please load jquery from <a href="'.$baseurl.'admin.php?ctrl=coll_settings&tab=skin_settings&blog=1">skin options</a><br/><span class="small">Dont worry, this message is only visible to admins</span></div>';
	}
	
	if  ($infinite_scroll_on && $no_jq && $tq_admin) 
	{ 
		if ($ver4x)
			echo '<div class="warning">You have chosen to use Infinite Scroll , However you have not loaded jQuery, please load jquery from <a href="'.$baseurl.'admin.php?ctrl=coll_settings&tab=skin&blog=1">skin options</a><br/><span class="small">Dont worry, this message is only visible to admins</span></div>';
		if ($ver3x)
			echo '<div class="warning">You have chosen to use Infinite Scroll, However you have not loaded jQuery, please load jquery from <a href="'.$baseurl.'admin.php?ctrl=coll_settings&tab=skin_settings&blog=1">skin options</a><br/><span class="small">Dont worry, this message is only visible to admins</span></div>';
	}