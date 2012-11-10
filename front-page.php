<?php
/**
 * The template for displaying the front page.
 *
 
 * @package WordPress
 * @subpackage EDFW_Bootstrap
 * @since EDFW Bootstrap 0.1 
 */

get_header(); ?>

<div class="container" id="header-image">
	<div class="row" id="billboard-title">
		<div class="span8 offset2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/images/edfw-logos/edfw-770.png" width="100%" />
		</div>
		<div class="span2">
		</div>
	</div>
</div>
<div class="horizontal-ribbon" id="not-the-top">
	<div class="container">
		<div class="row">
			<div class="span8" >
				<?php include 'front-page-content-slider.php'; ?>
			</div>
			<div class="span4 billboard-menu">
				<h3><a href="<?php echo get_custom_option( 'url_one' , '' ); ?>"><?php echo get_custom_option( 'headline_one' , 'Find a Church' ); ?></a></h3>
				<h4><?php echo get_custom_option( 'subtitle_one' , 'Search for a congregation near you.' ); ?></h4>
				<hr class="hr-white"/>
				<h3><a href="<?php echo get_custom_option( 'url_two' , '' ); ?>" ><?php echo get_custom_option( 'headline_two' , 'Common Prayer' ); ?></a></h3>
				<h4><?php echo get_custom_option( 'subtitle_two' , 'Find out how we worship.' ); ?></h4>
				<hr class="hr-white"/>
				<h3><a href="<?php echo get_custom_option( 'url_three' , '' ); ?>" ><?php echo get_custom_option( 'headline_three' , 'Our Beliefs' ); ?></a></h3>
				<h4><?php echo get_custom_option( 'subtitle_three' , 'You might be surprised...' ); ?></h4>
				<hr class="hr-white"/>
				<h3><a href="<?php echo get_custom_option( 'url_four' , '' ); ?>" ><?php echo get_custom_option( 'headline_four' , 'Your Life' ); ?></a></h3>
				<h4><?php echo get_custom_option( 'subtitle_four' , 'Live it more abundantly!' ); ?></h4>
			</div>
		</div>
	</div>
</div>

      <!-- Example row of columns -->
<div class="container"> <!--home content below ribbon-->
    <div class="row home-content-A"> <!-- home-content-A -->
		<div class="span6">	<!-- column1 -->
			<?php while ( have_posts() ) : the_post(); //begin the loop. ?> 
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
		</div>	<!-- /column1 -->
		<div class="span6"> <!--column2 -->
			<?php dynamic_sidebar( 'front-column2' ); ?>
		</div> <!-- /column2 -->
	</div>	<!-- /home-content-A -->
</div> <!-- / content below ribbon -->
<?php include 'news-and-connections.php'; ?>
<?php get_footer(); ?>