<?php
/**
 * Template Name: Home Page
 *
 * @package War News
 */
get_header();
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
get_footer();
