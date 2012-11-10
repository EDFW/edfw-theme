<div class="container"> <!-- news and connections -->
	<hr class="hr-yellow front-page-divider" />
	<div class="row home-content-B"> <!-- home-content-B -->
        <div class="span4">
			<h2>Connect with us!</h2>
			<p>
			<a href="<?php echo get_custom_option('fb_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_390_facebook.png" class="home-social home-social-red"/></a>
			<a href="<?php echo get_custom_option('youtube_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_382_youtube.png" class="home-social home-social-orange"/></a>
			<a href="<?php echo get_custom_option('tw_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_391_twitter_t.png" class="home-social home-social-yellow"/></a>
			<a href="<?php echo get_custom_option('pint_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_360_pinterest.png" class="home-social home-social-green"/></a>
			<a href="<?php echo get_custom_option('rss_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_397_rss.png" class="home-social home-social-blue"/></a>
			<a href="<?php echo get_custom_option('contact_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_399_e-mail.png" class="home-social home-social-purple"/></a>
			</p>
			<?php dynamic_sidebar( 'frontb1' ); ?>
        </div>
        <div class="span4">
			<h2>Local Church News</h2>
				<?php 
					// The Query
					$localnews_query = new WP_Query( 'category_name=news' );

					// The Loop
					while ( $localnews_query->have_posts() ) : $localnews_query->the_post(); ?>
					<div>
					<a href="<?php the_permalink(); ?>" class="home-content-item-link"><?php the_title(); ?></a> <?php the_excerpt(); ?></a>
					</div>
			<?php endwhile;

			// Reset Post Data
			wp_reset_postdata();
		?>			
        </div>
        <div class="span4" id="churchnews">
			<?php dynamic_sidebar( 'frontb3' ); ?>
        </div>
    </div>	<!-- /home-content-B -->
</div> <!-- / news and connections -->