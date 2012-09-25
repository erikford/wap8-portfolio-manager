<?php

/*-----------------------------------------------------------------------------------*/
/* Documentation page content
/*-----------------------------------------------------------------------------------*/

/**
 * Portfolio Manager Documentation page content.
 *
 * The HTML content to be displayed on the Portfolio Manager Documentation page.
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_doc_page() {
	
	ob_start(); // opening an output buffer to store the HTML ?>
	
	<div class="wrap">
		<h2><?php _e( 'Portfolio Manager Documentation', 'wap8plugin-i18n' ); ?></h2>
		
		<p><?php printf( __( 'Thank you for downloading and installing our Portfolio Manager plugin. This plugin was developed by <a href="%s" target="_blank">We Are Pixel8</a>, a custom WordPress theme shop, as an out of the box solution for portfolio content management within a WordPress website.', 'wap8plugin-i18n' ), esc_url( 'http://www.wearepixel8.com' ) ); ?></p>
			
		<p><?php _e( 'This plugin registers a custom post type developed specifically for organizing and displaying your portfolio posts. Portfolio Manager will also register custom taxonomies for Services and Portfolio Tags, supports post-thumbnails and comes with a custom widget for displaying recent portfolio posts in your widget ready areas.', 'wap8plugin-i18n' ); ?></p>
		
		<h3><?php _e( 'Optional Templates', 'wap8plugin-i18n' ); ?></h3>
		
		<p><?php printf( __( 'If your currently active theme does not contain the following optional templates, the next available default template, in <a href="%s" target="_blank">the WordPress template hierarchy</a>, will be used.', 'wap8plugin-i18n' ), esc_url( 'http://codex.wordpress.org/Template_Hierarchy' ) ); ?></p>
		
		<table>
			<tbody>
				<tr valign="top">
					<th scope="row" style="text-align: right;"><?php _e( 'Single Portfolio', 'wap8plugin-i18n' ); ?></th>
					<td><code>single-wap8-portfolio.php</code></td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align: right;"><?php _e( 'Portfolio Archive', 'wap8plugin-i18n' ); ?></th>
					<td><code>archive-wap8-portfolio.php</code></td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align: right;"><?php _e( 'Services Archive', 'wap8plugin-i18n' ); ?></th>
					<td><code>taxonomy-wap8-services.php</code></td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align: right;"><?php _e( 'Portfolio Tags Archive', 'wap8plugin-i18n' ); ?></th>
					<td><code>taxonomy-wap8-portfolio-tags.php</code></td>
				</tr>
			</tbody>
		</table>
			
		<h3><?php _e( 'Custom Meta Data', 'wap8plugin-i18n' ); ?></h3>
		
		<p><?php _e( 'Portfolio Manager will add a custom meta box to the portfolio post editor titled, Case Study Information. The Case Study Information meta box contains optional fields for attaching post meta data to a post. If your currently active theme does not automatically support the display of this data, you will need to customized your templates accordingly, inside the loop, using <code>get_post_meta( $post_id, $key, $single )</code>.', 'wap8plugin-i18n' ); ?></p>
		
		<p><?php _e( 'The available custom meta keys are:', 'wap8plugin-i18n' ); ?></p>
		
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
		
		<h3><?php _e( 'Template Tags', 'wap8plugin-i18n' ); ?></h3>
		
		<p><?php _e( 'If you are a theme developer, or are comfortable developing for WordPress, we have added template tags for you to use anywhere within your theme inside of the loop. For safe measures, <strong>always</strong> wrap these template tags with the conditional statement, <code>&lt;?php if ( function_exists( &apos;wap8_portfolio&apos; ) ); ?&gt;</code>.', 'wap8plugin-i18n' ); ?></p>
		
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
		
		<p><?php _e( 'Comma separated template tags will return a list wrapped with a <code>&lt;p&gt;</code> tag. Unordered lists will be wrapped with the <code>&lt;ul&gt;</code> tag. When using a template tag with links, the links will point to an archive for that custom taxonomy. If your currently active theme does not contain the optional templates, the next available default template will be used. Please see <strong>Optional Templates</strong> for more information.', 'wap8plugin-i18n' ); ?></p>
	</div>
	
	<?php
	
	echo ob_get_clean(); // echo out the stored HTML
	
}

/*-----------------------------------------------------------------------------------*/
/* Add Portfolio Manager menu page
/*-----------------------------------------------------------------------------------*/

add_action( 'admin_menu', 'wap8_portfolio_add_menu_page' );

/**
 * Add Portfolio Manager menu page.
 *
 * Add Portfolio Manager admin menu link using add_menu_page.
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_add_menu_page() {
	
	add_menu_page(
		__( 'Portfolio Manager Documentation', 'wap8plugin-i18n' ),			// page title
		__( 'Portfolio Manager', 'wap8plugin-i18n' ),						// menu title
		'edit_posts',														// only viewable by anyone who has edit-posts capabilities
		'wap8-portfolio-documentation',										// unique slug
		'wap8_portfolio_doc_page',											// page content callback function
		plugin_dir_url( dirname( __FILE__ ) ) . 'images/portfolio-doc.png',	// menu icon
		90																	// menu position
	);
	
}

?>