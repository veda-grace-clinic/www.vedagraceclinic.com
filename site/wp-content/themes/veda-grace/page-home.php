<?php get_header();?>
    <!-- Cosmetic Care Section -->
    <section class="cosmetic-care">
        <div class="container">
            <div class="content text-center">
                <h2><?php the_field('main_title');?></h2>
                <p><?php the_field('main_description');?></p>
                <img src="<?php echo get_field('main_image')['url'];?>" alt="<?php echo get_field('main_image')['alt'];?>" class="img-fluid">
            </div>
        </div>
    </section>
    <!-- // Cosmetic Care Section -->
    <!-- Virtual and Concierge -->
    <section class="virtual-concierge">
        <div class="container">
            <div class="row">
            	<?php
            	$args = array(  
			       'post_type' => 'home_banners',
			       'post_status' => 'publish'
			   );

			   $loop = new WP_Query( $args );
			     
			   while ( $loop->have_posts() ) : $loop->the_post();?>
	                <div class="col-sm-12 col-md-6">
	                    <div class="virtual text-center">
	                        <h3><?php the_field('h_s_title');?></h3>
	                        <p><?php the_field('h_s_description');?></p>
	                        <a href="<?php the_field('Button_link');?>"><?php the_field('Button_text');?></a>
	                        <div class="img">
	                            <img src="<?php echo get_field('h_s_image')['url'];?>" alt="<?php echo get_field('h_s_image')['alt'];?>" class="img-fluid">
	                        </div>
	                    </div>
	                </div>
			   <?php
				endwhile;
			   wp_reset_postdata();
            	?>
            </div>
        </div>
    </section>
    <!-- // Virtual and Concierge -->
    <!-- How it works Section -->
    <section class="how-it-works text-center">
        <div class="container">
            <h2>How it works</h2>
            	<?php
            	$args = array(  
			       'post_type' => 'home_steps',
			       'post_status' => 'publish',
			       'order' => 'ASC'
			   );

			   $loop = new WP_Query( $args );
			     
			   while ( $loop->have_posts() ) : $loop->the_post();?>
	                <div class="step">
		                <h3><?php the_field('step_title');?></h3>
		                <p><?php the_field('step_description');?></p>
		            </div>
			   <?php
				endwhile;
			   wp_reset_postdata();
            	?>
            <div class="home-services">
                <div class="row">
	            	<?php
	            	$args = array(  
				      	'post_type' => 'home_services',
				      	'post_status' => 'publish',
			      		'order' => 'ASC'
				   	);

				   $loop = new WP_Query( $args );
				     
				   while ( $loop->have_posts() ) : $loop->the_post();?>
				   		<div class="col-sm-12 col-md-4">
	                        <div class="item">
	                            <img src="<?php echo get_field('service_image')['url'];?>" alt="<?php echo get_field('service_image')['alt'];?>" class="img-fluid">
	                            <h3><?php the_field('service_title');?></h3>
	                            <p><?php the_field('service_description');?></p>
	                        </div>
	                    </div>
				   <?php
					endwhile;
				   wp_reset_postdata();
	            	?>
                </div>
            </div>
        </div>
    </section>
    <!-- // How it works Section -->
    <!-- Simple and effective Section -->
    <section class="simple-effective">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center">
                        <div class="description">
                            <h2><?php the_field('simple_title');?></h2>
                            <p><?php the_field('simple_description');?></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="images d-flex align-items-start justify-content-between">
                            <div class="img text-center">
                                <img src="<?php echo get_field('simple_before_image')['url'];?>" alt="<?php echo get_field('simple_before_image')['alt'];?>" class="img-fluid">
                                <span><?php the_field('simple_before_text');?></span>
                            </div>
                            <div class="img text-center">
                                <img src="<?php echo get_field('simple_after_image')['url'];?>" alt="<?php echo get_field('simple_after_image')['alt'];?>" class="img-fluid">
                                <span><?php the_field('simple_after_text');?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Simple and effective Section -->
    <!-- Invitation Section -->
    <section class="invitaion">
        <div class="container">
            <div class="content d-flex align-items-center justify-content-between">
                <div class="desc">
                    <h3><?php the_field('invitation_title');?></h3>
                    <p><?php the_field('invitation_description');?></p>
                </div>
                <div class="link">
                    <a href="<?php the_field('invitation_button_link');?>" class="invite"><?php the_field('invitation_button_text');?></a>
                </div>
            </div>
        </div>
    </section>
    <!-- // Invitation Section -->
    <!-- Waitlist Section -->
    <section class="waitlist">
        <div class="container">
            <div class="content">
                <h2><?php the_field('waitlist_title');?></h2>
                <p><?php the_field('waitlist_description');?></p>
                <div class="form">
                    <?php echo do_shortcode('[contact-form-7 id="127" title="Waitlist Form"]')?>
                </div>
            </div>
        </div>
    </section>
    <!-- // Waitlist Section -->




<?php get_footer();?>