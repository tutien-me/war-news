<?php
/**
 * @package War News
 */
add_action('widgets_init', 'war_news_register_category_block');

function war_news_register_category_block() {
    register_widget('war_news_category_block');
}

class war_news_category_block extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'war_news_category_block', 'War News : Category Block', array(
            'description' => esc_html__('A widget to display posts filtered by category', 'war-news')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $categories = get_categories();
        $cat = array();
        $cat['-1'] = esc_html__('Latest Posts', 'war-news');

        foreach ($categories as $category) {
            $cat[$category->term_id] = $category->name;
        }
        $fields = array(
            'title' => array(
                'war_news_widgets_name' => 'title',
                'war_news_widgets_title' => esc_html__('Title', 'war-news'),
                'war_news_widgets_field_type' => 'text',
                'war_news_widgets_default' => esc_html__('Title', 'war-news')
            ),
            'category' => array(
                'war_news_widgets_name' => 'category',
                'war_news_widgets_title' => esc_html__('Select Category', 'war-news'),
                'war_news_widgets_field_type' => 'select',
                'war_news_widgets_field_options' => $cat,
                'war_news_widgets_default' => '-1'
            ),
            'post_no' => array(
                'war_news_widgets_name' => 'post_no',
                'war_news_widgets_title' => esc_html__('No of Posts', 'war-news'),
                'war_news_widgets_field_type' => 'number',
                'war_news_widgets_default' => 5,
            )
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);

        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Title', 'war-news');
        $category = isset($instance['category']) ? $instance['category'] : '-1';
        $post_no = isset($instance['post_no']) ? $instance['post_no'] : '';

        echo $before_widget;
        ?>
        <div class="wn-category_block">
            <?php
            if (!empty($title)):
                echo $before_title . esc_html($title) . $after_title;
            endif;

            if (empty($post_no) || !is_int($post_no)):
                $post_no = 5;
            endif;

            if (!empty($category)):

                $args = array(
                    'ignore_sticky_posts' => 1,
                    'posts_per_page' => $post_no
                );

                if ($category != '-1') {
                    $args['cat'] = $category;
                }

                $query = new WP_Query($args);

                while ($query->have_posts()): $query->the_post();
                    ?>
                    <div class="wn-post-item wn-clearfix">
                        <div class="wn-post-thumb">
                            <a href="<?php the_permalink(); ?>">
                                <div class="wn-thumb-container">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-news-150x150');
                                        ?>
                                        <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                    <?php }
                                    ?>
                                </div>
                            </a>
                        </div>

                        <div class="wn-post-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php echo war_news_post_date(); ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();

            endif;
            ?>
        </div>
        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	war_news_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$war_news_widgets_name] = war_news_widgets_updated_field_value($widget_field, $new_instance[$war_news_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	war_news_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $war_news_widgets_field_value = !empty($instance[$war_news_widgets_name]) ? esc_attr($instance[$war_news_widgets_name]) : '';
            war_news_widgets_show_widget_field($this, $widget_field, $war_news_widgets_field_value);
        }
    }

}
