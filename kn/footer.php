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
		</div><!-- .main-page-->	
		</div><!-- .main-content-area full-->

	<div class="footer-area full">
		<div class="main-page">	
			<footer id="colophon" class="site-footer inner" role="contentinfo">
				<?php /* This is to display availability custom field */
					$availability = get_post_meta ($post->ID, 'availability', true);
				
					global $wp_query;
					$postid = $wp_query->post->ID;
					$availability = get_post_meta($postid, 'availability', true);
				?>
				
				<?php
				if (!empty($availability)) :	/* This conditional checks wheather or not the availability is there and echoes the label/data only when there is one */
					?>
					<p> 
						<?php echo "Available from: " . $availability; ?>
					</p> 
				<?php
				endif; 
				
				wp_reset_query(); ?>
			
				<?php $options = get_option('kn_options_settings');		
				if (!empty($options['kn_email_address'])) :	/* This conditional checks wheather or not there is an email address and echoes the label/data only when there is one */
					echo "My Email Address: " . $options['kn_email_address'];			
				endif; 
				?>

				<div class="site-info">
					<p class="copyright">&copy; <?php echo date('Y'); printf( esc_html__( ' Theme: %1$s by %2$s.', 'kn' ), 'kn', 'Komal Naseem. All Rights Reserved'); ?> <br/p>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- .main-page -->
	</div><!-- .footer-area full-->

<?php wp_footer(); ?>

</body>
</html>

