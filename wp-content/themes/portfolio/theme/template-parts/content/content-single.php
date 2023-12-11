<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CS_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( ! is_page() ) : ?>
			<div class="entry-meta">
				<?php csentry_meta(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php cspost_thumbnail(); ?>

	<div <?php cscontent_class( 'entry-content' ); ?>>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'cs' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', 'cs' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php csentry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->
