<?php
/**
 * Template part for displaying results in search pages
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
                                <div class="col-md-6 admin-post-img">
                                    <?php wedding_photo_post_thumbnail(); ?>
                                </div>
                                <div class="col-md-6 admin-post-txt">
                                	<?php 

if ( is_singular() ) :
			the_title( '<h3 class="entry-title">', '</h3>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

                                	 ?>
                                <ul>
                                    <li><?php
									// wedding_photo_posted_on();
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
                                </ul>
                                <p class="post-txt">
                               <?php
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

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fog-lite-pro' ),
									'after'  => '</div>',
								) );
								?>
                                </p>
                               
                                </div>
                            </div>
                        </div><!-- /.single-admin-post-->

                    </div>

</article><!-- #post-<?php the_ID(); ?> -->
