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
				<div class="site-info">
					<?php $options = get_option('kn_options_settings');		
					if (!empty($options['kn_email_address']))	/* This conditional checks wheather or not there is an email address and echoes the label/data only when there is one */
						echo "My Email Address: " . $options['kn_email_address'] . '<br />';
					?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kn' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kn' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'kn' ), 'kn', '<a href="http://phoenix.sheridanc.on.ca/~ccit3680/" rel="designer">Komal Naseem</a>' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- .main-page -->
	</div><!-- .footer-area full-->


<?php wp_footer(); ?>

</body>
</html>
