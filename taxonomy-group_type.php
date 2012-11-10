<?php
/**
 * The template for displaying Category Archive pages.
 * Also used for "NEWS", which is really just a category archive.
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
				<div class="page-header">
					<?php 
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$category_header_exists = get_stylesheet_directory() . '/images/edfw-categories/' . $term->slug . '.png';
						$category_header_exists = strtolower($category_header_exists);
						if ( file_exists($category_header_exists) ) {
							$category_header = get_stylesheet_directory_uri().'/images/edfw-categories/' . $term->slug . '.png';
							$category_header = strtolower($category_header);
							?><img id="header-image" src="<?php print $category_header; ?>" /><?php
						} else {
						 ?>
						 <h1>Episcopal Diocese of Fort Worth | <?php echo $term->slug; ?></h1><?php
						}
					?>
				</div>
			</div>
			<div class="post-list">
			<?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

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