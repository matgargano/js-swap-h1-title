<?php


namespace jshat;

class Post_Type_Settings {

	const OPTION_NAME = 'jshat_post_types';


	public function init() {
		$this->attach_hooks();
	}

	public function attach_hooks() {
		add_action( 'admin_init', array( $this, 'add_setting' ) );
	}

	public function add_setting() {
		register_setting(
			'general',
			self::OPTION_NAME,
			array( __CLASS__, 'validate' )
		);
		add_settings_field(
			self::OPTION_NAME,
			'JS Swap H1 and Title Settings',
			array( __CLASS__, 'output_setting' ),
			'general',
			'default'
		);
	}

	public static function get_post_types() {
		return get_option( self::OPTION_NAME );
	}

	public function output_setting() {

		$post_types_selected = self::get_post_types();
		$args                = array(
			'public' => true
		);
		$post_types          = get_post_types( $args, 'object' );

		?>
		<table>
			<tr>
				<td>Post Types</td>
				<td>
					<?php foreach ( $post_types as $post_type ): ?>


						<?php $checked = in_array( $post_type->name, $post_types_selected ); ?>
						<p><label for="jshat_post_types">
								<input type="checkbox" name="jshat_post_types[]" <?php checked( true, $checked ); ?>
								       value="<?php esc_attr_e( $post_type->name ) ?>"><?php esc_attr_e( $post_type->labels->name ) ?>


							</label></p>
					<?php endforeach; ?>
				</td>
			</tr>

		</table>
		<?php
	}

	public function validate( $input ) {
		$input = array_filter( $input, 'post_type_exists' );

		return $input;
	}

	public function get_option() {
		return get_option( self::OPTION_NAME );
	}

}