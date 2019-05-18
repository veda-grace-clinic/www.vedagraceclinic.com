<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package veda-grace
 */

?>

	
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="content">
                <div class="content-top">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="social-blog">
                                <ul class="list-unstyled">
                                    <li><a href="<?php the_field('facebook_link',5);?>"><img src="<?php echo get_field('facebook_logo',5)['url'];?>" alt="<?php echo get_field('facebook_logo',5)['alt'];?>"></a></li>
                                    <li><a href="<?php the_field('instagram_link',5);?>"><img src="<?php echo get_field('instagram_logo',5)['url'];?>" alt="<?php echo get_field('instagram_logo',5)['alt'];?>"></a></li>
                                </ul>
					            <?php wp_nav_menu( array(
					            	'theme_location'  => 'Footer Menu One',
					            	'menu'            => 'Footer-Menu-One',
					            	'container'       => 'ul',
					            	'menu_class'      => 'list-unstyled',
					            	'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
					            ) );?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="footer-menu-two">
					            <?php wp_nav_menu( array(
					            	'theme_location'  => 'Footer Menu Two',
					            	'menu'            => 'Footer-Menu-Two',
					            	'container'       => 'ul',
					            	'menu_class'      => 'list-unstyled',
					            	'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
					            ) );?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="footer-menu-three">
					            <?php wp_nav_menu( array(
					            	'theme_location'  => 'Footer Menu Three',
					            	'menu'            => 'Footer-Menu-Three',
					            	'container'       => 'ul',
					            	'menu_class'      => 'list-unstyled',
					            	'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
					            ) );?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="footer-menu-four">
					            <?php wp_nav_menu( array(
					            	'theme_location'  => 'Footer Menu Four',
					            	'menu'            => 'Footer-Menu-Four',
					            	'container'       => 'ul',
					            	'menu_class'      => 'list-unstyled',
					            	'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
					            ) );?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-bottom">
                    <p><?php the_field('copyright',5)?></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- // Footer -->

<?php wp_footer(); ?>

</body>
</html>
