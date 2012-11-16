<div id="myCarousel" class="carousel slide content-slider front-content-slider">
	<div class="carousel-inner">
		<!-- show the EC-WELCOME message first, and no matter what -->
		
		<div class="item active">
			<a href="/what-do-episcopalians-believe/"><img src="/assets/ep-church.png" /></a>
		</div>
		<div class="item">
			<a href="/find-a-parish/"><img src="<?php echo get_template_directory_uri(); ?>/images/billboard/find-church-blue.png" /></a>
		</div>
		
		<!-- then show the rest of the feature news if there is any -->
		<?php
			// The Query
			$carousel_query = new WP_Query( 'category_name=front-page-features' );

			// The Loop
			$itemcount = 0;
			while ( $carousel_query->have_posts() ) : $carousel_query->the_post(); ?>
				<?php $itemcount++;
				if ( 1 == $itemcount ) {
					$itemclass = "item"; // originally made the first one "item active" - removed because of added non-post items above
				} else {
					$itemclass = "item";
				} ?>
				<div class="<?php echo $itemclass; ?>">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" /></a>
				</div>
			<?php endwhile;

			// Reset Post Data
			wp_reset_postdata();
		?>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>