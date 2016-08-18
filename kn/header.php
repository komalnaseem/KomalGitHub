<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Komal
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="header-area full">
		<div class="main-page">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kn' ); ?></a>
			<header id="masthead" class="site-header inner" role="banner">
				<div class="site-branding">
					<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div><!-- .site-branding -->
				
				<?php /* This is to display mission statement custom field on the home page*/
				$mission = get_post_meta ($post->ID, 'mission', true);
			
				global $wp_query;
				$postid = $wp_query->post->ID;
				$mission = get_post_meta($postid, 'mission', true); ?>
				<?php
				if (!empty($mission)) :	/* This conditional checks wheather or not the mission statement is there and echoes the label/data only when there is one */
					?>
					<p class="mission"> <?php echo "My Mission Statement: " . $mission; ?></p>  
				<?php
				endif; ?>
				<?php wp_reset_query(); ?>
				
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kn' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div><!-- .main-page -->
	</div><!-- .header-area full-->

	<div class="main-content-area full">
		<div class="main-page">	
			<div id="content" class="site-content inner">