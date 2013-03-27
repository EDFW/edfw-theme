<?php
/*
Class EDFWpost
Extends the native WP Post with a bunch of conditional content needed for specific EDFW items.
Instances of EDFWpost to be created at the beginning of The Loop
*/

class EDFWPost {

	private $id;

	public function __construct($post_id) {
		$this->id = $post_id;
	}
	
	
}

?>