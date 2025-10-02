<?php
/**
 * @package War News
 */
$war_news_sidebar_layout = "right-sidebar";

if (is_singular(array('post', 'page'))) {
    $war_news_sidebar_layout = get_post_meta($post->ID, 'war_news_sidebar_layout', true);
    if (!$war_news_sidebar_layout) {
        $war_news_sidebar_layout = "right-sidebar";
    }
}

if ($war_news_sidebar_layout == "no-sidebar" || $war_news_sidebar_layout == "no-sidebar-condensed") {
    return;
}

if (is_active_sidebar('war-news-sidebar') && $war_news_sidebar_layout == "right-sidebar") {
    ?>
    <div id="secondary" class="widget-area">
        <?php dynamic_sidebar('war-news-sidebar'); ?>
    </div><!-- #secondary -->
    <?php
}

if (is_active_sidebar('war-news-left-sidebar') && $war_news_sidebar_layout == "left-sidebar") {
    ?>
    <div id="secondary" class="widget-area">
        <?php dynamic_sidebar('war-news-left-sidebar'); ?>
    </div><!-- #secondary -->
    <?php
}