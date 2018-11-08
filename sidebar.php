<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pozhelaju
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<section id="recent-posts-3" class="widget widget_recent_entries">
		<h4><i class="fa fa-calendar"></i> праздники</h4>
		<div class="wrap_w">
			<?php echo do_shortcode('[insert_holidays]') ?>
		</div>
	</section>
	
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
