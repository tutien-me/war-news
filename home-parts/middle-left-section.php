<?php

/**
 * @package War News
 */
$war_news_frontpage_middle_blocks = get_theme_mod('war_news_frontpage_middle_blocks', json_encode(array(
    array(
        'title' => esc_html__('Title', 'war-news'),
        'category' => '',
        'layout' => 'style1',
        'enable' => 'on'
        ))));

if ($war_news_frontpage_middle_blocks) {
    $war_news_frontpage_middle_blocks = json_decode($war_news_frontpage_middle_blocks);
    foreach ($war_news_frontpage_middle_blocks as $war_news_frontpage_middle_block) {
        if ($war_news_frontpage_middle_block->enable == 'on') {
            $war_news_layout = $war_news_frontpage_middle_block->layout;

            $args = array(
                'cat' => $war_news_frontpage_middle_block->category,
                'layout' => $war_news_layout,
                'title' => $war_news_frontpage_middle_block->title
            );

            do_action('war_news_middle_section', $args);
        }
    }
}