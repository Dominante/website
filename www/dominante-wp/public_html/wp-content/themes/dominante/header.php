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

    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">

	<?php wp_head(); ?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dominante' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
            <div class="header-image-container">
                <style>

                    @media only screen and (max-width: 750px) {
                        .header-overlay {
                            position: absolute;
                            background-image: url('<?php echo get_site_url() ?>/wp-content/themes/dominante/domikanny-inverted.svg');
                            background-size: cover;
                        }
                    }

                    @media only screen and (min-width: 751px) {
                        .header-overlay {
                            position: absolute;
                            background-image: url('<?php echo get_site_url() ?>/wp-content/themes/dominante/domidesk-inverted.svg');
                            background-size: cover;
                        }
                    }
                    

                    @media only screen and (max-width: 751px) {
                        .site-description {
                            position: absolute;
                            top: 283px;
                            color: #fff;
                            font-weight: normal;
                            text-align: left;
                            padding-left: 28px;
                            font-size: 14px;
                            padding-right: 10px;
                        }
                    }
                    @media only screen and (min-width: 751px) {
                        .site-description {
                            position: absolute;
                            top: 308px;
                            color: #fff;
                            font-weight: normal;
                            text-align: left;
                            padding-left: 20px;
                        }
                    }

                    @media only screen and (min-width: 1237px) {
                        .site-description {
                            top: 332px;
                        }
                    }
                </style>
                <div class="header-overlay wp-post-image" ></div>
<!--                <div style="position: absolute; background-image: url('/wp-content/themes/dominante/domidesk-inverted.svg')" class="wp-post-image" ></div>-->
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail('post-thumbnail', ['style' => get_post_meta( get_the_ID(), 'header_image_css', true)]);
                } else { ?>
                <?php } ?>
            </div>
			<?php
                $alt_description =  get_post_meta( get_the_ID(), 'alternative_description', true);
                $description = empty($alt_description) ? get_bloginfo( 'description', 'display' ) : $alt_description;
                if ( $description || is_customize_preview() ) : ?>
                <div class="site-description" style="font-family: 'Quicksand', sans-serif; width: 100%">
                    <div style="float: right; width: 65%; height: 1em;"></div>
                    <div style="float: right; width: 54%; height: 1em;"></div>
                    <?php echo $description; /* WPCS: xss ok. */ ?>
               </div>
			<?php
			endif; ?>
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
