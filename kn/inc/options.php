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
		echo 'Please provide your email address and cell number to be displayed on the site.';
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
 * Loading Cell Number
 */
	add_settings_field( 
		'kn_cell_number', 
		'Enter your cell number: ', 
		'kn_cell_number_render', 
		'theme_options', 
		'kn_options_page_section' 
	);

	function kn_cell_number_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="text" name="kn_options_settings[kn_cell_number]" value="<?php if (isset($options['kn_cell_number'])) echo $options['kn_cell_number']; ?>" />
		<?php
	}

/**
 * Loading facebook url
 */
	add_settings_field( 
		'kn_fb_url', 
		'Enter your Facebook url: ', 
		'kn_fb_url_render', 
		'theme_options', 
		'kn_options_page_section' 
	);

	function kn_fb_url_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="url" name="kn_options_settings[kn_fb_url]" value="<?php if (isset($options['kn_fb_url'])) echo $options['kn_fb_url']; ?>" />
		<?php
	}
	
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

$options = get_option('kn_options_settings');

if (!empty($options['kn_email_address']))				/* This conditional checks wheather or not there is an email address and echos the label and data only when there is one */
	echo "My Email Address: " . $options['kn_email_address'];

if (!empty($options['kn_cell_number']))					/* This conditional checks wheather or not there is a cell number and echos the label and data only when there is one */
	echo " My Cell Number: " . $options['kn_cell_number'];

if (!empty($options['kn_fb_url']))						/* This conditional checks wheather or not there is a url and echos the label and data only when there is one */
	echo " My Facebook URL: " . $options['kn_fb_url'];

if (!empty($options['kn_email_address']) OR !empty($options['kn_cell_number']) OR !empty($options['kn_fb_url'])) /* This conditional checks wheather we are displaying any of the above three options and issues a new line command if we are displaying atleast one. */
	echo '<br />';



