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
			<div class="edfw-jumbo-content">
				<?php include 'edfw-big-searchform.php';?>
				<p>The page you were looking for isn't here or has changed names. We're really sorry.</p>
				<p>We've recently done some major changes to our website, and though we've tried very hard to make sure nothing got lost, apparently we missed a few things.</p>
				<p>Suggestions</p>
					<ul>
						<li>Use the search form above.</li>
						<li><a href="http://archive.edfw.org" target="_new">Browse the archived version of the old website.</a></li>
						<li><a href="">Read about our recent website changes.</a></li>
						<li><a href="">Report the missing content so we can fix it.</a></li>
					</ul>
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
			</div> <!-- /sidebar well -->
		</div> <!-- / sidebar column -->
	</div>	 <!-- /row for main content and sidebar -->
</div> <!-- /container for main content and sidebar --> 



<!-- <?php // get_sidebar(); ?> -->
<?php include 'news-and-connections.php'; ?>
<?php get_footer(); ?>