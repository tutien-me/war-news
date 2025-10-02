<?php
/**
 * @package War News
 */
add_action('widgets_init', 'war_news_register_personal_info');

function war_news_register_personal_info() {
    register_widget('war_news_personal_info');
}

class war_news_personal_info extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'war_news_personal_info', 'War News : Personal Info', array(
            'description' => esc_html__('A widget to display Personal Information', 'war-news')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'title' => array(
                'war_news_widgets_name' => 'title',
                'war_news_widgets_title' => esc_html__('Title', 'war-news'),
                'war_news_widgets_field_type' => 'text',
            ),
            'image' => array(
                'war_news_widgets_name' => 'image',
                'war_news_widgets_title' => esc_html__('Image', 'war-news'),
                'war_news_widgets_field_type' => 'upload',
            ),
            'intro' => array(
                'war_news_widgets_name' => 'intro',
                'war_news_widgets_title' => esc_html__('Short Intro', 'war-news'),
                'war_news_widgets_field_type' => 'textarea',
                'war_news_widgets_row' => '4'
            ),
            'signature' => array(
                'war_news_widgets_name' => 'name',
                'war_news_widgets_title' => esc_html__('Name', 'war-news'),
                'war_news_widgets_field_type' => 'text',
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

        $title = isset($instance['title']) ? $instance['title'] : '';
        $image = isset($instance['image']) ? $instance['image'] : '';
        $intro = isset($instance['intro']) ? $instance['intro'] : '';
        $name = isset($instance['name']) ? $instance['name'] : '';

        echo $before_widget;
        ?>
        <div class="wn-personal-info">
            <?php
            if (!empty($title)):
                echo $before_title . esc_html($title) . $after_title;
            endif;

            if (!empty($image)):
                $image_id = attachment_url_to_postid($image);
                if ($image_id) {
                    $image_array = wp_get_attachment_image_src($image_id, 'thumbnail');
                    echo '<div class="wn-pi-image"><img alt="' . esc_html($title) . '" src="' . esc_url($image_array[0]) . '"/></div>';
                } else {
                    echo '<div class="wn-pi-image"><img alt="' . esc_html($title) . '" src="' . esc_url($image) . '"/></div>';
                }
            endif;

            if (!empty($name)):
                echo '<div class="wn-pi-name"><span>' . esc_html($name) . '</span></div>';
            endif;

            if (!empty($intro)):
                echo '<div class="wn-pi-intro">' . esc_html($intro) . '</div>';
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
