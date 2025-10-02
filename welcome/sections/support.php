<div class="support-wrap">
    <div class="support-col">
        <h3><?php echo esc_html__('Documentation', 'war-news'); ?></h3>
        <p><?php
            printf(
                    /* translators: Theme Name */
                    esc_html__('Read the detailed documentation of the theme. The documentation contains all the necessary information required to set up the %s theme.', 'war-news'), esc_html($this->theme_name));
            ?></p>
        <a class="button button-primary" target="_blank" href="https://warnews.me/documentation/war-news-documentation/"><?php echo esc_html__('Read Full Documentation', 'war-news'); ?></a>
    </div>

    <div class="support-col">
        <h3><?php echo esc_html__('Create Support Tickets', 'war-news'); ?></h3>
        <p><?php echo esc_html__('Still, having problems after reading all the documentation? No Problem!! Please create a support ticket. Our dedicated support team will help you to solve your problem.', 'war-news'); ?></p>
        <a class="button button-primary" target="_blank" href="https://warnews.me/support/forum/war-news/"><?php echo esc_html__('Create Support Tickets', 'war-news'); ?></a>
    </div>
</div>