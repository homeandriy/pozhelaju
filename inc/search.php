<?php 

function search_category($word) {
	global $wpdb;
	$table_terms =  $wpdb->prefix."terms";
	$table_taxonomy =  $wpdb->prefix."term_taxonomy";

	$result  = $wpdb->get_results("SELECT * FROM $table_terms as term  
															JOIN $table_taxonomy as tax ON term.term_id = tax.term_id
															WHERE term.name LIKE '%".trim( $word )."%' AND tax.taxonomy = 'category'");
	if($result) {
		foreach ($result as $cat_param) {
			$cat_param->url = get_category_link($cat_param->term_id);
			// if($cat_param->parent > 1) {
			// 	// $cat_parent = get_category($cat_param->parent);
			// 	$cat_param->parent_info = (array)get_category($cat_param->parent);
			// }

			$url_explode = preg_match_all('/category(.*)'.$cat_param->slug.'/m', $cat_param->url, $return_array, PREG_PATTERN_ORDER);
			if(isset($return_array[1][0])) {
				$all_parent_cat = explode('/', $return_array[1][0]);

				if(is_array($all_parent_cat)) {
					$linl_html = '';
					$i = 0;
					foreach (array_reverse($all_parent_cat) as $slug) {

						if(!empty($slug)) {
							$c = get_category_by_slug($slug);

							$linl_html .= '<a href="'.get_category_link($c->cat_ID).'" clas="link">'.$c->name.'</a> / ';
						}
						
					}
				}
			}
			$cat_param->linksParent = $linl_html;
		}
	}
	else {
		return array('no_result'=> 'Ничего не найдено');
	}

	return $result;
}

function search_post($word) {
	return 'sddad';
}


 ?>
