<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pozhelaju
 */
get_header();
?>
    <div id="primary" class="content-area">
		<main id="main" class="site-main container">
            <div class="row">
                <div class="col-lg-3  d-none d-lg-block"><?php  get_template_part('template-parts/menu', 'global') ?></div>
                <div class="col-lg-6 col-sm-12 col-xs-12 main-content" style="    background-color: #fff;
    border: 1px solid #ccc;
    -webkit-box-shadow: 0 4px 11px 0 rgba(50,50,50,0.36);
    -moz-box-shadow: 0 4px 11px 0 rgba(50,50,50,0.36);
    box-shadow: 0 4px 11px 0 rgba(50,50,50,0.36);">
                    <?php
                    if (is_home()) 
                    {
                    	get_template_part( 'template-parts/content', 'index' );
                    }
                    else
                    {

	                    if ( have_posts() ) :
	                        if ( is_home() && ! is_front_page() ) :
	                            ?>
	                            <header>
	                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
	                            </header>
	                            <?php
	                        endif;
	                        /* Start the Loop */
	                        while ( have_posts() ) :
	                            the_post();
	                            /*
	                             * Include the Post-Type-specific template for the content.
	                             * If you want to override this in a child theme, then include a file
	                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
	                             */
	                            get_template_part( 'template-parts/content', 'index' );

	                        endwhile;

	                        the_posts_navigation();

	                    else :

	                        get_template_part( 'template-parts/content', 'none' );

	                    endif;
	                }
                    ?>
                </div>
                <div class="col-lg-3  d-none d-lg-block"><?php  get_sidebar(); ?></div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
