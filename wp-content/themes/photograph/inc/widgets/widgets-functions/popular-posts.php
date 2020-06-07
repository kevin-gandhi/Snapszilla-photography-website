<?php

/**
 * Display Popular
 *
 * @package Theme Freesia
 * @subpackage Photograph
 * @since Photograph 1.0
 */

class Photograph_popular_Widgets extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {
		$widget_ops = array( 'classname' => 'widget-popular-posts', 'description' => __( 'Displays popular posts', 'photograph') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name=__('TF: Popular Posts','photograph'), $widget_ops, $control_ops );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$photograph_popular_posts = ! empty( $instance['photograph_popular_posts'] ) ? absint( $instance['photograph_popular_posts'] ) : 5;
		$photograph_popular_posts_title = ! empty( $instance['photograph_popular_posts_title'] ) ? esc_attr( $instance['photograph_popular_posts_title'] ) : ''; ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'photograph_popular_posts' )); ?>"><?php esc_html_e( 'Number of popular posts:', 'photograph' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'photograph_popular_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'photograph_popular_posts' )); ?>" type="text" value="<?php echo esc_attr( $photograph_popular_posts ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'photograph_popular_posts_title' )); ?>"><?php esc_html_e( 'Title:', 'photograph' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'photograph_popular_posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'photograph_popular_posts_title' )); ?>" type="text" value="<?php echo esc_attr( $photograph_popular_posts_title ); ?>">
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['photograph_popular_posts'] = ( ! empty( $new_instance['photograph_popular_posts'] ) ) ? absint( $new_instance['photograph_popular_posts'] ) : '';
		$instance[ 'photograph_popular_posts_title' ] = sanitize_text_field($new_instance[ 'photograph_popular_posts_title' ]);

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		$photograph_settings = photograph_get_theme_options();
		extract($args);
		$photograph_popular_posts = ( ! empty( $instance['photograph_popular_posts'] ) ) ? absint( $instance['photograph_popular_posts'] ) : 5;
		$photograph_popular_posts_title = ! empty( $instance['photograph_popular_posts_title'] ) ? esc_attr( $instance['photograph_popular_posts_title'] ) : '';

		echo $before_widget;
		if(!empty($photograph_popular_posts_title) ){ ?>
			<h3 class="widget-title"><?php echo esc_attr($photograph_popular_posts_title); ?></h3>
		<?php } ?>
		<div class="popular-posts-wrapper">
			<div class="tf-popular">
		
				<?php 
					$args = array( 'ignore_sticky_posts' => 1, 'posts_per_page' => $photograph_popular_posts, 'post_status' => 'publish', 'orderby' => 'comment_count', 'order' => 'desc' );
					$popular = new WP_Query( $args );

					if ( $popular->have_posts() ) :

					while( $popular-> have_posts() ) : $popular->the_post(); ?>
						<div <?php post_class('tf-post');?>>
							<?php if ( has_post_thumbnail() ) { ?>
								<figure class="tf-featured-image">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('photograph-popular-post'); ?></a>
								</figure> <!-- end.post-featured-image -->
							<?php } ?>
							<div class="tf-content">
								<?php the_title( sprintf( '<h3 class="tf-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
								<div class="tf-entry-meta">
									<?php
										echo '<span class="author vcard"><a href="'.esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )).'" title="'.the_title_attribute('echo=0').'"><i class="fa fa-user-o"></i> ' .esc_html(get_the_author()).'</a></span>';
										printf( '<span class="posted-on"><a href="%1$s" title="%2$s"><i class="fa fa-calendar-o"></i>%3$s</a></span>',
														esc_url(get_the_permalink()),
														esc_attr( get_the_time(get_option( 'date_format' )) ),
														esc_attr( get_the_time(get_option( 'date_format' )) )
													);

									if ( comments_open() ) { ?>
											<span class="comments">
											<?php comments_popup_link( __( '<i class="fa fa-comment-o"></i> No Comments', 'photograph' ), __( '<i class="fa fa-comment-o"></i> 1 Comment', 'photograph' ), __( '<i class="fa fa-comment-o"></i> % Comments', 'photograph' ), '', __( 'Comments Off', 'photograph' ) ); ?> </span>
									<?php } ?>
								</div> <!-- end .tf-entry-meta -->
							</div> <!-- end .tf-content -->
						</div><!-- end .tf-post -->
					<?php
					endwhile;
					wp_reset_postdata();
					endif;
				?>
			</div> <!-- end .tf-popular -->
		</div><!-- end .popular-posts-wrapper -->
		<?php echo $after_widget;
	}

}