<?php 



//Plugin Name: Our Widget


class abc_widget extends WP_Widget{
	
	// to register widget and construct name and widget classes.
	Public function __construct(){
		parent::__construct('abc_widget','ABC WIDGET', array(
			'classname'=>'abc_widget',
			'description' => 'Get all recent posts.',
		
		));
		
	}
	
	// create widget form
	
	function form($instance){
	
	$title = $instance['title'];
	
	?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title');  ?>" type="text" value="<?php echo $title; ?>">
			</label>
		</p>
		
	<?php	
		
	}
	// to show result in fornt end;
	function widget($args, $instance ){
		
		$title = ($instance['title']) ? $instance['title'] : 'Abc Widget';
		
	echo $args['before_widget'].$args['before_title'].$title.$args['after_title'].$args['after_widget'];
		
	}
	
	
	
	
	
	
}


function register_abc_widget(){
	register_widget( 'abc_widget' );
}

add_action('widgets_init','register_abc_widget');
