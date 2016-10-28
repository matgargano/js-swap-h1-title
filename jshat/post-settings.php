<?php

namespace jshat;

class Post_Settings {

	private $post_types = array();

	public function __construct( Array $post_types ) {
		$this->post_types = $post_types;
	}

	public function init(){
		$this->settings();
	}


	public function settings() {
		if ( function_exists( 'acf_add_local_field_group' ) ):


			$post_types_array = [];

			foreach ( $this->post_types as $post_type ) {
				$post_types_array[] = array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => $post_type,
					),
				);
			}


			acf_add_local_field_group( array(
				'key'                   => 'group_5813aefddb6cc',
				'title'                 => 'JS Swap H1 and Title',
				'fields' => array (
					array (
						'key' => 'field_5813b9f54250a',
						'label' => 'Titles and H1s',
						'name' => 'titles_and_h1s',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => '',
						'max' => '',
						'layout' => 'table',
						'button_label' => 'Add Row',
						'sub_fields' => array (
							array (
								'key' => 'field_5813ba114250b',
								'label' => 'Handle',
								'name' => 'handle',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array (
								'key' => 'field_5813ba264250c',
								'label' => 'Title',
								'name' => 'title',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array (
								'key' => 'field_5813ba2a4250d',
								'label' => 'h1',
								'name' => 'h1',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
						),
					),
				),
				'location'              => $post_types_array,
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
			) );

		endif;
	}


}