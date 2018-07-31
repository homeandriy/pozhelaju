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
                <div class="col-lg-3  d-none d-lg-block"><?php  get_template_part('template-parts/menu', 'global') ?></div>
                <div class="col-lg-6 col-sm-12 col-xs-12 main-content">
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

                                get_template_part( 'template-parts/content', get_post_type() );
                            endwhile; // End of the loop.
                            ?>
                        </div>
                    </section>
                    <?php get_template_part('templates/single', 'tags')?>
                    <?php get_template_part('templates/single', 'related')?>
                </div>
                <div class="col-lg-3  d-none d-lg-block"><?php  get_sidebar(); ?></div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
