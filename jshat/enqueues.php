<?php
namespace jshat;

class Enqueues {

	private $post_types = array();
	private $handle = 'jshat';

	public function __construct( Array $post_types ) {

		$this->post_types = $post_types;

	}

	public function init() {

		$this->attach_hooks();

	}

	public function attach_hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	public function enqueue() {
		if ( is_singular( $this->post_types ) ) {
			wp_enqueue_script( $this->handle, plugin_dir_url( dirname( __FILE__ ) ) . 'js/jshat.js', array(
				'jquery'
			) );

			$jshat_variables = get_field( 'titles_and_h1s', get_the_ID() );

			wp_localize_script( $this->handle, 'jshat', array( 'variables' => $jshat_variables ) );
		}
	}


}