<?php

class JQ_Weather extends WP_Widget {
	public function __construct( $id_base, $name, $widget_options = array(), $control_options = array() ) {
		parent::__construct( $id_base, $name, $widget_options, $control_options );
	}

	public function form( $instance ) {
		return parent::form( $instance ); // TODO: Change the autogenerated stub
	}

	public function update( $new_instance, $old_instance ) {
		return parent::update( $new_instance, $old_instance ); // TODO: Change the autogenerated stub
	}

	public function widget( $args, $instance ) {
		parent::widget( $args, $instance ); // TODO: Change the autogenerated stub
	}
}