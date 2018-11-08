<?php

?>
<section>
	<div class="wrapper-post" >
		<div class="wrapper-post single-list-category bootom-border shadow">
			<?php if (has_tag()): ?>
				<h5 class="tags">Теги : <?php the_tags('');?></h5>
			<?php endif ?>			
			<h5 class="category">Категории : <?php the_category(', '); ?></h5>
		</div>
	</div>
</section>
