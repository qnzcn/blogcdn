<?php
    $id = 'muiteer-slider-gallery-' . $block['id'];
    $autoplay = muiteer_get_field("muiteer_slider_gallery_autoplay");
    $navigation = muiteer_get_field("muiteer_slider_gallery_previous_next_buttons");
    $pagination = muiteer_get_field("muiteer_slider_gallery_navigation_dots");
    $slide_height = muiteer_get_field("muiteer_slider_gallery_slider_height");
?>
<section id="<?php echo esc_attr($id); ?>" class="muiteer-slider-gallery-container">
    <?php
        if ( have_rows('muiteer_slider_gallery_repeater') ) {
            // Have item
            echo '<gallery data-autoplay="' . $autoplay . '" data-height="' . $slide_height . '"><ul class="swiper-wrapper">';
            while( have_rows('muiteer_slider_gallery_repeater') ): the_row();
                $link = get_sub_field('muiteer_slider_gallery_item_link');
                $caption = get_sub_field('muiteer_slider_gallery_item_caption');
                $default_image = get_template_directory_uri() . '/assets/img/default-post-thumbnail.jpg';
                $image = get_sub_field('muiteer_slider_gallery_item_image');

                if ($image) {
                    if ( get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled" && !is_admin() ) {
                        $image_html = '
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . $image["url"] . '" data-width="' . $image['width'] . '" data-height="' . $image['height'] . '" alt="' . $caption . '" class="swiper-lazy" />
                            <div class="swiper-lazy-preloader"></div>
                        ';
                    } else {
                        $image_html = '<img src="' . $image["url"] . '" data-width="' . $image['width'] . '" data-height="' . $image['height'] . '" alt="' . $caption . '" />';
                    };
                } else {
                    if ( get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled" && !is_admin() ) {
                        $image_html = '
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . $default_image . '" data-width="1920" data-height="1080" alt="' . $caption . '" class="swiper-lazy" />
                            <div class="swiper-lazy-preloader"></div>
                        ';
                    } else {
                        $image_html = '<img src="' . $default_image . '" data-width="' . $image['width'] . '" data-height="' . $image['height'] . '" alt="' . $caption . '" />';
                    };
                };

                echo '<li class="swiper-slide">';
                if ($caption) {
                    if ($pagination == 1) {
                        echo '<figure class="has-caption has-pagination">'; 
                    } else {
                        echo '<figure class="has-caption">';
                    };
                } else {
                    echo '<figure>';
                };
                if ($link) {
                    echo '
                        <a href="' . esc_url($link) . '" target="_blank">' . $image_html . '</a>
                    ';
                } else {
                    echo $image_html;
                };
                if ($caption) {
                    echo '<figcaption>' . $caption . '</figcaption>';
                };
                echo '</figure></li>';
            endwhile;

            echo '</ul>';
                if ($navigation == 1) {
                    echo '
                        <div class="swiper-button-next background-blur"></div>
                        <div class="swiper-button-prev background-blur"></div>
                    ';
                };
                if ($pagination == 1) {
                    echo '<div class="swiper-pagination"></div>';
                };
            echo '</gallery>';
        } else {
            // No item
            if ( is_admin() ) {
                echo '<p class="muiteer-block-placeholder-tips">' . esc_html__('Click here to edit slider gallery.', 'muiteer') . '</p>';
            } else {
                muiteer_no_item_tips( esc_html__('Sorry! Currently no slider gallery available.', 'muiteer') );
            };
        };
    ?>
</section>