<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a id="nav-header-logo" class="brand hidden" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/edfw-logos/edfw-menu-bar-2.png" /></a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="dropdown" id="about_menu">
						<a class="dropdown-toggle" data-toggle="dropdown"  href="#about_menu">
							About
							<b class="caret"></b>
						</a>
						<?php $about_args = array(
							'theme_location'  => 'about',
							'container'       => 'false', 
							'menu_class'      => 'dropdown-menu', 
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						); ?>
						<?php wp_nav_menu( $about_args ); ?>
					</li>
					<li class="dropdown" id="news_menu">
						<a class="dropdown-toggle" data-toggle="dropdown"  href="#news_menu">
							News
							<b class="caret"></b>
						</a>
						<?php $news_args = array(
							'theme_location'  => 'news',
							'container'       => 'false', 
							'menu_class'      => 'dropdown-menu', 
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						); ?>
						<?php wp_nav_menu( $news_args ); ?>
					</li>
					<li class="dropdown" id="calendar_menu">
						<a class="dropdown-toggle" data-toggle="dropdown"  href="#calendar_menu">
							Calendar
							<b class="caret"></b>
						</a>
						<?php  $calendar_args = array(
							'theme_location'  => 'calendar',
							'container'       => 'false', 
							'menu_class'      => 'dropdown-menu', 
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						); ?>
						<?php wp_nav_menu( $calendar_args ); ?>
					</li>
					<li class="dropdown" id="resources_menu">
						<a class="dropdown-toggle" data-toggle="dropdown"  href="#resources_menu">
							Resources
							<b class="caret"></b>
						</a>
						<?php $resources_args = array(
							'theme_location'  => 'resources',
							'container'       => 'false', 
							'menu_class'      => 'dropdown-menu', 
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						); ?>
						<?php wp_nav_menu( $resources_args ); ?>
					</li>
					<li class="dropdown" id="organizations_menu">
						<a class="dropdown-toggle" data-toggle="dropdown"  href="#organizations_menu">
							Organizations
							<b class="caret"></b>
						</a>
						<?php $organizations_args = array(
							'theme_location'  => 'organizations',
							'container'       => 'false', 
							'menu_class'      => 'dropdown-menu', 
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						); ?>
						<?php wp_nav_menu( $organizations_args ); ?>
					</li>
					<li class="dropdown" id="connect_menu">
						<a class="dropdown-toggle" data-toggle="dropdown"  href="#connect_menu">
							Connect
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo get_custom_option('fb_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_390_facebook.png" class="home-social home-social-red"/> Facebook</a></li>
							<li><a href="<?php echo get_custom_option('youtube_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_382_youtube.png" class="home-social home-social-orange"/> YouTube</a></li>
							<li><a href="<?php echo get_custom_option('tw_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_391_twitter_t.png" class="home-social home-social-yellow"/> Twitter</a></li>
							<li><a href="<?php echo get_custom_option('pinterest_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_360_pinterest.png" class="home-social home-social-green"/> Pinterest</a></li>
							<li><a href="<?php echo get_custom_option('rss_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_397_rss.png" class="home-social home-social-blue"/> Subscribe via RSS</a></li>
							<li><a href="<?php echo get_custom_option('contact_url'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/glyphicons/glyphicons_399_e-mail.png" class="home-social home-social-purple"/> Contact Directly</a></li>
						</ul>
					</li>
				</ul> <!-- /nav  menu -->
			<?php include 'edfw-navbar-searchform.php'; ?>
			</div> <!-- /nav-collapse -->
			
		</div> <!-- /container -->
	</div> <!-- /navbar-inner -->
</div> 