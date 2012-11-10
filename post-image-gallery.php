<?php
	if( function_exists( 'attachments_get_attachments' ) ) { //if the attachments plugin is installed
		$attachments = attachments_get_attachments();		// get all the attachmnets
		$total_attachments = count( $attachments );			// how many attachments are there?
			if( $total_attachments ) {						// if there are more than zero attachments...
				$zero_for_image = 1;						// assume there are no images
				for( $i=0; $i<$total_attachments; $i++ ) : //chug through attachments, to make sure at least one is an image
					$attachment_mime_type = $attachments[$i]['mime'];	// get attachment type
					$zero_for_image = strpos( $attachment_mime_type, "image");	// "image" will be at position 0 in the MIME type string if it is an attachment
				endfor;
				if ( 0 === $zero_for_image ) { //if we have images
					$first_attachment = TRUE;			//the first shall be first
					?>
						<div id="myCarousel" class="carousel slide content-slider post-slider">
							<div class="carousel-inner">
					<?php
					for( $i=0; $i<$total_attachments; $i++ ) : 		//chug through the attachments... again
						$attachment_mime_type = $attachments[$i]['mime'];	//again, we only care about images
						$zero_for_image = strpos( $attachment_mime_type, "image");
							if ( 0 === $zero_for_image ) {	//if THIS ONE is an image...
								if ( TRUE === $first_attachment) {	//if it's the first one
									$item_class = "item active";	//make the first one "active" so it appears in slider
									$first_attachment = FALSE;		// the rest shall be not first
									$multiple_images = FALSE;
								} else {
									$item_class = "item";			// the last shall be not active
									$multiple_images = TRUE;
								}
							//finally, we can start using the images...
						?>
								<div class="<?php echo $item_class; ?>"> <!-- item -->
									<img src="<?php echo $attachments[$i]['location']; ?>">
									
										<div class="carousel-caption">
											
												<h4><?php echo $attachments[$i]['title']; ?></h4>
											
												<p><?php echo $attachments[$i]['caption']; ?></p>
											
										</div> <!-- carousel-caption -->
								
								</div> <!-- /item -->
						<?php
							} //end -- if THIS ONE is an image
					endfor; // end iterating through images
					//close the carosel divs
					?>
							</div> <!-- /carousel-inner -->
							<?php if ( $multiple_images ) { ?>
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
							<?php } ?>
						</div> <!-- /myCarousel -->
					<?php
				}  // end -- if we have images
			} // end -- if we have attachments
	} // end -- if the attachments plugin is installed ?>