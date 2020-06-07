<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wedding_photo
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<header class="page-header main_cattegy">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'fog-lite-pro' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
		</div>
	</div>
	<div class="row"> 
<div class="col-md-8 blog-single-post">
	<?php if ( have_posts() ) : ?>

			

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
	</section><!-- #primary -->

<?php

get_footer();
