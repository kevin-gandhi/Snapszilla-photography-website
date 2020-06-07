<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wedding_photo
 */

?>
		<!--
        ===================
           FOOTER
        ===================
        --> 
		
        <footer class="section zb-footer lo-footer  wow fadeInUp">
            <div class="container">
                <div class="row relative mini-section-separator">
                    <div class="col-sm-4" id="footer-sidebar-1">
						
						  <ul class="social-icon">
							<?php
							$social_icons_default=array('facebook'=>'https://www.facebook.com/','twitter'=>'https://twitter.com/','googlePlus'=>'https://mail.google.com','dribbble'=>'https://dribbble.com/','youtube'=>'http://youtube.com/','linkedin'=>'https://in.linkedin.com/');
							$social_icons = array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
							foreach( $social_icons as $social_icon){
								$wedding_photo_social_icons = get_theme_mod ('wedding_photo_'.$social_icon.'_url',$social_icons_default[$social_icon]);
								if( $wedding_photo_social_icons ){
									echo '<li class="banner4_socials_'.$social_icon.'"><a href="'. esc_url($wedding_photo_social_icons).'" target="_blank">';
									if( $social_icon == 'googlePlus' ){
										echo '<i class ="fa fa-google-plus"></i>'; 
									}else{
										echo '<i class ="fa fa-'. esc_attr($social_icon).'"></i>';    
									}
									echo '</a></li>';
								}
							}
							?>
                            
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-links" id="footer-sidebar-2">
							<?php
							
							wp_nav_menu( array(
										'theme_location' => 'new-menu',
										'menu_id'        => 'new-menu',
										'container' => 'ul',
										'menu_class' => 'navbar-nav mr-0 ml-auto',
										'link_class'   => 'nav-link'
							) );
							if(is_active_sidebar('footer-sidebar-2')){
								//dynamic_sidebar('footer-sidebar-2');
							}
							?>
                        </div>
                    </div>
                    <div class="col-sm-4" id="footer-sidebar-3">
                    	<?php 
                    		//echo get_theme_mod('copyright_text_setting');	

							if(is_active_sidebar('footer-sidebar-3')){
								//dynamic_sidebar('footer-sidebar-3');
								echo '<p> © 2019 FOG Lite Developed By <a href="https://plasmarex.com">Remove Footer Signature</a></p>';
							}
							else 
							{
								//dynamic_sidebar('footer-sidebar-3');
								echo '<p> © 2019 FOG Lite Developed By <a href="https://plasmarex.com">Remove Footer Signature</a></p>';
							}
						?>
                        
                    </div>

                </div>
            </div>
        </footer>
	
	<?php wp_footer(); ?>
	 <script>
	 $(document).ready(function(){
		$('.ptp-price').each(function(){ 
			var pricse=$(this).html().split("/");
			$(this).html(pricse[0]);
			$(this).append('<span class="duration-month">'+pricse[1]+'</span>');
			
		});
		
	 });
	
	
	
	</script>
</body>
</html>

