<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pozhelaju
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main container">
            <div class="row">
                <div class="col-sm-3"><?php  get_sidebar('Menu'); ?></div>
                <div class="col-sm-6">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', get_post_type() );


                    endwhile; // End of the loop.
                    pagination();
                    ?>
                </div>
                <div class="col-sm-3"><?php  get_sidebar('Sidebar'); ?></div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php

get_footer();
