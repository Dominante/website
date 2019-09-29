<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dominante
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info flexbox-container"> <!-- flexbox container -->

            <?php if (function_exists('pll_current_language') && pll_current_language() == 'fi') { ?>
					<div class="flexbox-column">
						DOMINANTE RY<br>
						PL 69 02151 ESPOO<br/>
                        <a href="<?php echo get_site_url() ?>/medialle" style="text-color: white !important; ">Medialle</a>
					</div>
					<div class="flexbox-column">
						Intendentti<br>
						Markku Rämö<br>
						intendentti@dominante.fi
					</div>
					<div class="flexbox-column">
						Puheenjohtaja<br>
						Anna Kivi<br>
						dominante-pj@dominante.fi
					</div>
					<div class="flexbox-column">
						Yhteydenotot<br>
						dominante@dominante.fi
					</div>
					<div class="flexbox-column">
						Kvartettipalvelu<br>
						kvartettipalvelu@dominante.fi
					</div>
					<div class="flexbox-column">
						<?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
					</div>
            <?php } ?>
            <?php if (function_exists('pll_current_language') && pll_current_language() == 'en') { ?>
                <div class="flexbox-column">
                    Mailing address<br/>
                    DOMINANTE RY<br>
                    PL 69 02151 ESPOO<br/>
                    <a href="<?php echo get_site_url() ?>/medialle" style="text-color: white !important; ">Press</a>
                </div>
                <div class="flexbox-column">
                    Managing Director<br>
                    Markku Rämö<br>
                    intendentti@dominante.fi
                </div>
                <div class="flexbox-column">
                    Chair<br>
                    Anna Kivi<br>
                    dominante-pj@dominante.fi
                </div>
                <div class="flexbox-column">
                    Contact<br>
                    dominante@dominante.fi
                </div>
                <div class="flexbox-column">
                    Quartet Service<br>
                    kvartettipalvelu@dominante.fi
                </div>
                <div class="flexbox-column">
                    <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
                </div>
            <?php } ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js" integrity="sha256-vrn14y7WH7zgEElyQqm2uCGSQrX/xjYDjniRUQx3NyU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" integrity="sha256-wk7QMTzYE7BJvko9BsywPzRmKzhCtIQKTuN6/B9sRmw=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha256-PZLhE6wwMbg4AB3d35ZdBF9HD/dI/y4RazA3iRDurss=" crossorigin="anonymous" />

</body>
</html>
