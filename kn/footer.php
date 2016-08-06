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
