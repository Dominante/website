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
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">

	<?php wp_head(); ?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dominante' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
            <div class="header-image-container">
                <style>
                    .header-overlay-logo-hide {
                      display: none;
                    }
										@media only screen and (max-width: 600px) {
											.header-image-container {
													border-bottom: 28.5px #7B1E32 solid;
											}
											.site-branding .wp-post-image {
											  height: 570px;
											  width: -webkit-fill-available;
											  object-fit: cover;
											}
											.header-overlay {
													position: absolute;
													background-image: url(https://www.dominante.fi/kehitys/wp-content/themes/dominante/gradient_left_v2.svg);
													background-size: auto 100%;
													background-repeat: no-repeat;
													background-position-x: -1000px;
													opacity: 0.75;
											}
											.header-overlay-2 {
													position: absolute;
													background-image: url(https://www.dominante.fi/kehitys/wp-content/themes/dominante/gradient_right_v2.svg);
													background-size: auto 100%;
													background-repeat: no-repeat;
													background-position: right -970px center;
													opacity: 0.75;
											}
											.header-overlay-logo {
													position: absolute;
													background-image: url(https://www.dominante.fi/kehitys/wp-content/themes/dominante/dominante_teksti_valkoinen-01.svg);
													background-size: 275px auto;
													background-repeat: no-repeat;
													background-position: right 16% bottom 12px;
													opacity: 1;
											}
                      @media only screen and (max-height: 560px) {
                        .site-branding .wp-post-image {
  											  height: 350px;
  											}
                      }
                      @media only screen and (min-height: 561px) {
                        .site-branding .wp-post-image {
  											  height: 380px;
  											}
                      }
                      @media only screen and (min-height: 660px) {
                        .site-branding .wp-post-image {
  											  height: 400px;
  											}
                      }
                      @media only screen and (min-height: 730px) {
                        .site-branding .wp-post-image {
  											  height: 520px;
  											}
                      }
                      @media only screen and (min-height: 810px) {
                        .site-branding .wp-post-image {
  											  height: 550px;
  											}
                      }
                      @media only screen and (min-height: 820px) {
                        .site-branding .wp-post-image {
  											  height: 610px;
  											}
                      }
										}

										@media only screen and (min-width: 601px) {
                        .header-image-container {
                            border-bottom: 16px #7B1E32 solid;
                        }

                        .header-overlay {
                            position: absolute;
                            background-image: url(https://www.dominante.fi/kehitys/wp-content/themes/dominante/gradient_left_v2.svg);
                            background-size: auto 100%;
                            background-repeat: no-repeat;
                            background-position-x: -510px;
                            opacity: 0.75;
                        }
                        .header-overlay-2 {
                            position: absolute;
                            background-image: url(https://www.dominante.fi/kehitys/wp-content/themes/dominante/gradient_right_v2.svg);
                            background-size: auto 100%;
                            background-repeat: no-repeat;
                            background-position: right -536px center;
                            opacity: 0.75;
                        }
                        .header-overlay-logo {
                            position: absolute;
                            background-image: url(https://www.dominante.fi/kehitys/wp-content/themes/dominante/dominante_teksti_valkoinen-01.svg);
                            background-size: 300px auto;
                            background-repeat: no-repeat;
                            background-position: right 16% bottom 12px;
                            opacity: 1;
                        }
                    }

                    @media only screen and (min-width: 951px) {
                        .header-image-container {
                            border-bottom: 16px #7B1E32 solid;
                        }

                        .header-overlay {
                            position: absolute;
                            background-image: url(<?php echo get_site_url() ?>/wp-content/themes/dominante/gradient_left_v2.svg);
                            background-size: auto 100%;
                            background-repeat: no-repeat;
                            background-position-x: -256px;
                            opacity: 0.75;
                        }
                        .header-overlay-2 {
                            position: absolute;
                            background-image: url(<?php echo get_site_url() ?>/wp-content/themes/dominante/gradient_right_v2.svg);
                            background-size: auto 100%;
                            background-repeat: no-repeat;
                            background-position: right -441px center;
                            opacity: 0.75;
                        }
                        .header-overlay-logo {
                            position: absolute;
                            background-image: url(<?php echo get_site_url() ?>/wp-content/themes/dominante/dominante_teksti_valkoinen-01.svg);
                            background-size: 375px auto;
                            background-repeat: no-repeat;
                            background-position: right 16% bottom 12px;
                            opacity: 1;
                        }
                    }
										@media only screen and (min-width: 1176px) {
                        .header-image-container {
                            border-bottom: 22.5px #7B1E32 solid;
                        }
												.site-branding .wp-post-image {
												  height: 450px;
												  width: -webkit-fill-available;
												  object-fit: cover;
												}

                        .header-overlay {
                            position: absolute;
                            background-image: url(<?php echo get_site_url() ?>/wp-content/themes/dominante/gradient_left_v2.svg);
                            background-size: auto 100%;
                            background-repeat: no-repeat;
                            background-position-x: -450px;
                            opacity: 0.75;
                        }
                        .header-overlay-2 {
                            position: absolute;
                            background-image: url(<?php echo get_site_url() ?>/wp-content/themes/dominante/gradient_right_v2.svg);
                            background-size: auto 100%;
                            background-repeat: no-repeat;
                            background-position: right -650px center;
                            opacity: 0.75;
                        }
                        .header-overlay-logo {
                            position: absolute;
                            background-image: url(<?php echo get_site_url() ?>/wp-content/themes/dominante/dominante_teksti_valkoinen-01.svg);
                            background-size: 375px auto;
                            background-repeat: no-repeat;
                            background-position: right 16% bottom 12px;
                            opacity: 1;
                        }
                    }

                    @media only screen and (max-width: 950px) {
                        .site-description {
                            display: none;
                        }
                    }

                    @media only screen and (min-width: 951px) {
                        .site-description {
                            position: absolute;
                            color: #fff;
                            text-align: left;
                            padding-left: 62px;
                            top: 243px;
                            line-height: 1.2;
                            font-family: 'Merriweather Sans', sans-serif;
                            font-weight: bold;
                            font-size: 14px;
                            width: 450px;
                        }
                    }
										@media only screen and (min-width: 1176px) {
                        .site-description {
                            position: absolute;
                            color: #fff;
                            text-align: left;
                            padding-left: 62px;
                            top: 373px;
                            line-height: 1.2;
                            font-family: 'Merriweather Sans', sans-serif;
                            font-weight: bold;
                            font-size: 14px;
                            width: 450px;
                        }
                    }
                </style>
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
