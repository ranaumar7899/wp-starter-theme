<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php $theme_settings = get_option('theme_settings'); ?>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="shortcut icon" href="<?php echo wp_get_attachment_url($theme_settings['favicon_id']) ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
        <?php wp_head(); ?>
    </head>

</head>

<body <?php body_class() ?>>
    <div id="app" class="container-fluid">
        <nav class="row navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="<?php echo site_url() ?>"><img src="<?php echo wp_get_attachment_url($theme_settings['logo_id']) ?>" alt="<?php echo bloginfo('name') ?>"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavBar" aria-controls="mainNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavBar">
                <?php
                wp_nav_menu([                    
                    'theme_location' => 'main-menu',
                    'menu_class' => '',
                    'items_wrap' => '<ul id="%1$s" class="navbar-nav mr-auto">%3$s</ul>',
                ]);
                ?>                  
            </div>
        </nav> 
    </div>