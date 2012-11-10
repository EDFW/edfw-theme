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
						<div class="page-header">
							<h1><?php the_title(); ?></h1>
						</div>
						<div>
							<?php include 'post-image-gallery.php'; ?>
							<div class="row"> <!-- post content below images -->
								<div class="span2"> <!-- post info and highlights column -->
									<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($the_post->ID) ); ?>" />
									
								</div> <!-- / post info and highlights column -->
								<div class="span6"> <!-- post content -->
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