<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package veda-grace
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
<!-- Header -->
    <header class="position-relative">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo-menu d-flex align-items-center">
                <a href="index.html" class="logo"><?php the_field('logo',5);?></a>
                <?php wp_nav_menu( array(
                	'theme_location'  => 'Main Menu',
                	'menu'            => 'main-menu',
                	'container'       => 'ul',
                	'menu_class'      => 'menu list-unstyled',
                	'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
                ) );?>
            </div>
            <?php wp_nav_menu( array(
            	'theme_location'  => 'Secondary Menu',
            	'menu'            => 'secondary-menu',
            	'container'       => 'ul',
            	'menu_class'      => 'secondary-menu list-unstyled',
            	'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
            ) );?>
            <a href="" class="mobile-button">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <?php wp_nav_menu( array(
            	'theme_location'  => 'Main Menu',
            	'menu'            => 'main-menu',
            	'container'       => 'ul',
            	'menu_class'      => 'mobile-menu',
            	'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
            ) );?>
        </div>
    </header>
    <!-- // Header -->