<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div class="container"> <!-- container for main content and sidebar -->
	<div class="row"> <!-- row for main content and sidebar -->
		<div class="span8"> <!-- main content column -->
			<div class="index-masthead">
				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>
			</div>
			<div class="post-list">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="post">
						<div class="page-header">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <small><?php the_category( ' | '); ?></small></h3>
						</div>
						<div>
							<?php the_excerpt(); ?>
						</div>
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