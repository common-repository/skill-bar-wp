<?php 

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wpskill_settings_save_meta($post_id){
    if (isset($_POST['wpskill_settings_save_meta_data_action'])) {

        $skill_title_color                  = isset( $_POST['skill_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_title_color'] ) ) : '';
        
        $skill_bar_bg_color                 = isset( $_POST['skill_bar_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_bar_bg_color'] ) ) : '';

        $skill_bar_percentage_bg_color      = isset( $_POST['skill_bar_percentage_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_bar_percentage_bg_color'] ) ) : '';

        $skill_value_bg_color               = isset( $_POST['skill_value_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_value_bg_color'] ) ) : '';

        $skill_title_font_size              = isset( $_POST['skill_title_font_size'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_title_font_size'] ) ) : '';

        $skill_value_font_size              = isset( $_POST['skill_value_font_size'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_value_font_size'] ) ) : '';

        $skill_title_font_family            = isset( $_POST['skill_title_font_family'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_title_font_family'] ) ) : '';

        $pValue_font_family                 = isset( $_POST['pValue_font_family'] ) ? sanitize_text_field( wp_unslash( $_POST['pValue_font_family'] ) ) : '';

        $skill_bar_height                   = isset( $_POST['skill_bar_height'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_bar_height'] ) ) : '';

        $skill_bar_b_radius                 = isset( $_POST['skill_bar_b_radius'] ) ? sanitize_text_field( wp_unslash( $_POST['skill_bar_b_radius'] ) ) : '';
   

        update_post_meta( $post_id, 'skill_title_color', $skill_title_color );
        update_post_meta($post_id, 'skill_bar_bg_color', $skill_bar_bg_color );
        update_post_meta($post_id, 'skill_bar_percentage_bg_color', $skill_bar_percentage_bg_color );
        update_post_meta($post_id, 'skill_value_bg_color', $skill_value_bg_color );

        update_post_meta($post_id, 'skill_title_font_size', $skill_title_font_size );
        update_post_meta($post_id, 'skill_value_font_size', $skill_value_font_size );

       
        update_post_meta($post_id, 'skill_title_font_family', $skill_title_font_family );
        update_post_meta($post_id, 'pValue_font_family', $pValue_font_family );

        update_post_meta($post_id, 'skill_bar_height', $skill_bar_height );
        update_post_meta($post_id, 'skill_bar_b_radius', $skill_bar_b_radius );
    }
}
add_action('save_post','wpskill_settings_save_meta');