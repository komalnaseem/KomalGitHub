<?php
	
function kn_add_submenu() {	/* This function adds a sub menu to the Appearance Menu - https://developer.wordpress.org/reference/functions/add_submenu_page/*/
		add_submenu_page( 
			'themes.php', 						/* Main Menu */
			'Job Portfolio Options Page', 		/* Options page description */
			'Portfolio Options', 				/* Sub Menu Name */
			'manage_options', 
			'theme_options', 					/* Sub Menu slug */
			'my_theme_options_page'
		);
	}
add_action( 'admin_menu', 'kn_add_submenu' );	/* This function Hooks kn_add_submenu on to the admin menu - https://developer.wordpress.org/reference/functions/add_action/*/
	

function kn_settings_init() { 
	register_setting( 'theme_options', 'kn_options_settings' ); /* Register a setting and its sanitization callback. - https://codex.wordpress.org/Function_Reference/register_setting */
	
	add_settings_section(													/* This is for adding a section in the option page - https://codex.wordpress.org/Function_Reference/add_settings_section */
		'kn_options_page_section', 											/* The ID for the section */
		'These are the available customizations for your portfolio site', 	/* Section Title */
		'kn_options_page_section_callback', 								/* Call back function name */
		'theme_options'														/* Page - matches menu_slug set in add_submenu_page */
	);
	
	function kn_options_page_section_callback() { 							/* Call back function which is called in add_setting_section */
		echo 'Please provide your email address, select the checkbox for featured image, and select the sidebar position.';
	}

/**
 * Loading Email Address
 */
	add_settings_field( 
		'kn_email_address', 												/* The ID for the field */
		'Enter your email address: ', 										/* Label that will be displayed for this field */
		'kn_email_address_render', 											/* Call back function name */
		'theme_options', 													/* Page - matches menu_slug set in add_submenu_page */
		'kn_options_page_section' 											/* The ID for the section */
	);

	function kn_email_address_render() { 									/* Call back function which is called in add_settings_field */
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="text" name="kn_options_settings[kn_email_address]" value="<?php if (isset($options['kn_email_address'])) echo $options['kn_email_address']; ?>" />
		<?php
	}

/**
 * Loading Featured Image
 */
	add_settings_field( 
		'kn_image_checkbox', 												/* The ID for the field */
		'Include featured image: ', 										/* Label that will be displayed for this field */
		'kn_image_checkbox_render', 										/* Call back function name */
		'theme_options', 													/* Page - matches menu_slug set in add_submenu_page */
		'kn_options_page_section' 											/* The ID for the section */
	);

	function kn_image_checkbox_render() { 									/* Call back function which is called in add_settings_field */
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="checkbox" name="kn_options_settings[kn_image_checkbox]" <?php if (isset($options['kn_image_checkbox'])) checked('on', ($options['kn_image_checkbox']) ); ?> value="on" /> <label>Turn it On </label>
		<?php
	}

/**
 * Sidebar Position
 */
	add_settings_field( 
		'kn_sidebar_radio_field', 											/* The ID for the field */
		'Choose the sidebar position: ', 									/* Label that will be displayed for this field */
		'kn_sidebar_radio_field_render', 									/* Call back function name */
		'theme_options', 													/* Page - matches menu_slug set in add_submenu_page */
		'kn_options_page_section' 											/* The ID for the section */
	);

	function kn_sidebar_radio_field_render() { 								/* Call back function which is called in add_settings_field */
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="radio" name="kn_options_settings[kn_sidebar_radio_field]" <?php /* Setting for left option */
		if(isset($options['kn_sidebar_radio_field'])) checked( $options['kn_sidebar_radio_field'], 1); ?> value="left" /><label>Left</label><br /> 
		
		<input type="radio" name="kn_options_settings[kn_sidebar_radio_field]" <?php /* Setting for right option */
		if(isset($options['kn_sidebar_radio_field'])) checked( $options['kn_sidebar_radio_field'], 2 ); ?> value="right" /><label>Right</label><br />
		<?php
	}
		
/**
 * Submit Button
 */
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Job Portfolio Options Page</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}
}
add_action( 'admin_init', 'kn_settings_init' ); /* This function hooks kn_settings_init on to the admin_init. admin_init is triggered before any other hook when a user accesses the admin area. - https://developer.wordpress.org/reference/functions/add_action/*/