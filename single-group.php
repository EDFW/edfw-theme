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
	<div class="row"> <!-- row for main content and sidebar -->
		<div class="span8"> <!-- main content column -->
			<div class="single-post">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
						<?php include 'edfw-featured-content-display.php'; ?>
						<div class="page-header">
							<h1><?php the_title(); ?></h1>
						</div>
						<div>
							
							<?php include 'post-image-gallery.php'; ?>
							<div class="row"> <!-- post content below images -->
								<div class="span5"> <!-- service schedule and about -->
								<?php include 'edfw-group-map-display.php'; ?>
								<div class="post-content">
								<?php the_content();?>
								</div>
								<?php $services = get_post_meta( $post->ID, 'parish_schedule', TRUE );
										if ( !empty($services) ) { ?>
											<h2>Weekly Schedule</h2>
												<?php foreach ( $services as $service ) { ?>
													<h3><?php echo $service['service-title']; ?></h3>
													<p class="service-time"><?php echo $service['day-of-week']." ".$service['time-of-service'];?></p>
													<p class="service-description"><?php echo $service['service-description']; ?></p>
												<?php } ?>
										<?php } ?>
								</div> <!-- / service schedule and about -->
								<div class="span3"> <!-- contact and people -->
									<div class="test">
										<?php echo $secondary_img; ?>
									</div>
									<div class="group-contact">
										<!--<?php echo get_post_meta($post->ID, 'physical-address-label', true); ?><br /> 
										<?php echo get_post_meta($post->ID, 'physical-street-address', true) ?><br />
										<?php echo get_post_meta($post->ID, 'physical-address-city', true). ', ' . get_post_meta($post->ID, 'physical-address-state', true). ' ' . get_post_meta($post->ID, 'physical-address-zip', true); ?>-->
									</div> <!-- /group-contact -->
									<div class="group-people">
									<?php
										//get connected people
										$people = new WP_Query( array(
											'connected_type'	=>	'diocesan_roles',
											'connected_items'	=>	get_queried_object(),
											'nopaging'			=>	true,
										));
										//display connected people
										if ( $people -> have_posts() ) { ?>
											<h3>People</h3>
											<?php while ( $people->have_posts() ) : $people->the_post(); ?>
												<span class="connected-person"><span class="person-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span> <span class="person-role"><?php echo p2p_get_meta( $post->p2p_id, 'role', true ); ?></span></span><br/>
											<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
										<?php } ?>
									</div> <!-- /group people -->
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
											<h3>Related Items</h3>
											<?php while ( $group_news->have_posts() ) : $group_news->the_post(); ?>
												<div>
													<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
													<div><?php the_content(); ?></div>
												</div>
											<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
										<?php } ?>
								</div>
							</div><!-- /related-posts -->
						</div>
				<?php endwhile; ?>
				<?php twentyeleven_content_nav( 'nav-below' ); ?>
			<?php endif; ?>
			</div> <!-- post-list -->
		</div> <!-- /main content column -->
		<div class="span4"> <!-- sidebar column -->
			<div class="well"> <!-- sidebar well -->
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div> <!-- /sidebar well -->
		</div> <!-- / sidebar column -->
	</div>	 <!-- /row for main content and sidebar -->
</div> <!-- /container for main content and sidebar --> 



<!-- <?php // get_sidebar(); ?> -->
<?php include 'news-and-connections.php'; ?>
<?php get_footer(); ?>