<?php 

/**
 * Metabox
 *
 * @since  1.0
 *
 * @return void
 */
function wpskill_bar_metabox(){
    add_meta_box('wpskillbar_meta_box_id', __('Add Skill','skillbarwp'),'wpskill_add_metabox_cb','skillbar','normal','low');
}
add_action('add_meta_boxes','wpskill_bar_metabox');

/**
 * Metabox function
 *
 * @since  1.0
 *
 * @return void
 */
function wpskill_add_metabox_cb($post){
            
    ?>

        <h4><?php  _e('Add Skill','skillbarwp'); ?></h4>
        
        

        <div id="wpskill_bar">

            <?php 

                $repeatField =   get_post_meta($post->ID, 'wpskillbar_save_meta_value', true);

                if(isset($repeatField) && is_array($repeatField)) 
                {

                    $i = 1;

                    foreach($repeatField as $singleValue)
                    {

                        ?>
                            <div id="repeatField">
                                <div class="single_filed_wrap">
                                    <div class="single_filed">
                                        <div class="input-field title-field">
                                            <label><?php _e('Progress Title','skillbarwp'); ?></label>
                                            <input type="text" name="skill_title[]" id="skill_title" value="<?php echo esc_attr( $singleValue['skill_title'] ); ?>">
                                        </div>
                                        <div class="input-field value-field">
                                            <label><?php _e('Progress Value','skillbarwp'); ?></label>
                                            <input type="text" name="skill_value[]" id="skill_value" value="<?php echo esc_attr( $singleValue['skill_value'] ); ?>">
                                        </div>
                                        <div class="remove-button">
                                            <a class="remove-btn" id="remove_btn"><i class="fab fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sub-text">
                                            <label><?php _e('Sub Text','skillbarwp'); ?></label>
                                            <input type="text" name="skill_sub_text[]" id="skill_sub_text" value="<?php echo esc_attr( $singleValue['skill_sub_text'] ); ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                                 
                            </div>
                           
                        <?php 
                    $i++; 
                    } 
                }else{
                    ?>

                        <div id="repeatField">
                            <div class="single_filed_wrap">
                                <div class="single_filed">
                                    <div class="input-field title-field">
                                        <label><?php _e('Progress Title','skillbarwp'); ?></label>
                                        <input type="text" name="skill_title[]" id="skill_title" value="">
                                    </div>
                                    <div class="input-field value-field">
                                        <label><?php _e('Progress Value','skillbarwp'); ?></label>
                                        <input type="text" name="skill_value[]" id="skill_value" value="">
                                    </div>
                                    <div class="remove-button">
                                        <a class="remove-btn" id="remove_btn"><i class="fab fa-trash"></i></a>
                                    </div>
                                </div>
                                <div>
                                    <div class="sub-text">
                                        <label><?php _e('Sub Text','skillbarwp'); ?></label>
                                        <input type="text" name="skill_sub_text[]" id="skill_sub_text" value="">
                                    </div>
                                </div>
                            </div>
                                
                        </div>

                    <?php
                }
            ?>

        </div>
        <input type="hidden" name="wpskill_save_meta_data_action" value="wpskill_save_meta_data_action" />

        <div class="action">
            <div class="add-item-btn">
                <a class="add_wpsm_ac_new" id="add_skill" onclick="add_skill()"><?php _e('Add New','skillbarwp'); ?></a>
            </div>
            <div class="remove-action">
                <a class="delete_all" id="delete_all">
                    <span><?php _e('Delete All','skillbarwp'); ?></span>
                </a>
            </div>
        </div>

        <script>
        
        function add_skill(){
            var output = `

                <div id="repeatField">
                    <div class="single_filed_wrap">
                        <div class="single_filed">
                        
                            <div class="input-field title-field">
                                <label><?php _e('Progress Title', 'skillbarwp'); ?></label>
                                <input type="text" name="skill_title[]" id="skill_title" value="">
                            </div>
                            <div class="input-field value-field">
                                <label><?php _e('Progress Value', 'skillbarwp'); ?></label>
                                <input type="text" name="skill_value[]" id="skill_value" value="">
                            </div>
                            <div class="remove-button">
                                <a class="remove-btn" id="remove_btn"><i class="fab fa-trash"></i></a>
                            </div>
                        </div>
                        <div>
                            <div class="sub-text">
                                <label><?php _e('Sub Text','skillbarwp'); ?></label>
                                <input type="text" name="skill_sub_text[]" id="skill_sub_text" value="">
                            </div>
                        </div>
                    </div>
                    
                </div>

            `;

            jQuery(output).hide().appendTo("#wpskill_bar").slideDown("slow");
        }
        
        </script>

    <?php
  
}

/**
 * Save data funciton
 *
 * @since  1.0
 *
 * @return void
 */
include_once 'data-save.php';

function wpskillbar_shortcode_meta(){
    add_meta_box('add_metabox_shortcode_id', __('ProgressBar Shortcode','skillbarwp'),'wpskillbar_shortcode_cb','skillbar','side','low');
}
add_action('add_meta_boxes','wpskillbar_shortcode_meta');

function wpskillbar_shortcode_cb(){
    ?>
        <div class="shortcode_field">
            <p><?php _e("Use below shortcode in any Page/Post to publish your skill", 'skillbarwp');?></p>
            <input type="text" name="skill_shortcode" value="<?php echo '[WPSKILLBAR id='.get_the_ID().']'?>">
        </div>

    <?php
}
