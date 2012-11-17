<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="input-xxlarge edfw-big-form-input" name="s" id="s" />
		<button type="submit" class="btn btn-primary btn-large" name="submit" id="searchsubmit"><i class="icon-search icon-white"></i> Search</button>
	</form>