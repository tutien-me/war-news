<?php

/**
 * @package War News
 */
$war_news_frontpage_carousel_blocks = get_theme_mod('war_news_frontpage_carousel_blocks', json_encode(array(
    array(
        'title' => esc_html__('Title', 'war-news'),
        'category' => '',
        'slide_no' => '4',
        'post_no' => '6',
        'enable' => 'on'
        ))));

if ($war_news_frontpage_carousel_blocks) {
    $war_news_frontpage_carousel_blocks = json_decode($war_news_frontpage_carousel_blocks);
    foreach ($war_news_frontpage_carousel_blocks as $war_news_frontpage_carousel_block) {
        if ($war_news_frontpage_carousel_block->enable == 'on') {

            $args = array(
                'title' => $war_news_frontpage_carousel_block->title,
                'cat' => $war_news_frontpage_carousel_block->category,
                'slide_no' => $war_news_frontpage_carousel_block->slide_no,
                'post_no' => $war_news_frontpage_carousel_block->post_no
            );

            do_action('war_news_carousel_section', $args);
        }
    }
}