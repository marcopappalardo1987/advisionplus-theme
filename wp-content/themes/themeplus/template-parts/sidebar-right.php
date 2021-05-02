<?php
/**
 * Template part for display right sidebar
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}

?>

<aside id="tp-sidebar-right" class="widget-area sidebar-right">
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
</aside><!-- #secondary -->