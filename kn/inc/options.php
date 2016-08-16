<?php
	
function kn_add_submenu() {	/* This function adds sub menu to Apperance Menu*/
		add_submenu_page( 
			'themes.php', 						/* Main Menu */
			'My Options Page', 					/* Options page description */
			'Theme Options', 					/* Sub Menu Name */
			'manage_options', 
			'theme_options', 
			'my_theme_options_page'
		);
	}
add_action( 'admin_menu', 'kn_add_submenu' );
	

function kn_settings_init() { 
	register_setting( 'theme_options', 'kn_options_settings' );
	
	add_settings_section(
		'kn_options_page_section', 				/* The ID */
		'Your section description', 			/* Section Title */
		'kn_options_page_section_callback', 	/* Call back function */
		'theme_options'							/* Page - matches menu_slug set in add_submenu_page */
	);
	
	function kn_options_page_section_callback() { /* The function called in add_settings_section */
		echo 'Please provide your email address and set other option for the site.';
	}

/**
 * Loading Email Address
 */
	add_settings_field( 
		'kn_email_address', 
		'Enter your email adress: ', 
		'kn_email_address_render', 
		'theme_options', 
		'kn_options_page_section' 
	);

	function kn_email_address_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="text" name="kn_options_settings[kn_email_address]" value="<?php if (isset($options['kn_email_address'])) echo $options['kn_email_address']; ?>" />
		<?php
	}

/**
 * Loading Feautured Image
 */
	add_settings_field( 
		'kn_image_checkbox', 
		'Include featured image: ', 
		'kn_image_checkbox_render', 
		'theme_options', 
		'kn_options_page_section' 
	);

	function kn_image_checkbox_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="checkbox" name="kn_options_settings[kn_image_checkbox]" <?php if (isset($options['kn_image_checkbox'])) checked('on', ($options['kn_image_checkbox']) ); ?> value="on" /> <label>Turn it On </label>
		<?php
	}

/**
 * Sidebar Position
 */
	add_settings_field( 
		'kn_sidebar_radio_field', 
		'Choose the sidebar postion: ', 
		'kn_sidebar_radio_field_render', 
		'theme_options', 
		'kn_options_page_section' 
	);

	function kn_sidebar_radio_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="radio" name="kn_options_settings[kn_sidebar_radio_field]" <?php
		if(isset($options['kn_sidebar_radio_field'])) checked( $options['kn_sidebar_radio_field'], 1); ?> value="left" /><label>Left</label><br />
		
		<input type="radio" name="kn_options_settings[kn_sidebar_radio_field]" <?php
		if(isset($options['kn_sidebar_radio_field'])) checked( $options['kn_sidebar_radio_field'], 2 ); ?> value="right" /><label>Right</label><br />
		<?php
	}
		
/**
 * Submit Button
 */
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>My Options Page</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}
}
add_action( 'admin_init', 'kn_settings_init' );