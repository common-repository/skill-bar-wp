<?php

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
   exit;
}

/**
 * Define shortcode
 *
 * @since  1.0
 *
 * @return void
 */
function wpskillbar_shortcode($id){

   ob_start();
   
   if(isset($id['id'])){
      $WPSKILLBAR = $id['id'];
   }
    
   global $post;
   $args = array(
      'orderby' => 'date',
      'order' => 'DESC',
      'post_type' =>  'skillbar',
      'page_id'     => $WPSKILLBAR
  );


   $query = new WP_Query($args);

   ?>
      <?php if ($query->have_posts()) : ?>
         <?php while($query->have_posts()): $query->the_post(); ?>
            <?php 

               $repeatField =   get_post_meta($post->ID, 'wpskillbar_save_meta_value', true);
               
               if($repeatField != ''){
                  foreach ($repeatField as $value) {
                     ?>

                        <div class="skill-block">
                           <div class="single-item">
                              <h4><?php echo esc_html( $value['skill_title'] ); ?></h4>
                              <div class="skill-item">
                                 <div class="skill-percentage" aria-valuenow="<?php echo esc_attr( $value['skill_value'] ); ?>"><span><?php echo esc_html( $value['skill_value'] ); ?><label><?php esc_html_e( '%', 'skillbarwp' ); ?></label></span></div>
                              </div>

                              <?php if ( $value['skill_sub_text'] ) { ?>
                              <div class="sub_text">
                                 <p><?php echo esc_html( $value['skill_sub_text'] ); ?></p>
                              </div>
                              <?php } ?>
                            </div>

                        </div>

                     <?php
                        
                  }
               }else{
                   echo 'Not Found';
               }
               
            
            ?>

         <?php endwhile; ?>
      <?php endif; ?>
      
   <?php
   
   require_once 'style.php';

   return ob_get_clean();
   
}

add_shortcode('WPSKILLBAR','wpskillbar_shortcode');



