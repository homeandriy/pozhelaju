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
<!doctype html >
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text " href="#content"><?php esc_html_e( 'Skip to content', 'pozhelaju' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="container d-none d-lg-block">
			<div id="search_input">
				<form>
					<input type="search" id="search" name="search" placeholder="Введите что искать">
				</form>
				<div id="ressearch"></div>
			</div>
			<div class="row flex-nowrap justify-content-between align-items-center">
				<div class="col-2 pt-1">
					<ul class="list-inline">
						<li class="list-inline-item top-item">
							<a href="vk.com"><i class="fa fa-vk" aria-hidden="true"></i></a>
						</li>
						<li class="list-inline-item top-item " >
							<a href="vk.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li class="list-inline-item top-item " >
							<a href="ok.ru"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-8 text-center">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="blog-header-logo text-dark"><?php bloginfo( 'name' ); ?></a>
					<?php
					else :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="blog-header-logo text-dark site-title"><?php bloginfo( 'name' ); ?></a>
					<?php
					endif;
					?>
				</div>
				<div class="col-2 d-flex justify-content-end align-items-center">
					<a class="text-muted" href="#" id="open-search">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
					</a>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top d-lg-none container" id="mob_navbar">
			<div class="row">
				<div class="col-1">
					<a href="#menu" class="alert-link"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
				</div>			
				<div class="col-9">
					<a class="navbar-brand mx-auto wrap-logo" href="<?php echo esc_url( home_url( '/' ) );?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() ;?>/img/logo.png" title="<?php echo get_bloginfo('name');?>"></a>
				</div>
				<div class="col-2">
					<a href="#left_panel" class="alert-link" id="right_panel"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
				</div>
			</div>
		</nav>
		<style type="text/css">
			#menu {
				visibility: hidden;
			}
		</style>
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

	</header><!-- #masthead -->


	<div id="r_mob_menu"></div>
	<div id="content" class="site-content">
