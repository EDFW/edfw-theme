<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php bloginfo( 'template_directory' ); ?>/bootstrap/js/jquery.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/bootstrap/js/bootstrap.js"></script>
	<?php
		if ( is_front_page() ) {
			?>	
			<script>
				$(document).ready(function(){
					$('.carousel').carousel();
				});
			</script>
			<?php
		} else { 
			?>
			<script>
				$(document).ready(function(){
					$('.carousel').carousel({
						interval: false
					});
				});
			</script>
			<?php
		} ?>