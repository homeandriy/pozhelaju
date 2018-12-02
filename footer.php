<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pozhelaju
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info container">
			<div class="row shadow bg-white">
				<!-- Upper Footer -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="upper-footer">
						<div class="row">
							<!-- Social Media -->
							<div class="col-lg-5 col-md-5 col-sm-5 social-media">
								<h4>Мы в соц сетях</h4>
								<ul>
									<li><a href="http://vk.com/club66503088" target="_blank"><img src="https://pozhelaju.ru/wp-content/themes/your-clean-template%20%28RU%29/img/vk.png?x36082" alt="Мы в Контакте"></a></li>
									<li><a href="http://ok.ru/group/52887373676797" target="_blank"><img src="https://pozhelaju.ru/wp-content/themes/your-clean-template%20%28RU%29/img/od.png?x36082" alt="Мы в Одноклассниках"></a></li>
									<li><a href=""><img src="https://pozhelaju.ru/wp-content/themes/your-clean-template%20%28RU%29/img/facebook.png?x36082" alt="" target="_blank"></a></li>
								</ul>
							</div>
							<!-- /Social Media -->
						</div>
					</div>
				</div>
				<!-- /Upper Footer -->
				<!-- Main Footer -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="main-footer">
						© 2012-<?php echo date('Y') ?> Поздравления в стихах – Пожелания любимым. <br>
						<a href="https://pozhelaju.ru/feed">(RSS)</a>
						&nbsp;|&nbsp;При копировании материалов активная ссылка на этот сайт (не закрытая от индексации) обязательна | Соблюдайте закон об авторском праве
					</div>
				</div>
				<!-- /Main Footer -->
				<!-- Lower Footer -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="lower-footer">
						<p class="copyright text-center">Copyright 2015-<?php echo date('Y')?> <a href="https://webbooks.com.ua/portfolio/" rel="nofollow" target="_blank">Andrii Beznosko</a>. All Rights Reserved.</p>
					</div>
					<!-- end of Top100 code -->
				</div>
				<!-- /Lower Footer -->
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="list_holidays" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content ">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalCenterTitle">Календарь празников за год</h5>
		<input type="month" name="date_holiday" value="<?php echo date('Y-m')?>" style="margin-left: 15px;" onChange="openMounth(event)">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body" >
		<div class="checker text-center ">
			<div id="move-mounth-to-end" class="float-left button-to-change-mounth"> << </div>
			- <span id="curr_mounth" class="text-center" ><?php echo date('F'); ?></span> -
			<div id="move-mounth-to-start" class="float-right button-to-change-mounth"> >> </div>
		</div>
		<div id="all_holidays"></div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
		
	  </div>
	</div>
  </div>
</div>


<div id="s-box" class="hide-search-box">
	<button type="button" class="close" aria-label="Close" id="close-search">
		<span aria-hidden="true">&times;</span>
	</button>
	<div  class="search-box" >
		<form action="">
			<input type="text" name="s" id="search">
			<input type="submit" value="Поиск" class="btn btn-info">
		</form>
		<div class="serch-result"></div>
	</div>

</div>


<?php wp_footer(); ?>

</body>
</html>
