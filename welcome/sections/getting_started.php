<div class="welcome-getting-started">
    <div class="welcome-manual-setup">
        <h3><?php echo esc_html__('Manual Setup', 'war-news'); ?></h3>
        <!--
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/set-front-page.gif'); ?>" alt="<?php echo esc_attr__('Viral Demo', 'war-news'); ?>">
        </div> -->
        <p><?php echo esc_html__('You can setup the home page sections either from Customizer Panel or from Elementor Pagebuilder', 'war-news'); ?></p>
        <p><strong><?php echo esc_html__('FROM CUSTOMIZER', 'war-news'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Go to Appearance > Customize', 'war-news'); ?></li>
            <li><?php echo sprintf(esc_html__('Click on "%s" and turn on the option for "Enable FrontPage" Setting', 'war-news'), '<a href="' . admin_url('customize.php?autofocus[section]=static_front_page') . '" target="_blank">' . esc_html__('Homepage Settings', 'war-news') . '</a>'); ?> </li>
            <li><?php echo esc_html__('Now go back and click on "Front Page Sections" and set up the FrontPage Section', 'war-news'); ?> </li>
        </ol>
        <p><strong><?php echo esc_html__('FROM ELEMENTOR', 'war-news'); ?></strong></p>
        <ol>
            <li><?php printf(esc_html__('Firstly install and activate "Elementor" and "Hash Elements" plugin from %s.', 'war-news'), '<a href="' . admin_url('admin.php?page=war-news-welcome&section=recommended_plugins') . '" target="_blank">' . esc_html__('Recommended Plugin page', 'war-news') . '</a>'); ?></li>
            <li><?php echo esc_html__('Create a new page and edit with Elementor. Drag and drop the news elements in the Elementor to create your own design.', 'war-news'); ?></li>
            <li><?php echo esc_html__('Now go to Appearance > Customize > Homepage Settings and choose "A static page" for "Your latest posts" and select the created page for "Home Page" option.', 'war-news'); ?> </li>
        </ol>
        <p style="margin-bottom: 0"><?php printf(esc_html__('For detailed documentation, please visit %s.', 'war-news'), '<a href="https://warnews.me/documentation/war-news-documentation/#HomePageSetup" target="_blank">' . esc_html__('Documentation Page', 'war-news') . '</a>'); ?></p>
    </div>

    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'war-news'); ?><a href="https://demo.warnews.me/<?php echo get_option('stylesheet'); ?>" target="_blank" class="button button-primary"><?php esc_html_e('View Demo', 'war-news'); ?></a></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.jpg'); ?>" alt="<?php printf(esc_attr__('%s Demo', 'war-news'), $this->theme_name); ?>">
        </div>

        <div class="welcome-demo-import-text">
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'war-news'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate the HashThemes Demo Importer plugin. For more detailed documentation on how the demo importer works, click %s.', 'war-news'), '<a href="https://warnews.me/documentation/war-news-documentation/#ImportDemoContent" target="_blank">' . esc_html__('here', 'war-news') . '</a>'); ?></p>
            <?php echo $this->generate_hdi_install_button(); ?>
        </div>
    </div>
</div>