<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wedding_photo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php 
	$track_id=get_theme_mod('fog_googletrack_id');
	if($track_id)
	{
		?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $track_id; ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo $track_id; ?>');
	</script>
	<?php
	}
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140894483-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140894483-1');
</script>

	<?php wp_head(); ?>
</head>

<body <?php 
if(is_front_page())
{
	body_class('black-bg'); 
	
}
else 
{
	body_class('black-bg blog');
}?>>
        <!--
        ===================
           NAVIGATION
        ===================
        -->
        <header class="black-bg mh-header lo-fixed-nav nav-scroll mh-xss-mobile-nav" id="zb-header">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg mh-nav nav-btn">
						<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$wedding_photo_description = get_bloginfo( 'description', 'display' );
							if ( $wedding_photo_description || is_customize_preview() ) :
								?>
								<!--
								<p class="site-description"><?php echo $wedding_photo_description; /* WPCS: xss ok. */ ?></p> -->
						<?php endif; ?>
                       
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon icon"></span>
                        </button>
                    
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
							<?php
									wp_nav_menu( array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'container' => 'ul',
										'menu_class' => 'navbar-nav mr-0 ml-auto',
										'link_class'   => 'nav-link'
									) );
							?>
                        </div>
                    </nav>
                </div>
            </div>


</header>
