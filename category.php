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
						$category_header_exists = get_stylesheet_directory() . '/images/edfw-categories/' . single_cat_title("",FALSE). '.png';
						$category_header_exists = strtolower($category_header_exists);
						if ( file_exists($category_header_exists) ) {
							$category_header = get_stylesheet_directory_uri().'/images/edfw-categories/' . single_cat_title("",FALSE). '.png';
							$category_header = strtolower($category_header);
							?><img id="header-image" src="<?php print $category_header; ?>" /><?php
						} else {
						 ?><h1>Episcopal Diocese of Fort Worth | <?php single_cat_title(); ?></h1><?php
						}
					?>
				</div>
			</div>
			<div class="post-list">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="post">
						<div class="row">
							<?php $content_class = "span8"; ?>
							<?php if ( has_post_thumbnail() ) { ?>
								<?php $content_class = "span6"; ?>
								<div class="span2">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
								</div>
							<?php } ?>
							<div class="<?php echo $content_class; ?>">
								<div class="page-header">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <small><?php the_category( ' | '); ?></small></h3>
								</div>
								<div>
									<?php the_excerpt(); ?>
								</div>
							</div>
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