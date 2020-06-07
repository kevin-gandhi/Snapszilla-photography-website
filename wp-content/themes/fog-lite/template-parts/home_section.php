		<!--
        ===================
            HOME 
        =================== 
        -->
		
		<?php 
		global $wp_customize;
		if(get_theme_mod('wedding_home_banner_enable',1))
		{
		$banner_tops='';
		$de_image=get_template_directory_uri().'/assets/images/header-bg.png';
		$defults_banners=get_theme_mod('wedding_banner_background_image',"$de_image");
		$checks=explode(".",$defults_banners);
		if(count($checks)==1)
		{
			$remove = array("http://","https://");
			$defults_banners=str_replace($remove,"",$defults_banners);
			$defults_banners=wp_get_attachment_url($defults_banners);
		}
		$img_ext=1;
		if($defults_banners)
		{
			if(is_array(getimagesize($defults_banners)))
			{
				$img_ext=1;
			}
			else 
			{
				$img_ext=0;
			}
		}
		if($defults_banners && $img_ext==1) { 
			$banner_tops="background-image: url(".$defults_banners.");";
		}
		
		?>
        <div class="section zb-home lo-home  header-bg image-bg  home_manepage" id="home" style="<?php echo $banner_tops; ?>" >
			<?php if($img_ext==0){ ?>
			 <video width="100%" height="" autoplay muted loop class="vide_img_size" >
				  <source src="<?php echo $defults_banners; ?>" type="video/mp4">
				  <source src="<?php echo $defults_banners; ?>" type="video/ogg">
				  Your browser does not support the video tag.
			</video> 
			<?php } ?>
            <div class="color-overlay home-h ">
                <div class="tabbbel_d1">
                	<div class="tabbbel_d2 ">
                		<div class="container home4_banners">
                    <div class="row section-separator relative">
                    	   <ul class="home-social">
							<?php 
								$social_icons_default=array('facebook'=>'https://www.facebook.com/','twitter'=>'https://twitter.com/','linkedin'=>'https://in.linkedin.com/');
								$social_icons = array('facebook','twitter','linkedin');
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
                        <div class="col-sm-12">
                            <div class="lo_content_inner">
								<?php 
								$banners_text=get_theme_mod('banner_text_setting','Capture Your Moments');
								if($banners_text)
								{									?>
                                <h2 class="main_heading wow fadeInRight banner4_headings"><?php echo $banners_text; ?></h2> 
								<?php } 
								$but_texts=get_theme_mod('banner_button_setting','Get started');
								
								if($but_texts)
								{
								?>
                                <div class="lo-button">
									<?php 
									$links="javascript:void(0)";
									if(get_theme_mod('banner_button_link'))
									{
										$links=get_theme_mod('banner_button_link');
									}
									?>
                                    <a href="<?php echo $links; ?>" class="btn btn-fill wow fadeInLeft banner4_buttons"><?php echo $but_texts; ?></a>   
                                </div>
								<?php } ?>
                            </div>
                         
                        </div>
                    </div>
                </div>
                	</div>
                </div>
            </div>
        </div>
		<?php } 
		if(get_theme_mod('wedding_partner_section_enable',1))
		{
		
		?>
        <!--
        ===================
            CLIENT
        =================== 
        -->
        <section id="client">
            <div class="container">
                <div class="row section-separator pt-0 cl-logo-sec">
                    <div class="cl-logo col-sm-12" >
					<?php
						$partners_icons = array('one','two','three','four','five','six');
						foreach( $partners_icons as $keys=>$partners_icon){
							$all_images=get_theme_mod('wedding_partner_'.$partners_icon.'_image');
							if($all_images)
							{
								?>
								<span class="client4_partner_<?php echo $partners_icon; ?>_set">
								<img src="<?php echo $all_images; ?>"  alt="" class="wow fadeInUp ">
								</span>
								<?php
							}
								
						}
					?>
                        
                    </div>
                </div>
            </div>
        </section>
		<?php } 
			
		if(get_theme_mod('wedding_aboutus_section_enable',1))
		{
		?>
       <!--
        ===================
            ABOUT 
        =================== 
        -->
        <section class="section lo-about" id="about">
			<?php 
			$about_left_section='';
			if(get_theme_mod('wedding_aboutus_background_image'))
			{	
				$about_left_section='background-image: url('.get_theme_mod('wedding_aboutus_background_image').');';
			}		
			?>
            <div class="container-half container-half-left cover-bg" style="<?php echo $about_left_section; ?>"></div>
            <div class="container-half container-half-right main-color-bg"></div>
            <div class="container about4_banner">
                <div class="row">
                     <div class="col-lg-7 col-md-12 offset-lg-5">
                        <div class="col-sm-12 lo-again-section-title about-sec-title mb-0">
							<?php
							$wedding_aboutus_title=get_theme_mod('wedding_aboutus_title','ABOUT US');
							if($wedding_aboutus_title)
							{
							?>
                            <div class="heading-corners ex-heading-corners about4_title">
                                <span class=" section-tagline wow fadeInRight"> <?php echo $wedding_aboutus_title ?></span>
                            </div>
                            <?php } 
							$heading_text=my_theme_mods('wedding_aboutus_heading');
							if($heading_text)
							{
							?>
                            <h2 class="wow fadeInLeft about4_headings"><?php echo $heading_text; ?></h2>
							<?php } ?>
                        </div>
                        <div id="integration-list" class="uv-accordinaton wow fadeInUp " data-wow-duration="0.8s" data-wow-delay="0.5s">
                            <ul>
								<?php 
								$abouts_faqs = array('one','two','three','four');
								$ik=1;
								foreach( $abouts_faqs as $keys=>$abouts_faq){
									$titles=my_theme_mods('wedding_faq_'.$abouts_faq.'_text');
									$detailss=my_theme_mods('wedding_faq_'.$abouts_faq.'_detail');
									if($titles)
									{
										$first_show='';
										$first_sign='+';
										if($ik==1)
										{
											$first_show='display: block;';
											$first_sign='-';
										}
									?>
									<li class="wow fadeInLeft about4_faqs_<?php echo $abouts_faq; ?>">
                                    <a class="uv-accordinaton-list">
                                        <div class="uv-right-arrow"><?php echo $first_sign; ?></div>
                                        <h2><?php echo $titles; ?></h2>
                                    </a>
                                    <div class="uv-accordition-detail col-sm-12" style="<?php echo $first_show; ?>">
                                        <div class="row">
                                            
                                            <div class="uv-ac-details col-md-12 col-sm-12">
                                                <p><?php echo $detailss; ?></p>
                                            </div>
                                        </div>
                                    </div>
									</li>
									<?php
									$ik++;
									}
								}
								
								?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		<?php } 
		if(get_theme_mod('wedding_portfolio_section_enable',1))
		{
		?>
        <!--
        ===================
            PORTFOLIO 
        =================== 
        -->
        <section class="lo-team image-bg" id="portfolio" style="">
            <div class="container">
                <div class="row relative section-separator">  
                    <div class="lo-again-section-title portolio-sec-title">
						<?php
						$wedding_portfolio_title=get_theme_mod('wedding_portfolio_title','Portfolio');
						if($wedding_portfolio_title)
							{
							?>
                             <div class="heading-corners portfolio4_title">
								<span class="section-tagline wow fadeInLeft"> <?php echo $wedding_portfolio_title; ?></span>
							 </div>
                            <?php } 
							if(get_theme_mod('wedding_portfolio_heading','The Works We Have Already Completed'))
							{
							?>
							<h2 class="wow fadeInUp portfolio4_heading"><?php echo get_theme_mod('wedding_portfolio_heading','The Works We Have Already Completed'); ?></h2>
							<?php } ?>
                    </div>
                    <div class="col-sm-12 wow fadeInUp" id="ac-team">
						<?php 
						
						$portfolio_images=get_theme_mod('wedding_portfolio_nosection',6);
						for($k=1;$k<=$portfolio_images;$k++)
						{
							$portfolio_image=$k;
							$have_image=get_theme_mod('wedding_portfolio_'.$portfolio_image.'_image');
							if($have_image)
							{
							?>
							<div class="bg-3">
                            <div class="lo-team-item portfolio4_slider_<?php echo $portfolio_image;?>">                            
                                <img src="<?php echo $have_image; ?>" alt="" class="img-fluid mr-0">
                            </div>
							</div> 
							<?php
							}
						}
						?>                 
         
                    </div>  
                </div>       
            </div>
        </section>
		<?php } 
		if(get_theme_mod('wedding_teams_section_enable',1))
		{
		
		?>
        <!--
        ===================
            TEAM
        =================== 
        -->
        
        <section class="lo-portfolio" id="team">
            <div class="container" id="">
                <div class="row portfolio-nav section-separator pb-0" id="filter-button">
                    <div class="col-lg-7 col-md-12 lo-again-section-title portolio-sec-title mb-0">
                        <!--<span class="section-tagline wow fadeInLeft"> Portfolio</span>-->
						<?php 
						$section_title=get_theme_mod('wedding_teams_heading','Our Creative Team');
						if($section_title)
						{
						?>
                        <h2 class="wow fadeInUp team4_headings"><?php echo $section_title; ?></h2>
						<?php } ?>
                    </div>
					<?php 
					$defalts='Photographer,Consultant,Video Editor';
					$buttons_title=get_theme_mod('wedding_buttons_heading',$defalts);
					if($buttons_title)
					{
					?>
                    <div class="nav-port col-lg-5 col-md-12 wow fadeInLeft">
						  <ul class="">
						  
                            <li data-filter="*" class="active wow fadeInUp team4_filters" data-wow-duration="0.8s" data-wow-delay="0.1s"> <span>All</span></li>
							<?php $all_titles=explode(",",$buttons_title); 
							foreach($all_titles as $kee=>$vales)
							{
								?>
								<li data-filter=".user-<?php echo str_replace(" ","-",$vales); ?>" class="wow fadeInUp team4_filters" data-wow-duration="0.8s" data-wow-delay="0.2s"><span><?php echo $vales; ?></span></li>
								<?php
							}
							?>
                        </ul>
                    </div>
				<?php } ?>
                </div>
                <div class="mh-project-gallery col-sm-12 wow fadeInUp" id="project-gallery" data-wow-duration="0.8s" data-wow-delay="0.5s">
                    <div class="portfolioContainer row">
						<?php 
						$teams_areas =3;
						$teams_areas=get_theme_mod('wedding_team_nosection',3);
						for($k=1;$k<=$teams_areas;$k++)
						{
							$teams_area=$k;
							$filters=get_theme_mod('wedding_team_'.$teams_area.'_search');
							$mem_name=get_theme_mod('wedding_team_'.$teams_area.'_name');
							$mem_designation=get_theme_mod('wedding_team_'.$teams_area.'_position');
							$mem_image=get_theme_mod('wedding_team_'.$teams_area.'_image');
							if($mem_name)
							{
						?>
                        <div class="grid-item wow fadeInRight col-md-4 col-sm-6 col-xs-12 user-<?php echo str_replace(" ","-",$filters); ?>">
                            <div class="bg-3 ">
                                <div class="lo-team-item team4_image_<?php echo $teams_area; ?>">  
									<?php if($mem_image){ ?>
                                    <img src="<?php echo $mem_image; ?>" alt="" class="img-fluid mr-0">
									<?php } ?>
                                    <div class="team-member-content">
                                        <h5 class="team4_name_<?php echo $teams_area; ?>"><?php echo $mem_name ?></h5>
                                        <h6 class="team4_designation_<?php echo $teams_area; ?>"><?php echo $mem_designation ?></h6>
                                        <ul class="team-social">
											<?php 
											$teams_areas_socials =array('facebook','twitter','instagram','linkedin');
										
											foreach( $teams_areas_socials as $social_icon){
												$wedding_photo_social_icons = get_theme_mod ('wedding_photo_'.$social_icon.'_'.$teams_area.'_team');
												if( $wedding_photo_social_icons ){
													echo '<li class="team4_social_'.$teams_area.'_'.$social_icon.'"><a href="'. esc_url($wedding_photo_social_icons).'" target="_blank">';
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
                                </div>
                            </div>  
                        </div>
							<?php } } ?>
                    </div> <!-- End: .grid .project-gallery -->
                </div> <!-- End: .grid .project-gallery -->
				
            </div> <!-- End: .part -->
        </section>
        <?php
		}
        if(get_theme_mod('wedding_testimonial_section_enable',1))
		{
		?>
        <!--
        ===================
            REVIEW 
        =================== 
        -->
        <section class="lo-testimonial" id="testimonial">
            <div class="container">
                <div class="row section-separator">
					<?php
					$section_title=get_theme_mod('wedding_testimonial_heading','What Clients Say About Us');
					if($section_title)
					{
					?>
                    <div class="col-sm-12 lo-again-section-title wow fadeInUp testimonial4_heading">
                        <h2><?php echo $section_title; ?></h2>
                    </div> 
                    <?php } ?>
                    <div class="col-md-12 col-lg-10 wow fadeInUp center" id="mh-client-review">
					 <?php 
					 $testimonial_areas=3;
					 $testimonial_areas=get_theme_mod('wedding_testimonial_nosection',3);
					 for($k=1;$k<=$testimonial_areas;$k++)
					 {
					     $testimonial_area=$k;
						 $client_name=get_theme_mod('wedding_testimonial_'.$testimonial_area.'_name');
						 $client_designation=get_theme_mod('wedding_testimonial_'.$testimonial_area.'_position');
						 $client_feedback=get_theme_mod('wedding_testimonial_'.$testimonial_area.'_feedback');
						 $client_image=get_theme_mod('wedding_testimonial_'.$testimonial_area.'_image');
						 if($client_name)
						 {
					 ?>
                        <div class="testimonial-item">
							<div class="image_pre testimonial4_image_<?php echo $testimonial_area; ?>">
								<img src="<?php echo $client_image; ?>" alt="">
							</div>
                            <h4 class="testimonial4_name_<?php echo $testimonial_area; ?>"><?php echo $client_name; ?></h4>
                            <span class="testimonial4_designation_<?php echo $testimonial_area; ?>"><?php echo $client_designation; ?></span>
                            <p class="testimonial4_feedback_<?php echo $testimonial_area; ?>"><?php echo  $client_feedback; ?> </p>
                        </div>
						 <?php } } ?>
                    </div>
                </div>
            </div>
        </section>  
        <?php } 
		 if(get_theme_mod('wedding_counters_section_enable',1))
		{
			
			$banner_tops='';
			$de_image=get_template_directory_uri().'/assets/images/header-bg.png';
			$defults_banners=get_theme_mod('wedding_counters_bg_image',"$de_image");
			if($defults_banners) { 
				$banner_tops="background-image: url(".$defults_banners.");";
			}
		?>
        
        <!--
        ===================
            ACHIVEMENT 
        =================== 
        -->
		
        <section class="lo-achivement image-bg fog-con" id="achivement"  style="<?php echo $banner_tops; ?>" >
            <div class="">
                <div class="map-overlay">
                <div class="container counters4_banner">
                    <div class="row section-separator">  
						<?php 
						$sec_headings=get_theme_mod('wedding_counters_heading','Things We Have Achieved');
						if($sec_headings)
						{
						?>
                        <div class="col-sm-12 lo-section-title title-left wow fadeInLeft counters4_heading">
                            <h2><?php echo $sec_headings; ?></h2>
                        </div>  
						<?php } 
						$counters_areas = array('one','two','three','four');
						foreach( $counters_areas as $keys=>$counters_area){
							$count_values=my_theme_mods('wedding_counters_'.$counters_area.'_number');
							$count_labels=my_theme_mods('wedding_counters_'.$counters_area.'_label');
							if($count_values)
							{
						?>
                        <div class="col-sm-6 col-lg-3 wow fadeInUp counters4_listing_<?php echo $counters_area; ?>">
                            <div class="lo-achivement-inner">
                                <div class="countsown turn blue-color counter"><?php echo $count_values; ?></div>
							    <?php if($count_labels){ ?>
                                <h4><?php echo $count_labels; ?></h4>  
								<?php } ?>
                            </div>
                        </div>    
							<?php } } ?>
                         
                    </div>       
                </div>
            </div>
            </div>
        </section>
		<?php } 
		
		if(get_theme_mod('wedding_photograph_section_enable',1))
		{
		
		?>
       
        <!--
        ===================
            TIPS 
        =================== 
        -->
        <section class="lo-ph-tips" id="tips">
            <div class="container">
                <div class="row section-separator">
					<?php 
					$sec_headings=get_theme_mod('wedding_photograph_heading','Photography Tips');
					if($sec_headings)
					{
					?>
                    <div class="col-sm-12 lo-again-section-title wow fadeInRight photograph4_heading">
                        <h2><?php echo $sec_headings; ?></h2>
                    </div>
					<?php } 
					$photograph_areas = array('one','two','three');
					foreach( $photograph_areas as $keys=>$photograph_area){
					    $ph_image=get_theme_mod('wedding_photograph_'.$photograph_area.'_image');
						$ph_title=get_theme_mod('wedding_photograph_'.$photograph_area.'_title');
						$ph_name=get_theme_mod('wedding_photograph_'.$photograph_area.'_name');
						$ph_dates=get_theme_mod('wedding_photograph_'.$photograph_area.'_dates');
						$ph_links=get_theme_mod('wedding_photograph_'.$photograph_area.'_links');
						if($ph_image || $ph_title)
						{
					?>
                    <div class="col-lg-4 col-md-6">
                        <div class="ph-tiops-inner wow fadeInUp ">
							<?php if($ph_image){  ?>
							<div class="image_pre photograph4_image_<?php echo $photograph_area; ?>">
								<img src="<?php echo $ph_image; ?>" alt="" class="img-fluid">
							</div>
							<?php } ?>
                            <div class="tips-cap">
								<?php if($ph_dates){ ?>
                                <span class="ph-date photograph4_date_<?php echo $photograph_area; ?>"><?php echo date('d F, Y',strtotime($ph_dates)) ?></span>
								<?php } ?>
                                <h3 class="photograph4_title_<?php echo $photograph_area; ?>"><a href="<?php echo $ph_links; ?>"><?php echo $ph_title; ?></a></h3>
								<?php if($ph_name){ ?>
                                <p class="photograph4_name_<?php echo $photograph_area; ?>">By <?php echo $ph_name ?></p>
								<?php } ?>
                            </div>
                        </div>
                    </div>
					<?php } } ?>
                    
                </div>
            </div>
        </section>
		<?php } 
		 if(get_theme_mod('wedding_pricing_section_enable',1))
		 {
		?>
        <!--
        ===================
            PRICING 
        =================== 
        -->
        <section class="lo-pricing-plan" id="pricing">
            <div class="container">
                <div class="row relative section-separator">
					<?php
					$sec_headings=get_theme_mod('wedding_pricingplan_heading','Our Pricing plans');
					if($sec_headings)
					{
					?>
                    <div class="col-sm-12 lo-again-section-title wow fadeInLeft pricingplan4_heading">
                        <h2><?php echo $sec_headings; ?></h2>
                    </div> 
                    <?php } 
					?>
					<div class="pricingplan4_listing">
					<?php
					$shortcodes=get_theme_mod('wedding_pricingplan_shortcode');
					if(!$shortcodes)
					{
						if (current_user_can( 'manage_options' ) ) {
							$action = 'install-plugin';
							$slug = 'easy-pricing-tables';
							$linsd=wp_nonce_url(
								add_query_arg(
									array(
										'action' => $action,
										'plugin' => $slug
									),
									admin_url( 'update.php' )
								),
								$action.'_'.$slug
							);
						?>
						<div class="white-text borad">
							<p>Install Plugin and activate '<a href="<?php echo $linsd; ?>" target="_blank">Pricing Tables</a>' and apply shortcode to activate Price Section.</p>
						</div>
						<?php
						}
					}
					else 
					{
						
						if (!isset( $wp_customize ) ) {
							echo do_shortcode("$shortcodes");
						}
					}
					
					?>
					</div>
                </div>
            </div>
        </section>
		<?php 
		 }
		 if(get_theme_mod('wedding_features_section_enable',1))
		 {
		?>

        <!--
        ===================
            SERVICE 
        =================== 
        -->
        <section class="lo-feature-service" id="features">
            <div class="container">
                <div class="row relative section-separator">
					<?php 
					$sec_headings=get_theme_mod('wedding_features_heading','Our Featured Services');
					if($sec_headings)
						{
					?>
                    <div class="col-sm-12 lo-again-section-title wow fadeInUp features4_heading">
                        <h2><?php echo $sec_headings; ?></h2>
                    </div>
					<?php } 
					$features_areas=6;
					$features_areas=get_theme_mod('wedding_features_nosection',6);
					for($k=1;$k<=$features_areas;$k++)
					{
						$features_area=$k;
						$feature_img=get_theme_mod('wedding_features_'.$features_area.'_image');
						$feature_name=get_theme_mod('wedding_features_'.$features_area.'_title');
						$feature_detail=get_theme_mod('wedding_features_'.$features_area.'_detail');
						if($feature_name)
						{
						?>
						<div class="col-sm-6 col-lg-4 wow fadeInUp">
                        <div class="lo-f-service-item ">
                            <div class="s-icon service-icon-one features4_image_<?php echo $features_area; ?>">
                                <img src="<?php echo $feature_img; ?>" alt="">
                            </div>
                            <h4 class="features4_name_<?php echo $features_area; ?>"><?php echo $feature_name; ?></h4>
                            <p class="features4_details_<?php echo $features_area; ?>"><?php echo $feature_detail; ?></p>
                        </div>
						</div>
						<?php
						}
					}
					?>
                   
                </div>
            </div>
        </section>
		 <?php } ?>
        <?php 
		 if(get_theme_mod('contactus_settings_section',1))
		{
			
			$banner_tops='';
			$de_image=get_template_directory_uri().'/assets/images/header-bg.png';
			$defults_banners=get_theme_mod('wedding_contactus_bg_image',"$de_image");
			if($defults_banners) { 
				$banner_tops="background-image: url(".$defults_banners.");";
			}
		?>
         <!--
        ===================
            CONTACT 
        =================== 
        -->
        <section class="lo-contact theme-contact" id="contact">
            <div class="fog-con" style="<?php echo $banner_tops; ?>">
                <div class="container contactus4_banner">
                    <div class="row section-separator vertical-middle-content">
                        <div class="col-md-12 col-lg-6 wow fadeInRight">
                            <div class="single-form contactus4_form">
								
								
								<?php 
								if(! defined( 'PIRATE_FORMS_VERSION' ))
								{
									if (current_user_can( 'manage_options' ) ) {
									$action = 'install-plugin';
									$slug = 'pirate-forms';
									$linsd=wp_nonce_url(
										add_query_arg(
											array(
												'action' => $action,
												'plugin' => $slug
											),
											admin_url( 'update.php' )
										),
										$action.'_'.$slug
									);
									?>
									<div class="white-text section-legend">You need to install <a href="<?php echo 
									$linsd;
								?>" class="">Pirate Forms</a> to create a contact form.</div>
									<?php
									}
								}
								else 
								{
									echo do_shortcode('[pirate_forms]'); 
								}
								?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6  wow fadeInLeft">
                            <div class="contactinfo">
								<?php 
								$sed_heads=get_theme_mod('wedding_contactus_heading','Don’t Hesitate to <br> Contact us');
								if($sed_heads)
								{
								?>
                                <h2 class="contactus4_heading"><?php echo $sed_heads; ?></h2>
								<?php } 
								$sed_subheads=get_theme_mod('wedding_contactus_subheading','Call us to this number for instant support');
								if($sed_subheads)
								{
								?>
                                <p class="contactus4_subheading"><?php echo $sed_subheads; ?></p>
								<?php }
								$phone_number=get_theme_mod('general_phone_info','8945612300');
								if($phone_number)
								{
								?>
                                <a class="contactus4_generalphone" href="tel:+<?php echo $phone_number; ?>"><i class="fa fa-phone"></i>+<?php echo $phone_number; ?></a>
								<?php } 
								$email_info=get_theme_mod('general_email_info','foglite@gamil.com');
								if($email_info)
								{
								?>
                                <a class="contactus4_generalemail" href="mailto:<?php echo $email_info; ?>"><i class="fa fa-envelope"></i><?php echo $email_info; ?></a>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        
        <?php } 
		if(get_theme_mod('wedding_subscription_enable',1))
		{
		?>
        <!--
        ===================
            MAIL 
        =================== 
        -->
        <div class="subscription-mail" id="mail">
            <div class="container ">
                <div class="row section-separator">
                    <div class="col-sm-12">
						<?php 
						$banner_tops='';
						$de_image=get_template_directory_uri().'/assets/images/map.png';
						$defults_banners=get_theme_mod('wedding_subscription_formsubmit_image',"$de_image");
						if($defults_banners) { 
							$banner_tops="background-image: url(".$defults_banners.");";
						}
						?>
                        <div class="sub-inner cover-bg subscription4_banner" style="<?php echo $banner_tops; ?>">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6 wow fadeInRight">
									<?php 
									$sed_titles=get_theme_mod('wedding_subscription_title','GET REGULAR PHOTOGRAPHY NEWS UPDATE');
									if($sed_titles)
									{
									?>
                                    <span class="subscription4_title"><?php echo $sed_titles; ?></span>
									<?php 
									}
									$sed_heads=get_theme_mod('wedding_subscription_heading','GET REGULAR PHOTOGRAPHY NEWS UPDATE');
									if($sed_heads)
									{
									?>
                                    <h2 class="subscription4_heading"><?php echo $sed_heads; ?></h2>
									<?php } 
									?>
                                </div>
                                <div class="col-sm-12 col-lg-6 wow fadeInLeft">
									<?php
									$forms_heads=get_theme_mod('wedding_subscription_formtext','We respect your privacy and we will never share your information with the third party');
									if($forms_heads)
									{
									?>
                                    <p class="subscription4_formheading"><?php echo $forms_heads; ?></p>
									<?php } 
									?>
									<span class="subscription4_forms">
									<?php 
									if(!get_theme_mod('wedding_subscription_formsubmit'))
									{
										if (current_user_can( 'manage_options' ) ) {
											$action = 'install-plugin';
											$slug = 'mailchimp-for-wordpress';
											$linsd=wp_nonce_url(
												add_query_arg(
													array(
														'action' => $action,
														'plugin' => $slug
													),
													admin_url( 'update.php' )
												),
												$action.'_'.$slug
												);
										?>
										<div class="white-text borad">
											<p>Install Plugin and apply shortcode to subscription Section.</p>
										</div>
										<?php
										}
									}
									else 
									{
										$ff_shortcode=get_theme_mod('wedding_subscription_formsubmit');
										echo do_shortcode("$ff_shortcode");
									}
									?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php } 
		if(get_theme_mod('wedding_sitemap_enable',1))
		{
		
		?>
        <!--
        ===================
            MAP 
        =================== 
        -->

		<div id="map" style="width:100%; height:100%">
		<span class="map4_canvas"></span>
		<?php 
			$mode_address=get_theme_mod('wedding_map_address','University of San Francisco');
			if($mode_address)
			{
		?>	
		<div class="mapouter" class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
			<div class="gmap_canvas"><iframe width="100%" height="520" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo urlencode($mode_address); ?>&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div>
		</div>
           
        </div>				
		<?php 
			}
		} ?>