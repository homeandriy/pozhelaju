<?php
/**
 * Template part for displaying menu in main site
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pozhelaju
 */
?>

<div class="hidden-xs sticky-menu"><!-- Categories -->
    <div class="row sidebar-box purple">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="sidebar-box-heading">
                <h4>
                    <a href="#menu"><i class="fa fa-bars" aria-hidden="true"></i> Меню</a>
                </h4>
            </div>
            <div class="sidebar-box-content">
                <div id="mn-wrapper">
                    <div class="mn-sidebar">
                        <div class="mn-toggle"><i class="fa fa-bars"></i></div>
                        <div class="mn-navblock">
                            <?php wp_nav_menu( array(
                                'theme_location'  => 'menu-1',
                                'container'       => 'div',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="mn-vnavigation %2$s">%3$s</ul>',
                                'depth'           => 0,
                                'walker'          => new bootstrap_menu,
                            ) ); ?>
<!--                            <ul class="mn-vnavigation">-->
<!--                                <li class="dropdown-submenu active">-->
<!--                                    <a tabindex="-1" href="#">Client Advice</a>-->
<!--                                    <ul class="dropdown-menu">-->
<!--                                        <li><a tabindex="-1" href="#">Pre-advice</a></li>-->
<!--                                        <li><a href="#">Strategy & Technical</a></li>-->
<!--                                        <li><a href="#">Research</a></li>-->
<!--                                        <li class="dropdown-submenu active">-->
<!--                                            <a href="#">APL & Products</a>-->
<!--                                            <ul class="dropdown-menu parent">-->
<!--                                                <li style=" border-bottom: 1px solid #ccc;">-->
<!--                                                    <a href="#">Approved Product List-->
<!--                                                        <span aria-hidden="true" class="glyphicon glyphicon-plus pull-right"></span>-->
<!--                                                        <span aria-hidden="true" class="glyphicon glyphicon-minus pull-right" style="display:none;"></span>-->
<!--                                                    </a>-->
<!--                                                    <ul class="child">-->
<!--                                                        <li style="padding:10px 15px; color:white;">Platforms</li>-->
<!--                                                        <li style="padding: 10px 15px; color:white;">Managed Funds</li>-->
<!--                                                        <li style="padding: 10px 15px; color:white;">Wealth Protection</li>-->
<!--                                                        <li style="padding: 10px 15px; color:white;">Listed Securities</li>-->
<!--                                                        <li style="padding: 10px 15px; color:white;">Wealth Protection</li>-->
<!--                                                        <li style="padding: 10px 15px; color:white;">Listed Securities</li>-->
<!--                                                        <li style="padding: 10px 15px; color:white;">Listed Securities</li>-->
<!--                                                    </ul>-->
<!--                                                </li>-->
<!--                                                <li style=" border-bottom: 1px solid #ccc;"><a href="#">Model Portfolios</a></li>-->
<!--                                                <li style=" border-bottom: 1px solid #ccc;"><a href="#">Non-approved Products</a></li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                        <li><a href="#">Implementation</a></li>-->
<!--                                        <li><a href="#">Review</a></li>-->
<!--                                        <li><a href="#">Execution Only</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li><a href="#">Personal Development</a></li>-->
<!--                                <li><a href="#">Practice</a></li>-->
<!--                                <li><a href="#">News</a></li>-->
<!--                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
