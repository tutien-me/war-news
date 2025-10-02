<?php
/**
 * @package War News
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('wn-article-content'); ?>>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'war-news'),
            'after' => '</div>',
        ));
        ?>
    </div>

    <footer class="entry-footer">
        <?php war_news_entry_footer(); ?>
    </footer>

</article>

