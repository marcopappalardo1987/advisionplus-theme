<?php
/**
 * Template part for display left sidebar
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}

?>

<aside id="tp-sidebar-left" class="widget-area sidebar-left">
	<?php dynamic_sidebar( 'sidebar-left' ); ?>
</aside><!-- #secondary -->