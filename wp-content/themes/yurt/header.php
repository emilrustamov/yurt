<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="all"/> 
	<meta name="google-site-verification" content="lxifALjNpeN0rK2LMql-_3XwJ-Azh12sDDmo5v5oSXQ" />
	<link rel="stylesheet" href="/wp-content/themes/yurt/assets/css/fontawesome.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title><?php
        if (is_404()) {
            echo 'Error 404';
        } else {
           echo wp_title();
        }
        ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header>   
        <div class="header container-w m-auto">
        <?php
        $settings = '';
        if (get_locale() == 'en_GB') {
            $settings = 'settings-en';
        }if (get_locale() == 'ru_RU') {
            $settings = 'settings-ru';
        } else {
            $settings = 'settings-tm';
        }
        
            $posts = get_posts([
                'numberposts' => -1,
                'category_name' => $settings,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'post',
                'suppress_filters' => true,
            ]);
            foreach ($posts as $post) {
                setup_postdata($post);
                ?>
                <a href="/">
                <img src="<?= get_field('header_logo'); ?>" alt="yurt-logo" class="header-logo">
                </a>
                <?php
            }   
            wp_reset_postdata();
            ?>
            <div class="desktop">
            <?php
            wp_nav_menu(
                [
                    'theme_location' => 'main',
                    'menu_class' => 'nav',
                    'container' => false,
                    'menu_id' => ''
                ]
            );
            ?>
            </div> 
            <ul class="lang-switch desktop">
                <?php pll_the_languages(array('list'=>1)); ?>
            </ul>
            <div class="mobile">
            <?php foreach ($posts as $post) {
                setup_postdata($post);
                ?>
                <img src="<?= get_field('menu_icon');?>" alt="menu" class="menu-icon">
            
            </div>
<!-- 			style="display:none;" -->
            <div class="mobile-menu-block" >
                <div class="mobile-menu-item">
                    <div class="mobile-header">
                        <a href="/">
                        <img src="<?= get_field('header_logo'); ?>" alt="yurt-logo" class="mobile-logo">
                            </a>
                         <div class="close-mobile">
                         <img src="<?= get_field('menu_icon_close'); ?>" alt="close-menu">
                         </div>
                    </div>
                    <div class="mobile-menu-list">
                    <?php
                wp_nav_menu(
                [
                    'theme_location' => 'main',
                    'menu_class' => 'nav',
                    'container' => false,
                    'menu_id' => ''
                ]
                );
                ?>
                    </div>
                </div>
                <div class="mobile-menu-item">
                <ul class="lang-switch">
                <?php pll_the_languages(array('list'=>2)); ?>
                </ul>
                </div>
                </div> 
                <?php
                 }   
                wp_reset_postdata();
                ?>
            </div>
    </header>