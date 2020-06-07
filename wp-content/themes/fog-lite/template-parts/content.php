<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fog-lite-pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
                        <div class="col-md-12 single-post">
                            <div class="row">
								<?php $cls='onsingle_page';
									  if(is_singular())
									  {
										  ?>
										  <div class="col-md-12 admin-post-img <?php echo $cls; ?>">
											<?php wedding_photo_post_thumbnail(); ?>
											</div>
										  <?php
									  }
									  else
									  {
								?>
                                <div class="col-md-6 admin-post-img">
                                    <?php wedding_photo_post_thumbnail(); ?>
                                </div>
									  <?php } ?>
                                <div class="col-md-6 admin-post-txt">
                                	<?php 

		if ( is_singular() ) :
			the_title( '<h2  class="entry-title">', '</h2>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

                                	 ?>
                                <ul>
									<?php 
									if ( is_singular() )
									{
										wedding_photo_posted_on();
									}
									else
									{
									?>
                                    <li><?php
									wedding_photo_posted_by();
									?><span>.</span></li>
                                    <li>
									<?php 
									if ( 'post' === get_post_type() ) {
										/* translators: used between list items, there is a space after the comma */
										$categories_list = get_the_category_list( esc_html__( ', ', 'fog-lite-pro' ) );
										if ( $categories_list ) {
											/* translators: 1: list of categories. */
											printf( '<span class="cat-links">' . esc_html__( 'In %1$s', 'fog-lite-pro' ) . '</span>', $categories_list ); // WPCS: XSS OK.
										}

									}
									?>
									
									<span>.</span></li>
                                    <li>
									<?php
									if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
												echo '<span class="comments-link">';
												comments_popup_link(
													sprintf(
														wp_kses(
															/* translators: %s: post title */
															__( 'Comment', 'fog-lite-pro' ),
															array(
																'span' => array(
																	'class' => array(),
																),
															)
														),
														get_the_title()
													)
												);
												echo '</span>';
											}
									?></li>
									<?php } ?>
                                </ul>
                                <p class="post-txt">
                               <?php
							   if(is_single())
							   {
								the_content( sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fog-lite-pro' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );
							   }
							   else
							   {
								   the_excerpt();
							   }

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fog-lite-pro' ),
									'after'  => '</div>',
								) );
								?>
                                </p>
                               
                                </div>
								<?php if ( is_singular() ){ ?>
								<div class="col-md-12">
									<div class="row post-author">
										<div class="col-md-4 author-pic">
											<?php 
											$get_author_id = get_the_author_meta('ID');
											$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
											echo '<img src="'.$get_author_gravatar.'" alt="'.get_the_title().'" />';
											?>
											
										</div>
										<div class="col-md-8 author-txt">
											<h2>ABOUT THE AUTHOR</h2>
											<h3><?php echo get_the_author(); ?></h3>
											<p><?php echo get_the_author_meta('description'); ?></p>
										</div>
									</div>
								</div>
								<?php } ?>
                            </div>
                        </div><!-- /.single-admin-post-->

                    </div>

</article><!-- #post-<?php the_ID(); ?> -->
