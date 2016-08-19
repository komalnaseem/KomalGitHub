<?php
/**
 * The template for displaying the custom pages.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * Template Name: Custom Home Page
 * @package Komal
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );
				
				/*  This displays the featured image on the custom home page if the featured image check box is checked and an image is selected in the custom home page. */
				$options = get_option('kn_options_settings');		
				if(isset($options['kn_image_checkbox']) == 'on'){
					echo the_post_thumbnail (null, $size = 'post-thumbnail') . '<br />';
				}
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
