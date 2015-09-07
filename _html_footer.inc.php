<?php
/**
 * This is the HTML footer include template.
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
include( 'tq_definitions.php' );
// ---------------------------- TOOLBAR INCLUDED HERE ----------------------------
//require $skins_path.'_toolbar.inc.php';
// ------------------------------- END OF TOOLBAR --------------------------------
// SkinEndHtmlBody hook -- could be used e.g. by a google_analytics plugin to add the javascript snippet here:
if ($ver4x)
modules_call_method( 'SkinEndHtmlBody' );
$Plugins->trigger_event('SkinEndHtmlBody');

?>

			<!-- End of skin_wrapper -->
			</div>
		<?php skin_include( 'tq_extensions.php' );?>
		</div><!-- end of #bodyw -->
	</body>
</html>