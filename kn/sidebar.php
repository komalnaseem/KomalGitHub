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
<?php /* This is using the sidebar position option from the Portfio Options page and sets the sidebar position according to the selected value in the options page. When left is selected, the sidebar will move to the left and when right is selected, then the sidebar will move to the right.  */ ?>
<aside id="secondary" class="widget-area <?php $options = get_option('kn_options_settings'); if($options['kn_sidebar_radio_field'] == 'left'){ echo ' left'; } elseif ($options['kn_sidebar_radio_field'] == 'right'){ echo ' right'; } ?>" role="complementary"> 

<?php dynamic_sidebar( 'sidebar-1' ); ?>

</aside><!-- #secondary -->
