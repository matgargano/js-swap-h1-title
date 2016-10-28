<?php
/*
 * Plugin Name: JS Swap H1 and Title
 * Plugin URI:  https://www.forthepeople.com
 * Description: Gives you the ability to swap out H1 and Title tags using JavaScript.
 * Version:     1.0.1
 */

use jshat\Enqueues;
use jshat\Post_Settings;
use jshat\Post_Type_Settings;

spl_autoload_register( function ( $class ) {
	$base = explode( '\\', $class );
	if ( 'jshat' === $base[0] ) {
		$file = __DIR__ . '/' . strtolower( str_replace( [ '\\', '_' ], [
					DIRECTORY_SEPARATOR,
					'-'
				], $class ) . '.php' );
		if ( file_exists( $file ) ) {
			require $file;
		} else {
			die( sprintf( 'File %s not found', $file ) );
		}
	}

} );

if ( ! function_exists( 'get_field' ) ) {
	add_action( 'admin_notices', function () {
		?>
		<div class="notice notice-error is-dismissible">
			<p><?php _e( 'You need to install and activate the Advanced Custom Fields plugin for this plugin to work properly.', 'jshat' ); ?></p>
		</div>
		<?php
	} );

	return;
}


$post_types = (array) apply_filters( 'jshat_post_types', Post_Type_Settings::get_post_types() );

$post_settings = new Post_Settings( $post_types );
$post_settings->init();
$post_types_settings = new Post_Type_Settings();
$post_types_settings->init();
$enqueues = new Enqueues( $post_types );
$enqueues->init();
