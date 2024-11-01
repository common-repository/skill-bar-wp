<?php 
/**
 * WP_Skill_Bar class
 *
 * @class WP_Skill_Bar The class that holds the entire WP_Skill_Bar plugin
 */
if (! class_exists( 'WP_Skill_Bar' ) ) {
    
    class WP_Skill_Bar{

        /**
         * Singleton pattern
         *
         * @var bool $instance
         */
        private static $instance = null;

        /**
         * Initializes the WP_Skill_Bar class
         *
         * Checks for an existing WP_Skill_Bar instance
         * and if it cant't find one, then creates it.
         */
        public static function getInstance(){
            if(is_null(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }
    
        /**
         * Define all files constant
         *
         * @since  1.0
         *
         * @return void
         */
        public function __construct(){

            $this->init();

        }

        /**
         * Load all file
         *
         * @since  1.0
         *
         * @return void
         */
        public function init(){

            if( is_admin() ){

                require_once ( plugin_dir_path(__FILE__) . '../admin/skill-post-type.php');
                require_once ( plugin_dir_path(__FILE__) . '../admin/skill-metabox.php');
                require_once ( plugin_dir_path(__FILE__) . '../admin/admin-scripts.php');
                require_once ( plugin_dir_path(__FILE__) . '../admin/settings.php');
                
            }

            add_action( 'wp_enqueue_scripts', array($this,'skillbarwp_front_end_scripts') );

            register_activation_hook(__FILE__, 'install');
    
            register_deactivation_hook(__FILE__, 'deactivate');

        }
        
        /**
         * Enqueue scripts and styles.
         *
         * @since  1.0
         *
         * @return void
         */
        public function skillbarwp_front_end_scripts() {

            wp_enqueue_style('skillbarwp-style-css', plugin_dir_url(__FILE__).  'css/wpskill.css');

            wp_enqueue_script( 'jquery' );
            
            wp_enqueue_script('skillbarwp-jquery-inview-js', plugin_dir_url(__FILE__).  'js/jquery.inview.js');

            wp_enqueue_script('skillbarwp-jquery-js', plugin_dir_url(__FILE__).  'js/wpskill.js');

        }
    
    }  

}



