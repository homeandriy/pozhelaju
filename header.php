<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pozhelaju
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pozhelaju' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="container">
            <div class="col-lg-12">
                <div class="site-branding text-center">
                    <?php
                    the_custom_logo();
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                    endif;
                    $pozhelaju_description = get_bloginfo( 'description', 'display' );
                    if ( $pozhelaju_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $pozhelaju_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->
            </div>
        </div>
        <?php wp_nav_menu( array(
            'theme_location'  => 'menu-1',
            'container'       => 'nav',
            'container_class' => '',
            'container_id'    => 'menu',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class=" %2$s">%3$s</ul>',
            'depth'           => 0,

        ) ); ?>

<!--        <nav id="menu">-->
<!--            <ul>-->
<!--                <li><a href="#">Home</a></li>-->
<!--                <li><span>About us</span>-->
<!--                    <ul>-->
<!--                        <li><a href="#about/history">History</a></li>-->
<!--                        <li><span>The team</span>-->
<!--                            <ul>-->
<!--                                <li><a href="#about/team/management">Management</a></li>-->
<!--                                <li><a href="#about/team/sales">Sales</a></li>-->
<!--                                <li><a href="#about/team/development">Development</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="#about/address">Our address</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li><a href="#contact">Contact</a></li>-->
<!---->
<!--                <li class="Divider">Other demos</li>-->
<!--                <li><a href="advanced.html">Advanced demo</a></li>-->
<!--                <li><a href="onepage.html">One page demo</a></li>-->
<!--            </ul>-->
<!--        </nav>-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
