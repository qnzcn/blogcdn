<?php $id = 'muiteer-waterfall-gallery-' . $block['id']; ?>
<section id="<?php echo esc_attr($id); ?>" class="muiteer-waterfall-gallery-container">
    <?php
        $images = muiteer_get_field("muiteer_waterfall_gallery_gallery");
        $ratio = muiteer_get_field("muiteer_waterfall_gallery_ratio");
        if ($ratio == "1_1") {
            $ratio = "view-1";
        } else if ($ratio == "4_3") {
            $ratio = "view-2";
        } else if ($ratio == "16_9") {
            $ratio = "view-3";
        } else {
            $ratio = "responsive";
        };
        $lightbox = muiteer_get_field("muiteer_waterfall_gallery_lightbox");
        if ($images) {
            // Have item
            echo '<ul class="muiteer-waterfall-gallery-list ' . $ratio . '">';
                foreach ($images as $image) {
                    if ( get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled" && !is_admin() ) {
                        $img_html = '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src="' . esc_url( $image['sizes']['large'] ) . '" alt="' . esc_attr( $image['alt'] ) . '" data-width="' . $image['width'] . '" data-height="' . $image['height'] . '" class="muiteer-lazy-load" />';
                    } else {
                        $img_html = '<img src="' . esc_url( $image['sizes']['large'] ) . '" alt="' . esc_attr( $image['alt'] ) . '" />';
                    };
                    echo '<li class="muiteer-waterfall-gallery-item">';
                        if ($lightbox == 'enabled') {
                            echo '
                                <figure>
                                    <a href="' . esc_url( $image['url'] ) . '">' . $img_html . '</a>
                            ';
                                if ( esc_html( $image['caption'] ) ) {
                                    echo '
                                        <figcaption>' . esc_html( $image['caption'] ) . '</figcaption>
                                    ';
                                };
                            echo '</figure>';
                        } else {
                            echo '
                                <figure>' . $img_html . '
                            ';
                                if ( esc_html( $image['caption'] ) ) {
                                    echo '
                                        <figcaption>' . esc_html( $image['caption'] ) . '</figcaption>
                                    ';
                                };
                            echo '</figure>';
                        };
                    echo '</li>';
                }
            echo '</ul>';
        } else {
            // No item
            if ( is_admin() ) {
                echo '<p class="muiteer-block-placeholder-tips">' . esc_html__('Click here to edit waterfall gallery.', 'muiteer') . '</p>';
            } else {
                muiteer_no_item_tips( esc_html__('Sorry! Currently no waterfall gallery available.', 'muiteer') );
            };
        };
    ?>
</section>