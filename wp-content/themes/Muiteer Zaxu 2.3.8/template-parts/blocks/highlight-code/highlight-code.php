<?php
    $id = 'muiteer-highlight-code-' . $block['id'];

    $language = muiteer_get_field('muiteer_highlight_code_language');
    $code = muiteer_get_field('muiteer_highlight_code_content');
?>
<section id="<?php echo esc_attr($id); ?>" class="muiteer-highlight-code-container">
    <?php
        if ( !empty($code) ) {
            // Have item
            echo '<pre class="muiteer-highlightjs"><code class="' . esc_attr($language) . '">' . htmlentities($code) . '</code></pre>';
        } else {
            // No item
            if ( is_admin() ) {
                echo '<p class="muiteer-block-placeholder-tips">' . esc_html__('Click here to edit highlight code.', 'muiteer') . '</p>';
            } else {
                muiteer_no_item_tips( esc_html__('Sorry! Currently no highlight code available.', 'muiteer') );
            };
        };
    ?>
</section>