<?php
/**
 * @package War News
 */
?>

</div><!-- #content -->

<footer id="wn-colophon" class="site-footer">
    <?php if (is_active_sidebar('viral-news-footer1') || is_active_sidebar('viral-news-footer2') || is_active_sidebar('viral-news-footer3') || is_active_sidebar('viral-news-footer4')) { ?>
        <div class="wn-top-footer">
            <div class="wn-container">
                <div class="wn-top-footer-inner wn-clearfix">
                    <div class="wn-footer-1 wn-footer-block">
                        <?php dynamic_sidebar('viral-news-footer1') ?>
                    </div>

                    <div class="wn-footer-2 wn-footer-block">
                        <?php dynamic_sidebar('viral-news-footer2') ?>
                    </div>

                    <div class="wn-footer-3 wn-footer-block">
                        <?php dynamic_sidebar('viral-news-footer3') ?>
                    </div>

                    <div class="wn-footer-4 wn-footer-block">
                        <?php dynamic_sidebar('viral-news-footer4') ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="wn-bottom-footer">
        <div class="wn-container">
            <div class="wn-site-info">
                <?php printf('%4$s <span class="sep"> | </span><a title="%3$s" href="%1$s" target="_blank">Xúm</a> %2$s', 'https://xum.me/', esc_html__('by Xúm', 'war-news'), esc_attr__('Download Xúm', 'war-news'), esc_html__('WordPress Theme', 'war-news')); ?>
            </div>
        </div>
    </div>
</footer>
</div>

<div id="wn-back-top" class="wn-hide"><i class="mdi mdi-chevron-up"></i></div>

<?php wp_footer(); ?>

</body>
</html>