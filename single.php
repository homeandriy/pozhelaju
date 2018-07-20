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
                <div class="col-lg-3 hidden-sm hidden-xs"><?php  get_template_part('template-parts/menu', 'global') ?></div>
                <div class="col-lg-6 main-content">
                    <section class="" itemscope itemtype="http://schema.org/Article" >
                        <div class="wrapper-post single-list-category bootom-border shadow" >
                            <?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }?>
                        </div>
                    </section>
                    <section class="" itemscope itemtype="http://schema.org/Article" >
                        <div class="wrapper-post single-list-category bootom-border shadow" >
                            <?php
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content', get_post_type() );

                                the_post_navigation();

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 hidden-sm hidden-xs"><?php  get_sidebar(); ?></div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
