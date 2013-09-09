<?php
if (class_exists('MultiPostThumbnails')) {
	$types = array('post', 'page', 'person', 'group', 'publication');
	foreach($types as $type) {
		new MultiPostThumbnails(array(
			'label' => 'Secondary Image',
			'id' => 'secondary-image',
			'post_type' => $type
			)
		);
	}
}

if (class_exists('MultiPostThumbnails')) {
	$types = array('post', 'page', 'person', 'group', 'publication');
	foreach($types as $type) {
		new MultiPostThumbnails(array(
			'label' => 'Title Image',
			'id' => 'title-image',
			'post_type' => $type
			)
		);
	}
}

if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(array(
		'label' => 'Group Logo Square(ish)',
		'id' => 'group-logo-square',
		'post_type' => 'group'
		)
	);
}

if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(array(
		'label' => 'Group Logo Wide Banner',
		'id' => 'group-logo-wide',
		'post_type' => 'group'
		)
	);
}