<?php
// REGISTER TERM META

add_action( 'init', '___register_term_meta_text' );

function ___register_term_meta_text() {

    register_meta( 'term', '__term_meta_text', '___sanitize_term_meta_text' );
}

// SANITIZE DATA

function ___sanitize_term_meta_text ( $value ) {
    return sanitize_text_field ($value);
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
        <input type="checkbox" name="term_meta_text" id="term-meta-text" value="" class="term-meta-text-field" />
    </div>
<?php }


// ADD FIELD TO CATEGORY EDIT PAGE

add_action( 'category_edit_form_fields', '___edit_form_field_term_meta_text' );

function ___edit_form_field_term_meta_text( $term ) {

    $value  = ___get_term_meta_text( $term->term_id );

    if ( ! $value )
    {
        $value = "false";
        $status_list = '';
    }
    elseif($value == 'on')
    {
        $status_list = 'checked';
    }
         ?>
    <pre>
        <?php var_dump($value);?>
    </pre>
    <h2>dsdsd</h2>
    <tr class="form-field term-meta-text-wrap">
        <th scope="row"><label for="term-meta-text"><?php _e( 'Отображать подкатегории списком', 'text_domain' ); ?></label></th>
        <td>
            <?php wp_nonce_field( basename( __FILE__ ), 'term_meta_text_nonce' ); ?>
            <input type="checkbox" name="term_meta_text" id="term-meta-text" <?php echo $status_list; ?> class="term-meta-text-field"  />
        </td>
    </tr>
<?php }


// SAVE TERM META (on term edit & create)

add_action( 'edit_category',   '___save_term_meta_text' );
add_action( 'create_category', '___save_term_meta_text' );

function ___save_term_meta_text( $term_id ) {

    // verify the nonce --- remove if you don't care
    if ( ! isset( $_POST['term_meta_text_nonce'] ) || ! wp_verify_nonce( $_POST['term_meta_text_nonce'], basename( __FILE__ ) ) )
        return;

    $old_value  = ___get_term_meta_text( $term_id );
    $new_value = isset( $_POST['term_meta_text'] ) ? ___sanitize_term_meta_text ( $_POST['term_meta_text'] ) : '';


    if ( $old_value && '' === $new_value )
        delete_term_meta( $term_id, '__term_meta_text' );

    else if ( $old_value !== $new_value )
        update_term_meta( $term_id, '__term_meta_text', $new_value );
}

// MODIFY COLUMNS (add our meta to the list)

add_filter( 'manage_edit-category_columns', '___edit_term_columns' );

function ___edit_term_columns( $columns ) {

    $columns['__term_meta_text'] = __( 'Отображать списком', 'text_domain' );

    return $columns;
}

// RENDER COLUMNS (render the meta data on a column)

add_filter( 'manage_category_custom_column', '___manage_term_custom_column', 10, 3 );

function ___manage_term_custom_column( $out, $column, $term_id ) {

    if ( '__term_meta_text' === $column ) {

        $value  = ___get_term_meta_text( $term_id );

        if ( ! $value )
            $value = '';

        $out = sprintf( '<span class="term-meta-text-block" style="" >%s</div>', esc_attr( $value ) );
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
        .column-__term_meta_text { background-color:rgb(249, 249, 249); border: 1px solid lightgray;}
        .column-__term_meta_text .term-meta-text-block { display: inline-block; color:darkturquoise; }
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