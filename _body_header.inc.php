<?php
/**
 * This is the BODY header include template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * This is meant to be included in a page template.
 *
 * @package evoskins
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

?>
<div id="<?php echo $Skin->get_setting( 'skin_width' ); ?>" class="<?php echo $Skin->get_setting( 'sidebar_choice' ); ?> mainbody-universal">
	<div id="wrapper-r">
		<div id="tq-header" class="container">
			<div id="topblock">
				<div id="headLeft" class="fleft">
					<div class="logo fleft">
                    <a href="<?php $Blog->disp('url') ?>"></a>
                    </div>
					<?php
					// ------------------------- "Header" CONTAINER EMBEDDED HERE --------------------------
					skin_container( NT_('Header'), array(
					'block_start'       => '<div class="$wi_class$">',
					'block_end'         => '</div>',
					'block_title_start' => '<h1>',
					'block_title_end'   => '</h1>',
					 ) );	?>
				</div>
				<div id="headRight" class="fleft">
				<ul id="pagenav">
					<?php
					// ------------------------- "Menu" CONTAINER EMBEDDED HERE --------------------------
					// Note: this container is designed to be a single <ul> list
					skin_container( NT_('Menu'), array(
					// The following params will be used as defaults for widgets included in this container:
					'block_start'         => '',
					'block_end'           => '',
					'block_display_title' => false,
					'list_start'          => '',
					'list_end'            => '',
					'item_start'          => '<li>',
					'item_end'            => '</li>',
					) ); ?>
				</ul>
				</div>
			</div><!-- end of #topblock -->
			<div class="blog_list">
			<?php
			// START OF BLOG LIST
			skin_widget( array(
					'widget' => 'colls_list_public',
					'block_start' => '',
					'block_end' => '',
					'block_display_title' => false,
					'list_start' => '',
					'list_end' => '',
					'item_start' => '',
					'item_end' => '',
					'item_selected_start' => '<span class="selected">',
					'item_selected_end' => '</span>',
				) );
			?>
			</div><!-- end of .blog_list -->
			<div class="clear"></div>
			<div id="topnav">
			<?php
			// ------------------------- "Page Top" CONTAINER EMBEDDED HERE 
			skin_container( NT_('Page Top'), array(
			// The following params will be used as defaults for widgets included in this container:
			'block_start'         => '<div class="$wi_class$">',
			'block_end'           => '</div>',
			'block_display_title' => false,
			'list_start'          => '<ul>',
			'list_end'            => '</ul>',
			'item_start'          => '<li>',
			'item_end'            => '</li>',
			) ); ?>
			</div>
		<?php if ($Skin->get_setting( 'display_cat_list' ) ) {?><div id="catnav"><ul id="categories_nav"><?php display_list_cats(); ?></ul></div><?php } ?>
		</div> <!-- end of #header -->
		<?php
		include( 'tq_definitions.php' );

		if( $Skin->get_setting( 'use_slider' ) == "Basic" && ( $jq_loaded || $ver5x ) )
		{
			include "lib/basic_slider.php";
		}
		if( $Skin->get_setting( 'use_slider' ) == "Nivo" && ( $jq_loaded || $ver5x ) )
		{
			include "lib/nivo_slider.php";
		}