<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pozhelaju
 */

get_header();

$get_child_cat_params = array(
    'child_of'      => get_queried_object()->cat_ID,
    'hide_empty' => false,
);
$terms = get_terms('category', $get_child_cat_params);
$status_list = get_term_meta( get_queried_object()->term_id, '__term_meta_text', true );
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main container">
            <div class="row">
                <div class="col-lg-3  d-none d-lg-block"><?php  get_template_part('template-parts/menu', 'global') ?></div>
                <div class="col-lg-6 col-sm-12 col-xs-12 main-content">
                    <section class="" >
                        <div class="wrapper-post single-list-category bootom-border shadow" >
                            <?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }?>
                        </div>
                    </section>
                    <?php if (sizeof($terms)>0 and $status_list != 'on') : ?>
                        <section class="" >
                            <div class="wrapper-post single-list-category bootom-border shadow" >
                                <?php
                                foreach ( $terms as $term )
                                {
                                    if($term->parent == get_queried_object()->cat_ID)
                                    {
                                        echo '<a href="'.esc_url( get_category_link( $term->term_id ) ).'" class=" tag-list btn btn-outline-'. get_rand_color() .'  " alt="'.$term->name.'"><strong>'.$term->name.'</strong></a>';

                                    }
                                }
                                ?>
                            </div>
                        </section>
                    <?php elseif(sizeof($terms)>0 and $status_list == 'on') : ?>
                        <div class="row">
                            <?php
                            foreach ( $terms as $term )
                            {
                                if($term->parent == get_queried_object()->cat_ID)
                                {
                                    ?>
                                    <div class="col-sm-12">
                                        <div class="card text-white bg-<?php echo get_rand_color() ?>" >
                                            <div class="card-header">
                                                <?php echo $term->name;?>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"><?php echo category_description($term->term_id )?></p>
                                                <a href="<?php echo esc_url( get_category_link( $term->term_id ) )?>" class=" text-white card-link btn btn-outline-<?php echo get_rand_color() ?>">Открыть раздел</a>

                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty(category_description())):?>
                        <section class="" >
                            <div class="wrapper-post single-list-category bootom-border shadow" >
                                <h2><?php echo get_queried_object()->name;?></h2>
                                <?php echo category_description()?>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php if($status_list != 'on') : ?>
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'category' );


                        endwhile; // End of the loop.

                        ?>

                        <?php pagination();?>
                    <?php endif; ?>

                </div>
                <div class="col-lg-3  d-none d-lg-block"><?php  get_sidebar(); ?></div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php

get_footer();
