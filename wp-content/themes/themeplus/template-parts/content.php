<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme_Plus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header tp-entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title tp-entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title tp-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta tp-entry-meta">
				<?php
				themeplus_posted_on();
				themeplus_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php themeplus_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'themeplus' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		?>
		<script>
		var larghezza = window.innerWidth;
		alert(larghezza);
		</script>
		<?php
		echo 'test sono su content.php e la finestra è larga <script>document.writeln(larghezza)</script>';

		wp_link_pages(
			array(
				'before' => '<div class="page-links tp-page-links">' . esc_html__( 'Pages:', 'themeplus' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php themeplus_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
