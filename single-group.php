<?php
/**
 * The Template for displaying all single group.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div class="container"> <!-- container for main content and sidebar -->
	<?php if ( have_posts() ) : ?>
	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php $edfw_post = new EDFWPost( $post->ID ); ?>
	<?php
		$short_title = get_post_meta( $post->ID, 'short-name', TRUE );
		if ( $short_title == '' ) {
			$short_title = get_the_title();
		}
	?>
	<div class="row"> <!-- row for main content and sidebar -->
		<div class="span8"> <!-- main content column -->
			<div class="single-post">
			
						<!-- <?php include 'edfw-featured-content-display.php'; ?> -->
						<div class="page-header">
							<h1><?php the_title(); ?></h1>
						</div>
						<div>
							<div class="row"> <!-- post content below images -->
								<div class="span5"> <!-- map -->
									<?php include 'edfw-group-map-display.php'; ?>
									<?php if ($lat == '') {
										the_content();
									}
									?>
								</div>
								<div class="span3"> <!-- contact and people -->
									<div class="test">
										<?php echo $secondary_img; ?>
									</div>
									<?php if ($lat == '') {
										//get connected people
											$people = new WP_Query( array(
												'connected_type'	=>	'diocesan_roles',
												'connected_items'	=>	get_queried_object(),
												'nopaging'			=>	true,
											));
										//display connected people
											if ( $people -> have_posts() ) { ?>
												<div class="group-people">
														<h3>Members</h3>
														<?php while ( $people->have_posts() ) : $people->the_post(); ?>
															<span class="connected-person"><span class="person-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span> <span class="person-role"><?php echo p2p_get_meta( $post->p2p_id, 'role', true ); ?></span></span><br/>
														<?php endwhile; ?>
														<?php wp_reset_postdata(); ?>
												</div> <!-- /group people -->
											<?php 	}
									} ?>
									<?php $services = get_post_meta( $post->ID, 'parish_schedule', TRUE );
										if ( !empty($services) ) { ?>
											<div>
												<h3>Service Times</h3>
													<dl>
														<?php foreach ( $services as $service ) { ?>
															<dt><?php echo $service['service-title']; ?></dt>
															<dd class="service-time"><?php echo $service['day-of-week']." ".$service['time-of-service'];?></dd>
															<dd class="service-description"><?php echo $service['service-description']; ?></dd>
														<?php } ?>
													</dl>
											</div>
										<?php } ?>
									<div class="group-contact">
										<!--<?php echo get_post_meta($post->ID, 'physical-address-label', true); ?><br /> 
										<?php echo get_post_meta($post->ID, 'physical-street-address', true) ?><br />
										<?php echo get_post_meta($post->ID, 'physical-address-city', true). ', ' . get_post_meta($post->ID, 'physical-address-state', true). ' ' . get_post_meta($post->ID, 'physical-address-zip', true); ?>-->
									</div> <!-- /group-contact -->
									
								</div> <!-- / contact and people -->
							</div> <!-- / post content below images -->
							<div class="row"> <!-- related posts -->
								<div class="span8 post-list">
								<?php
									//get connected posts
										$group_news = new WP_Query( array(
											'connected_type'	=>	'post_group_relevance',
											'connected_items'	=>	get_queried_object(),
											'nopaging'			=>	true,
										));
										//display connected posts
										if ( $group_news -> have_posts() ) { ?>
											<br/>
											<h2>News and Stories from <?php echo $short_title; ?></h2>
											<?php while ( $group_news->have_posts() ) : $group_news->the_post(); ?>
												<div>
													<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<div><?php the_excerpt(); ?></div>
												</div>
											<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
										<?php } ?>
								</div>
							</div><!-- /related-posts -->
						</div>
				
			</div> <!-- post-list -->
		</div> <!-- /main content column -->
		<?php if ( $lat != '' ) { ?>
		<div class="span4 group-sidebar"> <!-- sidebar column -->
			<div class="well"> <!-- sidebar well -->
				<aside class="widget widget-text">
					<h3 class="widget-title">About <?php echo $short_title; ?></h3>
					<?php the_content(); ?>
					<!-- <?php $edfw_post->display_featured_content(); ?> -->
					<!-- <?php $edfw_post->display_secondary_content( true ); ?> -->
				</aside>
			</div> <!-- /sidebar well -->
			<?php
				//get connected people
				$people = new WP_Query( array(
					'connected_type'	=>	'diocesan_roles',
					'connected_items'	=>	get_queried_object(),
					'nopaging'			=>	true,
				));
				//display connected people
				if ( $people -> have_posts() ) { ?>
					<div class="well"> <!-- sidebar well -->
						<div class="group-people">
							<h3>People of <?php echo $short_title; ?></h3>
								<?php while ( $people->have_posts() ) : $people->the_post(); ?>
									<span class="connected-person"><span class="person-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span> <span class="person-role"><?php echo p2p_get_meta( $post->p2p_id, 'role', true ); ?></span></span><br/>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
						</div> <!-- /group people -->
					</div> <!-- /sidebar well -->
			<?php 	} ?>			
		</div> <!-- / sidebar column -->
		<?php } else { ?>
			<div class="span4"> <!-- sidebar column -->
				<div class="well"> <!-- sidebar well -->
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div> <!-- /sidebar well -->
			</div> <!-- / sidebar column -->
		<?php } ?>
	</div>	 <!-- /row for main content and sidebar -->
	<?php endwhile; ?>
	<?php endif; ?>
</div> <!-- /container for main content and sidebar --> 


<?php include 'news-and-connections.php'; ?>
<?php get_footer(); ?>