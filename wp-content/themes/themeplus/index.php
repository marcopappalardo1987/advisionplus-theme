<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme_Plus
 */

get_header();
?>

	<main id="primary" class="tp-main site-main">

		<?php
		//Get the left sidebar
		if(isset($themeplus_option['tp-show-sidebar-blog-archive']) && ($themeplus_option['tp-show-sidebar-blog-archive']=='left' or $themeplus_option['tp-show-sidebar-blog-archive']=='both')){
			require_once (get_template_directory() . '/template-parts/sidebar-left.php');
		}

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="tp-page-title page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		//Get the left sidebar
		if(isset($themeplus_option['tp-show-sidebar-blog-archive']) && ($themeplus_option['tp-show-sidebar-blog-archive']=='right' or $themeplus_option['tp-show-sidebar-blog-archive']=='both')){
			require_once (get_template_directory() . '/template-parts/sidebar-right.php');
		}
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
