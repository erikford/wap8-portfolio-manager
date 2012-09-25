<?php

/*-----------------------------------------------------------------------------------*/
/* Portfolio custom post type updated messages
/*-----------------------------------------------------------------------------------*/
 
add_filter( 'post_updated_messages', 'wap8_updated_portfolio_messages' );

/**
 * Updated portfolio messages.
 *
 * Customizing post updated messages for the wap8-portfolio custom post type.
 *
 * @param $messages Post updated messages
 * @return $messages Custom post updated messages
 *
 * @package Portfolio Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_updated_portfolio_messages( $messages ) {

	global $post, $post_ID;

	$messages['wap8-portfolio'] = array(
		0	=> '', // Unused. Messages start at index 1.
		1	=> sprintf( __( 'Case study updated. <a href="%s">View case study</a>', 'wap8plugin-i18n' ), esc_url( get_permalink( $post_ID ) ) ),
		2	=> __( 'Custom field updated.', 'wap8plugin-i18n' ),
		3	=> __( 'Custom field deleted.', 'wap8plugin-i18n' ),
		4	=> __( 'Case study updated.', 'wap8plugin-i18n' ),
		/* translators: %s: date and time of the revision */
		5	=> isset( $_GET['revision'] ) ? sprintf( __( 'Case study restored to revision from %s', 'wap8plugin-i18n' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
		6	=> sprintf( __( 'Case study published. <a href="%s">View case study</a>', 'wap8plugin-i18n' ), esc_url( get_permalink( $post_ID ) ) ),
		7	=> __( 'Case study saved.', 'wap8plugin-i18n' ),
		8	=> sprintf( __( 'Case study submitted. <a target="_blank" href="%s">Preview case study</a>', 'wap8plugin-i18n' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9	=> sprintf( __( 'Case study scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview case study</a>', 'wap8plugin-i18n' ),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i', 'wap8lang' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10	=> sprintf( __( 'Case study draft updated. <a target="_blank" href="%s">Preview case study</a>', 'wap8plugin-i18n' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);

	return $messages;

}

?>