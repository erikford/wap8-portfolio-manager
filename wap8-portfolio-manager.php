<?php

/*
Plugin Name: Portfolio Manager
Plugin URI: http://www.wearepixel8.com
Description: Add the power of portfolio management to your WordPress website with Portfolio Manager.
Version: 1.0.0
Author: We Are Pixel8
Author URI: http://www.wearepixel8.com
License:
	Copyright 2012 We Are Pixel8 <hello@wearepixel8.com>
	
	This program is free software; you can redistribute it and/or modify it under
	the terms of the GNU General Public License, version 2, as published by the Free
	Software Foundation.
	
	This program is distributed in the hope that it will be useful, but WITHOUT ANY
	WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
	PARTICULAR PURPOSE. See the GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software Foundation, Inc.,
	51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

/*-----------------------------------------------------------------------------------*/
/* Constants
/*-----------------------------------------------------------------------------------*/

define( 'WAP8PORTFOLIO', plugin_dir_path( __FILE__ ) );

/*-----------------------------------------------------------------------------------*/
/* Includes
/*-----------------------------------------------------------------------------------*/

include( WAP8PORTFOLIO . 'includes/wap8-portfolio-taxonomies.php' ); // register custom taxonomies
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-registration.php' ); // register custom custom post type
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-meta-boxes.php' ); // add custom meta boxes to the post editor screen
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-help-tabs.php' ); // add help tabs to the portfolio post editor screen
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-updated-messages.php' ); // custom post updated messages
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-custom-columns.php' ); // add custom columns to custom post type edit screen
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-widget.php' ); // portfolio widget
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-template-tags.php' ); // custom template tags
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-admin-pages.php' ); // custom template tags

/*-----------------------------------------------------------------------------------*/
/* Load language file
/*-----------------------------------------------------------------------------------*/

add_action( 'plugins_loaded', 'wap8_portfolio_text_domain');

/**
 * Portfolio text domain.
 *
 * Load the text domain for internationalization.
 *
 * @package Portfolio Custom Post Type
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_text_domain() {
	
	load_plugin_textdomain( 'wap8plugin-i18n', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
}

?>