<?php

if( ! defined ( 'ABSPATH' ) ) exit;

add_action('add_meta_boxes','skill_settings_metabox');

function skill_settings_metabox(){
    add_meta_box('setting_metabox_id', __('Skill Settings','skillbarwp'),'skill_setting_metabox_cb','skillbar','normal','low');
}

function skill_setting_metabox_cb(){
    global $post;
    $postID = get_post_custom( $post->ID );
    $skill_title_color = ( isset( $postID['skill_title_color'][0] ) ) ? sanitize_text_field( $postID['skill_title_color'][0] ) : '';
    $skill_bar_bg_color = ( isset( $postID['skill_bar_bg_color'][0] ) ) ? sanitize_text_field( $postID['skill_bar_bg_color'][0] ) : '';
    $skill_bar_percentage_bg_color = ( isset( $postID['skill_bar_percentage_bg_color'][0] ) ) ? sanitize_text_field( $postID['skill_bar_percentage_bg_color'][0] ) : '';
    $skill_value_bg_color = ( isset( $postID['skill_value_bg_color'][0] ) ) ? sanitize_text_field( $postID['skill_value_bg_color'][0] ) : '';

    $skill_title_font_size = ( isset( $postID['skill_title_font_size'][0] ) ) ? sanitize_text_field( $postID['skill_title_font_size'][0] ) : '';

    $skill_value_font_size = ( isset( $postID['skill_value_font_size'][0] ) ) ? sanitize_text_field( $postID['skill_value_font_size'][0] ) : '';
    
   
    ?>

        <div class="skill_settings_options">
            <div class="color_settings_option">
                <ul>
                    <li>
                        <label><?php _e('Title Color.', 'skillbarwp' ); ?></label>
                        <input class="color_field" type="hidden" name="skill_title_color" value="<?php echo esc_attr( $skill_title_color ); ?>"/>
                    </li>
                    <li>
                        <label><?php _e('Bar BG Color.', 'skillbarwp' ); ?></label>
                        <input class="color_field" type="hidden" name="skill_bar_bg_color" value="<?php echo esc_attr( $skill_bar_bg_color ); ?>"/>
                    </li>
                    <li>
                        <label><?php _e(' Percentage Bar BG color.', 'skillbarwp' ); ?></label>
                        <input class="color_field" type="hidden" name="skill_bar_percentage_bg_color" value="<?php echo esc_attr( $skill_bar_percentage_bg_color ); ?>"/>
                    </li>
                    <li>
                        <label><?php _e('Percentage Value BG Color.', 'skillbarwp' ); ?></label>
                        <input class="color_field" type="hidden" name="skill_value_bg_color" value="<?php echo esc_attr( $skill_value_bg_color ); ?>"/>
                    </li>
                    <li>
                        <?php 

                        $titleFontSize = array(
                           '16px','17px','18px','19px','20px','22px','24px','26px','28px','30px'
                        );

                        ?>
                        <label><?php _e('Title Font Size','skillbarwp'); ?></label>
                        <select name="skill_title_font_size" id="skill_title_font_size">
                        <?php foreach ($titleFontSize as $titleFont) {
                            if($titleFont == get_post_meta($post->ID, 'skill_title_font_size', true)){
                                ?>
                                
                                    <option selected><?php echo esc_html( $titleFont ); ?></option>
                                <?php
                            }else{
                                ?>
                                
                                    <option><?php echo esc_html( $titleFont ); ?></option>
                                <?php
                            }
                            
                        }?>

                        </select>
                    </li>
                    <li>
                        <label><?php _e('Title Text Transform','skillbarwp'); ?></label>
                        <select name="skill_title_font_family" id="skill_title_font_family">
                            <?php 

                                $titleFontFamily = array(
                                    'capitalize','lowercase','uppercase'
                                );

                            ?>
                            <?php foreach ($titleFontFamily as $titlefFamily) {
                                if($titlefFamily == get_post_meta($post->ID, 'skill_title_font_family', true)){
                                    ?>
                                    
                                        <option selected><?php echo esc_html( $titlefFamily ); ?></option>
                                    <?php
                                }else{
                                    ?>
                                    
                                        <option><?php echo esc_html( $titlefFamily ); ?></option>
                                    <?php
                                }
                                
                            }?>
                            
                        </select>
                    </li>
                    <li>
                        <?php 

                        $valueFontSize = array(
                            '10px','12px','13px','14px','15px','16px', '18px', '20px'
                        );

                        ?>
                        <label><?php _e('Percentage Font Size','skillbarwp'); ?></label>
                        <select name="skill_value_font_size" id="skill_value_font_size">

                        <?php foreach ($valueFontSize as $percentageFont) {
                            if($percentageFont == get_post_meta($post->ID, 'skill_value_font_size', true)){
                                ?>
                                    
                                    <option selected><?php echo esc_html( $percentageFont ); ?></option>
                                <?php
                            }else{
                                ?>
                                    
                                    <option><?php echo esc_html( $percentageFont ); ?></option>
                                <?php
                            }
                        }?>

                        </select>
                    </li>
                    <li>
                        <label><?php _e('Bar Height','skillbarwp'); ?></label>
                        <select name="skill_bar_height" id="skill_bar_height">
                            <?php 

                                $skillbarHeight = array(
                                    '8px', '5px', '6px','7px','8px','9px','10px','11px','12px','13px','14px','15px','16px','17px','18px','19px','20px','22px','24px','26px','28px','30px','31px','32px','33px','34px','35px','36px','37px','38','39px','40px','41px','42px','43px','44px','45px','46px','47px','48px','49px','50px'
                                );

                            ?>
                            <?php foreach ($skillbarHeight as $heightValue) {
                                if($heightValue == get_post_meta($post->ID, 'skill_bar_height', true)){
                                    ?>
                                    
                                        <option selected><?php echo esc_html( $heightValue ); ?></option>
                                    <?php
                                }else{
                                    ?>
                                    
                                        <option><?php echo esc_html( $heightValue ); ?></option>
                                    <?php
                                }
                                
                            }?>
                            
                        </select>
                    </li>
                    <li>
                        <label><?php _e('Bar Border Radius','skillbarwp'); ?></label>
                        <select name="skill_bar_b_radius" id="skill_bar_b_radius">
                            <?php 

                                $borderRadius = array(
                                    '0px','1px','2px','3px','4px','5px','6px','7px','8px','9px','10px','12px','14px','16px','18px','20px'
                                );

                            ?>
                            <option value="0.25rem"><?php _e('0.25rem','skillbarwp'); ?></option>
                            <?php foreach ($borderRadius as $rValue) {
                                if($rValue == get_post_meta($post->ID, 'skill_bar_b_radius', true)){
                                    ?>
                                    
                                        <option selected><?php echo esc_html( $rValue ); ?></option>
                                    <?php
                                }else{
                                    ?>
                                    
                                        <option><?php echo esc_html( $rValue ); ?></option>
                                    <?php
                                }
                                
                            }?>
                            
                        </select>
                    </li>
                </ul>
                
                
            </div>
            
        </div>
        
        <input type="hidden" name="wpskill_settings_save_meta_data_action" id="wpskill_settings_save_meta_data_action">

    <?php
}


include_once 'setting-data-save.php';


add_action( 'admin_enqueue_scripts', 'settings_color_script');
 
if ( ! function_exists( 'settings_color_script' ) ){
	function settings_color_script( $hook ) {
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');
	}
}