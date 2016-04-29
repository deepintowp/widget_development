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
	$posts_per_page = ($instance['posts_per_page']) ? $instance['posts_per_page'] : 5 ;
	
	?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title');  ?>" type="text" value="<?php echo $title; ?>">
			</label>
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>">Post per page:
			<input class="widefat" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page');  ?>" type="text" value="<?php echo $posts_per_page; ?>">
			</label>
		</p>
		
		
		
		
	<?php	
		
	}
	// to show result in fornt end;
	function widget($args, $instance ){
		
		
		
		
		
	$title = ($instance['title']) ? $instance['title'] : 'Abc Widget';
	$posts_per_page = ($instance['posts_per_page']) ? $instance['posts_per_page'] : 5 ;
	
	$query = new WP_Query(array(
		'post_type'=>'post',
		'posts_per_page' => $posts_per_page
	));
	
			if ( $query->have_posts() ) {
			$Widget_contect = '<ul>';
			while ( $query->have_posts() ) {
				$query->the_post();
				$Widget_contect .= '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';
			}
			$Widget_contect .= '</ul>';
		} else {
			echo 'no posts found';
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	
	
	
		
	echo $args['before_widget'].$args['before_title'].$title.$args['after_title'].$Widget_contect.$args['after_widget'];
	



	
	}
	
	
	
	
	
	
}


function register_abc_widget(){
	register_widget( 'abc_widget' );
}

add_action('widgets_init','register_abc_widget');
