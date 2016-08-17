<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Komal
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php

		while ( have_posts() ) : the_post();
			/*add_action ('loop_start','port_customfield');
			function port_customfield() {
				/*if ( is_single() ) {
					global $post;
					/*echo get_post_meta( $post => ID, 'portfolio_custom', true ); 
					/*echo get_post_meta( get_the_ID(), 'portfolio_custom', true ); 
					$field = get_post_meta( $post->ID, 'portfolio_custom', true );
					echo '<div class="new-class">' . $field . '</div>';
					/*$customfield = get_post_meta (get_the_ID, 'Portfolio_Custom', true); 
					<?php echo get_post_meta ( get_the_ID(), 'portfolio_custom', true ); ?>
				}
			}*/
			

			
			get_template_part( 'template-parts/content', get_post_format() );
			the_post_thumbnail();
			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
		/*	<div class="signature">Komal Naseem</div> */

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
