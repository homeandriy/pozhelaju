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
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


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
                <button class="read-more pull-left copy" data-clipboard-target="#post_copy_<?php echo get_the_ID()?>"><i class="fa fa-clone"></i>&nbsp;Копировать</button>
            </div>
            <div class="ad">
                <?php get_template_part('advertising/ad-single_bottom_post')?>
            </div>
        </div><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer">
                <?php
                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Edit <span class="screen-reader-text">%s</span>', 'pozhelaju' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
