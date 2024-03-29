<?php
/**
 * Template Name: Home Template
 *
 * Template für die Darstellung der Startseite
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );


}


?>

<div class="custom-slidercontroller-container">
	<i class="fas fa-angle-down"></i>	
</div>	
<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">


					<!-- ######## Facts Section ########  -->

						<div class="col-sm-12">
							<div class="row facts-row ">
								<div class="title-col col-sm-12">
									<h2>Über uns </h2>
								</div>	

							<?php

								$args = array(
			    					'post_type'  => 'domi_facts_cpt',
			    					'numberposts' => -1,
			    					'post_status' => 'publish', 
		    						'orderby' => 'menu_order', 
		    						'order' => 'ASC', 

								);


							$facts = get_posts( $args );
							
							?>

							<?php 
							foreach ($facts as $fact ) {
								get_template_part( 'loop-templates/content', 'facts' );	
							}
							?>
							</div> <!-- facts row-->
						</div> <!-- col -->					
					


					<!-- ######## Aktuelles Section ########  -->

					<?php

					// only show newly posted news entries
					$number_months_for_news = get_field('number_months_for_news', 'option');
					
					if (!isset($number_months_for_news) or empty($number_months_for_news)):
						$number_months_for_news = 3;
					endif;

					$args = array(
    					'post_type'  => 'post',
    					'numberposts' => -1,
    					'post_status' => 'publish', 
						'orderby' => 'menu_order', 
						'order' => 'ASC', 
						'date_query' => array(

									// only show Posts that are not older than x months
           							array(
                  						'after' => $number_months_for_news . ' month ago'

            						)										

						)
					);

					$postlist = get_posts( $args );					
					
					if (count($postlist)>0):
						while ( have_posts() ) {
							the_post();
							get_template_part( 'loop-templates/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						}
					endif;	


					get_template_part( 'loop-templates/', 'content' );
					
					?>
					
					
					<div class="row custom-postentry-row ">

					<?php

					
					foreach ($postlist as $postentry ) {
						 

						?>
						 
							<div class="col-md-6 col-md-6 custom-postentry-col" >
								<div class="card">
									<h3><?php echo $postentry->post_title;?></h3>
							 		
							 		<?php 
										if ( has_post_thumbnail($postentry->ID) == true):
								 		?>
									 		<div class="image-container">							 			
									 			<a href="<?=$customPostentryLink?>" target="_blank">
									 				<img src="<?=get_the_post_thumbnail_url($postentry->ID, 'medium')?>" />
									 			</a>								 			
									 		</div>	
								 	<?php		
										endif; 
							 		?>
						 					
					 				<div class="text-container">
						 				<?php		
						 					$postentrycontent = get_the_content(null, false, $postentry->ID);
						 					echo apply_filters('the_content', $postentrycontent);						 				
						 				?>								 		
						 			</div>
							 				
								</div>
							</div>	

						
						<?php
					}
					?>
					

					<!-- ######## Partners Section ########  -->					
					<div class="col-sm-12">
						<div class="row partner-row ">
							<div class="title-col col-sm-12">
								<h2>Unsere Partner </h2>
							</div>	

						<?php

							$args = array(
		    					'post_type'  => 'domi_partners_cpt',
		    					'numberposts' => -1,
		    					'post_status' => 'publish', 
	    						'orderby' => 'menu_order', 
	    						'order' => 'ASC', 

							);


						$partners = get_posts( $args );
						
						?>

						<?php 
						foreach ($partners as $partner ) {
							get_template_part( 'loop-templates/content', 'partners' );	
						}
						?>



					</div> <!-- postentry row-->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
