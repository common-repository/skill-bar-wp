<?php

/**
 * Plugin Name: Skill Bar WP
 * Plugin URI:  https://github.com/arif123456/wp-skill-bar
 * Description: A WordPress progress bar plugin for showing skills in percentage at any post or  page. Progress bar is useful for website owners to show skills. The Progress bar plugin adds beautiful progress bars or progress meter by generating a shortcode.
 * Version:     1.0.6
 * Author:      WPFound
 * Author URI   https://github.com/arif123456
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: skillbarwp
 */

 if( ! defined( 'ABSPATH' ) ){
    exit;
 }

require_once ( plugin_dir_path(__FILE__) . '/inc/class-template.php');

require_once ( plugin_dir_path(__FILE__) . '/inc/shortcode.php');

function wpskillbar_init(){

    WP_Skill_Bar::getInstance();
    
}
add_action('plugins_loaded','wpskillbar_init');