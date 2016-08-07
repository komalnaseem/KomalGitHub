<?php
	
function kn_add_submenu() {	/* This function adds sub menu to Apperance Menu*/
		add_submenu_page( 
			'themes.php', 					
			'My Super Awesome Options Page', 
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
		'kn_options_page_section', 
		'Your section description', 
		'kn_options_page_section_callback', 
		'theme_options'
	);
	
	function kn_options_page_section_callback() { 
		echo 'A description and detail about the section.';
	}

	add_settings_field( 
		'kn_text_field', 
		'Enter your text', 
		'kn_text_field_render', 
		'theme_options', 
		'kn_options_page_section' 
	);

	function kn_text_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="text" name="kn_options_settings[kn_text_field]" value="<?php if (isset($options['kn_text_field'])) echo $options['kn_text_field']; ?>" />
		<?php
		
		$options=get_option( 'kn_options_settings' );
		echo$options['kn_text_field'] .'<br />';
	}

	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>My Awesome Options Page</h2>
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
