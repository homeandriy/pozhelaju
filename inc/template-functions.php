<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package pozhelaju
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pozhelaju_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'pozhelaju_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pozhelaju_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'pozhelaju_pingback_header' );


add_shortcode( 'insert_holidays', 'insert_holidays_function' );


function insert_holidays_function() {
	global $wpdb;
	$holiday_table = $wpdb->prefix . 'termmeta';

	$get_all_holidays_by_range = $wpdb->get_results("SELECT * FROM $holiday_table WHERE meta_key = '__day_of_holiday' AND meta_value BETWEEN (NOW() - INTERVAL 1 DAY) AND  (NOW() + INTERVAL 7 DAY)");

	$html = '<ul class="list-holidays">';
	if( $get_all_holidays_by_range and count($get_all_holidays_by_range ) >= 1) {
		$current_date = $get_all_holidays_by_range[0]->meta_value;
		$f_date = new DateTime( $current_date );

		$html .='<li><i class="fa fa-chevron-right"></i> <strong>'. $f_date->format('j').' '. returnRusName($f_date->format('m')) .'</strong> </li>';

		foreach ($get_all_holidays_by_range as $holiday ) {

			// $res = var_dump( $current_date  == $holiday->meta_value );
			// echo $current_date ."=== ".$holiday->meta_value." - ".$res ."<br>";
			if( $current_date  == $holiday->meta_value ) {
				$f_date = new DateTime( $holiday->meta_value );
				$category = get_category( $holiday->term_id );

				$html .='<li><a href="'.get_category_link( $holiday->term_id ).'" class="link-holiday">'.$category->name.'</a></li>';
			}
			else {
				$current_date = $holiday->meta_value;
				$f_date = new DateTime( $holiday->meta_value );
				$category = get_category( $holiday->term_id );

				$html .='<li><i class="fa fa-chevron-right"></i> <strong>'. $f_date->format('j').' '. returnRusName($f_date->format('m')) .' </strong> </li>';
				$html .='<li><a href="'.get_category_link( $holiday->term_id ).'" class="link-holiday">'.$category->name.'</a></li>';
			}
		}
	}
	$html .= '</ul>';
	return $html;
	// $get_all_holidays_by_range = $wpdb->get_results("SELECT * FROM $holiday_table WHERE meta_key = '__day_of_holiday'");

	// foreach ($get_all_holidays_by_range as $ddd) {
	// 	$formatdate = new DateTime( $ddd->meta_value );
	// 	$date = $formatdate->format('Y-m-d');

	// 	update_term_meta( $ddd->term_id, '__day_of_holiday', $date );
	// 	echo $date."<br>";
	// }
}

function returnRusName ( $id ){
	$rusMounth = array( 
		"01" => "января", 
		"02" => "февраля", 
		"03" => "марта", 
		"04" => "апреля", 
		"05" => "мая", 
		"06" => "июня", 
		"07" => "июля", 
		"08" => "августа", 
		"09" => "сентября", 
		"10" => "октября", 
		"11" => "ноября", 
		"12" => "декабря"
	);
	return $rusMounth[$id];
}