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

<aside id="secondary" class="widget-area<?php $options = get_option('kn_options_settings'); if($options['kn_sidebar_radio_field'] == 'left'){ echo ' left'; } elseif ($options['kn_sidebar_radio_field'] == 'right'){ echo ' right'; } ?>" role="complementary">

echo $options['kn_sidebar_radio_field'] ?>" role="complementary">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
