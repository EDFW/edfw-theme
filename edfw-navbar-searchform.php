<?php
/**
 * The template for displaying search form in navbar in EDFW
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" id="searchform edfw-nav-search-form" class="navbar-form pull-right" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-append" id="edfw-nav-search-append">
			<input type="text" class="input-small" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" /><button type="submit" class="btn" name="submit" id="searchsubmit" style="margin-left: 0px;"><i class="icon-search"></i></button>
		</div>
	</form>