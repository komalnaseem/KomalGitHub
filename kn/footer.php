<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Komal
 */

?>
			</div><!-- #content -->
		</div><!-- .main-page-->			<?php/* Closing the div class main-page which was opened in header.php, this is to help in styling the site. */?>
	</div><!-- .main-content-area full--> 	<?php/* Closing the div class main-content-area full which was opened in header.php, this is to help in styling. */?>

	<div class="footer-area full">	<?php/* Opening the div class footer-area full, full is used for generalized styling. */?>
		<div class="main-page">		<?php/* Opening the div class main-page, this is for generalized styling. */?>
			<footer id="colophon" class="site-footer inner" role="contentinfo">
				<?php 
					$availability = get_post_meta ($post->ID, 'availability', true);  /* Enhanced Customization - This is to display the availability custom field */
				
					global $wp_query; /* WP-Query is a class defined in wp-includes/query.php that deals with the intricacies of a post's (or page's) request to Wordpress blog. https://codex.wordpress.org/Class_Reference/WP_Query */
					$postid = $wp_query->post->ID;	/* Loading post's ID into the variable */
					$availability = get_post_meta($postid, 'availability', true); /* Loading availablity (custom field variable) into $availability variable */
				?>
				
				<?php
				if (!empty($availability)) :	/* This conditional checks wheather or not the availability is there and echoes the label/data only when there is one. */
					?>
					<p> 
						<?php echo "Available from: " . $availability; ?>
					</p> 
				<?php
				endif; /* Ending the if statement */
				wp_reset_query(); /* This resets the $wp_query and global post data to the original main query - https://codex.wordpress.org/Function_Reference/wp_reset_query*/ ?>
			
				<?php $options = get_option('kn_options_settings');		/* Loading the options from the "Portfolio Options" page */
				if (!empty($options['kn_email_address'])) :	/* This conditional checks wheather or not there is an email address and echoes the label/data only when there is one. */
					echo "My Email Address: " . $options['kn_email_address'];			
				endif; /* Ending If statement */
				?>

				<div class="site-info"> <?php /* Displaying the "Copyright" symbol, year, the name of the site and the name of the author of the site with "All Rights Reserved". */ ?>
					<p class="copyright">&copy; <?php echo date('Y'); printf( esc_html__( ' Theme: %1$s by %2$s.', 'kn' ), 'kn', 'Komal Naseem. All Rights Reserved'); ?> <br/p>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- .main-page -->
	</div><!-- .footer-area full-->

<?php wp_footer(); ?>

</body>
</html>
