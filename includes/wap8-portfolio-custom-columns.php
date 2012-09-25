<?php

/*-----------------------------------------------------------------------------------*/
/* Customize columns on portfolio edit screen
/*-----------------------------------------------------------------------------------*/

add_filter( 'manage_edit-wap8-portfolio_columns', 'wap8_custom_portfolio_columns' );

/**
 * Custom portfolio columns.
 *
 * Customizing the columns for the wap8-portfolio custom post type edit screen.
 *
 * @param $columns Post columns
 * @return $columns Custom post columns
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_custom_portfolio_columns( $columns ) {

	$columns = array(
		'cb'							=> '<input type="checkbox" />',
		'title'							=> _x( __( 'Case Study', 'wap8plugin-i18n' ), 'column name' ),
		'wap8-client-column'			=> __( 'Client', 'wap8plugin-i18n' ),
		'author'						=> __( 'Author', 'wap8plugin-i18n' ),
		'wap8-services-column'			=> __( 'Services', 'wap8plugin-i18n' ),	// custom column for services
		'wap8-portfolio-tags-column'	=> __( 'Portfolio Tags', 'wap8plugin-i18n' ), // custom column for portfolio tags
		'date'							=> _x( __( 'Date', 'wap8plugin-i18n' ), 'column name' )
	);
	
	return $columns;

}

/*-----------------------------------------------------------------------------------*/
/* Add custom content to our custom columns
/*-----------------------------------------------------------------------------------*/

add_action( 'manage_wap8-portfolio_posts_custom_column', 'wap8_portfolio_columns_content' );

/**
 * Portfolio services column.
 *
 * Adding the custom taxonomies and client names to their respective custom
 * columns. The taxonomies should be comma separated anchors similar to post
 * categories and tags behavior.
 *
 * @param $column Custom columns
 * @param $post_id Post ID
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_columns_content( $column, $post_id ) {
	
	global $post;
	
	switch ( $column ) {
		
		case 'wap8-client-column' : // client column
		
			$client = get_post_meta( $post->ID, '_wap8_client_name', true ); // get the client name from custom meta box
			
			if ( !empty( $client ) ) { // if a client name has been set
				
				echo $client;
				
			} else { // no client name has been set
				
				echo __( '<i>No client.</i>', 'wap8plugin-i18n' );
				
			}
			
			break;
		
		case 'wap8-services-column' : // services column
			
			$terms = get_the_terms( $post_id, 'wap8-services' ); // get the services for the post

			if ( !empty( $terms ) ) { // if terms were found

				$out = array();

				foreach ( $terms as $term ) { // loop through each term, linking to the 'edit posts' page for the specific term
					$out[] = sprintf(
						'<a href="%s">%s</a>',
						esc_url(
							add_query_arg(
								array(
									'wap8-portfolio'	=> $post->post_type,
									'wap8-services'		=> $term->slug
								), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'wap8-services', 'display' ) )
						);
				}

				echo join( ', ', $out ); // join the terms and separate with a coma
				
			}

			else { // if no terms were found, output a default message
				
				_e( '<i>No services.</i>', 'wap8plugin-i18n' );
				
			}
		
			break;
		
		case 'wap8-portfolio-tags-column' : // portfolio tags column
		
			$terms = get_the_terms( $post_id, 'wap8-portfolio-tags' ); // get the portfolio tags for the post

			if ( !empty( $terms ) ) { // if terms were found

				$out = array();

				foreach ( $terms as $term ) { // loop through each term, linking to the 'edit posts' page for the specific term
					$out[] = sprintf(
						'<a href="%s">%s</a>',
						esc_url(
							add_query_arg(
								array(
									'wap8-portfolio'		=> $post->post_type,
									'wap8-portfolio-tags'	=> $term->slug
								), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'wap8-portfolio-tags', 'display' ) )
						);
				}

				echo join( ', ', $out ); // join the terms and separate with a coma
				
			}

			else { // if no terms were found, output a default message
				
				_e( '<i>No portfolio tags.</i>', 'wap8plugin-i18n' );
				
			}
			
			break;
		
		default : // break out of the switch statement for everything else
		
			break;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* Make client column a sortable column
/*-----------------------------------------------------------------------------------*/

add_filter( 'manage_edit-wap8-portfolio_sortable_columns', 'wap8_portfolio_sortable_columns' );

/**
 * Portfolio sortable column.
 *
 * Let WordPress know the client column should be sortable.
 *
 * @param $columns Post columns
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_sortable_columns( $columns ) {

	$columns['wap8-client-column'] = 'wap8-client-column';

	return $columns;

}

add_action( 'load-edit.php', 'wap8_portfolio_edit_load' );

/**
 * Portfolio edit load.
 *
 * Using the load-edit hook to insure we are on the edit.php screen. If so, add
 * our custom filter to request.
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_edit_load() {
	
	add_filter( 'request', 'wap8_sort_portfolio_clients' );
	
}

/**
 * Sort portfolio clients.
 *
 * If we are sorting the client column, sort _wap8_client_name by meta_value.
 *
 * @param $vars
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_sort_portfolio_clients( $vars ) {
	
	if ( isset( $vars['post_type'] ) && 'wap8-portfolio' == $vars['post_type'] ) { // if we are viewing the portfolio post type
		
		if ( isset( $vars['orderby'] ) && 'wap8-client-column' == $vars['orderby'] ) { // if we are ordering by client
			
			$vars =
			
				array_merge(
					$vars,
						array(
							'meta_key' => '_wap8_client_name',
							'orderby' => 'meta_value'
					)
				);
			
		}
		
	}
	
	return $vars;
	
}

?>