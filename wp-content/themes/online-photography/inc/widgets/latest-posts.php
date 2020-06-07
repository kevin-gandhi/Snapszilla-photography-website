<?php
/**
 * Latest Posts.
 *
 * @package online_photography
 */

function online_photography_latest_posts() {
	register_widget( 'Online_Photography_Latest_Posts' );
}
add_action( 'widgets_init', 'online_photography_latest_posts' );

class Online_Photography_Latest_Posts extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'widget_latest_posts',
		  'description' => esc_html__( 'Add Widget to Display Latest Posts.', 'online-photography' )
		);
		parent::__construct( 'Online_Photography_Latest_Posts',esc_html__( 'OP: Latest Posts', 'online-photography' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'title'			=> esc_html__( 'Latest Posts', 'online-photography' ),		
			  'category'       	=> '', 
			  'number'          => 8, 
			) 
		);
		$title     			= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Latest Posts', 'online-photography' );
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 8;   
	?>
	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'online-photography' ); ?></label>
	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Select Category:', 'online-photography' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
					'show_option_none' => '',
					'class' 		  => 'widefat',
					'show_option_all'  => esc_html__('Recent Posts','online-photography'),
					'name'             => esc_attr($this->get_field_name( 'category' )),
					'selected'         => absint( $category ),          
				) );
			?>
		</p>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number (Max: 8)', 'online-photography' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="8" />
	    </p>	
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 				= sanitize_text_field( $new_instance['title'] );
		$instance['category'] 			= absint( $new_instance['category'] );		
		$instance['number'] 			= absint( $new_instance['number'] );
		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args ); 
		$title     			= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Latest Posts', 'online-photography' );
    	$title 				= apply_filters( 'widget_title', $title, $instance, $this->id_base );
    	
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 8; 
        echo $before_widget;
        ?>   		    
	        
        <?php $blog_args = array(
            'posts_per_page' 		=> absint( $number ),
            'post_type' 			=> 'post',
            'post_status' 			=> 'publish',
            'ignore_sticky_posts'   => true,   
        );

        if ( absint( $category ) > 0 ) {
          $blog_args['cat'] = absint( $category );
        }

        $the_loop = new WP_Query( $blog_args ); 

        if ($the_loop->have_posts()) : $count= 0; ?>		            
            <div class="container">
            	<?php if ( !empty( $title ) ): ?>
		            <div class="widget-header">
		                <?php echo $args['before_title'] . esc_html($title) . $args['after_title']; ?>
		            </div><!-- .widget-header -->
		        <?php endif; ?>	     

        		<div class="blog-archive">
            		<?php while ( $the_loop->have_posts() ) : $the_loop->the_post(); ?>
	                    <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ?>">
            				<div class="blog-post-item">
								<div class="featured-image">
		                        	<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
								</div><!-- .featured-image -->

								<div class="entry-container">
									<div class="category-meta">
										<?php online_photography_entry_footer(); ?>
									</div><!-- .category-meta -->

									<header class="entry-header">
										<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</header><!-- .entry-header -->

									<div class="entry-meta">
										<?php
											online_photography_posted_by();
											online_photography_posted_on();
										?>
									</div><!-- .entry-meta -->

									<?php $excerpt = get_the_excerpt();
									if ( !empty($excerpt) ) { ?>
										<div class="entry-content">
											<?php the_excerpt(); ?>
										</div><!-- .entry-content -->
									<?php } ?>
								</div><!-- .entry-container -->
							</div><!-- .blog-post-item -->
	                    </article>
            		<?php endwhile; ?>
                </div><!-- .col-3 -->
                <?php wp_reset_postdata(); ?>
            </div>		            
        <?php endif;?>
	        		    
        <?php echo $after_widget;
    } 
}