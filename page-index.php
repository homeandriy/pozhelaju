<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pozhelaju
 * Template Name: Главная
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <main id="main" class="site-main container">
                <div class="row">
                    <div class="col-lg-3  d-none d-lg-block"><?php  get_template_part('template-parts/menu', 'global') ?></div>
                    <div class="col-lg-9 col-sm-12 col-xs-12 main-content">
                        <section class="" itemscope itemtype="http://schema.org/Article" >
                            <div class="wrapper-post single-list-category bootom-border shadow" >
                                <?php if(function_exists('bcn_display'))
                                {
                                    bcn_display();
                                }?>
                            </div>
                        </section>
                        <section <?php post_class()?> itemscope itemtype="http://schema.org/Article" >
                            <div class="wrapper-post" >
                                <?php
                                while ( have_posts() ) :
                                    the_post();

                                    get_template_part( 'template-parts/content', 'page' );

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;

                                endwhile; // End of the loop.
                                ?>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
