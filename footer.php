<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info row">

						<div class="site-info first-footer-part col-md-4 col-sm-6">

							<a href="https://www.instagram.com/fg_chilis/" target="_blank">Füürgüggù auf Instagram </a>

						</div>

						<div class="footer-nav second-footer-part col-md-4 col-sm-6">
							<nav id="second-nav" class="navbar navbar-expand-md navbar-dark bg-primary">

								<?php 
								    wp_nav_menu(   
								        array ( 
								            'theme_location' => 'domi-custom-footer-menu' 
								         ) 
								    ); 
								?>
							</nav>	
						</div>						

						<div class="site-info third-footer-part  col-md-4 col-sm-6">
							<?php the_custom_logo();?>
						</div>

					</div><!-- .site-info -->


				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

