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
		$this->subtype = $this->get_post_subtype();
		
		//featured and secondary content
		// (maybe pull out as separate private function...)
		// assign all the Featured Image data to the Secondary location, and then move it primary if it's big enough and there's no video
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
		
		// put video in primary and then, if there isn't a video, maybe move the featured image into primary
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
		// Post: News or Resource; Group: parish, ministry, commission, etc; Person: inside, outside;
		//if it's a post, do one thing; if it's a group do some other thing...
		return '';
	}
	
	public function display_featured_visual(){
		if ( ( $this->featured_visual['content'] == '' ) OR ( $this->featured_visual['type'] == '' ) ) {
			return;
		} else { ?>
			<div class="featured-header-content">
				<div class="<?php echo $this->featured_visual['inner_div_class']; ?>">
					<?php echo $this->featured_visual['content']; ?>
				</div>
			</div>
		<?php }
	}
	
	public function display_secondary_visual( $show_credits ){
		if ( ( $this->secondary_visual['content'] == '' ) OR ( $this->secondary_visual['type'] == '' ) ) {
			return;
		} else {
			?><div class="secondary-featured-image" >
				<div class="<?php echo $this->secondary_visual['inner_div_class']; ?>">
					<?php echo $this->secondary_visual['content']; ?>
				</div>
				<?php if ( $show_credits ) {
					$this->display_img_credits( $this->secondary_visual );
				}?>
			</div>
		<?php }
	}
	
	private function display_img_credits( $img ) {
		if ( $img['img-credit'] == '' ) {
			return;
		} else {
			echo '<div class="image-credits post-byline">';
				echo '<span class="img-credit">Image by ';
					if ( $img['img-credit-url'] != '' ) {
						echo '<a href="'. $img['img-credit-url'] .'" target="_new">'. $img['img-credit'] .'</a>';
					} else {
						echo $img['img-credit'];
					}
				echo '</span>';
				if ( ( $img['img-license'] != '' ) && ( $img['img-license-url'] != '' ) ) {
					echo '<br/><span class="img-license"><a href="'. $img['img-license-url'] .'" target="_new">'. $img['img-license'] .'</a></span>';
				}
			echo '</div>';
		}
	}
	
	public function display_title(){
		// use the_title or display a title image
	}
	
	public function display_related_people(){
		//tiles, with pics
	}
		
	public function display_related_posts( $what ){
		// $what is news, or resources, or both
	}
	
	public function display_main_content(){
		//probably the_content, though maybe not
	}
	
	public function display_secondary_content(){
		//if there is any...
	}
	
	public function display_map( $params ){
		//$params is array of all the stuff
	}
	
	public function display_contact_info(){
	}
	
	public function comments_on(){
		//come back later and define some times when they are on
		return false;
	}
	
	public function display_attachments(){
		//non-image only
	}
	
	public function display_gallery(){
		//hrm... link to Flickr, on-page light box... ?
		//should input be a Flickr gallery? post attachments?
	}
	
	public function display_short_name(){
		//like St. Martin's for St. Martin-in-the-Fields
		//include fall back to the_title
	}
	
}

?>