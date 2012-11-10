<?php
/**
 * The template for displaying the footer.
 *
 * Contains: footer ribbon; scripts loads; wp footer; closing body and html tags
 *
 * @package WordPress
 * @subpackage EDFW_Bootstrap
 * @since EDFW Bootstrap 0.1
 */
?>
<div class="footer-ribbon"> <!--footer-ribbon-->
	<div class="container footer-container"><!--footer-container-->
		<div class="row">
			<div class="span9 footer1">
				<p><span class="footer-title">The Episcopal Diocese of Fort Worth</span><br/>
				4301 Meadowbrook Dr. | Fort Worth, TX 76103 </p>
				<p>817-534-1900<br/>
				contact@episcopaldiocesefortworth.org</p>
				<p class="copyright">&copy;<?php echo date('Y'); ?> The Episcopal Diocese of Fort Worth</p>
			</div>
			<div class="span3">
				<img class="footer-shield pull-right" src="<?php bloginfo( 'template_directory' ); ?>/images/edfw-logos/diocese-of-fort-worth-shield.png" />
				
			</div>
		</div>
	</div> <!--footer-container-->
</div><!--/footer-ribbon-->
    <!-- Bootstrap related JS -->
	<?php include 'bootstrap-scripts-footer.php'; ?>
	<!-- /Bootstrap related JS -->
	<!-- EDFW JS -->
	<script src="<?php bloginfo( 'template_directory' ); ?>/js/edfw.js"></script>
	<!-- /EDFW JS -->
	<!-- WP FOOTER -->
	<?php wp_footer(); ?>
	<!-- /WP FOOTER -->
  </body>
</html>	 