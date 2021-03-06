<?php
/**
 * The Template for displaying all single Publication Editions.
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

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
						<div class="page-header">
							<?php 
								$header_img = get_stylesheet_directory() . '/images/edfw-headers/' . $post->post_name. '.png';
								if ( file_exists($header_img) ) {
									$header_img = get_stylesheet_directory_uri() . '/images/edfw-headers/' . $post->post_name. '.png';
									?><img id="header-image" src="<?php echo $header_img; ?>" /><?php
								} else {
								?><h1><?php the_title(); ?></h1><?php
								}
							?>
						</div>
						<div>
							<?php include 'post-image-gallery.php'; ?>
							<div class="row"> <!-- post content below images -->
								<div class="span2"> <!-- post info and highlights column -->
									<?php 
										if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
											$post_thumbnail_id = get_post_thumbnail_id( $post_id );
											$img_credit = thisismyurl_get_custom_media_field( $post_thumbnail_id, 'img_credit' );
											$img_credit_url = thisismyurl_get_custom_media_field( $post_thumbnail_id, 'img_credit_url' );
											$img_license = thisismyurl_get_custom_media_field( $post_thumbnail_id, 'img_license' );
											$img_license_url = thisismyurl_get_custom_media_field( $post_thumbnail_id, 'img_license_url' );
											$img_src = wp_get_attachment_image_src( $post_thumbnail_id );
											$img_src = $img_src[0];
										?>
										<div class="featured-image">
											<img src="<?php echo $img_src; ?>" class="post-side-image"/>
											<div class="image-credits post-byline">
												<span class="img-credit">Image by <a href="<?php echo $img_credit_url; ?>"><?php echo $img_credit; ?></a></span><br/>
												<span class="img-license"><a href="<?php echo $img_license_url; ?>"><?php echo $img_license; ?></a></span>
											</div>
										</div>
										<?php } 
									?>
									<div class="post-byline">
										<span class="post-author">Posted by <?php the_author_posts_link(); ?></span><br/>
										<span class="post-date-time">on <?php the_time('F j, Y'); ?></span><br/>
										<span class="post-taxonomy"><?php the_category( ' | ' ); ?></span>
									</div> <!-- /post-byline -->
									<div class="post-highlights">
										<?php
										$highlights = get_post_meta( $post->ID, 'post_highlights', true );
											if ( count($highlights) >= 2 ) { ?>
												<h4>Story Highlights</h4>
												<ul class="story-highlights">
												<?php
													foreach( $highlights as $highlight){
													echo "<li>".$highlight['story-highlight']."</li>";
													}
											}
										?>
									</div> <!-- /post highlights --> 
								</div> <!-- / post info and highlights column -->
								<div class="span6"> <!-- post content -->
									<div class="publication-description">
									<?php 
										$my_taxonomy = 'publication_name'; // set this to whatever your custom taxonomy is called
										$terms = wp_get_post_terms( $post->ID, $my_taxonomy ); // this gets all the terms attached to the post for your custom taxonomy
										echo term_description($terms[0]->term_id, $my_taxonomy); // this displays the description for the first term in the $terms array 
									?>
									</div> <!-- /.publication-description-->
									<div class="publication-edition-content">
										<?php the_content(); ?>
									</div> <!-- /.publication-edition-content -->
									<?php
										// Find connected pages
										$connected = new WP_Query( array(
											'connected_type' => 'posts_in_publication',
											'connected_items' => get_queried_object(),
											'nopaging' => true,
										) );

										// Display connected pages
										if ( $connected->have_posts() ) :
											?>
											<div class="publication-edition-articles">
												<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
													<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<?php the_excerpt(); ?>
												<?php endwhile; ?>
											</div> <!-- /.publication-edition-articles -->
											<?php 
											// Prevent weirdness
											wp_reset_postdata();

										endif;
										?>
								</div> <!-- / post content -->
							</div> <!-- / post content below images -->
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