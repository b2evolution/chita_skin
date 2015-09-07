<?php
/*** The main page template is used to display the blog when no specific page template is available * to handle the request (based on $disp). * @package evoskins * @subpackage custom * tq-framework 0.1 * @version $Id: index.main.php,v 1.25 2010/05/02 19:04:28 fplanque Exp $ */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );
if( version_compare( $app_version, '3.0' ) < 0 )
{ // Older skins (versions 2.x and above) should work on newer b2evo versions, but newer skins may not work on older b2evo versions.
	die( 'This skin is designed for b2evolution 3.0 and above. Please <a href="http://b2evolution.net/downloads/index.html">upgrade your b2evolution</a>.' );
}
// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );
include( 'tq_definitions.php' );
// -------------------------- HTML HEADER --------------------------
skin_include( '_html_header.inc.php' );
// -- body HEADER BLOCK -----
skin_include( '_body_header.inc.php' );
skin_include( 'errors.php' );
?>
	<div id="tq-content">	
		<?php if( $Skin->get_setting( 'prev_next_page') == 1 )		{
		// -------------------- PREV/NEXT PAGE LINKS (POST LIST MODE) --------------------
		mainlist_page_links( array(
				'block_start' => '',
				'block_end' => '',
				'links_format' => '<div id="prev-link"><strong>$prev$</strong></div><div id="next-link"><strong>$next$</strong></div>',
			    'prev_text'   => 'Prev. Page<br/>&lt;&lt;&lt;<span class="tri-left"></span>',
   			    'next_text'     => 'Next Page<br/>&gt;&gt;&gt;<span class="tri-right"></span>',
			) );
		// ------------------------- END OF PREV/NEXT PAGE LINKS -------------------------
		} ?>

			<div id="tq-main">
				<div class="tq-gb">
				<!-- =================================== START OF MAIN AREA =================================== -->
				<?php
				skin_container( NT_('Content Top'), array(
				'block_start' => '<div class="tqu content_top $wi_class$">',
				'block_end' => '</div>',
				'block_title_start' => '<h3>',
				'block_title_end' => '</h3>',
				'list_start' => '<ul>',
				'list_end' => '</ul>',
				'item_start' => '<li>',
				'item_end' => '</li>',
				'group_start' => '<ul>',
				'group_end' => '</ul>',
				'notes_start' => '<div class="notes">',
				'notes_end' => '</div>',
				) );	?>
				</div>
				<div class="tq-b bPosts Posts">
					<div class="tq-g">
						<?php // ------------------------- MESSAGES GENERATED FROM ACTIONS ----
						messages( array('block_start' => '<div class="action_messages">', 'block_end'   => '</div>',) );	?>


						<?php	// featured post:
						if( $Item = & get_featured_Item() )
						{	// We have a featured/intro post to display:
						// ---------------------- ITEM BLOCK INCLUDED HERE ------------------------
						skin_include( '_item_block.inc.php', array(
						'feature_block' => true,
						'content_mode' => 'auto',		// 'auto' will auto select depending on $disp-detail
						'intro_mode'   => 'normal',	// Intro posts will be displayed in normal mode
						'item_class'   => 'featured_post',
						'image_size'	 =>	'fit-400x320',
						) );	}	?>

						<?php if( $Skin->get_setting( 'prev_next_single') == 1)
						// ------------------- PREV/NEXT POST LINKS (SINGLE POST MODE) -------------------
						item_prevnext_links( array(
						'block_start' => '<table class="prevnext_post"><tr>',
						'prev_start'  => '<td>',
						'prev_end'    => '</td>',
						'next_start'  => '<td class="right">',
						'next_end'    => '</td>',
						'block_end'   => '</tr></table>',
						) );	?>

						<?php	// --------------------------------- START OF POSTS -------------------------------------
						// Display message if no post:
						display_if_empty();
						while( $Item = & mainlist_get_item() )
						{	// For each blog post, do everything below up to the closing curly brace "}"
						// ---------------------- ITEM BLOCK INCLUDED HERE ------------------------
						skin_include( '_item_block.inc.php', array(
						'content_mode' => 'auto',		// 'auto' will auto select depending on $disp-detail
						'image_size'	 =>	'fit-400x320',
						) ); } // --- END OF POSTS --?>
						<?php		skin_include( '$disp$', array(
									'disp_posts'  => '',		// We already handled this case above
									'disp_single' => '',		// We already handled this case above
									'disp_page'   => '',		// We already handled this case above
									) );
						// Note: you can customize any of the sub templates included here by
						// copying the matching php file into your skin directory.	?>

					</div><!-- end of .tq-g -->
				</div><!-- end of .tq-b -->
			</div><!-- end of #main -->
		<!-- =================================== START OF SIDEBAR =================================== -->
		<?php if( $Skin->get_setting( 'sidebar_choice') != "tq-t7" ) {?>
		<div id="tq-sidebar" class="tq-b bSideBar bSideBar_<?php echo $Skin->get_setting( 'sidebar_position'); ?>">
		<?php
		// ------------------------- "Sidebar" CONTAINER EMBEDDED HERE --------------------------
		// Display container contents:
		skin_container( NT_('Sidebar'), array(
		// The following (optional) params will be used as defaults for widgets included in this container:
		// This will enclose each widget in a block:
		'block_start' => '<div class="sideBlock $wi_class$">',
		'block_end' => '</div>',
		// This will enclose the title of each widget:
		'block_title_start' => '<h3>',
		'block_title_end' => '</h3>',
		// If a widget displays a list, this will enclose that list:
		'list_start' => '<ul>',
		'list_end' => '</ul>',
		// This will enclose each item in a list:
		'item_start' => '<li>',
		'item_end' => '</li>',
		// This will enclose sub-lists in a list:
		'group_start' => '<ul>',
		'group_end' => '</ul>',
		// This will enclose (foot)notes:
		'notes_start' => '<div class="notes">',
		'notes_end' => '</div>',
		) );
		// ----------------------------- END OF "Sidebar" CONTAINER -----------------------------
		?>

		<?php				if( $Skin->get_setting( 'display_b2_credits_side') )
		// Please help us promote b2evolution and leave this logo on your blog:
		powered_by( array(
				'block_start' => '<div class="powered_by">',
				'block_end'   => '</div>',
				// Check /rsc/img/ for other possible images -- Don't forget to change or remove width & height too
				'img_url'     => '$rsc$img/powered-by-b2evolution-120t.gif',
				'img_width'   => 120,
				'img_height'  => 32,
			) );
		?>
		</div> <?php } ?><!-- end of #Sidebar -->

		<?php
		// -------------------- PREV/NEXT PAGE LINKS (POST LIST MODE) --------------------
		mainlist_page_links( array(
				'block_start' => '<div class="navigation cboth fright"><strong>',
				'block_end' => '</strong></div>',
			) );
		// ------------------------- END OF PREV/NEXT PAGE LINKS -------------------------
		?>
</div><!-- end of #Content -->

<?php
// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_body_footer.inc.php' );
// Note: You can customize the default HTML footer by copying the
// _html_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>


</div><!-- end of #wrapper -->
</div><!-- end of #wrapper-l -->


<?php
// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_html_footer.inc.php' );
// Note: You can customize the default HTML footer by copying the
// _html_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>
