<?php
/**
 * @package War News
 */
get_header();
?>

<div class="wn-container">
    <?php
    while (have_posts()) : the_post();

        $war_news_hide_title = get_post_meta($post->ID, 'war_news_hide_title', true);

        if (!$war_news_hide_title) {
            ?>
            <header class="wn-main-header">
                <?php the_title('<h1>', '</h1>'); ?>
                <?php war_news_post_date(); ?>
            </header><!-- .entry-header -->
        <?php } ?>

        <div class="wn-content-wrap wn-clearfix">
            <div id="primary" class="content-area">

                <?php get_template_part('template-parts/content', 'single'); ?>

                <nav class="navigation post-navigation" role="navigation">
                    <div class="nav-links">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '<span><i class="mdi mdi-chevron-left"></i>' . esc_html__('Prev', 'war-news') . '</span>%title'); ?> 
                        </div>

                        <div class="nav-next">
                            <?php next_post_link('%link', '<span>' . esc_html__('Next', 'war-news') . '<i class="mdi mdi-chevron-right"></i></span>%title'); ?>
                        </div>
                    </div>
                </nav>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>

            </div><!-- #primary -->

            <?php get_sidebar(); ?>
        </div>
    <?php endwhile; // End of the loop. ?>
</div>
<?php
get_footer();
