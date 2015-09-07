<?php
/**
 * This is the template that displays the item block
 *
 * This file is not meant to be called directly.
 * It is meant to be called by an include in the main.page.php template (or other templates)
 *
 * b2evolution - {@link http://b2evolution.net/}
 * Released under GNU GPL License - {@link http://b2evolution.net/about/license.html}
 * @copyright (c)2003-2010 by Francois PLANQUE - {@link http://fplanque.net/}
 *
 * @package evoskins
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

global $Item;

// Default params:
$params = array_merge( array(
		'feature_block'   => false,
		'content_mode'    => 'auto',		// 'auto' will auto select depending on $disp-detail
		'item_class'      => 'bPost',
		'image_size'	    => 'fit-400x320',
	), $params );

?>

<div id="<?php $Item->anchor_id() ?>" class="post <?php $Item->div_classes( $params ) ?>" lang="<?php $Item->lang() ?>">

	<?php
		$Item->locale_temp_switch(); // Temporarily switch to post locale (useful for multilingual blogs)
	?>

<div class="post-head"><h2 class="post-title"><?php $Item->title(); ?></h2>	<?php $Item->permanent_link( array(	'class' => 'permalink phead fright', 'text' => '&nbsp;',	) );?></div>

	<?php
		// ---------------------- POST CONTENT INCLUDED HERE ----------------------
		skin_include( '_item_content.inc.php', $params );
		// Note: You can customize the default item feedback by copying the generic
		// /skins/_item_content.inc.php file into the current skin folder.
		// -------------------------- END OF POST CONTENT -------------------------
	?><?php
    		if( $Skin->get_setting( 'display_social_bar') ) {?>
            <div class="social-bar">
            <div class="twitter"><a href="http://twitter.com/?status=<?php $Item->permanent_url();?>">&nbsp;</a></div>	
              <div class="facebook">	<a href="http://www.facebook.com/share.php?u=<?php $Item->permanent_url();?>">&nbsp;</a></div>	
		<div class="buzz">	<a href="http://www.google.com/buzz/post?url=<?php $Item->permanent_url();?>">&nbsp;</a></div>	
		<div class="digg">	<a href="http://digg.com/submit?url=<?php $Item->permanent_url();?>">&nbsp;</a></div>	
        <?php if( $Skin->get_setting( 'fbook_like') ) {?>
 <span class="fblike"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php $Item->permanent_url();?>&amp;layout=button_count&amp;show_faces=true&amp;width=120&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe></span>  <?php }?>
            </div>	

	<?php }?>
   	<?php // TODO: Standardize these info spans
		if( $Skin->get_setting( 'display_post_cats') ) {
		$Item->categories( array(
			'before'          => '<div class="categories">'.T_('Categories').': ',
			'after'           => '</div>',
			'include_main'    => true,
			'include_other'   => true,
			'include_external'=> true,
			'link_categories' => true,
		) ); }
	?>
    	<?php		if( $Skin->get_setting( 'display_post_tags') ) {
		$Item->tags( array(
				'before' =>         '<div class="tags">'.T_('Tags').': ',
				'after' =>          '</div>',
				'separator' =>      ', ',
			) ); }?>
<div class="post-info">


<?php
if( $Skin->get_setting( 'display_post_comm') ) {
	$Item->feedback_link( array('type' => 'comments',
							'link_before' => '<span class="comment-link info-icon">',
							'link_after' => '</span>',
							'link_text_zero' => '#',
							'link_text_one' => '#',
							'link_text_more' => '#',
							'link_title' => '#',
							'use_popup' => false,
						) );
									$Item->feedback_link( array(
							'type' => 'trackbacks',
							'link_before' => ' &bull; ',
							'link_after' => '',
							'link_text_zero' => '#',
							'link_text_one' => '#',
							'link_text_more' => '#',
							'link_title' => '#',
							'use_popup' => false,
						) );
}?>
<?php 	if( $Skin->get_setting( 'display_post_perm') )	{?><span class="permalink info-icon"><?php $Item->permanent_link( array('text' => 'Permalink',) ); ?></span><?php } ?>


<?php 	if( $Skin->get_setting( 'display_post_time') )	{ ?>
<span class="post-date" style="cursor:pointer;" title="<?php 	if( $Skin->get_setting( 'display_post_time') )	{$Item->issue_time( array( 'before'    => 'This post was posted on ',
					'after'     => ' ',
				) );		} ?>">
<?php		$Item->issue_time( array(
					'before'    => ' ',
					'after'     => ', ',
				) ); ?>
		</span> <?php } ?>
<?php		if( $Skin->get_setting( 'display_post_word_count') ) { echo '<span class="word-count info-icon">';
$Item->wordcount();	echo ' '.T_('words');}
		// echo ', ';
		// $Item->views();
echo '</span>';
	?>
 <?php		if( $Skin->get_setting( 'display_post_view_count') )		{ echo '<span class="view-count info-icon">';
$Item->views();}
echo '</span>';
	?>




<?php   if( $Skin->get_setting( 'display_post_author') ) {
		$Item->author( array(
			'before'    => '<span class="author-link info-icon" title="Post Author">',
			'after'     => '</span>',
		) );}
if( $Skin->get_setting( 'display_msg_link') ) {
	echo '<span class="msg-link info-icon" title="Message this user">';
		$Item->msgform_link();
		echo '</span>'; }?>
		<?php

			$Item->edit_link( array( // Link to backoffice for editing
					'before'    => '<span class="info-icon edit-link">',
					'after'     => '</span>',
					'text'         => 'Edit Post',

				) );
		?>


</div>

	<?php
		// ------------------ FEEDBACK (COMMENTS/TRACKBACKS) INCLUDED HERE ------------------
		skin_include( '_item_feedback.inc.php', array(
				'before_section_title' => '<h4>',
				'after_section_title'  => '</h4>',
			) );
		// Note: You can customize the default item feedback by copying the generic
		// /skins/_item_feedback.inc.php file into the current skin folder.
		// ---------------------- END OF FEEDBACK (COMMENTS/TRACKBACKS) ---------------------
	?>

	<?php
		locale_restore_previous();	// Restore previous locale (Blog locale)
	?>
</div>

<?php

/*
 * $Log: _item_block.inc.php,v $
 */
?>