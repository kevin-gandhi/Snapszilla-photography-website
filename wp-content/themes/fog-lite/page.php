<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wedding_photo
 */

get_header();
if(is_front_page())
{
	get_template_part( 'template-parts/home_section');
}
else 
{
	

?>
<style>
section {
    padding: 180px 0px;
}
</style>
	<section id="post_details">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="container">
		
		<div class="row">
			
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div>
			
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	</section>

<?php
}
get_footer();
