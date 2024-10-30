<?php
/*
Plugin Name: Market Trends Comparison Graph
Version: 1.0
Description: Add fun and interest to your sidebar by installing this Market Trends Comparison Graph creator. 
You add 2 markets' names and a dynamically created graph compares the markets' popularity with live trend data from Google.
The image is compiled by Google and this gadget author has no control over what is displayed nor the accuracy of it.
Author:David Johnston - MoneyBlogNewz
Author URI: http://wordpress.org/support/profile/personalmoneystore/
Plugin URI: http://personalmoneystore.com/moneyblog/market-trends-comparison-graph/
*/
 /*
   Copyright 2010  Director of Personal Money Store: David Johnston  (email : webmaster@personalmoneystore.com)
   The image is compiled by Google and this gadget author has no control over what is displayed or the accuracy of it.
   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software

  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
   */
 global $wp_version;
	$exit_msg = 'WP Market Trends Comparison Graph requires WordPress 2.6 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';

	if (version_compare($wp_version, "2.6", "<")) {
      exit($exit_msg);
	}
            $wp_lmt_plugin_url =  trailingslashit( WP_PLUGIN_URL.'/'. dirname( plugin_basename(__FILE__) ));

function WPlmt_WidgetControl()
{
	// get saved options
	$options = get_option('wp_lmt');
	// handle user input

	if ($_POST["lmt_submit"]) {

	// retireve ppw title from the request

		$options['lmt_title'] = strip_tags(stripslashes($_POST["lmt_title"]));
                $options['lmt_first_name'] = strip_tags(stripslashes($_POST["lmt_first_name"]));
		$options['lmt_second_name'] = strip_tags(stripslashes($_POST["lmt_second_name"]));
		$options['lmt_enable_checkbox'] = strip_tags(stripslashes($_POST["lmt_enable_checkbox"]));

 		// update the options to database

        update_option('wp-lmt', $options);

	}

	$lmt_title = $options['lmt_title'];

	$lmt_first_name = $options['lmt_first_name'];

	$lmt_second_name = $options['lmt_second_name'];

	$lmt_enable_checkbox = $options['lmt_enable_checkbox'];

	// print out the widget control, links to widget control    

	include('wp-lmt-widgetcontrol.php');

}  

function WPlmt_Widget($args = array())
{      
	// extract the parameters
	extract($args);
	// get our options
	$options = get_option('wp-lmt');
	$lmt_title = $options['lmt_title'];
	$lmt_first_name = $options['lmt_first_name'];
	$lmt_second_name = $options['lmt_second_name'];
	$lmt_enable_checkbox = $options['lmt_enable_checkbox'];

	// print the theme compatibility code

	echo $before_widget;
	echo $before_title . $lmt_title. $after_title;

	// include our widget
	include('wp-lmt-widget.php');
	echo $after_widget;
}
//loads from the start

function WPlmt_Init(){

	// register widget
	register_sidebar_widget('WP  Market Trends Comparison Graph', 'WPlmt_Widget');
	// register widget control
	register_widget_control('WP  Market Trends Comparison Graph', 'WPlmt_WidgetControl');
}

add_action('init', 'WPlmt_Init');

//links to css
add_action('wp_head', 'WPlmt_HeadAction');

function WPlmt_HeadAction()
{
	global $wp_lmt_plugin_url;

    echo '<link rel="stylesheet" href="' . $wp_lmt_plugin_url . '/wp-lmt.css" type="text/css" />';

}

//links to javascript

add_action('wp_print_scripts', 'WPlmt_ScriptsAction');

function WPlmt_ScriptsAction()
{
	if (!is_admin()) {

	global $wp_lmt_plugin_url;

	wp_enqueue_script('jquery');

	wp_enqueue_script('jquery-form');

	wp_enqueue_script('wp_lmt_script', $wp_lmt_plugin_url . '/wp-lmt.js', array('jquery', 'jquery-form'));
	}
}?>