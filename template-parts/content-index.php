<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pozhelaju
 */

?>

<h1>Pozhelaju.ru</h1>
<p class="text-justify">
&nbsp;&nbsp;&nbsp;&nbsp;Мы рады приветствовать Вас на сайте Пожелаю.ру. Посетив наш поздравительный ресурс, Вы всегда сможете найти большой выбор авторских поздравительных текстов. Вы, наверное, согласитесь с нами, что любое праздничное действо, будет более ярким и радостным, и Ваш подарок будет вдвойне приятным, если, вдобавок, к нему будет приложено красивое поздравление в стихах, которое вмещает в себя большое количество различных пожеланий.<br>

&nbsp;&nbsp;&nbsp;&nbsp;Большой выбор интересных, искренних поздравлений Вы с легкостью подберете на Pozhelaju.ru, ведь мы стараемся ни смотря ни на что, удовлетворить все запросы наших посетителей. Каждый праздник в жизни человека должен быть веселым и запоминающимся, будь это трогательные или прикольные поздравления.
</p>
<h2>Виберите категорию</h2>
<div class="row">
	<div class="col-6">
		<div class="card">
		  <h5 class="card-header">Взрослые юбилеи</h5>
		  <div class="card-body">			
			<p class="card-text">
				
				<?php 
					$get_child_cat_params = array(
					    'child_of'      => 1019,
					    'hide_empty' => false,
					);
					$terms = get_terms('category', $get_child_cat_params);
					foreach ( $terms as $term )
					{
					    if($term->parent == 1019)
					    {
					        echo '<a href="'.esc_url( get_category_link( $term->term_id ) ).'" class=" tag-list btn btn-outline-'. get_rand_color() .'  " alt="'.$term->name.'"><strong>'.$term->name.'</strong></a>';
					    }
					}

				 ?>

			</p>
			<a href="<?php echo esc_url( get_category_link( 1019 ) ) ?>" class="btn btn-primary" style="color:#fff">Еще..</a>
		  </div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
		  <h5 class="card-header">Детские юбилеи</h5>
		  <div class="card-body">
			
			<p class="card-text">
				<?php 
					$get_child_cat_params = array(
					    'child_of'      => 979,
					    'hide_empty' => false,
					);
					$terms = get_terms('category', $get_child_cat_params);
					foreach ( $terms as $term )
					{
					    if($term->parent == 979)
					    {
					        echo '<a href="'.esc_url( get_category_link( $term->term_id ) ).'" class=" tag-list btn btn-outline-'. get_rand_color() .'  " alt="'.$term->name.'"><strong>'.$term->name.'</strong></a>';
					    }
					}

				 ?>
			</p>
			<a href="<?php echo esc_url( get_category_link( 979 ) ) ?>" class="btn btn-primary" style="color:#fff">Еще..</a>
		  </div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
		  <h5 class="card-header">С Днем Рождения</h5>
		  <div class="card-body">
			
			<p class="card-text">
				<?php 
					$get_child_cat_params = array(
					    'child_of'      => 1,
					    'hide_empty' => false,
					);
					$terms = get_terms('category', $get_child_cat_params);
					foreach ( $terms as $term )
					{
					    if($term->parent == 1)
					    {
					        echo '<a href="'.esc_url( get_category_link( $term->term_id ) ).'" class=" tag-list btn btn-outline-'. get_rand_color() .'  " alt="'.$term->name.'"><strong>'.$term->name.'</strong></a>';
					    }
					}

				 ?>
			</p>
			<a href="<?php echo esc_url( get_category_link( 1 ) ) ?>" class="btn btn-primary" style="color:#fff">Еще..</a>
		  </div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
		  <h5 class="card-header">Имена</h5>
		  <div class="card-body">
			
			<p class="card-text">
				<?php 
					$get_child_cat_params = array(
					    'child_of'      => 1346,
					    'hide_empty' => false,
					);
					$terms = get_terms('category', $get_child_cat_params);
					$i = 0;
					foreach ( $terms as $term )
					{
					    if($term->parent == 1346)
					    {
					    	if($i < 10)
					    	{
					    		echo '<a href="'.esc_url( get_category_link( $term->term_id ) ).'" class=" tag-list btn btn-outline-'. get_rand_color() .'  " alt="'.$term->name.'"><strong>'.$term->name.'</strong></a>';
					    	}
					    	else {
					    		break;
					    	}
					        $i++;
					    }

					}

				 ?>
			</p>
			<a href="<?php echo esc_url( get_category_link( 1346 ) ) ?>" class="btn btn-primary" style="color:#fff">Еще..</a>
		  </div>
		</div>
	</div>
</div>