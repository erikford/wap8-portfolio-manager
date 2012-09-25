<?php

/*-----------------------------------------------------------------------------------*/
/* Portfolio help tabs content
/*-----------------------------------------------------------------------------------*/

/**
 * Portfolio help tabs content.
 *
 * The content to be displayed in the portfolio help tabs.
 *
 * @param $tab Currently active tab
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_help_tabs_content( $tab = 'wap8_portfolio_help_meta' ) {
	
	if ( $tab == 'wap8_portfolio_help_meta' ) { // if custom meta data tab is active
		
		ob_start(); // opening an output buffer to store the HTML content ?>
			
			<h2><?php _e( 'Custom Meta Data', 'wap8plugin-i18n' ); ?></h2>
			
			<p><?php _e( 'The Case Study Information meta box contains optional fields for attaching post meta data to a post. If your currently active theme does not automatically support the display of this data, you will need to customized your templates accordingly.', 'wap8plugin-i18n' ); ?></p>
			
			<h3><?php _e( 'Display Custom Meta Data in your Theme', 'wap8lang' ); ?></h3>
			
			<p><?php _e( 'To easily display this content in your theme, you will need to use the <code>get_post_meta()</code> function <strong>inside of the loop</strong>. This function must take three parameters to work properly&mdash; <code>$post_id</code>, <code>$key</code> and <code>$single</code>.', 'wap8plugin-i18n' ); ?></p>
			
			<p><?php _e( 'Here is an example of how to display the client name, wrapped with a <code>&lt;p&gt;</code> tag, within your theme: <code>&lt;?php echo &apos;&lt;p&gt;&apos; . get_post_meta( $post-&gt;ID, &apos;_wap8_client_name&apos;, true ) . &apos;&lt;/p&gt;&apos;; ?&gt;</code>', 'wap8plugin-i18n' ); ?></p>
		
			<h3><?php _e( 'Portfolio Manager Custom Meta Keys', 'wap8lang' ); ?></h3>
			
			<p><?php _e( 'Below, you will find the three keys for the Case Study Information meta box.', 'wap8plugin-i18n' ); ?></p>
			
			<table>
				<tbody>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Client Name', 'wap8plugin-i18n' ); ?></th>
						<td><code>_wap8_client_name</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Project URL', 'wap8plugin-i18n' ); ?></th>
						<td><code>_wap8_project_url</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Project URL Text', 'wap8plugin-i18n' ); ?></th>
						<td><code>_wap8_project_url_text</code></td>
					</tr>
				</tbody>
			</table>
			
			<p><?php printf( __( 'Please see the WordPress Codex for <a href="%s" target="_blank">detailed information</a> about the <code>get_post_meta()</code> function.'), esc_url( 'http://codex.wordpress.org/Function_Reference/get_post_meta' ) ); ?></p>
		<?php
		
		return ob_get_clean(); // return the stored HTML content
	
	}
	
	if ( $tab == 'wap8_portfolio_help_template_tags' ) { // if template tags tab is active
		
		ob_start(); // opening an output buffer to store the HTML content ?>
		
			<h2><?php _e( 'Template Tags', 'wap8plugin-i18n' ); ?></h2>
			
			<p><?php _e( 'Included with Portfolio Manager are eight template tags for you to display a list of custom taxonomies associated with a portfolio post.', 'wap8plugin-i18n' ); ?></p>
			
			<h3><?php _e( 'Available Template Tags', 'wap8lang' ); ?></h3>
			
			<p><?php _e( 'These template tags <strong>must be placed inside the loop</strong> in order for theme to work as intended. We urge you to wrap your code with the conditional check of <code>&lt;?php if ( function_exists( &apos;wap8_portfolio&apos; ) ) ?&gt;</code>.', 'wap8plugin-i18n' ); ?></p>
			
			<table>
				<tbody>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Comma Separated Services with Links', 'wap8plugin-i18n' ); ?></th>
						<td><code>&lt;?php wap8_list_services( $post-&gt;ID ); ?&gt;</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Comma Separated Services without Links', 'wap8plugin-i18n' ); ?></th>
						<td><code>&lt;?php wap8_list_services_nolink( $post-&gt;ID ); ?&gt;</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Unordered List of Services with Links', 'wap8plugin-i18n' ); ?></th>
						<td><code>&lt;?php wap8_ul_services( $post-&gt;ID ); ?&gt;</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Unordered List of Services without Links', 'wap8plugin-i18n' ); ?></th>
						<td><code>&lt;?php wap8_ul_services_nolink( $post-&gt;ID ); ?&gt;</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Comma Separated Portfolio Tags with Links', 'wap8plugin-i18n' ); ?></th>
						<td><code>&lt;?php wap8_list_folio_tags( $post-&gt;ID ); ?&gt;</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Comma Separated Portfolio Tags without Links', 'wap8plugin-i18n' ); ?></th>
						<td><code>&lt;?php wap8_list_folio_tags_nolink( $post-&gt;ID ); ?&gt;</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Unordered List of Portfolio Tags with Links', 'wap8plugin-i18n' ); ?></th>
						<td><code>&lt;?php wap8_ul_folio_tags( $post-&gt;ID ); ?&gt;</code></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="text-align: right;"><?php _e( 'Unordered List of Portfolio Tags without Links', 'wap8plugin-i18n' ); ?></th>
						<td><code>&lt;?php wap8_ul_folio_tags_nolink( $post-&gt;ID ); ?&gt;</code></td>
					</tr>
				</tbody>
			</table>
			
			<p><?php _e( 'Comma separated template tags will return a list wrapped with a <code>&lt;p&gt;</code> tag. Unordered lists will be wrapped with the <code>&lt;ul&gt;</code> tag.', 'wap8plugin-i18n' ); ?></p>
			
			<p><?php printf( __( '<strong>Note:</strong> When using a template tag with links, the links will point to an archive for that custom taxonomy. If your currently active theme does not contain <a href="%1s">the optional templates</a>, the next available default templates, in <a href="%2s" target="_blank">the WordPress template hierarchy</a>, will be used.', 'wap8plugin-i18n' ), esc_url( admin_url( 'admin.php?page=wap8-portfolio-documentation' ) ), esc_url( 'http://codex.wordpress.org/Template_Hierarchy' ) ); ?></p>
		
		<?php
		
		return ob_get_clean(); // return the stored HTML content
		
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Add portfolio help tabs
/*-----------------------------------------------------------------------------------*/

add_action( 'load-post.php', 'wap8_portfolio_help_tabs' );
add_action( 'load-post-new.php', 'wap8_portfolio_help_tabs' );

/**
 * Portfolio help tabs.
 *
 * Add help tabs to the portfolio post editor screen.
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_help_tabs() {
	
	$screen = get_current_screen();
    
    if ( $screen->id != 'wap8-portfolio' ) return; // if this is not the editor screen for portfolio posts, do nothing
    
    $screen->add_help_tab( array(
    	'id'		=> 'wap8_portfolio_help_meta',
		'title'		=> __( 'Custom Meta Data', 'wap8plugin-i18n' ),
		'content'	=> wap8_portfolio_help_tabs_content( 'wap8_portfolio_help_meta' )
		)
	);
	
	$screen->add_help_tab( array(
    	'id'		=> 'wap8_portfolio_help_template_tags',
		'title'		=> __( 'Template Tags', 'wap8plugin-i18n' ),
		'content'	=> wap8_portfolio_help_tabs_content( 'wap8_portfolio_help_template_tags' )
		)
	);
	
}

?>