<?php
include_once 'include/theme-options.php';


class HMA_WEEDWEED {

    function __construct() {
        add_action('init', array($this, 'hma_init'));
        add_action('wp_enqueue_scripts', array($this, 'hma_wp_enqueue_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'hma_admin_enqueue_scripts'));
        add_action('add_meta_boxes', array($this, 'hma_add_meta_boxes'));
        add_action('save_post', array($this, 'hma_save_post'));
        add_action('wp_head', array($this, 'hma_wp_head'));
        add_filter('use_block_editor_for_post', '__return_false', 10);
        add_filter('use_block_editor_for_post_type', '__return_false', 10);
        add_shortcode('hma_print_nave_items', array($this, 'hma_print_nav_menu'));
        add_action('init', array($this, 'hma_include_core_plugin_file'));
        
        $this->hma_ajax_action_hooks();
    }

    function hma_wp_head() {
      
    }

    function hma_wp_enqueue_scripts() {      
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', '', true, 'all');
        wp_enqueue_script('bootstrap.min.js', get_template_directory_uri() . '/js/bootstrap.min.js', '', true, 'all');
        wp_enqueue_script('jquery.lazy.min.js', get_template_directory_uri() . '/js/jquery.lazy.min.js', '', true, 'all');
        wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/js/scripts.js', '', true, 'all');
        wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome.min.css', array(), false, 'all');
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', array(), false, 'all');
                
    }

    function hma_admin_enqueue_scripts() {
        wp_enqueue_media(); // open wp media box
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');

        wp_enqueue_script('jquery-ui-min-js', get_template_directory_uri() . '/js/jquery-ui.min.js');
        wp_enqueue_script('select2.min.js', get_template_directory_uri() . '/js/select2.min.js');
        wp_enqueue_script('bootstrap.min.js', get_template_directory_uri() . '/js/bootstrap.min.js', '', true, 'all');
        wp_enqueue_script('admin-js', get_template_directory_uri() . '/js/admin.js', '', true, 'all');

        wp_enqueue_style('jquery-ui-min-css', get_template_directory_uri() . '/css/jquery-ui.min.css');
        wp_enqueue_style('select2.min.css', get_template_directory_uri() . '/css/select2.min.css');
        wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
        wp_enqueue_style('admin-css', get_template_directory_uri() . '/css/admin.css', array(), false, 'all');
    }

    function hma_include_core_plugin_file() {
        if (!function_exists('is_plugin_active')) {
            include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
        }
    }

    function hma_ajax_action_hooks() {
        $ajax_actions = [           
        ];

        foreach ($ajax_actions as $action) {
            add_action('wp_ajax_' . $action, array($this, $action));
            add_action('wp_ajax_nopriv_' . $action, array($this, $action));
        }
    }

    
    function hma_init() {
        $theme_support_arr = ['menus', 'post-thumbnails', 'title-tag'];
        foreach ($theme_support_arr as $heme_support) {
            add_theme_support($heme_support);
        }
        $this->hma_cpt();
        register_nav_menus([
            'main-menu' => __('Main Menu'),
        ]);
    }

    function hma_cpt() {
        include_once 'include/custom-post-types.php';
    }

   
    function hma_add_meta_boxes() {
        //add_meta_box('hma-planx-metabox', __('Plan Settings'), array($this, 'hma_plan_metabox_view'), 'price_plan');
        
    }

    function hma_plan_metabox_view($post) {
        $post_id = $post->ID;
        
    }  
    function hma_save_post($post_id) {
        
    }

  

    function hma_has_media_form_ation() {
        $thumnail_id = $this->hma_handle_attachment('media_picker');
        echo json_encode(array(
            'thumnail_id' => $thumnail_id,
            'image' => '<img src="' . wp_get_attachment_url($thumnail_id) . '">',
            'image_url' => wp_get_attachment_url($thumnail_id),
        ));
        wp_die();
    }

    function hma_handle_attachment($file_handler, $post_id = 0) {
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');
        $attach_id = media_handle_upload($file_handler, $post_id);
        return $attach_id;
    }  

}

new HMA_WEEDWEED();
