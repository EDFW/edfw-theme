<?php
//assume nothing
$featured_content = FALSE;


//attempt to get the video
$featured_video = get_post_meta($post->ID, 'video-embed-code', true);


if ( $featured_video != '' ) {
	$featured_header_inner_class = "video-container";
	$featured_content = $featured_video; 
}

if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	$post_thumbnail_id = get_post_thumbnail_id( $post_id );
	$img_credit = thisismyurl_get_custom_media_field( $post_thumbnail_id, 'img_credit' );
	$img_credit_url = thisismyurl_get_custom_media_field( $post_thumbnail_id, 'img_credit_url' );
	$img_license = thisismyurl_get_custom_media_field( $post_thumbnail_id, 'img_license' );
	$img_license_url = thisismyurl_get_custom_media_field( $post_thumbnail_id, 'img_license_url' );
	$img_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$img_url = $img_src[0];
	$img_width = $img_src[1];
	$img_height = $img_src[2];
	$img_print = '<img src="'. $img_url .'" / >';
	
	//set image orientation
	if ( $img_width > $img_height ) {
		$img_orientation = "landscape";
	} elseif ( $img_width < $img_height ) {
		$img_orientation = "portrait";
	} elseif ( $img_width == $img_height ) {
		$img_orientation = "square";
	}
	
	//is the image big enough to fill the main column?
	if ( $img_width >= 770 ) {
		$img_full = TRUE;
	}
		
	if ( ( $featured_video == '' ) && ( $img_orientation == "landscape" ) && ( $img_full == TRUE ) ) { 
		$featured_header_inner_class = "featured-image-container";
		$featured_content = $img_print;
		$third_test = "how about this one?";
	} else {
		$secondary_img = '<div class="secondary-featured-image">'. $img_print .'</div>';
	}	
}

//If there is something to display, display it

if ($featured_content) { ?>
	<div class="featured-header-content" id="hi there">
		<div class="<?php echo $featured_header_inner_class; ?>">
			<?php echo $featured_content; ?>
		</div>
	</div>
<?php
}
?>
