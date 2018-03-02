<?php

/**
 *
 * Functions Theme Festival
 *
 */

/* Comment of functin */

class FestivalTheme {

	public function __construct( ) {

		add_action( 'init', array(&$this, 'create_post_type') );

	}

	public function create_post_type() {
		register_post_type( 'programacao',
			array(
				'labels' => array(
				'name' => __( 'Programação' ),
				'singular_name' => __( 'Programação' )
			),
				'public' => true,
				'has_archive' => true,
				'menu_icon'   => 'dashicons-exerpt-view'
			)
		);
	}

}

new FestivalTheme;


