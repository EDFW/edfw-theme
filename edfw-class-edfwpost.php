<?php
/*
Class EDFWpost
Extends the native WP Post with a bunch of conditional content needed for specific EDFW items.
Instances of EDFWpost to be created at the beginning of The Loop
*/

class EDFWPost {

	private $id;
	private $type;
	private $subtype;
	private $main_category;
	private $post_meta;
	
	private $featured_visual = array(
		'content' => '',
		'type' => '',
	);
	private $secondary_visual = array(
		'content' => '',
		'type' => '',
	);
	
	public function __construct($post_id) {
		//some basic setup
		$this->id = $post_id;
		$this->post_meta = get_post_meta( $this->id );
		$this->type = get_post_type( $this->id );
		$this->get_post_subtype();
		
		//featured and secondary content
		if ( has_post_thumbnail( $this->id ) ) {
			$this->secondary_visual['img_id']			=	get_post_thumbnail_id( $this->id );
			$this->secondary_visual['img_credit']		= 	thisismyurl_get_custom_media_field( $this->secondary_visual['img_id'], 'img_credit' );
			$this->secondary_visual['img_credit_url']	=	thisismyurl_get_custom_media_field( $this->secondary_visual['img_id'], 'img_credit_url' );
			$this->secondary_visual['img_license']		=	thisismyurl_get_custom_media_field( $this->secondary_visual['img_id'], 'img_license' );
			$this->secondary_visual['img_license_url']	=	thisismyurl_get_custom_media_field( $this->secondary_visual['img_id'], 'img_license_url' );
			$this->secondary_visual['img_src']			=	wp_get_attachment_image_src( $this->secondary_visual['img_id'], 'full' );
			$this->secondary_visual['img_url']			= 	$this->secondary_visual['img_src'][0];
			$this->secondary_visual['img_width']		= 	$this->secondary_visual['img_src'][1];
			$this->secondary_visual['img_height']		=	$this->secondary_visual['img_src'][2];
			$this->secondary_visual['content']			=	'<img src="'. $this->secondary_visual['img_url'] .'" / >';
			$this->secondary_visual['type']				=	'image';
			$this->secondary_visual['inner_div_class']	=	'secondary-image-container';
			
			if ( $this->secondary_visual['img_width'] > $this->secondary_visual['img_height'] ) {
				$this->secondary_visual['orientation']	=	'landscape';
			} elseif ( $this->secondary_visual['img_width'] < $this->secondary_visual['img_height'] ) {
				$this->secondary_visual['orientation']	=	'portrait';
			} elseif ( $this->secondary_visual['img_width'] == $this->secondary_visual['img_height'] ) {
				$this->secondary_visual['orientation']	=	'square';
			}
			
			if ( $this->secondary_visual['img_width'] >= 770 ) {
				$this->secondary_visual['full']	= TRUE;
			}
		}
		
		$this->featured_visual['content'] = $this->post_meta['video-embed-code'][0];
		if	( $this->featured_visual['content'] != '' ) {
			$this->featured_visual['type'] = 'video';
			$this->featured_visual['inner_div_class'] = 'video-container';
		} elseif ( $this->secondary_visual['full'] && ( $this->secondary_visual['orientation'] == 'landscape' ) ) {
			$this->featured_visual = $this->secondary_visual;
			$this->secondary_visual['content'] = '';
			$this->secondary_visual['type'] = '';
		}
		
		
	}
	
	private function get_post_subtype(){
		//if it's a post, do one thing; if it's a group do some other thing...
	
	}
	
	public function display_featured_content(){
		if ( ( $this->featured_visual['content'] == '' ) OR ( $this->featured_visual['type'] == '' ) ) {
			return;
		} else { ?>
			<div class="featured-header-content" id="hi there">
				<div class="<?php echo $this->featured_visual['inner_div_class']; ?>">
					<?php echo $this->featured_visual['content']; ?>
				</div>
			</div>
		<?php }
	}
	
	public function display_secondary_content( $show_credits ){
		if ( ( $this->secondary_visual['content'] == '' ) OR ( $this->secondary_visual['type'] == '' ) ) {
			return;
		} else {
			//decide whether to include credits info
			
			?><div class="secondary-featured-image" >
				<div class="<?php echo $this->secondary_visual['inner_div_class']; ?>">
					<?php echo $this->secondary_visual['content']; ?>
				</div>
				<?php //echo credits ?>
			</div>
		<?php }
	}
	
}

?>