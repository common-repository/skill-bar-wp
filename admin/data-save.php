<?php 

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wpskillbar_wp_save_meta_data($post_id){

    if( isset( $_POST['wpskill_save_meta_data_action'] ) ) {

        $arrayField = array();
        $oldArrayField = get_post_meta($post_id, 'wpskillbar_save_meta_value', true);

        $progressTitle = array_map( 'sanitize_text_field', wp_unslash( $_POST['skill_title'] ) );
        $progressValue = array_map( 'sanitize_text_field', wp_unslash( $_POST['skill_value'] ) );
        $subText = array_map( 'sanitize_text_field', wp_unslash( $_POST['skill_sub_text'] ) );
        
        $count = count($progressTitle);

        for ($i=0; $i < $count; $i++) { 
            if($progressTitle[$i] != ''){
                $arrayField[$i]['skill_title'] = stripslashes($progressTitle[$i]);
                $arrayField[$i]['skill_value'] = stripslashes($progressValue[$i]);
                $arrayField[$i]['skill_sub_text'] = stripslashes($subText[$i]);
            }
        }
        
        if( !empty($arrayField) && $arrayField != $oldArrayField){
            update_post_meta( $post_id, 'wpskillbar_save_meta_value', $arrayField );
        }elseif( empty($arrayField) && $oldArrayField){
            delete_post_meta( $post_id, 'wpskillbar_save_meta_value', $oldArrayField );
        }
        
    }

}
add_action('save_post', 'wpskillbar_wp_save_meta_data');