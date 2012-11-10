<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
						<div class="page-header">
							<h1><?php the_title(); ?></h1>
						</div>
						<div>
							<?php include 'post-image-gallery.php'; ?>
							<div class="row"> <!-- post content below images -->
								
								<div class="span8"> <!-- post content -->
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