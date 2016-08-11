<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Komal
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area <?php $options = get_option('kn_options_settings'); /*if(isset($options['kn_sidebar_radio_field']) == '1'){ echo 'left';} else if(isset($options['kn_sidebar_radio_field']) == '2'){ echo 'right';}*/ echo $options['kn_sidebar_radio_field'] ?>" role="complementary">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
