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

        <div class="entry-content">
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
