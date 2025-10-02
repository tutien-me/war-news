<?php
/**
 * @package War News
 */
add_action('widgets_init', 'war_news_register_contact_info');

function war_news_register_contact_info() {
    register_widget('war_news_contact_info');
}

class war_news_contact_info extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'war_news_contact_info', 'War News : Contact Info', array(
            'description' => esc_html__('A widget to display Contact Information', 'war-news')
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
            'phone' => array(
                'war_news_widgets_name' => 'phone',
                'war_news_widgets_title' => esc_html__('Phone', 'war-news'),
                'war_news_widgets_field_type' => 'text',
            ),
            'contact_info_email' => array(
                'war_news_widgets_name' => 'email',
                'war_news_widgets_title' => esc_html__('Email', 'war-news'),
                'war_news_widgets_field_type' => 'text',
            ),
            'website' => array(
                'war_news_widgets_name' => 'website',
                'war_news_widgets_title' => esc_html__('Website', 'war-news'),
                'war_news_widgets_field_type' => 'text',
            ),
            'address' => array(
                'war_news_widgets_name' => 'address',
                'war_news_widgets_title' => esc_html__('Contact Address', 'war-news'),
                'war_news_widgets_field_type' => 'textarea',
                'war_news_widgets_row' => '4'
            ),
            'time' => array(
                'war_news_widgets_name' => 'time',
                'war_news_widgets_title' => esc_html__('Contact Time', 'war-news'),
                'war_news_widgets_field_type' => 'textarea',
                'war_news_widgets_row' => '3'
            ),
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
        $phone = isset($instance['phone']) ? $instance['phone'] : '';
        $email = isset($instance['email']) ? $instance['email'] : '';
        $website = isset($instance['website']) ? $instance['website'] : '';
        $address = isset($instance['address']) ? $instance['address'] : '';
        $time = isset($instance['time']) ? $instance['time'] : '';

        echo $before_widget;
        ?>
        <div class="wn-contact-info">
            <?php
            if (!empty($title)):
                echo $before_title . esc_html($title) . $after_title;
            endif;
            ?>

            <ul>
                <?php if (!empty($phone)): ?>
                    <li><i class="mdi mdi-cellphone"></i><?php echo esc_html($phone); ?></li>
                <?php endif; ?>

                <?php if (!empty($email)): ?>
                    <li><i class="mdi mdi-email"></i><?php echo esc_html($email); ?></li>
                <?php endif; ?>

                <?php if (!empty($website)): ?>
                    <li><i class="mdi mdi-earth"></i><?php echo esc_html($website); ?></li>
                <?php endif; ?>

                <?php if (!empty($address)): ?>
                    <li><i class="mdi mdi-map-marker"></i><?php echo wpautop(esc_html($address)); ?></li>
                <?php endif; ?>

                <?php if (!empty($time)): ?>
                    <li><i class="mdi mdi-clock-time-three"></i><?php echo wpautop(esc_html($time)); ?></li>
                    <?php endif; ?>
            </ul>
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
