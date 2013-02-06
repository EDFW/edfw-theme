<?php
function my_connection_types() {
	p2p_register_connection_type( array(
		'name' 	=>	'diocesan_roles',
		'from' 	=>	'person',
		'to' 	=>	'group',
		'fields'	=>	array(
			'role'	=>	array(
				'title'	=> 'Role',
				'type'	=>	'text',
			),
			'exp_year' =>	array(
				'title'	=>	'Exp. Yr. (if Applicable)',
				'type'	=>	'text',
			),
		),
	) );
	p2p_register_connection_type( array(
		'name'	=>	'post_group_relevance',
		'from'	=>	'post',
		'to'	=>	'group',
		'admin_box'	=>	'from',
		'title'	=>	array(
			'from'	=>	'Relevant Groups',
			'to'	=>	'Relevant Posts',
		)
	) );
	p2p_register_connection_type( array(
		'name'	=>	'person_group_relevance',
		'from'	=>	'post',
		'to'	=>	'person',
		'admin_box'	=>	'from',
		'title'	=>	array(
			'from'	=>	'Relevant Persons',
			'to'	=>	'Relevant Posts',
		)
	) );
	p2p_register_connection_type( array(
		'name'	=>	'posts_in_publication',
		'from'	=>	'publication',
		'to'	=>	'post',
		'admin_box'	=>	'from',
		'title'	=>	array(
			'from'	=>	'Included Posts',
		)
	) );
}
add_action( 'p2p_init', 'my_connection_types' );
?>