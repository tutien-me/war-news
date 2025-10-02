<?php
/**
 * @package War News
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('wn-archive-post'); ?>>
    <div class="wn-post-wrapper">
        <?php if (has_post_thumbnail()): ?>
            <figure class="entry-figure">
                <?php
                $war_news_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-news-840x440');
                ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($war_news_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()) ?>"></a>
            </figure>
        <?php endif; ?>

        <div class="entry-body wn-clearfix">
            <div class="entry-post-info">
                <?php
                if ('post' == get_post_type()) {
                    war_news_posted_on();
                }
                ?>
            </div>

            <div class="entry-post-content">
                <div class="entry-categories">
                    <?php echo war_news_entry_category(); ?>
                </div>

                <header class="entry-header">
                    <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                </header>

                <div class="entry-content">
                    <?php
                    echo war_news_excerpt(get_the_content(), 800);
                    ?>
                </div>

                <div class="entry-footer wn-clearfix">
                    <a class="wn-read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'war-news'); ?></a>
                </div>
            </div>
        </div>
    </div>
</article>
