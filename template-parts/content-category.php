<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pozhelaju
 */

?>
<header class="entry-header sidebar-box-heading beck_color">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->
<div class="wrapper-post single-list-category bootom-border shadow" >
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <?php pozhelaju_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content();
        ?>
        <a href="<?php echo get_the_permalink()?>" class="read-more pull-right">Далее&nbsp;<i class="fa fa-arrow-right"></i></a>
        <!-- <button class="read-more pull-left copy" data-clipboard-target="#post_copy_<?php //echo get_the_ID()?>"><i class="fa fa-clone"></i>&nbsp;Копировать</button> -->

        <br>
        <br>
        <div class="clear"></div>
        <div class="list-group-inline list-group-horizontal">
            <a href="#" class="list-group-item read-more pull-left copy" data-clipboard-target="#post_copy_<?php echo get_the_ID()?>"><i class="fa fa-clone"></i>&nbsp;Копировать</a>
            <a href="#" class="list-group-item" style="padding: 0" id="viber-share-<?php get_the_ID()?>">

                <img width="70" src="<?php echo get_stylesheet_directory_uri(); ?>/img/share/viber.png" >
                <script>
                    var buttonID = "viber-share-<?php get_the_ID()?>";
                    var text = "Ето поздравления для тебя : ";
                    document.getElementById(buttonID)
                        .setAttribute('href', "https://3p3x.adj.st/?adjust_t=u783g1_kw9yml&adjust_fallback=https%3A%2F%2Fwww.viber.com%2F%3Futm_source%3DPartner%26utm_medium%3DSharebutton%26utm_campaign%3DDefualt&adjust_campaign=Sharebutton&adjust_deeplink=" + encodeURIComponent("viber://forward?text=" + encodeURIComponent(text + " <?php echo get_the_permalink(); ?>")));
                </script>
            </a>
            <a href="http://facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>" class="list-group-item" style="padding: 0">
                <img width="70" src="<?php echo get_stylesheet_directory_uri(); ?>/img/share/facebook.png">
            </a>
            <a href="#" class="list-group-item skype-share" data-href='<?php the_permalink(); ?>' data-lang='en-US' data-text='<?php the_title(); ?>' data-style='square' style="padding: 0"><img width="70" src="<?php echo get_stylesheet_directory_uri(); ?>/img/share/skype.png"></a>
            <a href="javascript:window.open('https://telegram.me/share/url?url='+encodeURIComponent('<?php echo get_the_permalink(); ?>'), '_blank')" class="list-group-item" style="padding: 0"><img width="70" src="<?php echo get_stylesheet_directory_uri(); ?>/img/share/telegram.png"></a>
        </div>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">

        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
</div>
