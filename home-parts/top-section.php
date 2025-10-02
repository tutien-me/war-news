<?php

/**
 * @package War News
 */
$war_news_frontpage_top_blocks = get_theme_mod('war_news_frontpage_top_blocks', json_encode(array(
    array(
        'title' => '',
        'category' => '',
        'layout' => 'style1',
        'enable' => 'on'
        ))));

if ($war_news_frontpage_top_blocks) {
    $war_news_frontpage_top_blocks = json_decode($war_news_frontpage_top_blocks);
    foreach ($war_news_frontpage_top_blocks as $war_news_frontpage_top_block) {
        if ($war_news_frontpage_top_block->enable == 'on') {
            $war_news_layout = $war_news_frontpage_top_block->layout;

            $args = array(
                'title' => $war_news_frontpage_top_block->title,
                'cat' => $war_news_frontpage_top_block->category,
                'layout' => $war_news_layout
            );

            do_action('war_news_top_section', $args);
        }
    }
}