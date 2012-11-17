<?php
/**
 * The template for displaying 404 pages (Not Found).
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
					<h2>Can't find page (Error 404)</h2>
				</header>
			</div>
			<div class="post-list">
			</div> <!-- post-list -->
		</div> <!-- /main content column -->
		<div class="span4"> <!-- sidebar column -->
			<div class="well"> <!-- sidebar well -->
				<aside class="widget widget-text">
					<h3 class="widget-title">Prayer for Lost Pages</h3>
					<div class="textwidget">
						<p>O God, who knows and sees all things, grant your faithful servants the wisdom to find those pages that have gone missing.</p>
						<p>Guide all those who visit our website to the links and pages they seek, and give to all of us the patience needed to endure through the trials brought upon us by the gifts of technology and communication.</p>
						<p>Help us to be ever grateful for your many blessings in this age, and keep our hearts focused on the blessings that await us in the age to come, when all the lost will be found in your merciful love.</p>
						<p><b>Amen.</b></p>
					</div>
				</aside>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div> <!-- /sidebar well -->
		</div> <!-- / sidebar column -->
	</div>	 <!-- /row for main content and sidebar -->
</div> <!-- /container for main content and sidebar --> 



<!-- <?php // get_sidebar(); ?> -->
<?php include 'news-and-connections.php'; ?>
<?php get_footer(); ?>