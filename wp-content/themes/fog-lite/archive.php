<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fog-lite-pro
 */

get_header();
?>

	<div id="primary" class="content-area blog_details2">
		<main id="main" class="site-main">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header main_cattegy">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div><!-- .page-header -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 blog-single-post">
			<?php if ( have_posts() ) : ?>

			

			<?php
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
		?>
		</div>
		<div class="searchhh_1 col-md-4  blog-right">
			<?php 
get_sidebar();
			 ?>
		</div>
	</div>
		
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
