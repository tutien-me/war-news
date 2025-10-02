<?php
/**
 * @package War News
 */
get_header();
?>

<div class="wn-container wn-clearfix">
    <div id="primary" class="content-area">

        <header class="wn-main-header">
            <h1><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'war-news'); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try another links!', 'war-news'); ?></p>
        </div><!-- .page-content -->

    </div><!-- #primary -->
</div>

<?php
get_footer();
