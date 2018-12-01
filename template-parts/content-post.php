<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pozhelaju
 */

?>
<header class="entry-header sidebar-box-heading beck_color ">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->
<div class="wrapper-post single-list-category bootom-border shadow" >
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-content'); ?>>


        <?php pozhelaju_post_thumbnail(); ?>

        <div class="entry-content" data-attrid="<?php echo get_the_ID(); ?>">
            <!-- тут код для виїзду блока соціального  -->
            <?php if( !wp_is_mobile() ): ?>
                <div class="shqre-block square-<?php echo get_the_ID(); ?>" >
            <?php else: ?>
                <div class="shqre-block-mobile square-<?php echo get_the_ID(); ?>" >
             <?php endif; ?> 
                    <a href="#" class="share-button" id="viber-share-<?php get_the_ID()?>">

                        <img  src="<?php echo get_stylesheet_directory_uri(); ?>/img/share/viber.png" >
                        <script>
                            var buttonID = "viber-share-<?php get_the_ID()?>";
                            var text = "Ето поздравления для тебя : ";
                            document.getElementById(buttonID)
                                .setAttribute('href', "https://3p3x.adj.st/?adjust_t=u783g1_kw9yml&adjust_fallback=https%3A%2F%2Fwww.viber.com%2F%3Futm_source%3DPartner%26utm_medium%3DSharebutton%26utm_campaign%3DDefualt&adjust_campaign=Sharebutton&adjust_deeplink=" + encodeURIComponent("viber://forward?text=" + encodeURIComponent(text + " <?php echo get_the_permalink(); ?>")));
                        </script>
                    </a>
                    <a href="http://facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>" class="share-button">
                        <img  src="<?php echo get_stylesheet_directory_uri(); ?>/img/share/facebook.png">
                    </a>
                    <a href="javascript:window.open('https://telegram.me/share/url?url='+encodeURIComponent('<?php echo get_the_permalink(); ?>'), '_blank')" class="" style="padding: 0; display: block; width:40px"><img  src="<?php echo get_stylesheet_directory_uri(); ?>/img/share/telegram.png"></a>
                </div>

            <!-- тут код для виїзду блока соціального  -->
            <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pozhelaju' ),
                'after'  => '</div>',
            ) );
            ?>
            <div class="advance_meta">
                <button class="read-more copy" data-clipboard-target="#post_copy_<?php echo get_the_ID()?>"><i class="fa fa-clone"></i>&nbsp;Копировать</button>
            </div>
            <div class="ad">
                <?php get_template_part('advertising/ad-single_bottom_post') //розширена реклама?>
            </div>
        </div><!-- .entry-content -->        
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
