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
