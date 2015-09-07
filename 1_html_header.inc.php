<?php
/**
 * This is the HTML header include template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * This is meant to be included in a page template.
 * Note: This is also included in the popup: do not include site navigation!
 *
 * @package evoskins
 */

if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );
require_css( 'style.css', true );
include( 'tq_definitions.php' );
//add_js_for_toolbar();		// Registers all the javascripts needed by the toolbar menu // disabled for speed improvement, only disables evo_toolbar animations
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php locale_lang() ?>" lang="<?php locale_lang() ?>">
<head>
		<?php if( $Skin->get_setting( 'load_jquery') ) {?>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script><!-- load jquery from google CDN --> 
		<script type="text/javascript"><!-- Fallback to local: load jquery from local source if google CDN fails [not the best practice, but google CDN is not likely to fail already--> 
		if (typeof jQuery == 'undefined'){document.write(unescape("%3Cscript src='<?php echo $skin_base_url ?>rsc/jquery-1.4.2.min.js' type='text/javascript'%3E%3C/script%3E"));}
		</script>
		<?php }?>
	<?php skin_content_meta(); /* Charset for static pages */ ?>
	<?php skin_base_tag(); /* Base URL for this skin. You need this to fix relative links! */ ?>
	<?php $Plugins->trigger_event( 'SkinBeginHtmlHead' ); ?>
	<title><?php
		// ------------------------- TITLE FOR THE CURRENT REQUEST -------------------------
		request_title( array(
			'auto_pilot'      => 'seo_title',
		) );
		// ------------------------------ END OF REQUEST TITLE -----------------------------
	?></title>
	<?php skin_description_tag(); ?>
	<?php skin_keywords_tag(); ?>
	<?php robots_tag(); ?>
	<meta name="generator" content="b2evolution <?php app_version(); ?>" /> <!-- Please leave this for stats -->
		<?php	if( $Blog->get_setting( 'feed_content' ) != 'none' )	{ // auto-discovery urls	?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php $Blog->disp( 'rss2_url', 'raw' ) ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom" href="<?php $Blog->disp( 'atom_url', 'raw' ) ?>" />
		<?php }	?>
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo $xmlsrv_url; ?>rsd.php?blog=<?php echo $Blog->ID; ?>" />
	<meta name="viewport" content="width = 750" />
    <?php if  ($Skin->get_setting( 'skin_preset' ) != "default") {?><link rel="stylesheet" type="text/css" href="<?php echo $skin_base_url ?>presets/<?php echo $Skin->get_setting( 'skin_preset' );?>.css" />	<?php }?>
	<?php include_headlines() /* Add javascript and css files included by plugins and skin */ ?>
	<?php	$Blog->disp( 'blog_css', 'raw');	$Blog->disp( 'user_css', 'raw');	?>
		<?php if( $Skin->get_setting( 'use_google_font') != "No" ) {?><link href='http://fonts.googleapis.com/css?family=<?php echo $Skin->get_setting( 'use_google_font' ); ?>:regular<?php echo $Skin->get_setting( 'load_add_variant' ); ?>&amp;subset=latin' rel='stylesheet' type='text/css' />
		<?php }?>
		<?php if  ($Skin->get_setting( 'use_slider' ) == "Nivo") {?><link rel="stylesheet" href="<?php echo $skin_base_url ?>rsc/nivo-slider.css" type="text/css" media="screen" />
		<?php }?>

	 <link rel="shortcut icon" href="<?php echo $skin_base_url ?>img/favicon.ico" />
</head>

<body>
	<?php if ($ver3x) require $skins_path.'_toolbar.inc.php'; /* TODO: toolbar is already loaded in footer, check why you need this in 3.x*/

	echo '<div id="bodywrap" class="'.$Hit->get_agent_name().'">'."\n";
	if( is_logged_in() ){
	echo '<div id="skin_wrapper" class="skin_wrapper_loggedin">';
	}
	else {
	echo '<div id="skin_wrapper" class="skin_wrapper_anonymous">';
	}
	echo "\n";
	?>
<!-- Start of skin_wrapper -->