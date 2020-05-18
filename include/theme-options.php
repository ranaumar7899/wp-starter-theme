<?php

class HMA_THEME_OPTIONS {

    function __construct() {
        add_action('admin_menu', array($this, 'hma_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'hma_admin_enqueue_scripts'));
    }

    function hma_admin_enqueue_scripts() {

        wp_enqueue_script('theme-options-js', get_template_directory_uri() . '/js/theme-options.js');

        wp_enqueue_style('theme-options-css', get_template_directory_uri() . '/css/theme-options.css');
    }

    function hma_admin_menu() {
        add_menu_page(__('Theme Options'), 'Theme Options', 'manage_options', 'theme-options', array($this, 'hma_theme_options'), 'dashicons-wordpress-alt');
    }

    function hma_theme_options() {
        if (count($_POST) > 0) {
            update_option('theme_settings', $_POST['theme_settings']);
        }
        $theme_settings = get_option('theme_settings');
        ?>
        <form method="post" id="to_form">
            <div class="wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12"><h2><?php esc_html_e('Theme Options') ?></h2></div>  
                    </div>

                    <div class="row hma_jquery_ui_tabs">
                        <div class="col-sm-2">
                            <ul class="to_btns_ul">
                                <li><a href="#tabs-1">Site Logo & Favicon</a></li>                         
                            </ul>
                        </div>
                        <div class="col-sm-8">
                            <div class="to_tab" id="tabs-1">
                                <table class="table">
                                    <tr>
                                        <td style="text-align: center">
                                            <span class="button button-primary hma_media_picker" data-idpicker="logo_id" data-imagepicker="logo_picker">Chose Logo</span>                                
                                            <input type="hidden" name="theme_settings[logo_id]" class="logo_id" value="<?php echo $theme_settings['logo_id'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="logo_picker" style="text-align: center"><img src="<?php echo wp_get_attachment_url($theme_settings['logo_id']) ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td style="text-align: center">
                                            <span class="button button-primary hma_media_picker" data-idpicker="favicon_id" data-imagepicker="favicon_picker">Chose Favicon</span>                                
                                            <input type="hidden" name="theme_settings[favicon_id]" class="favicon_id" value="<?php echo $theme_settings['favicon_id'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="favicon_picker" style="text-align: center"><img src="<?php echo wp_get_attachment_url($theme_settings['favicon_id']) ?>"></td>
                                    </tr> 
                                </table>
                            </div>                
                        </div>
                         <div class="col-sm-12">
                            <button type="submit" class="button button-primary"><i class="dashicons dashicons-category"></i> Save</button>
                        </div>
                    </div>                              
                </div>                
            </div>
        </div>
        </form>
        <?php
    }

}

new HMA_THEME_OPTIONS();
