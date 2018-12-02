<?php
// REGISTER TERM META

add_action( 'init', '___register_term_meta_text' );

function ___register_term_meta_text() {

	register_meta( 'term', '__term_meta_text', '___sanitize_term_meta_text' );
	register_meta( 'term', '__day_of_holiday', '___sanitize__day_of_holiday' );
}

// SANITIZE DATA

function ___sanitize_term_meta_text ( $value ) {
	return  sanitize_text_field ($value);
}

// GETTER (will be sanitized)

function ___get_term_meta_text( $term_id ) {
  $value = get_term_meta( $term_id, '__term_meta_text', true );
  $value = ___sanitize_term_meta_text( $value );
  return $value;
}

// ADD FIELD TO CATEGORY TERM PAGE

add_action( 'category_add_form_fields', '___add_form_field_term_meta_text' );

function ___add_form_field_term_meta_text() { ?>
	<?php wp_nonce_field( basename( __FILE__ ), 'term_meta_text_nonce' ); ?>
	<div class="form-field term-meta-text-wrap">
		<label for="term-meta-text"><?php _e( 'Отображать подкатегории списком', 'text_domain' ); ?></label>
		<input type="checkbox" name="term_meta_text" id="term-meta-text" value="<?php echo date('2018-m-d')?>" class="term-meta-text-field" />
	</div>
	<div class="form-field term-meta-text-wrap">
		<label for="date_of_holidayterm-meta-text"><?php _e( 'Дата когда проходит праздник', 'text_domain' ); ?></label>
		<input type="date" name="date_of_holiday" id="date_of_holiday" value="<?php echo date('2018-m-d')?>" class="term-meta-text-field" />
	</div>
<?php }


// ADD FIELD TO CATEGORY EDIT PAGE

add_action( 'category_edit_form_fields', '___edit_form_field_term_meta_text' );

function ___edit_form_field_term_meta_text( $term ) {

	$value  = ___get_term_meta_text( $term->term_id );
	$date   = get_term_meta( $term->term_id, '__day_of_holiday', true );

	if(!$date)
	{
		$date = '2018-01-00';
	}
	else {
		$formatdate = new DateTime($date);
		$date = $formatdate->format('Y-m-d');
	}

	if ( ! $value )
	{
		$value = "false";
		$status_list = 'Не отображать списком';
	}
	elseif($value == 'on')
	{
		$status_list = 'checked';
	}
	?>
	<tr class="form-field term-meta-text-wrap">
		<th scope="row"><label for="term-meta-text"><?php _e( 'Отображать подкатегории списком', 'text_domain' ); ?></label></th>
		<td>
			<?php wp_nonce_field( basename( __FILE__ ), 'term_meta_text_nonce' ); ?>
			<input type="checkbox" name="term_meta_text" id="term-meta-text" <?php echo $status_list; ?> class="term-meta-text-field"  />
		</td>
		<td>
			<div class="form-field term-meta-text-wrap">
				<label for="date_of_holiday"><?php _e( 'Дата когда проходит праздник', 'text_domain' ); ?></label>
				<input type="date" name="date_of_holiday" id="date_of_holiday" value="<?php echo $date; ?>" class="term-meta-text-field" />
				<small>Тут буде автоматом підтягуватись 2018 рік, так як при цьому на сайті проходить правильна фільтрація, У випадку якщо було поставлено інший рік, а після збереження показадо 2018 рік, то паніку здіймати не потрібно, ВСЕ ДОБРЕ!!!</small>
			</div>
		</td>
	</tr>
<?php }


// SAVE TERM META (on term edit & create)

add_action( 'edit_category',   '___save_term_meta_text' );
add_action( 'create_category', '___save_term_meta_text' );

function ___save_term_meta_text( $term_id ) {

  
	// verify the nonce --- remove if you don't care
	// if ( ! isset( $_POST['term_meta_text_nonce'] ) || ! wp_verify_nonce( $_POST['term_meta_text_nonce'], basename( __FILE__ ) ) )
	//     return;

	$old_value  = ___get_term_meta_text( $term_id );
	$new_value = isset( $_POST['term_meta_text'] ) ? ___sanitize_term_meta_text ( $_POST['term_meta_text'] ) : '';


	if ( $old_value && '' === $new_value )
		delete_term_meta( $term_id, '__term_meta_text' );

	else if ( $old_value !== $new_value )
		update_term_meta( $term_id, '__term_meta_text', $new_value );

	$new_date = isset( $_POST['date_of_holiday'] ) ?  $_POST['date_of_holiday'] : '';

	if(!empty($new_date) ) {
		$formatdate = new DateTime($new_date);
		$mounth = date('m', strtotime($new_date));
		$day    = date('d', strtotime($new_date));


		// Можливо нова дата прийде не з міткою 2018 року, тому
		// Забираємо місяць і день і формуємо нову дату у 2018 році
		// Не самий нормальний метод, но діючий

		$new_date = new DateTime('2018-'.$mounth.'-'.$day);
		// error_log(serialize($new_date->format('Y-m-d')));
		$date_old  = get_term_meta( $term_id, '__day_of_holiday', true );
		
		if ( !empty($new_date) and $date_old !== $new_date->format('Y-m-d') )
			update_term_meta( $term_id, '__day_of_holiday', $new_date->format('Y-m-d') );
	}
}

// MODIFY COLUMNS (add our meta to the list)

add_filter( 'manage_edit-category_columns', '___edit_term_columns' );

function ___edit_term_columns( $columns ) {

	$columns['__term_meta_text'] = __( 'Отображать списком', 'text_domain' );
	$columns['__day_of_holiday'] = __( 'Дата празника', 'text_domain' );

	return $columns;
}

// RENDER COLUMNS (render the meta data on a column)

add_filter( 'manage_category_custom_column', '___manage_term_custom_column', 10, 3 );

function ___manage_term_custom_column( $out, $column, $term_id ) {

	if ( '__term_meta_text' === $column ) {

		$value  = ___get_term_meta_text( $term_id );

		if ( ! $value )
			$value = 'Не отображать';

		$out = sprintf( '<span class="term-meta-text-block" style="" >%s</div>', esc_attr( $value ) );
	}

	if ( '__day_of_holiday' === $column ) {

		$date  = get_term_meta( $term_id, '__day_of_holiday', true );

		if ( ! $date ) {
			$date = '00:00:00';
		}
		else {
			$formatdate = new DateTime($date);
			$date = $formatdate->format('d.m');
		}

		$out .= sprintf( '<span class="term-meta-text-block" style="" >%s</div>', esc_attr( $date ) );
	}

	return $out;
}

// ADD JAVASCRIPT & STYLES TO COLUMNS

add_action( 'admin_enqueue_scripts', '___admin_enqueue_scripts' );

function ___admin_enqueue_scripts( $hook_suffix ) {

	if ( 'edit-tags.php' !== $hook_suffix || 'category' !== get_current_screen()->taxonomy )
		return;

	// ADD YOUR SUPPORTING CSS / JS FILES HERE
	// wp_enqueue_style( 'wp-color-picker' );
	// wp_enqueue_script( 'wp-color-picker' );

	add_action( 'admin_head',   '___meta_term_text_print_styles' );
	add_action( 'admin_footer', '___meta_term_text_print_scripts' );
}

// PRINT OUR CUSTOM STYLES

function ___meta_term_text_print_styles() { ?>

	<style type="text/css">
		.column-__term_meta_text { background-color:rgb(256, 256, 256);}
		.column-__term_meta_text .term-meta-text-block { display: inline-block; }
		.__day_of_holiday { font-size: 35px!important; }
	</style>
<?php }

// PRINT OUR CUSTOM SCRIPTS

function ___meta_term_text_print_scripts() { ?>

	<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			 $input_field = $( '.term-meta-text-field' );
			 // console.log($input_field); // your input field
		} );
	</script>
<?php }