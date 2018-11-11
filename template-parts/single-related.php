<?php 
global $post;
 ?>
 <section>
	<div class="wrapper-post" >
		<div class="wrapper-post single-list-category bootom-border shadow">
			<?php 
			$category = get_ordered_cat ();
			if( is_array($category) and isset($category[0]) ) {
				echo "<h2>Еще с раздела : ".$category[0]->name."</h2>";
				$args_query  = array(
					'cat' => $category[0]->term_id
				);
				$query = new WP_Query($args_query );
				while ( $query->have_posts() ) {
					$query->the_post();

					echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a><br>';
					echo "<hr>";
				}
				wp_reset_postdata();
			}


			if( is_array($category) and isset($category[1]) ) {
				
				$get_child_cat_params = array(
				    'child_of'      => $category[1]->term_id,
				    'hide_empty' => false,
				);
				$terms = get_terms('category', $get_child_cat_params);
				if(!empty($terms))
				{
					echo "<h2>Еще с раздела : ".$category[1]->name."</h2>";
					foreach ($terms as  $term) {
						if($term->parent == $category[1]->term_id)
						{
							echo '<a href="'.esc_url( get_category_link( $term->term_id ) ).'" class=" tag-list btn btn-outline-'. get_rand_color() .'  " alt="'.$term->name.'"><strong>'.$term->name.'</strong></a>';
						}
					}
				}
			}


			if( is_array($category) and isset($category[2])  and $category[2]->term_id != $category[1]->term_id) {
				
				$get_child_cat_params = array(
				    'child_of'      => $category[2]->term_id,
				    'hide_empty' => false,
				);
				$terms = get_terms('category', $get_child_cat_params);
				if(!empty($terms))
				{
					echo "<h2>Еще с раздела : ".$category[2]->name."</h2>";
					foreach ($terms as  $term) {
						if($term->parent == $category[2]->term_id)
						{
							echo '<a href="'.esc_url( get_category_link( $term->term_id ) ).'" class=" tag-list btn btn-outline-'. get_rand_color() .'  " alt="'.$term->name.'"><strong>'.$term->name.'</strong></a>';
						}
						
					}
				}
			}
			?>
		</div>
	</div>
</section>
