<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Komal
 */

get_header(); 

/* get_sidebar() is placed here before the main content so it works with the selected sidebar option left */
$options = get_option('kn_options_settings'); 
if($options['kn_sidebar_radio_field'] == 'left') {
	get_sidebar(); 
} ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php

		while ( have_posts() ) : the_post();
		
			get_template_part( 'template-parts/content', get_post_format() );
			
			the_post_thumbnail();	/* This was added to display the featured image - https://developer.wordpress.org/reference/functions/the_post_thumbnail/ */
			
			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
/* get_sidebar() is placed here after the main content so it works with the selected sidebar option right */
$options = get_option('kn_options_settings'); 
if($options['kn_sidebar_radio_field'] == 'right') {
	get_sidebar(); 
} 
get_footer();
