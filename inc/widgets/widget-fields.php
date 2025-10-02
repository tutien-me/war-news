<?php

/**
 * @package War News
 */
function war_news_widgets_show_widget_field($instance = '', $widget_field = '', $war_news_field_value = '') {

    extract($widget_field);

    if (isset($war_news_widgets_default)) {
        $war_news_field_value = !empty($war_news_field_value) ? $war_news_field_value : $war_news_widgets_default;
    }

    switch ($war_news_widgets_field_type) {

        // Standard text field
        case 'text' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($war_news_widgets_name); ?>"><?php echo esc_html($war_news_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo $instance->get_field_id($war_news_widgets_name); ?>" name="<?php echo $instance->get_field_name($war_news_widgets_name); ?>" type="text" value="<?php echo esc_html($war_news_field_value); ?>" />

                <?php if (isset($war_news_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($war_news_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Standard url field
        case 'url' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($war_news_widgets_name); ?>"><?php echo esc_html($war_news_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo $instance->get_field_id($war_news_widgets_name); ?>" name="<?php echo $instance->get_field_name($war_news_widgets_name); ?>" type="text" value="<?php echo esc_url($war_news_field_value); ?>" />

                <?php if (isset($war_news_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($war_news_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($war_news_widgets_name); ?>"><?php echo esc_html($war_news_widgets_title); ?>:</label>
                <textarea class="widefat" rows="<?php echo absint($war_news_widgets_row); ?>" id="<?php echo $instance->get_field_id($war_news_widgets_name); ?>" name="<?php echo $instance->get_field_name($war_news_widgets_name); ?>"><?php echo wp_kses_post($war_news_field_value); ?></textarea>
            </p>
            <?php
            break;

        // Checkbox field
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo $instance->get_field_id($war_news_widgets_name); ?>" name="<?php echo $instance->get_field_name($war_news_widgets_name); ?>" type="checkbox" value="1" <?php checked('1', $war_news_field_value); ?>/>
                <label for="<?php echo $instance->get_field_id($war_news_widgets_name); ?>"><?php echo esc_html($war_news_widgets_title); ?></label>

                <?php if (isset($war_news_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($war_news_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Radio fields
        case 'radio' :
            ?>
            <p>
                <?php
                echo $war_news_widgets_title;
                echo '<br />';
                foreach ($war_news_widgets_field_options as $war_news_option_name => $war_news_option_title) {
                    ?>
                    <input id="<?php echo $instance->get_field_id($war_news_option_name); ?>" name="<?php echo $instance->get_field_name($war_news_widgets_name); ?>" type="radio" value="<?php echo $war_news_option_name; ?>" <?php checked($war_news_option_name, $war_news_field_value); ?> />
                    <label for="<?php echo $instance->get_field_id($war_news_option_name); ?>"><?php echo esc_html($war_news_option_title); ?></label>
                    <br />
                <?php } ?>

                <?php if (isset($war_news_widgets_description)) { ?>
                    <small><?php echo wp_kses_post($war_news_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($war_news_widgets_name); ?>"><?php echo esc_html($war_news_widgets_title); ?>:</label>
                <select name="<?php echo $instance->get_field_name($war_news_widgets_name); ?>" id="<?php echo $instance->get_field_id($war_news_widgets_name); ?>" class="widefat">
                    <?php foreach ($war_news_widgets_field_options as $war_news_option_name => $war_news_option_title) { ?>
                        <option value="<?php echo esc_attr($war_news_option_name); ?>" id="<?php echo $instance->get_field_id($war_news_option_name); ?>" <?php selected($war_news_option_name, $war_news_field_value); ?>><?php echo esc_html($war_news_option_title); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($war_news_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($war_news_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'number' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($war_news_widgets_name); ?>"><?php echo esc_html($war_news_widgets_title); ?>:</label><br />
                <input name="<?php echo $instance->get_field_name($war_news_widgets_name); ?>" type="number" step="1" min="1" id="<?php echo $instance->get_field_id($war_news_widgets_name); ?>" value="<?php echo absint($war_news_field_value); ?>" class="small-text" />

                <?php if (isset($war_news_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($war_news_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'upload':
            $image = $image_class = "";
            if ($war_news_field_value) {
                $image = '<img src="' . esc_url($war_news_field_value) . '" style="max-width:100%;"/>';
                $image_class = ' hidden';
            }
            ?>
            <div class="attachment-media-view">

                <label for="<?php echo $instance->get_field_id($war_news_widgets_name); ?>"><?php echo esc_html($war_news_widgets_title); ?>:</label><br />

                <div class="placeholder<?php echo $image_class; ?>">
                    <?php esc_html_e('No image selected', 'war-news'); ?>
                </div>
                <div class="thumbnail thumbnail-image">
                    <?php echo $image; ?>
                </div>

                <div class="actions clearfix">
                    <button type="button" class="button war-news-delete-button align-left"><?php esc_html_e('Remove', 'war-news'); ?></button>
                    <button type="button" class="button war-news-upload-button alignright"><?php esc_html_e('Select Image', 'war-news'); ?></button>

                    <input name="<?php echo $instance->get_field_name($war_news_widgets_name); ?>" id="<?php echo $instance->get_field_id($war_news_widgets_name); ?>" class="upload-id" type="hidden" value="<?php echo esc_url($war_news_field_value) ?>"/>
                </div>

                <?php if (isset($war_news_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($war_news_widgets_description); ?></small>
                <?php } ?>

            </div>
            <?php
            break;
    }
}

function war_news_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($war_news_widgets_field_type == 'number') {
        return absint($new_field_value);

        // Allow some tags in textareas
    } elseif ($war_news_widgets_field_type == 'textarea') {
        // Check if field array specifed allowed tags
        if (!isset($war_news_widgets_allowed_tags)) {
            // If not, fallback to default tags
            $war_news_widgets_allowed_tags = '<p><strong><em><a>';
        }
        return strip_tags($new_field_value, $war_news_widgets_allowed_tags);

        // No allowed tags for all other fields
    } elseif ($war_news_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    } else {
        return strip_tags($new_field_value);
    }
}
