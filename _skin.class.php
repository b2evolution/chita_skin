<?php
/**
 * This file implements a class derived of the generic Skin class in order to provide custom code for
 * the skin in this folder.
 *
 * This file is part of the b2evolution project - {@link http://b2evolution.net/}
 *
 * @package skins
 * @subpackage custom
 *
 * @version $Id: _skin.class.php,v 1.7 2010/01/19 19:38:41 fplanque Exp $
 * tqframework 0.1
 * chita template
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

class chita_Skin extends Skin
{
	var $version = '1.8.1';

	function get_default_name()
	{
		return 'Chita';
	}

  	/**
	 * Get default type for the skin.
	 */
	function get_default_type()
	{
		return 'normal';
	}

	/**
   	 * Get definitions for editable params
     *
	 * @see Plugin::GetDefaultSettings()
	 * @param local params like 'for_editing' => true
	 */
	function get_param_definitions( $params )
	{
		$r = array_merge( array(
				'standard_settings_begin' => array(
	   				'layout' => 'begin_fieldset',
	   				'label' => $this->T_('Standard Settings'),
				),
					'colorbox' => array(
						'label' => T_('Colorbox Image Zoom'),
						'note' => T_('Check to enable javascript zooming on images (using the colorbox script)'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'gender_colored' => array(
						'label' => T_('Display gender'),
						'note' => T_('Use colored usernames to differentiate men & women.'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),
					'bubbletip' => array(
						'label' => T_('Username bubble tips'),
						'note' => T_('Check to enable bubble tips on usernames'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),
				'standard_settings_end' => array(
	   				'layout' => 'end_fieldset',
				),
					
				'basic_settings_begin' => array(
	   				'layout' => 'begin_fieldset',
	   				'label' => $this->T_('Basic Settings'),
				),
					'skin_width' => array(
						'label' => T_('Skin Width'),
						'note' => 'Choose from preset widths, or define your own below after choosing Custom',
						'defaultvalue' => 'mainbody2',
						'options' => array( 'mainbody' => $this->T_('750px'), 'mainbody2' => $this->T_('950px'), 'mainbody4' => $this->T_('974px'), 'mainbody3' => $this->T_('100% - Fluid'), 'custom-mainbody' => $this->T_('Custom - Define width below'), ),
						'type' => 'select',
					),
					'custom_width' => array(
						'label' => T_('Custom Width'),
						'note' => T_('Use Values in pixel or percent, Ex: 960px OR 90%.Ineffective unless Custom is selected.'),
						'defaultvalue' => '',
					),
					'sidebar_choice' => array(
						'label' => T_('Choose Sidebar'),
						'note' => 'Choose whether to use a sidebar, and sidebar style',
						'defaultvalue' => 'tq-t5',
						'options' => array( 'tq-t7' => $this->T_('No Sidebar'), 'tq-t1' => $this->T_('Left-160px'), 'tq-t2' => $this->T_('Left-180px'), 'tq-t3' => $this->T_('Left-300px'), 'tq-t4' => $this->T_('Right-180px'), 'tq-t4' => $this->T_('Right-180px'), 'tq-t5' => $this->T_('Right-240px'), 'tq-t6' => $this->T_('Right-300px'), ),
						'type' => 'select',
					),
					'skin_preset' => array(
						'label' => T_('Choose Preset - Color'),
						'note' => 'Choose from a ready presets styles, or choose -Custom- to create your own below',
						'defaultvalue' => 'right',
						'options' => array( 
							'default' => $this->T_('Chita - Default'),
							'green' => $this->T_('Green'),
							//'blue' => $this->T_('Blue'), 'gray' => $this->T_('Gray'),
					 		//'custom_color' => $this->T_('Custom Colors') 
					 	 ),
						'type' => 'select',
					),
					'bg_pattern' => array(
						'label' => T_('Choose Background Pattern'),
						'note' => '',
						'defaultvalue' => 'hcomb',
						'options' => array( 'none' => $this->T_('None'), 'comb' => $this->T_('Honey Comb'),  'shadow' => $this->T_('Shadow'), 'grid' => $this->T_('Grids'), 'royal' => $this->T_('Royal'), 'abstrblue' => $this->T_('Abstract-Blue'),  ), 
						'type' => 'select',
					),
					'use_google_font' => array(
						'label' => T_('Use Google WebFonts'),
						'note' => T_('See http://code.google.com/webfonts for more information'),
						'defaultvalue' => 'No',
						'options' => array( 'No' => $this->T_('No'), 'Arimo' => $this->T_('Arimo'), 'Arvo' => $this->T_('Arvo'), 'Cantarell' => $this->T_('Cantarell'), 'Cardo' => $this->T_('Cardo'), 'Cousine' => $this->T_('Cousine'), 'Crimson' => $this->T_('Crimson'), 'Cuprum' => $this->T_('Cuprum'), 'Droid+Sans' => $this->T_('Droid Sans'), 'Droid+Sans+Mono' => $this->T_('Droid Sans Mono'), 'Droid+Serif' => $this->T_('Droid Serif'), 'IM+Fell' => $this->T_('IM Fell'), 'Inconsolata' => $this->T_('Inconsolata'), 'Josefin+Sans' => $this->T_('Josefin Sans'), 'Josefin+Slab' => $this->T_('Josefin Slab'), 'Lobster' => $this->T_('Lobster'), 'Molengo' => $this->T_('Molengo'), 'Neucha' => $this->T_('Neucha'), 'Neuton' => $this->T_('Neuton'), 'Nobile' => $this->T_('Nobile'), 'OFL+Sorts+Mill+Goudy+TT' => $this->T_('OFL Sorts Mill Goudy TT'), 'Old+Standard+TT' => $this->T_('Old Standard TT'), 'PT+Sans' => $this->T_('PT Sans'), 'Philosopher' => $this->T_('Philosopher'), 'Reenie+Beanie' => $this->T_('Reenie Beanie'), 'Tangerine' => $this->T_('Tangerine'), 'Tinos' => $this->T_('Tinos'), 'Vollkorn' => $this->T_('Vollkorn'), 'Yanone+Kaffeesatz' => $this->T_('Yanone Kaffeesatz'), ),
						'type' => 'select',
					),
					'load_add_variant' => array(
						'label' => T_('Use Additional Font Variant'),
						'note' => T_('See http://code.google.com/webfonts for which variants are available for which fonts ! Variants are loaded but not applied as styles, apply additional variants to desired elements of your choice.'),
						'defaultvalue' => 'No',
						'options' => array( '' => $this->T_('No'), ',regular' => $this->T_('Regular'), ',italic' => $this->T_('Italic'), ',bold' => $this->T_('Bold'), ',bolditalic' => $this->T_('Bold Italic'), ),
						'type' => 'select',
					),
					'font_size' => array(/*TODO: review*/
						'label' => T_('Font Size'),
						'note' => 'Adjust Font Size',
						'defaultvalue' => '',
						'options' => array( '90%' => $this->T_('Smaller'), '100%' => $this->T_('Normal'),  '120%' => $this->T_('Bigger'), '150%' => $this->T_('Large'), '200%' => $this->T_('Huge')  ),
						'type' => 'select',
					),
					'display_cat_list' => array(
						'label' => T_('Category Navigation'),
						'note' => 'Display a Category Navigation Css Menu with rss feeds',
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
				'basic_settings_end' => array(
	   				'layout' => 'end_fieldset',
				),

				'colors_settings_begin' => array(
					'layout' => 'begin_fieldset',
					'label' => $this->T_('Color Settings'),
				),
					'body_background_color' => array(
						'label' => T_('Body Background Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
					'header_background_color' => array(
						'label' => T_('Header Background Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
						'header_link_color' => array(
						'label' => T_('Header Links Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
					'header_text_color' => array(
						'label' => T_('Header Text Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
					'conten_background_color' => array(
						'label' => T_('Content Background Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
					'content_link_color' => array(
						'label' => T_('Content Links Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
					'content_text_color' => array(
						'label' => T_('Content Text Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
					'footer_background_color' => array(
						'label' => T_('Footer Background Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
					'footer_link_color' => array(
						'label' => T_('Footer Links Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
					'footer_text_color' => array(
						'label' => T_('Footer Text Color'),
						'note' => T_('Ex: #ff0000 for red'),
						'defaultvalue' => '',
						'valid_pattern' => array( 'pattern'=>'¤^(#([a-f0-9]{3}){1,2})?$¤i',
						'error'=>T_('Invalid color code.') ),
					),
				'color_settings_end' => array(
					'layout' => 'end_fieldset',
				),
		
				'enhance_begin' => array(
					'layout' => 'begin_fieldset',
					'label' => $this->T_('Enhancements'),
				),
					'load_jquery' => array(
						'label' => T_('Load Jquery'),
						'note' => T_('Loads jQuery for enhancements like Slider, evobar animations etc. all kind of jQuery madness'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),	
					'infinite_scroll' => array(
						'label' => T_('Infinite Scroll'),
						'note' => T_('Loads Next Set of Posts like twitter without having the need to click on next page'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),			
					'use_slider' => array(
						'label' => T_('Use Slider'),
						'note' => T_('Choose to use an Image Slider.jQuery Needs to be loaded!! See advanced options below'),
						'defaultvalue' => 'No',
						'options' => array( 'No' => $this->T_('No'),
						// 'Content' => $this->T_('Content Slider'),
						 'Nivo' => $this->T_('Nivo-Image Slider') ),
						'type' => 'select',
					),		
				'enhance_end' => array(
					'layout' => 'end_fieldset',
				),

				'post_info_begin' => array(
					'layout' => 'begin_fieldset',
					'label' => $this->T_('Post Details'),
				),
					'prev_next_page' => array(
						'label' => T_('Page Nav'),
						'note' => T_('Display Previous / Next Page links -blocks-'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'prev_next_single' => array(
						'label' => T_('Post Nav'),
						'note' => T_('Display Previous / Next Page links -blocks-'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_cats' => array(
						'label' => T_('Post Categories'),
						'note' => T_('Displays categories of each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_tags' => array(
						'label' => T_('Display Tags'),
						'note' => T_('Display Tags of each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_comm' => array(
						'label' => T_('Comment Link'),
						'note' => T_('Display Comment link & count for each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_perm' => array(
						'label' => T_('Permalink'),
						'note' => T_('Display Permalink for each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_author' => array(
						'label' => T_('Author'),
						'note' => T_('Display author of each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_msg_link' => array(
						'label' => T_('Message Link'),
						'note' => T_('Display a link to message the author of each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_time' => array(
						'label' => T_('Post time'),
						'note' => T_('Display time for each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_word_count' => array(
						'label' => T_('Word Count'),
						'note' => T_('Display word count for each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_view_count' => array(
						'label' => T_('View Count'),
						'note' => T_('Display view count for each post'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),
					'display_post_lang' => array(
						'label' => T_('Post Language'),
						'note' => T_('Display time for each post'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'display_post_lang_flag' => array(
						'label' => T_('Language Flag'),
						'note' => T_('Display Language Flag for each post'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),	
				'post_info_end' => array(
					'layout' => 'end_fieldset',
				),			

				'social_begin' => array(
					'layout' => 'begin_fieldset',
					'label' => $this->T_('Social Sharing'),
				),
					'display_social_bar' => array(
						'label' => T_('Social Sharing'),
						'note' => T_('Displays a div of Social Sharing icons'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'fbook_like' => array(
						'label' => T_('Facebook Like'),
						'note' => T_('Displays a Facebook Like Icon'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),
				'social_end' => array(
					'layout' => 'end_fieldset',
				),	
		
				'slider_begin' => array(
					'layout' => 'begin_fieldset',
					'label' => $this->T_('Slider Options'),
				),
					'slider_width' => array(
						'label' => T_('Slider Width'),
						'note' => T_('Ex: 950px'),
						'defaultvalue' => '',
					),
					'slider_height' => array(
						'label' => T_('Slider Height'),
						'note' => T_('Ex: 250px'),
						'defaultvalue' => '',
					),
					'use_slider_parameters' => array(
						'label' => T_('Advanced Parameters'),
						'note' => T_('Check to use advanced slide parameters and define values below, otherwise default parameters set will apply'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),	
					'slider_effect' => array(
						'label' => T_('Slider Effect'),
						'note' => T_('Choose a single effect if you like.Default is random.'),
						'defaultvalue' => 'random',
						'options' => array( 'random' => $this->T_('Random'), 'sliceDownRight' => $this->T_('sliceDownRight'), 'sliceDownLeft' => $this->T_('sliceDownLeft'), 'sliceUpRight' => $this->T_('sliceUpRight'), 'sliceUpLeft' => $this->T_('sliceUpLeft'), 'sliceUpDown' => $this->T_('sliceUpDown'), 'sliceUpDownLeft' => $this->T_('sliceUpDownLeft'), 'fold' => $this->T_('fade'), 'fold' => $this->T_('fade'), ),
						'type' => 'select',
					),
					'slider_slices' => array(
						'label' => T_('Slider Slices'),
						'note' => T_('Default is 15, Numeric value between 1 to infinity, setting the number too high may result in performance issues'),
						'defaultvalue' => '',
					),			
					'slider_animSpeed' => array(
						'label' => T_('Slider Animation Speed'),
						'note' => T_('Default is 400, Numeric value in miliseconds Ex: 1000'),
						'defaultvalue' => '',
					),	
					'slider_pauseTime' => array(
						'label' => T_('Slider Pause Time'),
						'note' => T_('Default is 3000, Numeric value in miliseconds Ex: 1000'),
						'defaultvalue' => '',
					),	
					'slider_startSlide' => array(
						'label' => T_('Starting Slide'),
						'note' => T_('Set starting Slide (0 index) Default is 0'),
						'defaultvalue' => '',
					),	
					'slider_directionNav' => array(
						'label' => T_('Direction Nav'),
						'note' => T_('Next & Prev'),
						'defaultvalue' => 'true',
						'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
						'type' => 'select',
					),	
					'slider_directionNavHide' => array(
						'label' => T_('Direction Nav Hide'),
						'note' => T_('Only show on hover'),
						'defaultvalue' => 'true',
						'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
						'type' => 'select',
					),	
					'slider_controlNav' => array(
						'label' => T_('Show Ordered Navigation'),
						'note' => T_('1,2,3...'),
						'defaultvalue' => 'true',
						'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
						'type' => 'select',
					),		
					'slider_keyboardNav' => array(
						'label' => T_('Keyboard Navigation'),
						'note' => T_('Use left & right arrows'),
						'defaultvalue' => 'true',
						'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
						'type' => 'select',
					),	
					'slider_pauseOnHover' => array(
						'label' => T_('Pause on Hover'),
						'note' => T_('Use left & right arrows'),
						'defaultvalue' => 'true',
						'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
						'type' => 'select',
					),	
					'slider_manualAdvance' => array(
						'label' => T_('Manual Advance'),
						'note' => T_('Force manual transitions'),
						'defaultvalue' => 'false',
						'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
						'type' => 'select',
					),
					'slider_captionOpacity' => array(
						'label' => T_('Caption Opacity'),
						'note' => T_('Universal caption opacity'),
						'defaultvalue' => '0.8',
						'options' => array( '0.1' => $this->T_('0.1'), '0.2' => $this->T_('0.2'), '0.3' => $this->T_('0.3'), '0.4' => $this->T_('0.4'), '0.5' => $this->T_('0.5'), '0.6' => $this->T_('0.6'), '0.7' => $this->T_('0.7'), '0.8' => $this->T_('0.8'), '0.9' => $this->T_('0.9'), '1' => $this->T_('1') ),
						'type' => 'select',
					),		
				'slider_end' => array(
					'layout' => 'end_fieldset',
				),		
		
				'infinite_begin' => array(
					'layout' => 'begin_fieldset',
					'label' => $this->T_('Infinite Scroll Options'),
				),	
					'inf_bufferPx' => array(
						'label' => T_('Buffer Scroll Px'),
						'note' => T_('increase this number if you want infscroll to fire quicker ||a high number means a user will not see the loading message || Default is 40, Numeric value'),
						'defaultvalue' => '',
					),	
					'inf_animate' => array(
						'label' => T_('animate'),
						'note' => T_('boolean, if the page will do an animated scroll when new content loads, default: false'),
						'defaultvalue' => 'false',
						'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
						'type' => 'select',
					),		
					'inf_extraScrollPx' => array(
						'label' => T_('Extra Scroll Px'),
						'note' => T_('animate must be true for this to matter || number of additonal pixels that the page will scroll || Default is 100, Numeric value'),
						'defaultvalue' => '',
					),	
					'inf_loadingText' => array(
						'label' => T_('Loading Text'),
						'note' => T_('text accompanying loading image ||Default is "Loading the next set of posts..."'),
						'defaultvalue' => '',
					),
					'inf_donetext' => array(
						'label' => T_('Done Text'),
						'note' => T_('text displayed when all items have been retrieved ||Default: "Congratulations you ve reached the end of the internet."'),
						'defaultvalue' => '',
					),              
					'inf_debug' => array(
						'label' => T_('debug'),
						'note' => T_('enable debug messaging ( to console.log )'),
						'defaultvalue' => 'false',
						'options' => array( 'false' => $this->T_('false'), 'true' => $this->T_('true') ),
						'type' => 'select',
					),	
				'infinite_end' => array(
					'layout' => 'end_fieldset',
				),		
	
				'display_b2_credits' => array(
					'label' => T_('Footer credits'),
					'note' => T_('Display b2evolution links in footer'),
					'defaultvalue' => 0,
					'type' => 'checkbox',
				),	
					'display_b2_credits_side' => array(
					'label' => T_('Sidebar credits'),
					'note' => T_('Display b2evolution link in sidebar'),
					'defaultvalue' => 1,
					'type' => 'checkbox',
				),	
					'display_footer_contact' => array(
					'label' => T_('Contact link'),
					'note' => T_('Display contact link in footer '),
					'defaultvalue' => 1,
					'type' => 'checkbox',
				),	
					'display_footer_help' => array(
					'label' => T_('Help link'),
					'note' => T_('Display help link in footer '),
					'defaultvalue' => 1,
					'type' => 'checkbox',
				),	
			), parent::get_param_definitions( $params )	);

			global $app_version;

			if( round($app_version) >= 5 ) unset($r['load_jquery']); 

		return $r;
	}

	/**
	 * Get ready for displaying the skin.
	 *
	 * This may register some CSS or JS...
	 */
	function display_init()
	{
		// call parent:
		parent::display_init();
		
			require_js( '#jquery#' );
			require_js( 'chita/rsc/colorpicker.js',true );
			require_js( 'chita/rsc/iphone-style-checkboxes.js',true );
			require_css( 'chita/rsc/extensions.css', true );

		// Make sure standard CSS is called ahead of custom CSS generated below:
		require_css( 'style.css', true );
		// Add custom CSS:
		$custom_css = '';

		//color vars
		$body_background_color = $this->get_setting( 'body_background_color');
		$header_background_color = $this->get_setting( 'header_background_color');
		$header_text_color = $this->get_setting( 'header_text_color');
		$header_link_color = $this->get_setting( 'header_link_color');
		$footer_background_color = $this->get_setting( 'footer_background_color');
		$footer_text_color = $this->get_setting( 'footer_text_color');
		$footer_link_color = $this->get_setting( 'footer_link_color');
		$content_background_color = $this->get_setting( 'conten_background_color');
		$content_text_color = $this->get_setting( 'content_text_color');
		$content_link_color = $this->get_setting( 'content_link_color');
		
		if( !empty ( $content_background_color ))
		{$custom_css .= 'body { background-color: '.$body_background_color.' }';}
		if( !empty ( $header_background_color ))
		{$custom_css .= 'div#tq-header { background-color: '.$header_background_color.' }';}		
		if( !empty ( $header_text_color ))
		{$custom_css .= 'div#tq-header { color: '.$header_text_color.' }';}
		if( !empty ( $header_link_color ))
		{$custom_css .= 'div#tq-header a { color: '.$header_link_color.' }';}
		if( !empty ( $content_background_color ))
		{$custom_css .= 'div#tq-content { background-color: '.$content_background_color.' }';}		
		if( !empty ( $content_text_color ))
		{$custom_css .= 'div#tq-content { color: '.$content_text_color.' }';}
		if( !empty ( $content_link_color ))
		{$custom_css .= 'div#tq-content a { color: '.$content_link_color.' }';}
		if( !empty ( $footer_background_color ))
		{$custom_css .= 'div#tq-footer { background-color: '.$footer_background_color.' }';}		
		if( !empty ( $footer_text_color ))
		{$custom_css .= 'div#tq-footer { color: '.$footer_text_color.' }';}
		if( !empty ( $footer_link_color ))
		{$custom_css .= 'div#tq-footer a { color: '.$footer_link_color.' }';}
		
		if( $use_google_font = $this->get_setting( 'use_google_font') )
		$r_plus  = array('+');
		$r_rep = array(' ');
		$use_google_font_s = str_replace($r_plus, $r_rep, $use_google_font);
		{	if( $use_google_font != "No" ) 
			$custom_css .= '	body { font-family: \''.$use_google_font_s."',arial serif }\n";
		}
		if( $custom_width = $this->get_setting( 'custom_width') )
		{$custom_css .= '	div#custom-mainbody { width: '.$custom_width." }\n";
		}
		if( $font_size = $this->get_setting( 'font_size') )
		{$custom_css .= '	div#wrapper-r { font-size: '.$font_size." }\n";
		}
		if( $slider_width = $this->get_setting( 'slider_width') )
		{$custom_css .= '	div#nivo-slider { width: '.$slider_width." !important }\n";
		}
		if( $slider_height = $this->get_setting( 'slider_height') )
		{$custom_css .= '	div#nivo-slider { height: '.$slider_height." !important }\n";
		}
		
		if( $this->get_setting('bg_pattern') == "none" )
		{$custom_css .= 'body { background-image: none;}';
		}

		if( $this->get_setting('bg_pattern') == "shadow" )
		{$custom_css .= 'body { background-image: url(img/shado.png); background-repeat: repeat-x; background-color: '.$body_background_color." }\n";
		}
		
		if( $this->get_setting('bg_pattern') == "grid" )
		{$custom_css .= 'body { background-image: url(img/grid.png); background-color: '.$body_background_color." }\n";
		}
		
		if( $this->get_setting('bg_pattern') == "royal" )
		{$custom_css .= 'body { background-image: url(img/royal.png); background-color: '.$body_background_color." }\n";
		}
		
		if( $this->get_setting('bg_pattern') == "abstrblue" )
		{$custom_css .= 'body { background-image: url(img/abstr-blue.png); background-color: '.$body_background_color." }\n";
		}
			
		if( !empty( $custom_css ) )
		{
			$custom_css = '<style type="text/css">' . "\n" .
 						  '<!--' . "\n" .
 						  $custom_css.'	-->' . "\n" .
 						  '</style>';
	
			add_headline( $custom_css );
		}

		// Colorbox (a lightweight Lightbox alternative) allows to zoom on images and do slideshows with groups of images:
		if( $this->get_setting("colorbox") )
		{
			require_js_helper( 'colorbox', 'blog' );
		}
	}
}

	function display_list_cats( $option_all = '' )
	{
		global $Plugins;
		
		ob_start();
		skin_widget( array(
			// CODE for the widget:
			'widget' => 'coll_category_list',
			// Optional display params
			'block_start'			=> '',
			'block_end'				=> '',
			'block_title_start'		=> '',
			'block_title_end'		=> '',
			'block_display_title'	=> false,
			'list_start'			=> '',
			'list_end'				=> '',
			'item_start'			=> '<li class="cat-item">',
			'option_all'			=> $option_all, // T_('All')
		) );
		
		$widget_cat = ob_get_clean();
		
		if( $widget_cat_fixed = @preg_replace( '~<a(.*?)href="(.*?)">(.*?)</a>~',
					'<a class="fadeThis" $1href="$2"><span class="entry">$3</span></a><a href="$2?tempskin=_rss2" class="rss_feed"></a>',
					$widget_cat ) )
		{
			echo $widget_cat_fixed;
		}
		else
		{
			echo $widget_cat;
		}
	}
/*
 * $Log: _skin.class.php,v $
 */
?>