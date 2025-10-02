<?php
/**
 * Front Page
 *
 * @package War News
 */
get_header();

$war_news_enable_frontpage = get_theme_mod('war_news_enable_frontpage', false);

if ($war_news_enable_frontpage) {
    ?>
    <div class="wn-container">
        <div id="wn-top-section">
            <?php get_template_part('home-parts/top-section'); ?>
        </div>

        <div id="wn-middle-section" class="wn-clearfix">
            <div id="primary">
                <?php get_template_part('home-parts/middle-left-section'); ?>
            </div>

            <div id="secondary" class="widget-area">
                <?php dynamic_sidebar('war-news-frontpage-sidebar') ?>
            </div>
        </div>

        <div id="wn-carousel-section">
            <?php get_template_part('home-parts/carousel-section'); ?>
        </div>

        <div id="wn-bottom-section">
            <?php get_template_part('home-parts/bottom-section'); ?>
        </div>
    </div>
    <?php
} else {
    if ('posts' == get_option('show_on_front')) {
        include( get_home_template() );
    } else {
        include( get_page_template() );
    }
}

get_footer();
