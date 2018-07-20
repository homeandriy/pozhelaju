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
        <button class="read-more pull-left copy" data-clipboard-target="#post_copy_9654"><i class="fa fa-clone"></i>&nbsp;Копировать</button>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">

        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
</div>
