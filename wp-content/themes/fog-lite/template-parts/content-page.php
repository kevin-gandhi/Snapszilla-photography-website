<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fog-lite-pro
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="col-md-12 admin-post blog-page">
	<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</div>
	<div class="col-md-12 post-script">
	<?php wedding_photo_post_thumbnail(); ?>
	
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fog-lite-pro' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'fog-lite-pro' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
