<?php
/**
 * wedding_photo Theme Customizer
 *
 * @package fog-lite-pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function my_theme_mods( $name ) {
    global $lastss_unique;

    return get_theme_mod( $name, $lastss_unique[ $name ] );
}
function wedding_photo_customize_register( $wp_customize ) {
	 global $lastss_unique;
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wedding_photo_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wedding_photo_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_panel( 'wedding_photo_home_page_setting',array(
        'title'			=> 'Home Section',
        'description'	=> 'it shows Home Section',
        'priority'		=> 30,
    ));
	
	$wp_customize->add_section('banner_settings_section', array(
	  'title'          => 'Banner',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	/* banner section */
	$wp_customize->add_setting('wedding_home_banner_enable', array(
     'default'    => '1',
	 'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_home_banner_enable',
			array(
				'label'     => 'Show Banner Section',
				'section'   => 'banner_settings_section',
				'settings'  => 'wedding_home_banner_enable',
				'type'      => 'checkbox',
			)
		)
	);
		 
	$wp_customize->add_setting( 'wedding_banner_background_image', array(
	    //'sanitize_callback' => 'esc_url_raw',
		'default'=>get_template_directory_uri()."/assets/images/header-bg.png",
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
        'type' => 'theme_mod',
	));
	
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'wedding_banner_background_image',array(
       'label'      	=>'Upload Background Image Or Video',
       'description'	=>'upload a image or video for banner section',
       'section'    	=> 'banner_settings_section',
	   'mime_type' => 'video,image',  // Required. Can be image, audio, video, application, text
      'button_labels' => array( // Optional
         'select' => __( 'Select Image or Video','fog-lite-pro' ),
         'change' => __( 'Change Image or Video','fog-lite-pro' ),
         'remove' => __( 'Remove','fog-lite-pro' ),
         'placeholder' => __( 'No file selected','fog-lite-pro' ),
         'frame_title' => __( 'Select Image or Video','fog-lite-pro' ),
         'frame_button' => __( 'Choose Image or Video','fog-lite-pro' ),

      )
	   
	   
	   
	   
    )));
	
	 $wp_customize->selective_refresh->add_partial( 'wedding_banner_background_image', array(
		'selector' => '.home4_banners', // You can also select a css class
		'render_callback' => 'wedding_banner_background_image',
	) );
	 
	 $wp_customize->add_setting('banner_text_setting', array(
	 'default'        => 'Capture Your Moments',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	 
	 $wp_customize->add_control('banner_text_setting', array(
	 'label'   => 'Banner Text',
	  'section' => 'banner_settings_section',
	 'type'    => 'text',
	 ));
	 
	 $wp_customize->selective_refresh->add_partial( 'banner_text_setting', array(
		'selector' => '.banner4_headings', // You can also select a css class
		'render_callback' => 'banner_text_setting',
	) );
	 
	 
	 $wp_customize->add_setting('banner_button_setting', array(
	   'default'        => 'Capture Your Moments',
	   'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	 
	 $wp_customize->add_control('banner_button_setting', array(
	 'label'   => 'Banner Button Text',
	  'section' => 'banner_settings_section',
	 'type'    => 'text',
	 ));
	 
	  $wp_customize->add_setting('banner_button_link', array(
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	  ));
	 $wp_customize->add_control('banner_button_link', array(
	 'label'   => 'Banner Button Link',
	  'section' => 'banner_settings_section',
	 'type'    => 'url',
	 ));
	 
	 $wp_customize->selective_refresh->add_partial( 'banner_button_link', array(
		'selector' => '.banner4_buttons', // You can also select a css class
		'render_callback' => 'banner_button_link',
	) );
	 
	 
	 /* End Banner Section */
	 
	/* Start Partners Section */
	$wp_customize->add_section('partners_settings_section', array(
	  'title'          => 'Partner',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('wedding_partner_section_enable', array(
    'default'    => '1',
	'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_partner_section_enable',
			array(
				'label'     => 'Show Parters Section',
				'section'   => 'partners_settings_section',
				'settings'  => 'wedding_partner_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	$partners_icons = array('one','two','three','four','five','six');
	foreach( $partners_icons as $keys=>$partners_icon){
	    $h=$keys+1;
		$wp_customize->add_setting( 'wedding_partner_'.$partners_icon.'_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_partner_'.$partners_icon.'_image',array(
		   'label'      	=>'Upload Partner Image('.$h.')',
		   'description'	=>'upload a image for partner section',
		   'section'    	=> 'partners_settings_section',
		)));
		$wp_customize->selective_refresh->add_partial('wedding_partner_'.$partners_icon.'_image', array(
		'selector' => '.client4_partner_'.$partners_icon.'_set', // You can also select a css class
		'render_callback' => 'wedding_partner_'.$partners_icon.'_image',
		) ); 
		
	}
	
	 /* End Partners Section */
	 
	/* Start About Us Section */
	$wp_customize->add_section('aboutus_settings_section', array(
	  'title'          => 'About',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	  $wp_customize->add_setting('wedding_aboutus_section_enable', array(
    'default'    => '1',
	'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_aboutus_section_enable',
			array(
				'label'     => 'Show About Us Section',
				'section'   => 'aboutus_settings_section',
				'settings'  => 'wedding_aboutus_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	$wp_customize->add_setting( 'wedding_aboutus_background_image', array(
	    'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_aboutus_background_image',array(
       'label'      	=>'Upload Image',
       'description'	=>'upload a image for about us left section',
       'section'    	=> 'aboutus_settings_section',
    )));
	$wp_customize->selective_refresh->add_partial( 'wedding_aboutus_background_image', array(
		'selector' => '.about4_banner', // You can also select a css class
		'render_callback' => 'wedding_aboutus_background_image',
	) );
	
	$wp_customize->add_setting('wedding_aboutus_title', array(
	 'default'        => 'ABOUT US',
	 'sanitize_callback' => 'wp_filter_nohtml_kses'
	 ));
	$wp_customize->add_control('wedding_aboutus_title', array(
	 'label'   => 'Section Title',
	  'section' => 'aboutus_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_aboutus_title', array(
		'selector' => '.about4_title', // You can also select a css class
		'render_callback' => 'wedding_aboutus_title',
	) );
	
	$wp_customize->add_setting('wedding_aboutus_heading', array(
		'default'=> $lastss_unique['wedding_aboutus_heading'],
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_aboutus_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'aboutus_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_aboutus_heading', array(
		'selector' => '.about4_headings', // You can also select a css class
		'render_callback' => 'wedding_aboutus_heading',
	) );

	$abouts_faqs = array('one','two','three','four');
	foreach( $abouts_faqs as $keys=>$abouts_faq){
	    $h=$keys+1;
		$wp_customize->add_setting( 'wedding_faq_'.$abouts_faq.'_text', array(
		'default'=>$lastss_unique['wedding_faq_'.$abouts_faq.'_text'],
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_faq_'.$abouts_faq.'_text',array(
		   'label'      	=>'Listing Heading('.$h.')',
		   'section'    	=> 'aboutus_settings_section',
		   'type'    => 'text',
		)));
		
		$wp_customize->add_setting( 'wedding_faq_'.$abouts_faq.'_detail', array(
		'default'=>$lastss_unique['wedding_faq_'.$abouts_faq.'_detail'],
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_faq_'.$abouts_faq.'_detail',array(
		   'label'      	=>'Description',
		   'section'    	=> 'aboutus_settings_section',
		   'type'    => 'textarea',
		)));
		$wp_customize->selective_refresh->add_partial( 'wedding_faq_'.$abouts_faq.'_text', array(
		'selector' => '.about4_faqs_'.$abouts_faq, // You can also select a css class
		'render_callback' => 'wedding_faq_'.$abouts_faq.'_text',
		) );
	}
	
	/* End About Us Section */
	
	
	/* Start Portfolio Section */
	
	
	$wp_customize->add_section('portfolios_settings_section', array(
	  'title'          => 'Portfolio',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('wedding_portfolio_section_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_portfolio_section_enable',
			array(
				'label'     => 'Show Portfolio Section',
				'section'   => 'portfolios_settings_section',
				'settings'  => 'wedding_portfolio_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	
	$wp_customize->add_setting('wedding_portfolio_title', array(
	 'default'        => 'Portfolio',
	 'sanitize_callback' => 'wp_filter_nohtml_kses'
	 ));
	$wp_customize->add_control('wedding_portfolio_title', array(
	 'label'   => 'Section Title',
	  'section' => 'portfolios_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_portfolio_title', array(
		'selector' => '.portfolio4_title', // You can also select a css class
		'render_callback' => 'wedding_portfolio_title',
	) );
	
	
	$wp_customize->add_setting('wedding_portfolio_heading', array(
	 'default'        => 'The Works We Have Already Completed',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_portfolio_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'portfolios_settings_section',
	 'type'    => 'text',
	));
	$wp_customize->selective_refresh->add_partial( 'wedding_portfolio_heading', array(
		'selector' => '.portfolio4_heading', // You can also select a css class
		'render_callback' => 'wedding_portfolio_heading',
	) );

	$portfolio_images =6;
	$portfolio_images=get_theme_mod('wedding_portfolio_nosection',6);
	for($k=1;$k<=$portfolio_images;$k++)
	{
	    $portfolio_image=$h=$k;
		
		$wp_customize->add_setting( 'wedding_portfolio_'.$portfolio_image.'_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_portfolio_'.$portfolio_image.'_image',array(
		   'label'      	=>'Upload Portfolio Image('.$h.')',
		   'description'	=>'upload a image for Portfolio section',
		   'section'    	=> 'portfolios_settings_section',
		)));
		$wp_customize->selective_refresh->add_partial( 'wedding_portfolio_'.$portfolio_image.'_image', array(
		'selector' => '.portfolio4_slider_'.$portfolio_image, // You can also select a css class
		'render_callback' => 'wedding_portfolio_'.$portfolio_image.'_image',
		) );
	}
	
	/* End Portfolio Section */
	
	
	
	/* Start Testimonial Section */
	
	$wp_customize->add_section('testimonial_settings_section', array(
	  'title'          => 'Testimonial',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('wedding_testimonial_section_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_testimonial_section_enable',
			array(
				'label'     => 'Show Testimonial Section',
				'description'	=>'Add Atleast Two client testimonial for active Testimonial Section.',
				'section'   => 'testimonial_settings_section',
				'settings'  => 'wedding_testimonial_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	
	
	$wp_customize->add_setting('wedding_testimonial_heading', array(
	 'default' => 'What Clients Say About Us',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_testimonial_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'testimonial_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_testimonial_heading', array(
		'selector' => '.testimonial4_heading', // You can also select a css class
		'render_callback' => 'wedding_testimonial_heading',
	) );
	
	$testimonial_areas =3;
	$testimonial_areas=get_theme_mod('wedding_testimonial_nosection',3);
	for($k=1;$k<=$testimonial_areas;$k++)
	{
		$testimonial_area=$h=$k;
		$wp_customize->add_setting('wedding_testimonial_'.$testimonial_area.'_name', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_testimonial_'.$testimonial_area.'_name', array(
		 'label'   => 'Client('.$h.'): Client Name',
		  'section' => 'testimonial_settings_section',
		 'type'    => 'text',
		));
		
		$wp_customize->add_setting( 'wedding_testimonial_'.$testimonial_area.'_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_testimonial_'.$testimonial_area.'_image',array(
		   'label'      	=>'Upload Client Image',
		   'description'	=>'upload a image for testimonial section',
		   'section'    	=> 'testimonial_settings_section',
		)));
		
		
		
		$wp_customize->add_setting('wedding_testimonial_'.$testimonial_area.'_position', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_testimonial_'.$testimonial_area.'_position', array(
		 'label'   => 'Client Designation',
		  'section' => 'testimonial_settings_section',
		 'type'    => 'text',
		));
		
		$wp_customize->add_setting('wedding_testimonial_'.$testimonial_area.'_feedback', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_testimonial_'.$testimonial_area.'_feedback', array(
		 'label'   => 'Client Feedback',
		  'section' => 'testimonial_settings_section',
		 'type'    => 'textarea',
		));
		$wp_customize->selective_refresh->add_partial('wedding_testimonial_'.$testimonial_area.'_image', array(
		'selector' => '.testimonial4_image_'.$testimonial_area, // You can also select a css class
		'render_callback' => 'wedding_testimonial_'.$testimonial_area.'_image',
		) );
		
		$wp_customize->selective_refresh->add_partial('wedding_testimonial_'.$testimonial_area.'_name', array(
		'selector' => '.testimonial4_name_'.$testimonial_area, // You can also select a css class
		'render_callback' => 'wedding_testimonial_'.$testimonial_area.'_name',
		) );
		
		$wp_customize->selective_refresh->add_partial('wedding_testimonial_'.$testimonial_area.'_position', array(
		'selector' => '.testimonial4_designation_'.$testimonial_area, // You can also select a css class
		'render_callback' => 'wedding_testimonial_'.$testimonial_area.'_position',
		) );
		
		$wp_customize->selective_refresh->add_partial('wedding_testimonial_'.$testimonial_area.'_feedback', array(
		'selector' => '.testimonial4_feedback_'.$testimonial_area, // You can also select a css class
		'render_callback' => 'wedding_testimonial_'.$testimonial_area.'_feedback',
		) );

	}
	
	/* End Testimonial Section */
	
	
	
	/* Start Team Section */
	$wp_customize->add_section('teams_settings_section', array(
	  'title'          => 'Team',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('wedding_teams_section_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_teams_section_enable',
			array(
				'label'     => 'Show Teams Section',
				'section'   => 'teams_settings_section',
				'settings'  => 'wedding_teams_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	
	
	$wp_customize->add_setting('wedding_teams_heading', array(
		'default'    => 'Our Creative Team',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_teams_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'teams_settings_section',
	 'type'    => 'text',
	));
	$wp_customize->selective_refresh->add_partial( 'wedding_teams_heading', array(
		'selector' => '.team4_headings', // You can also select a css class
		'render_callback' => 'wedding_teams_heading',
	) );
	
	$wp_customize->add_setting('wedding_buttons_heading', array(
		'default'    => 'Photographer,Consultant,Video Editor',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_buttons_heading', array(
	 'label'   => 'Add Filter Options',
	 'description'	=>'Add with comma(,) sepration for multiple option Eg.(Video,Photographer).',
	  'section' => 'teams_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_buttons_heading', array(
		'selector' => '.team4_filters', // You can also select a css class
		'render_callback' => 'wedding_buttons_heading',
	) );
	
	
	$teams_areas =3;
	$teams_areas=get_theme_mod('wedding_team_nosection',3);
	for($k=1;$k<=$teams_areas;$k++)
	{
	    $h=$teams_area=$k;
		$wp_customize->add_setting('wedding_team_'.$teams_area.'_name', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_team_'.$teams_area.'_name', array(
		 'label'   => 'Member('.$h.'): Member Name',
		  'section' => 'teams_settings_section',
		 'type'    => 'text',
		));
		
		$wp_customize->add_setting( 'wedding_team_'.$teams_area.'_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_team_'.$teams_area.'_image',array(
		   'label'      	=>'Upload Team Member Image',
		   'description'	=>'upload a image for Team section',
		   'section'    	=> 'teams_settings_section',
		)));
		
		
		
		$wp_customize->add_setting('wedding_team_'.$teams_area.'_position', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_team_'.$teams_area.'_position', array(
		 'label'   => 'Member Designation',
		  'section' => 'teams_settings_section',
		 'type'    => 'text',
		));
		
		$wp_customize->add_setting( 'wedding_team_'.$teams_area.'_search', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_team_'.$teams_area.'_search',array(
		   'label'      	=>'Filter By',
		   'description'	=>'Enter only one filter option from All Filter options. Eg (Video) ',
		   'section'    	=> 'teams_settings_section',
		   'type'    => 'text',
		)));
		
		$teams_areas_socials =array('facebook','twitter','instagram','linkedin');
		foreach($teams_areas_socials as $teams_areas_social)
		{
			$wp_customize->add_setting( 'wedding_photo_'.$teams_areas_social.'_'.$teams_area.'_team', array(
            'sanitize_callback' => 'esc_url_raw'
			));
			$wp_customize->add_control( 'wedding_photo_'.$teams_areas_social.'_'.$teams_area.'_team', array(
				'section'       => 'teams_settings_section',
				'label'         => 'Social Link : '.ucwords($teams_areas_social),
				'type'          => 'url'
			));
			$wp_customize->selective_refresh->add_partial( 'wedding_photo_'.$teams_areas_social.'_'.$teams_area.'_team', array(
			'selector' => '.team4_social_'.$teams_area.'_'.$teams_areas_social, // You can also select a css class
			'render_callback' => 'wedding_photo_'.$teams_areas_social.'_'.$teams_area.'_team',
			) );
		}
		$wp_customize->selective_refresh->add_partial( 'wedding_team_'.$teams_area.'_image', array(
		'selector' => '.team4_image_'.$teams_area, // You can also select a css class
		'render_callback' => 'wedding_team_'.$teams_area.'_image',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'wedding_team_'.$teams_area.'_name', array(
		'selector' => '.team4_name_'.$teams_area, // You can also select a css class
		'render_callback' => 'wedding_team_'.$teams_area.'_name',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'wedding_team_'.$teams_area.'_position', array(
		'selector' => '.team4_designation_'.$teams_area, // You can also select a css class
		'render_callback' => 'wedding_team_'.$teams_area.'_position',
		) );
	}
	
	
	/* End Team Section */
	
	
	
	/* Start Counter Section */
	$wp_customize->add_section('counters_settings_section', array(
	  'title'          => 'Achievement',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('wedding_counters_section_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_counters_section_enable',
			array(
				'label'     => 'Show Counter Section',
				'section'   => 'counters_settings_section',
				'settings'  => 'wedding_counters_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	
	
	$wp_customize->add_setting('wedding_counters_heading', array(
	 'default'=>'Things We Have Achieved',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_counters_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'counters_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_counters_heading', array(
			'selector' => '.counters4_heading', // You can also select a css class
			'render_callback' => 'wedding_counters_heading',
	) );
	
	$counters_areas = array('one','two','three','four');
	foreach( $counters_areas as $keys=>$counters_area){
	    $h=$keys+1;
		$wp_customize->add_setting('wedding_counters_'.$counters_area.'_number', array(
			'default'=>$lastss_unique['wedding_counters_'.$counters_area.'_number'],
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		 ));
		$wp_customize->add_control('wedding_counters_'.$counters_area.'_number', array(
		 'label'   => '('.$h.'): Counter Value',
		  'section' => 'counters_settings_section',
		 'type'    => 'number',
		));
		$wp_customize->add_setting('wedding_counters_'.$counters_area.'_label', array(
			'default'=>$lastss_unique['wedding_counters_'.$counters_area.'_label'],
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		 ));
		$wp_customize->add_control('wedding_counters_'.$counters_area.'_label', array(
		 'label'   => 'Counter Label',
		  'section' => 'counters_settings_section',
		 'type'    => 'text',
		));
		
		$wp_customize->selective_refresh->add_partial( 'wedding_counters_'.$counters_area.'_number', array(
			'selector' => '.counters4_listing_'.$counters_area, // You can also select a css class
			'render_callback' => 'wedding_counters_'.$counters_area.'_number',
		) );
		
		
		
	}
	
	
	$wp_customize->add_setting( 'wedding_counters_bg_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		'default'=>get_template_directory_uri()."/assets/images/header-bg.png"
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_counters_bg_image',array(
		   'label'      	=>'Upload Image',
		   'description'	=>'upload a image for Counter section',
		   'section'    	=> 'counters_settings_section',
	)));
	
	
	$wp_customize->selective_refresh->add_partial( 'wedding_counters_bg_image', array(
			'selector' => '.counters4_banner', // You can also select a css class
			'render_callback' => 'wedding_counters_bg_image',
	) );
	
	/* End Counter Section */
	
	/* Start Photography Tips Section */ 
	
	$wp_customize->add_section('photograph_settings_section', array(
	  'title'          => 'Tips',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('wedding_photograph_section_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_photograph_section_enable',
			array(
				'label'     => 'Show Photography Section',
				'section'   => 'photograph_settings_section',
				'settings'  => 'wedding_photograph_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	$wp_customize->add_setting('wedding_photograph_heading', array(
	 'default'=>'Photography Tips',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_photograph_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'photograph_settings_section',
	 'type'    => 'text',
	));
	$wp_customize->selective_refresh->add_partial( 'wedding_photograph_heading', array(
		'selector' => '.photograph4_heading', // You can also select a css class
		'render_callback' => 'wedding_photograph_heading',
	) );
	
	$photograph_areas = array('one','two','three');
	foreach( $photograph_areas as $keys=>$photograph_area){
	    $h=$keys+1;
		
		$wp_customize->add_setting( 'wedding_photograph_'.$photograph_area.'_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_photograph_'.$photograph_area.'_image',array(
		   'label'      	=>'('.$h.'#) Upload Image',
		   'description'	=>'upload a image for Tips',
		   'section'    	=> 'photograph_settings_section',
		)));
		
		$wp_customize->add_setting('wedding_photograph_'.$photograph_area.'_title', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_photograph_'.$photograph_area.'_title', array(
		 'label'   => "Tip's Title",
		  'section' => 'photograph_settings_section',
		 'type'    => 'text',
		));
		
		$wp_customize->add_setting('wedding_photograph_'.$photograph_area.'_dates', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_photograph_'.$photograph_area.'_dates', array(
		 'label'   => "Date Of Published",
		 'description'	=>'Enter Date',
		  'section' => 'photograph_settings_section',
		 'type'    => 'date',
		));
		
		$wp_customize->add_setting('wedding_photograph_'.$photograph_area.'_name', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_photograph_'.$photograph_area.'_name', array(
		 'label'   => 'Added By',
		 'description'=>'Enter Name',
		  'section' => 'photograph_settings_section',
		 'type'    => 'text',
		));
		
		$wp_customize->add_setting('wedding_photograph_'.$photograph_area.'_links', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_photograph_'.$photograph_area.'_links', array(
		 'label'   => "Link Of Title",
		  'section' => 'photograph_settings_section',
		 'type'    => 'url',
		));
		
		$wp_customize->selective_refresh->add_partial( 'wedding_photograph_'.$photograph_area.'_image', array(
		'selector' => '.photograph4_image_'.$photograph_area, // You can also select a css class
		'render_callback' => 'wedding_photograph_'.$photograph_area.'_image',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'wedding_photograph_'.$photograph_area.'_name', array(
		'selector' => '.photograph4_name_'.$photograph_area, // You can also select a css class
		'render_callback' => 'wedding_photograph_'.$photograph_area.'_name',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'wedding_photograph_'.$photograph_area.'_dates', array(
		'selector' => '.photograph4_date_'.$photograph_area, // You can also select a css class
		'render_callback' => 'wedding_photograph_'.$photograph_area.'_dates',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'wedding_photograph_'.$photograph_area.'_title', array(
		'selector' => '.photograph4_title_'.$photograph_area, // You can also select a css class
		'render_callback' => 'wedding_photograph_'.$photograph_area.'_title',
		) );
		
		
		
	}
	
	/* End Photography Tips Section */ 
	
	/* Start Pricing Plan Section */
	 $wp_customize->add_section('pricing_plan_settings_section', array(
	  'title'          => 'Pricing',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	  $wp_customize->add_setting('wedding_pricing_section_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_pricing_section_enable',
			array(
				'label'     => 'Show Pricing Section',
				'section'   => 'pricing_plan_settings_section',
				'settings'  => 'wedding_pricing_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	$wp_customize->add_setting('wedding_pricingplan_heading', array(
	 'default'=>'Our Pricing plans',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	 
	$wp_customize->add_control('wedding_pricingplan_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'pricing_plan_settings_section',
	 'type'    => 'text',
	));
	$wp_customize->selective_refresh->add_partial( 'wedding_pricingplan_heading', array(
		'selector' => '.pricingplan4_heading', // You can also select a css class
		'render_callback' => 'wedding_pricingplan_heading',
	) );
	
	$wp_customize->add_setting('wedding_pricingplan_shortcode', array(
		'sanitize_callback' => 'wp_kses_post',
	));
	 
	$wp_customize->add_control('wedding_pricingplan_shortcode', array(
	 'label'   => 'Enter ShortCode',
	 'description'	=>"Install and Activate plugin 'Pricing Tables'! Copy and paste here Shortcode",
	 'section' => 'pricing_plan_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_pricingplan_shortcode', array(
		'selector' => '.pricingplan4_listing', // You can also select a css class
		'render_callback' => 'wedding_pricingplan_shortcode',
	) );
	
	/* End Pricing Plan Section */
	
	/* Start Feature Section */ 
	
	$wp_customize->add_section('features_settings_section', array(
	  'title'          => 'Services',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('wedding_features_section_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_features_section_enable',
			array(
				'label'     => 'Show Services Section',
				'section'   => 'features_settings_section',
				'settings'  => 'wedding_features_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	$wp_customize->add_setting('wedding_features_heading', array(
	 'default'=>'Our Featured Services',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_features_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'features_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_features_heading', array(
		'selector' => '.features4_heading', // You can also select a css class
		'render_callback' => 'wedding_features_heading',
	) );
	$features_areas=6;
	$features_areas=get_theme_mod('wedding_features_nosection',6);
	 for($k=1;$k<=$features_areas;$k++)
	 {
	    $h=$features_area=$k;
		
		$wp_customize->add_setting( 'wedding_features_'.$features_area.'_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_features_'.$features_area.'_image',array(
		   'label'      	=>'('.$h.'#) Upload Icon',
		   'description'	=>'upload a Icon for Services',
		   'section'    	=> 'features_settings_section',
		)));
		
		$wp_customize->add_setting('wedding_features_'.$features_area.'_title', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_features_'.$features_area.'_title', array(
		 'label'   => "Service Name",
		  'section' => 'features_settings_section',
		 'type'    => 'text',
		));
		
		$wp_customize->add_setting('wedding_features_'.$features_area.'_detail', array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control('wedding_features_'.$features_area.'_detail', array(
		 'label'   => "Service Detail",
		  'section' => 'features_settings_section',
		 'type'    => 'textarea',
		));
		
		$wp_customize->selective_refresh->add_partial( 'wedding_features_'.$features_area.'_image', array(
		'selector' => '.features4_image_'.$features_area, // You can also select a css class
		'render_callback' => 'wedding_features_'.$features_area.'_image',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'wedding_features_'.$features_area.'_title', array(
		'selector' => '.features4_name_'.$features_area, // You can also select a css class
		'render_callback' => 'wedding_features_'.$features_area.'_title',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'wedding_features_'.$features_area.'_detail', array(
		'selector' => '.features4_details_'.$features_area, // You can also select a css class
		'render_callback' => 'wedding_features_'.$features_area.'_detail',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'wedding_map_address', array(
		'selector' => '.map4_canvas', // You can also select a css class
		'render_callback' => 'wedding_map_address',
		) );
		
		
		
		
	}
	
	
	/* End Feature Services */
	
	
	
	
	
	
	
	/* Start Contact Us Section */
	 $wp_customize->add_section('contactus_settings_section', array(
	  'title'          => 'Contact',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	  $wp_customize->add_setting('wedding_contactus_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_contactus_enable',
			array(
				'label'     => 'Show Contact Us Section',
				'section'   => 'contactus_settings_section',
				'settings'  => 'wedding_contactus_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	$wp_customize->add_setting('wedding_contactus_heading', array(
	 'default'=>'Dont Hesitate to Contact us',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	 
	$wp_customize->add_control('wedding_contactus_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'contactus_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_contactus_heading', array(
		'selector' => '.contactus4_heading', // You can also select a css class
		'render_callback' => 'wedding_contactus_heading',
	) );
	
	$wp_customize->add_setting('wedding_contactus_subheading', array(
	 'default'=>'Call us to this number for instant support',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	 
	$wp_customize->add_control('wedding_contactus_subheading', array(
	 'label'   => 'Sub Heading',
	  'section' => 'contactus_settings_section',
	 'description'	=>"Change your phone number and email from (General Info)",
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_contactus_subheading', array(
		'selector' => '.contactus4_subheading', // You can also select a css class
		'render_callback' => 'wedding_contactus_subheading',
	) );
	
	$wp_customize->add_setting( 'wedding_contactus_bg_image', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'=>get_template_directory_uri()."/assets/images/header-bg.png"
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_contactus_bg_image',array(
	   'label'      	=>'Upload Image',
	   'description'	=>'upload a background image',
	   'section'    	=> 'contactus_settings_section',
	)));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_contactus_bg_image', array(
		'selector' => '.contactus4_banner', // You can also select a css class
		'render_callback' => 'wedding_contactus_bg_image',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'general_phone_info', array(
		'selector' => '.contactus4_generalphone', // You can also select a css class
		'render_callback' => 'general_phone_info',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'general_email_info', array(
		'selector' => '.contactus4_generalemail', // You can also select a css class
		'render_callback' => 'general_email_info',
	) );
	
	
	/* End Contact Us Section */
	
	
	
	
	/* Start Subscription Section */
	 $wp_customize->add_section('subscription_settings_section', array(
	  'title'          => 'Subscription',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	  $wp_customize->add_setting('wedding_subscription_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_subscription_enable',
			array(
				'label'     => 'Show Subscription Section',
				'section'   => 'subscription_settings_section',
				'settings'  => 'wedding_subscription_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	$wp_customize->add_setting('wedding_subscription_title', array(
	 'default'=>'GET REGULAR PHOTOGRAPHY NEWS UPDATE',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	 
	$wp_customize->add_control('wedding_subscription_title', array(
	 'label'   => 'Enter Title',
	  'section' => 'subscription_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_subscription_title', array(
		'selector' => '.subscription4_title', // You can also select a css class
		'render_callback' => 'wedding_subscription_title',
	) );
	
	
	$wp_customize->add_setting('wedding_subscription_heading', array(
	 'default'=>'Get Blog Update To Your Mail',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	 
	$wp_customize->add_control('wedding_subscription_heading', array(
	 'label'   => 'Section Heading',
	  'section' => 'subscription_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_subscription_heading', array(
		'selector' => '.subscription4_heading', // You can also select a css class
		'render_callback' => 'wedding_subscription_heading',
	) );
	
	
	$wp_customize->add_setting('wedding_subscription_formtext', array(
	 'default'=>'We respect your privacy and we will never share your information with the third party',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	 
	$wp_customize->add_control('wedding_subscription_formtext', array(
	 'label'   => 'Form Text',
	  'section' => 'subscription_settings_section',
	 'type'    => 'textarea',
	));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_subscription_formtext', array(
		'selector' => '.subscription4_formheading', // You can also select a css class
		'render_callback' => 'wedding_subscription_formtext',
	) );
	
	$wp_customize->add_setting('wedding_subscription_formsubmit', array(
	 'sanitize_callback' => 'wp_kses_post',
	));
	 
	$wp_customize->add_control('wedding_subscription_formsubmit', array(
	 'label'   => 'Add Shortcode',
	 'description' => 'Install plugin for subscription Eg. mailchamp. Create form and paste here shortcode.',
	  'section' => 'subscription_settings_section',
	 'type'    => 'text',
	)); 
	
	$wp_customize->selective_refresh->add_partial( 'wedding_subscription_formsubmit', array(
		'selector' => '.subscription4_forms', // You can also select a css class
		'render_callback' => 'wedding_subscription_formsubmit',
	) );
	
	$wp_customize->add_setting( 'wedding_subscription_formsubmit_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		'default'=>get_template_directory_uri().'/assets/images/map.png',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'wedding_subscription_formsubmit_image',array(
		   'label'      	=>'Upload backbround Image', 
		   'section'    	=> 'subscription_settings_section',
	)));
	
	$wp_customize->selective_refresh->add_partial( 'wedding_subscription_formsubmit_image', array(
		'selector' => '.subscription4_banner', // You can also select a css class
		'render_callback' => 'wedding_subscription_formsubmit_image',
	) );
	
	/* End subscription Section */
	
	/* Start Map Section */
	 $wp_customize->add_section('sitemap_settings_section', array(
	  'title'          => 'Map',
	   'panel'		   => 'wedding_photo_home_page_setting'
	 ));
	 
	  $wp_customize->add_setting('wedding_sitemap_enable', array(
		'default'    => '1',
		'sanitize_callback' => 'wedding_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_sitemap_enable',
			array(
				'label'     => 'Show Map Section',
				'section'   => 'sitemap_settings_section',
				'settings'  => 'wedding_sitemap_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	$wp_customize->add_setting('wedding_map_address', array(
	 'default'=>'University of San Francisco',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	 
	$wp_customize->add_control('wedding_map_address', array(
	 'label'   => 'Enter Address',
	  'section' => 'sitemap_settings_section',
	 'type'    => 'text',
	));
	
	/* End Map Section */
	$wp_customize->add_panel( 'wedding_photo_footersec_setting',array(
        'title'			=> 'Footer Copyright Text',
        'priority'		=> 50,
    ));
	$wp_customize->add_section('footer_settings_section', array(
	  'title'          => 'Footer Text',
	   'panel'		   => 'wedding_photo_footersec_setting'
	 ));
	//adding setting for footer text area
	$wp_customize->add_setting('copyright_text_setting', array(
	 'default'        => '(c) 2019 FOG Lite Developed By themeflux',
	 'sanitize_callback' => 'wp_kses_post',
	 ));
	$wp_customize->add_control('copyright_text_setting', array(
	 'label'   => 'Footer Text Here',
	 'description' => "<a class='button' target='_blank' href='https://jannatqualitybacklinks.com/product/fog-lite-pro-version/'>Locked Go For Pro</a>",
	  'section' => 'footer_settings_section',
	 'type'    => 'hidden',
	));
	
	$wp_customize->selective_refresh->add_partial( 'copyright_text_setting', array(
		'selector' => '#footer-sidebar-3', // You can also select a css class
		'render_callback' =>'copyright_text_setting',
	 ) );

	//adding setting for footer text area
	// $wp_customize->add_setting('copyright_text_url', array(
	//  'default'        => 'http://wordpress.org',
	//  'sanitize_callback' => 'wp_filter_nohtml_kses',
	//  ));
	// $wp_customize->add_control('copyright_text_url', array(
	//  'label'   => 'Footer Text Link Here',
	//   'section' => 'footer_settings_section',
	//  'type'    => 'text',
	// ));
	
	// $wp_customize->selective_refresh->add_partial( 'copyright_text_url', array(
	// 	'selector' => '#footer-sidebar-3', // You can also select a css class
	// 	'render_callback' =>'copyright_text_url',
	//  ) );
	
	//adding section in wordpress customizer   
	
	$wp_customize->add_section('socail_media_settings_section', array(
	  'title'          => 'General Info (Contact)',
	  'priority'		=> 32,
	)); 
	$social_icons_default=array('facebook'=>'https://www.facebook.com/','twitter'=>'https://twitter.com/','googlePlus'=>'https://mail.google.com','dribbble'=>'https://dribbble.com/','youtube'=>'http://youtube.com/','linkedin'=>'https://in.linkedin.com/');
	$social_icons = array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
	foreach( $social_icons as $social_icon){
	    
	    $wp_customize->add_setting( 'wedding_photo_'.$social_icon.'_url', array(
            'sanitize_callback' => 'esc_url_raw',
			'default'=>$social_icons_default[$social_icon]
        ));
	    $wp_customize->add_control( 'wedding_photo_'.$social_icon.'_url', array(
            'section'       => 'socail_media_settings_section',
            'label'         => 'Social Link : '.ucwords($social_icon),
            'type'          => 'url'
        ));
	  $wp_customize->selective_refresh->add_partial( 'wedding_photo_'.$social_icon.'_url', array(
		'selector' => '.banner4_socials_'.$social_icon, // You can also select a css class
		'render_callback' =>'wedding_photo_'.$social_icon.'_url',
		) );
	}
	$wp_customize->add_setting('general_phone_info', array(
	'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control('general_phone_info', array(
	 'label'   => 'Contact Number',
	  'section' => 'socail_media_settings_section',
	 'type'    => 'text',
	));
	$wp_customize->add_setting('general_email_info', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control('general_email_info', array(
	 'label'   => 'Contact Email',
	  'section' => 'socail_media_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->add_setting('fog_googletrack_id', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	 
	$wp_customize->add_control('fog_googletrack_id', array(
	 'label'   => 'Google analytics Id',
	  'section' => 'socail_media_settings_section',
	 'type'    => 'text',
	));
	
	/* Default setting */
	$wp_customize->add_section('site_default_settings_section', array(
	  'title'          => 'Default Listing Setting',
	  'priority'		=> 31,
	  'description'=>'Info: - Publish and refresh page to add selected options.',
	));
	
	$wp_customize->add_setting('wedding_testimonial_nosection', array(
	 'default' => '3',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_testimonial_nosection', array(
	  'label'   => 'Add Testimonial',
	  'description'=>'How many Testimonial You want to Add? Atleast you need to add two testimonial.',
	  'section' => 'site_default_settings_section',
	  'type'    => 'number',
	));
	
	$wp_customize->add_setting('wedding_portfolio_nosection', array(
	 'default' => '6',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_portfolio_nosection', array(
	  'label'   => 'Add Portfolio',
	  'description'=>'How many Portfolio You want to Add?',
	  'section' => 'site_default_settings_section',
	  'type'    => 'number',
	));
	
	$wp_customize->add_setting('wedding_team_nosection', array(
	 'default' => '3',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_team_nosection', array(
	  'label'   => 'Add Team Member',
	  'description'=>'How many Team Member You want to Add?',
	  'section' => 'site_default_settings_section',
	  'type'    => 'number',
	));
	$wp_customize->add_setting('wedding_features_nosection', array(
	 'default' => '6',
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('wedding_features_nosection', array(
	  'label'   => 'Add Feature Services',
	  'description'=>'How many Services You want to Add?',
	  'section' => 'site_default_settings_section',
	  'type'    => 'number',
	));
	/* End Default Settings */
	
}
add_action( 'customize_register', 'wedding_photo_customize_register' );
	
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wedding_photo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wedding_photo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wedding_photo_customize_preview_js() {
	wp_enqueue_script( 'wedding_photo-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wedding_photo_customize_preview_js' );


/**
 * Function to sanitize inputs
 */
function wp_filter_nohtml_kses1( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Function to sanitize checkboxes
 */
function wedding_sanitize_checkbox( $input ) {
	return ( isset( $input ) && true == $input ? true : false );
}






