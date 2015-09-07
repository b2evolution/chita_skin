<?php
/**
 * tq-framework 0.1
 * extensions.php
 * for more information and Terms of use contact: admin@tilqi.com
 * This file includes javascripts and other to be executed just before </body>
 */

if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );
include( 'tq_definitions.php' );
?>

<!-- =================================== START OF FOOTER =================================== -->

<?php 
	if( $Skin->get_setting( 'use_slider' ) == "Nivo" && ( $jq_loaded || $ver5x ) ) 
	{
?>

<script type="text/javascript" src="rsc/nivo.slider.pack.js"></script>

<?php 
	if( $Skin->get_setting( 'use_slider_parameters' ) == 1 ) 
	{ 
?>
<script type="text/javascript">
  jQuery(window).load(function() {
    jQuery('#nivo-slider').nivoSlider({
<?php if  ($Skin->get_setting( 'slider_effect' )){ ?>      effect:'<?php echo $Skin->get_setting( 'slider_effect') ?>',<?php } ?>
<?php if  ($Skin->get_setting( 'slider_slices' )){ ?>       slices:<?php echo $Skin->get_setting( 'slider_slices') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_animSpeed' )){ ?>       animSpeed:<?php echo $Skin->get_setting( 'slider_animSpeed') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_pauseTime' )) { ?>       pauseTime:<?php echo $Skin->get_setting( 'slider_pauseTime') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_startSlide' )){ ?>       startSlide:<?php echo $Skin->get_setting( 'slider_startSlide') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_directionNav' )){ ?>         directionNav:<?php echo $Skin->get_setting( 'slider_directionNav') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_directionNavHide' )) {?>         directionNavHide:<?php echo $Skin->get_setting( 'slider_directionNavHide') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_controlNav' )){ ?>         controlNav:<?php echo $Skin->get_setting( 'slider_controlNav') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_keyboardNav' )) {?>         keyboardNav:<?php echo $Skin->get_setting( 'slider_keyboardNav') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_pauseOnHover' )){ ?>         pauseOnHover:<?php echo $Skin->get_setting( 'slider_pauseOnHover') ?>,<?php } ?>
<?php if  ($Skin->get_setting( 'slider_manualAdvance' )){ ?>         manualAdvance:<?php echo $Skin->get_setting( 'slider_manualAdvance') ?>, <?php } ?>
<?php if  ($Skin->get_setting( 'slider_captionOpacity' )) {?>         captionOpacity:<?php echo $Skin->get_setting( 'slider_captionOpacity') ?>, <?php } ?>
    });
});
</script>
 <?php }?>
<?php if  ($Skin->get_setting( 'use_slider_parameters' ) == 0) { ?>
<script type="text/javascript">
jQuery(window).load(function() {
    jQuery('#nivo-slider').nivoSlider();
});
</script>
		<?php }?>
 <?php }?>
 
 
 
<?php if ($Skin->get_setting( 'infinite_scroll' ) ) { 
 // b2evolution pageid's not returning 404 bug fix:Thanks to ¥åßßå  
// GOAL: return a 404 page if current page id is greater than > actual page number ( number of published posts / posts per page )
// vars included: $actual_page_numbers, $total_posts,  $posts_per_page, $current_page_id 
$current_page_id = ( empty( $_GET['paged'] ) ? '0' : $_GET['paged'] );//blogurl?paged=x
$posts_per_page = $Blog->get_setting( 'posts_per_page' );//blog post per page setting
$query = "SELECT COUNT(DISTINCT post_ID) AS total_posts    FROM evo_items__item INNER JOIN evo_postcats ON post_ID = postcat_post_ID INNER JOIN evo_categories 
ON postcat_cat_ID = cat_ID WHERE cat_blog_ID = ".$Blog->ID. " AND post_status = 'published' "; $result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){;}
$totalposts=mysql_result($result,$row,"total_posts");
$actual_page_numbers = ceil($totalposts / $posts_per_page); //number of published posts / posts per page
if ( $current_page_id > $actual_page_numbers)//page id is greater than actual page count so return a 404 response
header("HTTP/1.0 404 Not Found");
	 $inf_bufferPx = $Skin->get_setting( 'inf_bufferPx' );
	 $inf_animate = $Skin->get_setting( 'inf_animate' );
	 $inf_extraScrollPx = $Skin->get_setting( 'inf_extraScrollPx' );
	 $inf_loadingText = $Skin->get_setting( 'inf_loadingText' );
	 $inf_donetext = $Skin->get_setting( 'inf_donetext' );
	 $inf_debug = $Skin->get_setting( 'inf_debug' );

	
	echo  '<script type="text/javascript" src="'.$skin_base_url.'rsc/infinite-scroll/jquery.infinitescroll.js"></script>';	
	echo '<script type="text/javascript">jQuery(document).ready(function() {
 	 jQuery("#tq-main .tq-b .tq-g").infinitescroll({ 
		navSelector  : "div.navigation",
		nextSelector : "div.navigation a:first",    
		itemSelector : "#tq-main .tq-b .tq-g div.post",
		loadingImg   : "'.$skin_base_url.'rsc/infinite-scroll/ajax-loader.gif",';
		if(!empty($inf_bufferPx))	echo 'bufferPx:'.$inf_bufferPx.',';
		if(!empty($inf_animate))	echo 'animate:'.$inf_animate.',';
		if(!empty($inf_extraScrollPx))	echo 'extraScrollPx:'.$inf_extraScrollPx.',';
		if(!empty($inf_loadingText))	echo 'loadingText:"'.$inf_loadingText.'",';
		if(!empty($inf_donetext))	echo 'donetext:"'.$inf_donetext.'",';
		if(!empty($inf_debug))	echo 'debug:'.$inf_debug.',';
	echo	'});
	});  </script>' ?>
 
 
<?php } ?>