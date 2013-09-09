<?php
/**
 * The Template for displaying all single posts.
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
						<?php $edfw_post = new EDFWPost( $post->ID );?>
						<?php $edfw_post->display_featured_visual(); ?>
						<div class="page-header">
							<h1><?php the_title(); ?></h1>
						</div>
						<div>
							<?php include 'post-image-gallery.php'; ?>
							<div class="row"> <!-- post content below images -->
								<?php
								$content_type = wp_get_post_terms( $post->ID, 'content_type', array("fields" => "names")); 
								if ( in_array( 'Resource', $content_type) ) {
									$main_span = 'span8';
								} else {
									$main_span = 'span6';
								?>
								<div class="span2"> <!-- post info and highlights column -->
									<?php $edfw_post->display_secondary_visual( true ); ?>
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
								<?php } //endif for "resources" ?> 
								<div class="<?php echo $main_span;?>"> <!-- post content -->
									<?php the_content(); ?>
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