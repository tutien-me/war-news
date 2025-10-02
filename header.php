<?php
/**
 * @package War News
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div id="wn-page">
            <a class="skip-link screen-reader-text" href="#wn-content"><?php esc_html_e('Skip to content', 'war-news'); ?></a>
            <?php
            $war_news_top_header_display = get_theme_mod('war_news_top_header_display', 'yes');
            $war_news_top_header_style = get_theme_mod('war_news_top_header_style', 'light');
            $war_news_nav_style = get_theme_mod('war_news_nav_style', 'light');
            $war_news_main_header_text_color = get_theme_mod('war_news_main_header_text_color', 'black');
            ?>
            <header id="wn-masthead" class="wn-site-header">
                <?php if ($war_news_top_header_display == 'yes') { ?>
                    <div class="wn-top-header wn-<?php echo esc_attr($war_news_top_header_style) ?>">
                        <div class="wn-container">
                            <div class="wn-top-left-header">
                                <?php
                                /*
                                 * Left Header Hook
                                 * @hooked - war_news_show_date - 10
                                 * @hooked - war_news_header_text - 10
                                 */
                                do_action('war_news_left_header_content')
                                ?>
                            </div>

                            <div class="wn-top-right-header">
                                <?php
                                /*
                                 * Right Header Hook
                                 * @hooked - war_news_top_menu - 10
                                 */
                                do_action('war_news_right_header_content')
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="wn-header wn-<?php echo esc_attr($war_news_main_header_text_color) ?>">
                    <div class="wn-container">
                        <?php
                        /*
                         * Right Header Hook
                         * @hooked - war_news_left_header - 10
                         * @hooked - war_news_middle_header - 20
                         * @hooked - war_news_right_header - 30
                         */
                        do_action('war_news_main_header_content')
                        ?>
                    </div>
                </div>

                <?php if(war_news_is_amp()){ ?>
                    <div id="main-navigation-wrap" class="primary-navigation-wrap">
                        <button class="primary-search-toggle" <?php echo war_news_amp_search_toggle(); ?>>
                            <span class="mdi mdi-magnify search-icon"></span>
                        </button>
                        <button class="primary-menu-toggle menu-toggle" aria-controls="primary-menu" aria-expanded="false" <?php war_news_amp_menu_toggle(); ?>>
                            <span class="mdi mdi-menu menu-icon"></span>
                        </button>

                        <div class="primary-navigation">
                            <nav id="site-navigation" class="main-navigation" role="navigation" <?php war_news_amp_menu_is_toggled(); ?>>
                                <?php
                                wp_nav_menu(
                                        array(
                                            'theme_location' => 'viral-news-primary-menu',
                                            'menu_id'        => 'primary-menu',
                                            'container'      => false,
                                        )
                                );
                                ?>
                            </nav>
                        </div>
                    </div>
                <?php } else { ?>
                    <nav class="wn-main-navigation wn-<?php echo esc_attr($war_news_nav_style) ?>">
                        <div class="wn-container">
                            <div class="wn-header-search"><a href="#"><i class="mdi mdi-magnify"></i></a></div>
                            
                            <a href="#" class="wn-toggle-menu"><span></span></a>
                            <?php
                            wp_nav_menu(
                                    array(
                                        'theme_location' => 'viral-news-primary-menu',
                                        'container_class' => 'wn-menu wn-clearfix',
                                        'menu_class' => 'wn-clearfix',
                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    )
                            );
                            ?>
                        </div>
                    </nav>
                <?php } ?>
            </header>

            <div id="wn-content" class="wn-site-content">