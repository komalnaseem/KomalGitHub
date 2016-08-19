<?php
/**
 * The header for Kn theme.
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
	<div class="header-area full"> <?php/* Added div class full for genralized styling */?>
		<div class="main-page"> <?php/* Added div class for genralized styling */?>
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
				
				<?php /* This is to display the mission statement custom field on the custom home page */
				$mission = get_post_meta ($post->ID, 'mission', true);
			
				global $wp_query; /* WP-Query is a class defined in wp-includes/query.php that deals with the intricacies of a post's (or page's) request to Wordpress blog. https://codex.wordpress.org/Class_Reference/WP_Query */
				$postid = $wp_query->post->ID; /* Loading post's ID into the variable */
				$mission = get_post_meta($postid, 'mission', true); /* Loading the missiong statement into $mission variable */?>
				<?php
				if (!empty($mission)) :	/* This conditional checks wheather or not the mission statement is there and echoes the label/data only when there is one */
					?>
					<p class="mission"> <?php echo "My Mission Statement: " . $mission; ?></p>  
				<?php
				endif; /* Ending if statement */?>
				<?php wp_reset_query(); /* This resets the $wp_query and global post data to the original main query - https://codex.wordpress.org/Function_Reference/wp_reset_query*/ ?>
				
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kn' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div><!-- .main-page -->
	</div><!-- .header-area full-->

	<div class="main-content-area full"> <?php/* Added div class full for genralized styling */?>
		<div class="main-page">	
			<div id="content" class="site-content inner"> <?php/* Added div class inner for genralized styling */?>