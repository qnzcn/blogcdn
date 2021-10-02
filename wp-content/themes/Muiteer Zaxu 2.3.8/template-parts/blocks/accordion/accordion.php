<?php
    $id = 'muiteer-accordion-' . $block['id'];

    $collapse_other_items = muiteer_get_field('muiteer_accordion_collapse_other_items');
?>
<section id="<?php echo esc_attr($id); ?>" class="muiteer-accordion-container">
    <?php
        if ( have_rows('muiteer_accordion_repeater') ) {
            // Have item
            if ($collapse_other_items == 'enabled') {
                echo '<div class="muiteer-accordion-list collapse-other-items">';
            } else {
                echo '<div class="muiteer-accordion-list">';
            };
    
            while( have_rows('muiteer_accordion_repeater') ): the_row();
                if (muiteer_get_field('muiteer_accordion_expand_all_items') == "enabled") {
                    $expand_this_item = " active";
                    $show_item = " style='display: block;'";
                } else {
                    $expand_this_item = (get_sub_field('muiteer_accordion_expand_this_item') == "enabled") ? " active" : "";
                    $show_item = (get_sub_field('muiteer_accordion_expand_this_item') == "enabled") ? " style='display: block;'" : "";
                };
                echo '
                    <div class="muiteer-accordion-item' . $expand_this_item . '">
                        <header>
                            <h3>' . get_sub_field('muiteer_accordion_title') . '</h3>
                            <span class="icon"></span>
                        </header>
                        <div class="muiteer-accordion-content"' . $show_item . '>
                            <div class="muiteer-accordion-body">' . get_sub_field('muiteer_accordion_content') .'</div>
                        </div>
                    </div>
                ';
            endwhile;
    
            echo '</div>';
        } else {
            // No item
            if ( is_admin() ) {
                echo '<p class="muiteer-block-placeholder-tips">' . esc_html__('Click here to edit accordion.', 'muiteer') . '</p>';
            } else {
                muiteer_no_item_tips( esc_html__('Sorry! Currently no accordion available.', 'muiteer') );
            };
        };
    ?>
</section>