<?php
    $id = 'muiteer-alert-tips-' . $block['id'];

    $type = muiteer_get_field('muiteer_alert_tips_type');
    $type_class = 'muiteer-alert-tips-' . $type;
    $icon = muiteer_get_field('muiteer_alert_tips_icon');
    $close_button = muiteer_get_field('muiteer_alert_tips_close_button');
    $dynamic_color = muiteer_get_field('muiteer_alert_tips_dynamic_color');
    if ($dynamic_color == true) {
        $dynamic_color_class = " dynamic-color";
    };
    if ($close_button == true) {
        $close_button_class = " has-close-button";
    };
    $title = muiteer_get_field('muiteer_alert_tips_title');
    $content = muiteer_get_field('muiteer_alert_tips_content');
?>
<section id="<?php echo esc_attr($id); ?>" class="muiteer-alert-tips-container">
    <?php
        if ( !empty($title) || !empty($content) ) {
            // Have item
            echo '<div class="muiteer-alert-tips-box ' . $type_class . $dynamic_color_class .  $close_button_class . '" role="alert">';
                if ($icon == true) {
                    echo muiteer_icon($type, 'icon');
                };
                echo '<div class="muiteer-alert-tips-description">';
                    if ($title) {
                        echo '<span class="muiteer-alert-tips-title">' . $title . '</span>';
                    };
                    if ($content) {
                        echo '<span class="muiteer-alert-tips-content">' . $content . '</span>';
                    };
                echo '</div>';
                if ($close_button == true) {
                    echo '<span class="close"></span>';
                };
            echo '</div>';
        } else {
            // No item
            if ( is_admin() ) {
                echo '<p class="muiteer-block-placeholder-tips">' . esc_html__('Click here to edit alert tips.', 'muiteer') . '</p>';
            } else {
                muiteer_no_item_tips( esc_html__('Sorry! Currently no alert tips available.', 'muiteer') );
            };
        };
    ?>
</section>