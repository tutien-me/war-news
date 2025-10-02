<?php

/**
 * @package War News
 */
$war_news_frontpage_bottom_blocks = get_theme_mod('war_news_frontpage_bottom_blocks', json_encode(array(
    array(
        'category1' => '-1',
        'category2' => '-1',
        'category3' => '-1',
        'layout' => 'style1',
        'enable' => 'on'
        ))));

if ($war_news_frontpage_bottom_blocks) {
    $war_news_frontpage_bottom_blocks = json_decode($war_news_frontpage_bottom_blocks);
    foreach ($war_news_frontpage_bottom_blocks as $war_news_frontpage_bottom_block) {
        if ($war_news_frontpage_bottom_block->enable == 'on') {
            $war_news_layout = $war_news_frontpage_bottom_block->layout;

            $args = array(
                'cat1' => $war_news_frontpage_bottom_block->category1,
                'cat2' => $war_news_frontpage_bottom_block->category2,
                'cat3' => $war_news_frontpage_bottom_block->category3,
                'layout' => $war_news_layout,
            );

            do_action('war_news_bottom_section', $args);
        }
    }
}