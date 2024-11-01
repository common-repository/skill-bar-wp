<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

/** 
 * 
 * add action progress bar post type
 * 
*/

add_action('init','wpskillbar_post_type');

/** 
 * 
 * register post type progress bar function
 * 
*/
function wpskillbar_post_type(){

    $labels  = array( 
        'name'                  => _x('Skill Bar Wp','skillbarwp'),
        'singular_name'         =>  _x('Skill Bar','skillbarwp'),
        'menu_name'             =>  __('Skill Bar WP','skillbarwp'),
        'parent_item_colon'   => __( 'Parent Item:', 'skillbarwp' ),
        'add_new_item'          =>  __('Add New','skillbarwp'),
        'add_new'               =>  __('Add New','skillbarwp'),
        'all_items'             =>  __('All Skill Bar','skillbarwp'),
        'view_item'             =>  __('View Skill Bar','skillbarwp'),
        'edit_item'             =>  __('Edit Skill Bar','skillbarwp'),
        'update_item'           =>  __('Update Skill Bar','skillbarwp'),
        'search_item'           =>  __('Search Skill Bar','skillbarwp'),
        'not_found'             =>  __('No Skill Bar Found','skillbarwp'),
        'not_found_in_trash'    =>  __('Not Skill Bar found in trash','skillbarwp'),
    );

    $args = array(

        'label'               => __( 'Skill Bar WP Panels', 'skillbarwp' ),
        'description'         => __( 'Skill Bar WP Panels', 'skillbarwp' ),
        'labels'              => $labels,
        'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', '', ),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-admin-tools',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',

    );

    register_post_type('skillbar',$args);
    

}