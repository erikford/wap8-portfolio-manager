<?php

/*-----------------------------------------------------------------------------------*/
/* Register widget
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'wap8_portfolio_widget' );

/**
 * Portfolio posts widget.
 *
 * Register the recent portfolio posts widget.
 *
 * @package Portfolio Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_widget() {
	register_widget( 'wap8_Portfolio_Widget' );
}

/*-----------------------------------------------------------------------------------*/
/* Extend WP_Widget by adding this widget class
/*-----------------------------------------------------------------------------------*/

class wap8_Portfolio_Widget extends WP_Widget {
	
	// widget setup
	function wap8_Portfolio_Widget() {
		
		$widget_ops = array(
			'classname'		=> 'wap8-portfolio-widget',
			'description'	=> __( 'Display recent portfolio case study posts.', 'wap8plugin-i18n' )
			);
			
		$this->WP_Widget( 'wap8-Portfolio-widget', __( 'Recent Portfolio Posts', 'wap8plugin-i18n' ), $widget_ops );	
	
	}
	
	// widget output
	function widget( $args, $instance ) {
		
		extract( $args );
		
		// declare variables for storing saved widget settings
		$title = apply_filters( 'widget_title', $instance['title'] ); // saved widget title
		$studies_count = $instance['studies_count']; // saved amount of posts to display
		$studies_thumb = $instance['studies_thumb']; // saved featured thumbnail setting
		$studies_title = $instance['studies_title']; // saved case study title setting
		
		echo $before_widget; // echo HTML set in register_sidebar by the currently active theme
		
		if ( !empty( $title ) ) { // if this widget has a title
		
			echo $before_title . $title . $after_title; // display the title wrapped with the HTML set by the currently active theme
			
		}
		
		// save custom loop arguments in an array
		$args = array(
			'post_type'		=> 'wap8-portfolio',
			'post_status'	=> 'publish',
			'post_per_page'	=> $studies_count,
			'orderby'		=> 'date',
			'order'			=> 'DESC'
		);
		
		$studies = new WP_Query( $args ); // open a custom query
		
		if ( $studies -> have_posts() ) : // if the custom query found posts
		
			echo '<ul>' . "\n"; // opening unordered list tag
			
			while ( $studies -> have_posts() ) : ( $studies -> the_post() );
			
			?>
			
			<li>
				<?php if ( $studies_thumb == 1 && has_post_thumbnail() ) { // if set to show featured thumbnail and a thumbnail has been set for the post ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_post_thumbnail( 'thumbnail', array( 'title' => get_the_title() ) ); ?></a>	
				<?php } if ( $studies_title == 1 ) { // if set to show case study title
					the_title( '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a>' );
				} ?>
			</li>
			
			<?php
			
		endwhile; // the end of the found posts
		
			echo '</ul>' . "\n"; // closing unordered list tag
		
		else : // if the custom query did not find posts
			
			echo '<p>' . __( 'There are no published case studies.', 'wap8plugin-i18n' ) . '</p>' . "\n";
		
		endif; // end the custom query
		
		wp_reset_query(); // return everything back to normal
		
		echo $after_widget;	// echo HTML set in register_sidebar by the currently active theme
			
	}
	
	// widget update
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] ); // sanitize the title
		$instance['studies_count'] = ( int ) $new_instance['studies_count']; // make sure the post count is an integer
		$instance['studies_thumb'] = isset( $new_instance['studies_thumb'] ); // if display featured thumbnail is set
		$instance['studies_title'] = isset( $new_instance['studies_title'] ); // if display case study title is set
		
		return $instance;
	
	}
	
	// widget form
	function form( $instance ) {
		$defaults = array(
			'title'			=> __( 'Recent Case Studies', 'wap8plugin-i18n' ),
			'studies_count'	=> 5
		);
		$instance = wp_parse_args( ( array ) $instance, $defaults );

		if ( ( int ) $instance['studies_count'] < 1 ) { // if the amount of posts to show is less than 1 or left empty
			
			( int ) $intsance['studies_count'] = 5; // set to 5
			
		}
			
		if ( ( int ) $instance['studies_count'] > 10 ) { // if the amount of posts to show is more than 10
			
			( int ) $instance['studies_count'] = 10; // set to 10
			
		}
		
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'wap8plugin-i18n' ); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title'];?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'studies_count' ); ?>"><?php _e( 'Posts to show', 'wap8plugin-i18n' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'studies_count' ); ?>" name="<?php echo $this->get_field_name( 'studies_count' ); ?>" value="<?php echo $instance['studies_count'];?>" size="3" maxlength="2" /> <small><?php _e( 'Max: 10', 'wap8plugin-i18n' ); ?></small>
		</p>
		
		<p>
			<input id="<?php echo $this -> get_field_id( 'studies_thumb' ); ?>" name="<?php echo $this -> get_field_name( 'studies_thumb' ); ?>" type="checkbox" <?php checked( isset( $instance['studies_thumb'] ) ? $instance['studies_thumb'] : 0); ?> />&nbsp;<label for="<?php echo $this -> get_field_id( 'studies_thumb' ); ?>"><?php _e( 'Display featured thumbnail', 'wap8plugin-i18n' ); ?></label>
		</p>
		
		<p>
			<input id="<?php echo $this -> get_field_id( 'studies_title' ); ?>" name="<?php echo $this -> get_field_name( 'studies_title' ); ?>" type="checkbox" <?php checked( isset( $instance['studies_title'] ) ? $instance['studies_title'] : 0); ?> />&nbsp;<label for="<?php echo $this -> get_field_id( 'studies_title' ); ?>"><?php _e( 'Display case study title', 'wap8plugin-i18n' ); ?></label>
		</p>
		
		<?php	
	
	}

}

?>