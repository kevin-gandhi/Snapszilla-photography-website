<?php
/**
 * Feature Post Slider.
 *
 * @package online_photography
 */

function online_photography_slider() {
	register_widget( 'Online_Photography_Slider' );
}
add_action( 'widgets_init', 'online_photography_slider' );

class Online_Photography_Slider extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'widget_slider',
		  'description' => esc_html__( 'Add Widget to Display Slider.', 'online-photography' )
		);
		parent::__construct( 'Online_Photography_Slider',esc_html__( 'OP: Slider', 'online-photography' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'category'       	=> '', 
			  'number'          => 3, 
			) 
		);
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;   
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Slider Category:', 'online-photography' ); ?>			
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
	    		<?php echo esc_html__( 'Choose Number (Max: 3)', 'online-photography' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="3" />
	    </p>   	    
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['category'] 			= absint( $new_instance['category'] );		
		$instance['number'] 			= absint( $new_instance['number'] );
		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args ); 
    	    	
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3; 
        echo $before_widget;
        ?>       		    
	        
        <?php $slider_args = array(
            'posts_per_page' 		=> absint( $number ),
            'post_type' 	 		=> 'post',
            'post_status' 	 		=> 'publish',
            'ignore_sticky_posts'   => true,     
        );

        if ( absint( $category ) > 0 ) {
          $slider_args['cat'] = absint( $category );
        }

        $the_loop = new WP_Query( $slider_args ); 

        if ($the_loop->have_posts()) : $count= 0; ?>
        	<div class="container">		            
	    		<div class="swiper-container">
	    			<div class="swiper-wrapper">
	        			<?php while ( $the_loop->have_posts() ) : $the_loop->the_post(); ?>
		                    <article class="swiper-slide">
		                    	<div class="section-overlay"></div>
		                    	<?php if ( has_post_thumbnail() ){ ?>
			                        <div class="featured-image">
			                        	<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			                        </div><!-- .featured-image -->
		                        <?php } ?>

		                        <div class="slider-content">
		                        	<div class="category-meta">
										<?php online_photography_entry_footer(); ?>
									</div><!-- .category-meta -->

		                            <header class="entry-header">
		                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		                            </header>

		                            <div class="entry-meta">
										<?php
											online_photography_posted_by();
											online_photography_posted_on();
										?>
									</div><!-- .entry-meta -->
		                    	</div><!-- .slider-content -->
		                    </article>
	            		<?php endwhile; ?>
	                </div><!-- .swiper-wrapper -->
	                <div class="swiper-button-next"></div>
	    			<div class="swiper-button-prev"></div>
	            </div><!-- .swiper-container -->
            </div><!-- .container -->
            <?php wp_reset_postdata(); ?>
        <?php endif;?>
        <?php echo $after_widget;
    } 
}