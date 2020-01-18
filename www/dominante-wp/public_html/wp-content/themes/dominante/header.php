<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dominante
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136328601-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-136328601-1');
    </script>



    <!-- Global site tag (gtag.js) - Google Ads: 774476697 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-774476697"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-774476697');
    </script>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">

	<?php wp_head(); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha256-PZLhE6wwMbg4AB3d35ZdBF9HD/dI/y4RazA3iRDurss=" crossorigin="anonymous" />
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dominante' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
            <div class="header-image-container">
                <?php if ( has_post_thumbnail() ) { ?>
                <div class="header-overlay wp-post-image" ></div>
                <div class="header-overlay-2 wp-post-image" ></div>
                <div class="header-overlay-logo wp-post-image" ></div>
<!--                <div style="position: absolute; background-image: url('/wp-content/themes/dominante/domidesk-inverted.svg')" class="wp-post-image" ></div>-->
                    <?php the_post_thumbnail('post-thumbnail', ['style' => get_post_meta( get_the_ID(), 'header_image_css', true)]); ?>
                <?php } else { ?>
                <?php } ?>
			<?php
                $alt_description =  get_post_meta( get_the_ID(), 'alternative_description', true);
                $description = empty($alt_description) ? get_bloginfo( 'description', 'display' ) : $alt_description;
                if (  $description || is_customize_preview() ) : ?>
                <div class="site-description" style="">
                    <?php echo $description; /* WPCS: xss ok. */ ?>
               </div>
			<?php
			endif; ?>
            </div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
