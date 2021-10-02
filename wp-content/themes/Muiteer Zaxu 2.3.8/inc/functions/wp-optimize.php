<?php
    // Disable site icon start
        function muiteer_disable_site_icon() {
            global $wp_customize;
            $wp_customize->remove_control('site_icon');
        }
        add_action('customize_register', 'muiteer_disable_site_icon', 20);

        add_filter('site_icon_meta_tags', 'muiteer_filter_site_icon_meta_tags');
        function muiteer_filter_site_icon_meta_tags($meta_tags) {
            array_splice($meta_tags, 2);
            return $meta_tags;
        }
    // Disable site icon end

    // Head icon start
        function muiteer_head_icon() {
            if (get_theme_mod('muiteer_pwas', 'disabled') == 'enabled') {
                if ( get_theme_mod('muiteer_pinned_tab_icon_background_color') ) {
                    $m_theme_color = get_theme_mod('muiteer_pinned_tab_icon_background_color');
                } else {
                    $m_theme_color = get_theme_mod('muiteer_pinned_tab_icon_background_color', '#ff3b30');
                }
                echo '
                    <meta name="mobile-web-app-capable" content="yes">
                    <meta name="theme-color" content="' . $m_theme_color . '">
                    <meta name="apple-mobile-web-app-capable" content="yes">
                    <meta name="apple-mobile-web-app-status-bar-style" content="default">
                    <meta name="apple-mobile-web-app-title" content="' . get_bloginfo('name') . '">
                ';
                if ( get_theme_mod('muiteer_apple_touch_icon') ) {
                    $icon = wp_get_attachment_image_url(get_theme_mod('muiteer_apple_touch_icon'), 'full');
                    $icon16 = aq_resize($icon, 16, 16, true);
                    $icon32 = aq_resize($icon, 32, 32, true);
                    $icon57 = aq_resize($icon, 57, 57, true);
                    $icon60 = aq_resize($icon, 60, 60, true);
                    $icon72 = aq_resize($icon, 72, 72, true);
                    $icon76 = aq_resize($icon, 76, 76, true);
                    $icon96 = aq_resize($icon, 96, 96, true);
                    $icon114 = aq_resize($icon, 114, 114, true);
                    $icon120 = aq_resize($icon, 120, 120, true);
                    $icon144 = aq_resize($icon, 144, 144, true);
                    $icon152 = aq_resize($icon, 152, 152, true);
                    $icon180 = aq_resize($icon, 180, 180, true);
                    $icon192 = aq_resize($icon, 192, 192, true);
                    $icon194 = aq_resize($icon, 194, 194, true);
                    if ( get_theme_mod('muiteer_pinned_tab_icon_background_color') ) {
                        $m_ms_application_title_color = get_theme_mod('muiteer_pinned_tab_icon_background_color');
                    } else {
                        $m_ms_application_title_color = get_theme_mod('muiteer_pinned_tab_icon_background_color', '#ff3b30');
                    }
                    echo '
                        <link rel="apple-touch-icon" href="' . $icon .'">
                        <link rel="apple-touch-icon" sizes="57x57" href="' . $icon57 . '">
                        <link rel="apple-touch-icon" sizes="60x60" href="' . $icon60 . '">
                        <link rel="apple-touch-icon" sizes="72x72" href="' . $icon72 . '">
                        <link rel="apple-touch-icon" sizes="76x76" href="' . $icon76 . '">
                        <link rel="apple-touch-icon" sizes="114x114" href="' . $icon114 . '">
                        <link rel="apple-touch-icon" sizes="120x120" href="' . $icon120 . '">
                        <link rel="apple-touch-icon" sizes="144x144" href="' . $icon144 . '">
                        <link rel="apple-touch-icon" sizes="152x152" href="' . $icon152 . '">
                        <link rel="apple-touch-icon" sizes="180x180" href="' . $icon180 . '">
                        <meta name="msapplication-TileColor" content="' . $m_ms_application_title_color . '">
                        <meta name="msapplication-TileImage" content="' . $icon144 . '">
                    ';
                }
            }

            if ( get_theme_mod('muiteer_favicon_image') ) {
                $favicon = get_theme_mod('muiteer_favicon_image');
                $favicon16 = aq_resize($favicon, 16, 16, true);
                $favicon32 = aq_resize($favicon, 32, 32, true);
                $favicon96 = aq_resize($favicon, 96, 96, true);
                $favicon194 = aq_resize($favicon, 194, 194, true);
                $favicon192 = aq_resize($favicon, 192, 192, true);
                echo '
                    <link rel="icon" href="' . $favicon16 . '" sizes="16x16">
                    <link rel="icon" href="' . $favicon32 . '" sizes="32x32">
                    <link rel="icon" href="' . $favicon96 . '" sizes="96x96">
                    <link rel="icon" href="' . $favicon194 . '" sizes="194x194">
                    <link rel="icon" href="' . $favicon192 . '" sizes="192x192">
                ';
                $favicon_uri = wp_upload_dir()['baseurl'] . '/' . 'favicon.ico';
                $favicon_dir = wp_upload_dir()['basedir'] . '/' . 'favicon.ico';
                if ( file_exists($favicon_dir) ) {
                    echo '
                        <link rel="shortcut icon" href="' . $favicon_uri . "?v=" . filemtime($favicon_dir) . '">
                    ';
                }
            }
            if ( get_theme_mod('muiteer_pinned_tab_icon_background_color') ) {
                $m_mask_icon_bg_color = get_theme_mod('muiteer_pinned_tab_icon_background_color');
            } else {
                $m_mask_icon_bg_color = get_theme_mod('muiteer_pinned_tab_icon_background_color', '#ff3b30');
            }
            if ( get_theme_mod('muiteer_pinned_tab_icon') ) {
                echo '<link rel="mask-icon" href="' . get_theme_mod('muiteer_pinned_tab_icon') . '" color="' . $m_mask_icon_bg_color . '" />';
            }
        }
        add_action('wp_head', 'muiteer_head_icon', 1);
        add_action('admin_head', 'muiteer_head_icon', 1);
        add_action('login_head', 'muiteer_head_icon', 1);
    // Head icon end

    // Media library attachment rename start
        //According to the Timestamp
        if (get_theme_mod('muiteer_dashboard_attachment_rename') == 'timestamp') {
            function muiteer_attachment_rename($file) {
                $time = date("YmdHis");
                $file['name'] = $time . "" . mt_rand(1, 100) . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
                return $file;
            }
            add_filter('wp_handle_upload_prefilter', 'muiteer_attachment_rename');
        }
        //According to the MD5 hash
        if (get_theme_mod('muiteer_dashboard_attachment_rename') == 'md5') {
            function muiteer_attachment_rename($filename) {
                $info = pathinfo( $filename );
                $ext  = empty( $info['extension'] ) ? '' : '.' . $info['extension'];
                $name = basename($filename, $ext);
                return md5($name) . $ext;
            }
            add_filter('sanitize_file_name', 'muiteer_attachment_rename', 10);
        }
    // Media library attachment rename end

    // Compress image start
        function muiteer_upload_media($media_data) {
            $type = $media_data['type'];
            $file = $media_data['file'];

            if (get_theme_mod('muiteer_image_size_limit') == '2560') {
                $preset_width = 2560;
                $preset_height = 2560;
            } elseif (get_theme_mod('muiteer_image_size_limit') == '1920') {
                $preset_width = 1920;
                $preset_height = 1920;
            } elseif (get_theme_mod('muiteer_image_size_limit') == '1280') {
                $preset_width = 1280;
                $preset_height = 1280;
            }

            if (get_theme_mod('muiteer_image_compress') == 'high') {
                $compression_level = 80;
            } elseif (get_theme_mod('muiteer_image_compress') == 'medium') {
                $compression_level = 60;
            } elseif (get_theme_mod('muiteer_image_compress') == 'low') {
                $compression_level = 40;
            }

            $resize_image = get_theme_mod('muiteer_image_size_limit', 'disabled') !== 'disabled';
            $compress_image = get_theme_mod('muiteer_image_compress', 'disabled') !== 'disabled';
            
            if ($type == 'image/jpeg' || $type == 'image/pjpeg' || $type == 'image/jpg' || $type == 'image/png' || $type == 'image/x-png' || $type == 'image/bmp') {
                $image_editor = wp_get_image_editor($file);
                $sizes = $image_editor->get_size();
                $width = $sizes['width'];
                $height = $sizes['height'];
                $ratio = $width / $height;
                if ($resize_image) {
                    // Resize image
                    if ($width >= $preset_width && $width >= $height) {
                        // Horizontal image
                        $preset_height = $preset_width / $ratio;
                    } elseif ($width > $preset_width && $width < $height) {
                        // Vertical image
                        $preset_width = $preset_height * $ratio;
                    }
                    $image_editor->resize($preset_width, $preset_height, true);
                }
                if ($compress_image) {
                    // Compress image
                    $image_editor->set_quality($compression_level);
                }
                if ($resize_image || $compress_image) {
                    $saved_image = $image_editor->save($file);
                }
            }
            return $media_data;
        }
        add_action('wp_handle_upload', 'muiteer_upload_media');
    // Compress image end

    // Check website visibility start
        if ( current_user_can('administrator') ):
            if ( 0 == get_option('blog_public') ) {
                function muiteer_blog_public_tips() {
                    global $wp_admin_bar;
                    // Go to reading settings
                    $wp_admin_bar->add_menu( array(
                        'parent' => false,
                        'id' => 'muiteer_blog_public_tips_discouraged',
                        'title' => '<span class="ab-icon"></span><span class="ab-label">' . __('Search Engine Discouraged', 'muiteer') . '</span></span>',
                        'href' => admin_url('options-reading.php'),
                        'meta' => false
                    ) );
                };
            } else {
                function muiteer_blog_public_tips() {
                    global $wp_admin_bar;
                    // Go to reading settings
                    $wp_admin_bar->add_menu( array(
                        'parent' => false,
                        'id' => 'muiteer_blog_public_tips_public',
                        'title' => '<span class="ab-icon"></span><span class="ab-label">' . __('Search Engine Public', 'muiteer') . '</span></span>',
                        'href' => admin_url('options-reading.php'),
                        'meta' => false
                    ) );
                };
            };
            add_action('wp_before_admin_bar_render', 'muiteer_blog_public_tips', 1002);
        endif;
    // Check website visibility end

    // Account sharing start
        if (get_theme_mod('muiteer_login_account_sharing') == 'disabled') {
            function muiteer_user_has_concurrent_sessions() {
                return ( is_user_logged_in() && count( wp_get_all_sessions() ) > 1 );
            }

            function muiteer_get_current_session() {
                $sessions = WP_Session_Tokens::get_instance( get_current_user_id() );
                return $sessions->get( wp_get_session_token() );
            }

            function muiteer_disallow_account_sharing() {
                if ( !muiteer_user_has_concurrent_sessions() ) {
                    return;
                }
                $newest = max( wp_list_pluck(wp_get_all_sessions(), 'login') );
                $session = muiteer_get_current_session();
                if ($session['login'] === $newest) {
                    wp_destroy_other_sessions();
                } else {
                    wp_destroy_current_session();
                }
            }
            add_action('init', 'muiteer_disallow_account_sharing');
        }
    // Account sharing end

    // Login captcha start
        if (get_theme_mod('muiteer_login_captcha', 'enabled') === 'enabled') {
            function muiteer_login_captcha() {
                $num1 = rand(1, 20);
                $num2 = rand(1, 20);
                echo "
                    <p>
                        <label for='math' class='small'>" . esc_html__('Math Captcha', 'muiteer') . " ($num1 + $num2 = ?)</label>
                        <input type='number' name='sum' class='input' value='' tabindex='4' autocomplete='off' style='height: auto;'>
                        " . "
                        <input type='hidden' name='num1' value='$num1'>
                        " . "
                        <input type='hidden' name='num2' value='$num2'>
                    </p>
                ";
            }
            add_action('login_form','muiteer_login_captcha');

            function muiteer_login_val() {
                if ( isset( $_POST['sum'] ) ) {
                    $sum = $_POST['sum'];
                    switch($sum) {
                        case $_POST['num1'] + $_POST['num2']: break;
                        case null: wp_die( esc_html__('ERROR: Please enter captcha value.', 'muiteer') );
                        break;
                        default: wp_die( esc_html__('ERROR: The captcha is incorrect.', 'muiteer') );
                    }
                }
            }
            add_action('login_form_login', 'muiteer_login_val');
        }
    // Login captcha end

    // Remove WordPress version start
        function muiteer_remove_wp_version() {
            return '';
        }
        add_filter('the_generator', 'muiteer_remove_wp_version');
    // Remove WordPress version end

    // Add Featured image start
            add_theme_support('post-thumbnails',
            array(
                'portfolio',
                'gallery'
            )
        );
        // Add post
        add_filter('manage_post_posts_columns', 'muiteer_add_thumbnail_column', 10, 1);
        add_action('manage_post_posts_custom_column', 'muiteer_display_thumbnail', 10, 1);

        // Add portfolio
        add_filter('manage_portfolio_posts_columns', 'muiteer_add_thumbnail_column', 10, 1);
        add_action('manage_portfolio_posts_custom_column', 'muiteer_display_thumbnail', 10, 1);

        // Add page
        add_filter('manage_pages_columns', 'muiteer_add_thumbnail_column', 10, 1);
        add_action('manage_pages_custom_column', 'muiteer_display_thumbnail', 10, 1);

        function muiteer_add_thumbnail_column($columns) {
            $column_thumbnail = array(
                'thumbnail' => __('Thumbnail', 'muiteer'),
            );
            $columns = array_slice($columns, 0, 1, true) + $column_thumbnail + array_slice($columns, 1, NULL, true);
            return $columns;
        }
        function muiteer_display_thumbnail($column) {
            global $post;
            switch ($column) {
                case 'thumbnail':
                    echo get_the_post_thumbnail( $post->ID, array(60, 60) );
                break;
            }
        }
        add_action('admin_enqueue_scripts', 'featured_image_column_width');
        function featured_image_column_width() {
            $screen = get_current_screen();
            if ( !post_type_supports($screen->post_type, 'thumbnail') ) {
                return;
            }
        }
    // Add Featured image end

    // Automate the version process start
        function muiteer_set_custom_ver_css_js($src) {
            $style_file = get_template_directory() . '/assets/css/style.min.css';
            if ($style_file) {
                $version = filemtime($style_file); 
                if ( strpos($src, 'ver=') )
                    $src = add_query_arg('ver', $version, $src);
                return esc_url($src);
            }
        }
        function muiteer_css_js_versioning() {
            add_filter('style_loader_src', 'muiteer_set_custom_ver_css_js', 9999);
            add_filter('script_loader_src', 'muiteer_set_custom_ver_css_js', 9999);
        }
        add_action('init', 'muiteer_css_js_versioning');
    // Automate the version process end

    // Remove wp caption width start
        add_filter('img_caption_shortcode_width', '__return_false');
    // Remove wp caption width end

    // Make "Visit Site" Link open in new tab start
        function muiteer_new_tab_to_visit_site($wp_admin_bar) {
            $all_toolbar_nodes = $wp_admin_bar->get_nodes();
            foreach ($all_toolbar_nodes as $node) {
                if ($node->id == 'site-name' || $node->id == 'view-site') {
                    $args = $node;
                    $args->meta = array('target' => '_blank');
                    $wp_admin_bar->add_node( $args );
                }
            }
        }
        add_action('admin_bar_menu', 'muiteer_new_tab_to_visit_site', 999);
    // Make "Visit Site" Link open in new tab end

    // Allow SVG format start
        function muiteer_svg_support($mimes) {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }
        add_filter('upload_mimes', 'muiteer_svg_support');
    // Allow SVG format end

    // Set default settings of attachment media box start
        function attachment_default_settings() {
            update_option('image_default_link_type', 'file');
            update_option('image_default_size', 'full');
        }
        add_action('after_setup_theme', 'attachment_default_settings');
    // Set default settings of attachment media box end

    // Disable admin bar start
        add_filter('show_admin_bar', '__return_false');
    // Disable admin bar end
    
    // Remove edit post link start
        function remove_edit_post_link($link) {
            return '';
        }
        add_filter('edit_post_link', 'remove_edit_post_link');
    // Remove edit post link end

    // Change login page title start
        function muiteer_login_title($muiteer_login_title) {
            return str_replace(array(' &lsaquo;', ' &#8212; WordPress'), array(' &#8212;'), $muiteer_login_title);
            }
        add_filter('login_title', 'muiteer_login_title');
    // Change login page title end

    // Fix WordPress title "-" bug start
        add_filter( 'run_wptexturize', '__return_false' );
    // Fix WordPress title "-" bug end

    // Remove JQMIGRATE: Migrate is installed, version 1.4.1 start
        add_action('wp_default_scripts', function ($scripts) {
            if ( !empty( $scripts->registered['jquery'] ) ) {
                $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, ['jquery-migrate'] );
            }
        });
    // Remove JQMIGRATE: Migrate is installed, version 1.4.1 end

    // Remove default favicon start
        add_action( 'do_faviconico', function() {
            //Check for icon with no default value
            if ( $icon = get_site_icon_url(32) ) {
                //Show the icon
                wp_redirect($icon);
            } else {
                //Show nothing
                header('Content-Type: image/vnd.microsoft.icon');
            }
            exit;
        } );
    // Remove default favicon end

    // Change comment date format start
        function muiteer_change_comment_date_format($date, $date_format, $comment) {
            return date('Y-m-d G:i:s', strtotime($comment->comment_date) );
        }
        add_filter('get_comment_date', 'muiteer_change_comment_date_format', 10, 3);
    // Change comment date format end

    // Add @author for comment start
        function muiteer_comment_add_at( $comment_text, $comment = '') {
            if( $comment->comment_parent > 0) {
            $comment_text = '<span class="comment-author-tag">@'.get_comment_author( $comment->comment_parent ) . '</span> ' . $comment_text;
            }
            return $comment_text;
        }
        add_filter( 'comment_text' , 'muiteer_comment_add_at', 20, 2);
    // Add @author for comment end

    // Enabled/Disabled login page logo start
        if (get_theme_mod('muiteer_login_wp_logo') == 'disabled') {
            function muiteer_disable_login_logo() {
                echo '
                    <style type="text/css">
                        #login h1 {
                            display: none;
                        }
                    </style>
                ';
            }
            add_action('login_head', 'muiteer_disable_login_logo');
        }
    // Enabled/Disabled login page logo end

    // Enabled/Disabled login back to homepage start
        if (get_theme_mod('muiteer_login_back_to_homepage_link') == 'disabled') {
            function muiteer_login_back_to_homepage_link() {
                echo '
                    <style type="text/css">
                        #backtoblog {
                            display: none;
                        }
                    </style>
                ';
            }
            add_action('login_head', 'muiteer_login_back_to_homepage_link');
        }
    // Enabled/Disabled login back to homepage end

    // Enabled/Disabled dashboard admin bar wp logo start
        if (get_theme_mod('muiteer_dashboard_admin_bar_wp_logo') == 'disabled') {
            function muiteer_dashboard_admin_bar_wp_logo() {
                global $wp_admin_bar;
                $wp_admin_bar->remove_menu('wp-logo');
            }
            add_action('wp_before_admin_bar_render', 'muiteer_dashboard_admin_bar_wp_logo');
        }
    // Enabled/Disabled dashboard admin bar wp logo end

    // Enabled/Disabled WordPress Block-based editor start
        if (get_theme_mod('muiteer_dashboard_wp_block_based_editor') == 'disabled') {
            function muiteer_disable_wp_block_based_editor($use_block_editor) {
                return false;
            }
            add_filter('use_block_editor_for_post_type', 'muiteer_disable_wp_block_based_editor');
        }
    // Enabled/Disabled WordPress Block-based editor end

    // Enabled/Disabled dashboard welcome panel start
        if (get_theme_mod('muiteer_dashboard_welcome_panel') == 'disabled') {
            remove_action('welcome_panel', 'wp_welcome_panel');
        }
    // Enabled/Disabled dashboard welcome panel end

    // Enabled/Disabled dashboard right now start
        if (get_theme_mod('muiteer_dashboard_right_now') == 'disabled') {
            function muiteer_dashboard_right_now() {
                remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
            }
            add_action('wp_dashboard_setup', 'muiteer_dashboard_right_now');
        }
    // Enabled/Disabled dashboard right now end

    // Enabled/Disabled dashboard activity start
        if (get_theme_mod('muiteer_dashboard_activity') == 'disabled') {
            function muiteer_dashboard_activity() {
                remove_meta_box('dashboard_activity', 'dashboard', 'normal');
            }
            add_action('wp_dashboard_setup', 'muiteer_dashboard_activity');
        }
    // Enabled/Disabled dashboard activity end

    // Enabled/Disabled dashboard quick press start
        if (get_theme_mod('muiteer_dashboard_quick_press') == 'disabled') {
            function muiteer_dashboard_quick_press() {
                remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
            }
            add_action('wp_dashboard_setup', 'muiteer_dashboard_quick_press');
        }
    // Enabled/Disabled dashboard quick press end

    // Enabled/Disabled dashboard primary start
        if (get_theme_mod('muiteer_dashboard_primary') == 'disabled') {
            function muiteer_dashboard_primary() {
                remove_meta_box('dashboard_primary', 'dashboard', 'side');
            }
            add_action('wp_dashboard_setup', 'muiteer_dashboard_primary');
        }
    // Enabled/Disabled dashboard primary end

    // Enabled/Disabled dashboard site health start
        if (get_theme_mod('muiteer_dashboard_site_health') == 'disabled') {
            function muiteer_dashboard_site_health() {
                remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
            }
            add_action('wp_dashboard_setup', 'muiteer_dashboard_site_health');
        }
    // Enabled/Disabled dashboard site health end

    // Post type enabled/disabled start
        if (get_theme_mod('muiteer_dashboard_post_type') == 'disabled') {
            // Remove menu
            function muiteer_remove_post_type() {
                remove_menu_page('edit.php');
            }
            add_action('admin_menu', 'muiteer_remove_post_type');

            // Remove admin bar new submenu
            function muiteer_remove_new_post_item() {
                global $wp_admin_bar;   
                $wp_admin_bar->remove_node('new-post');
            }
            add_action('admin_bar_menu', 'muiteer_remove_new_post_item', 999);
        } elseif (get_theme_mod('muiteer_dashboard_post_type') == 'administrator') {
            if ( !current_user_can('administrator') ) {
                // Remove menu
                function muiteer_remove_post_type() {
                    remove_menu_page('edit.php');
                }
                add_action('admin_menu', 'muiteer_remove_post_type');

                // Remove admin bar new submenu
                function muiteer_remove_new_post_item() {
                    global $wp_admin_bar;   
                    $wp_admin_bar->remove_node('new-post');
                }
                add_action('admin_bar_menu', 'muiteer_remove_new_post_item', 999);
            }
        }

        if (get_theme_mod('muiteer_dashboard_portfolio_type') == 'disabled') {
            // Remove menu
            function muiteer_dashboard_portfolio_type() {
                remove_menu_page('edit.php?post_type=portfolio');
            }
            add_action('admin_menu', 'muiteer_dashboard_portfolio_type');

            // Remove admin bar new submenu
            function muiteer_remove_new_portfolio_item() {
                global $wp_admin_bar;   
                $wp_admin_bar->remove_node('new-portfolio');
            }
            add_action('admin_bar_menu', 'muiteer_remove_new_portfolio_item', 999);
        } elseif (get_theme_mod('muiteer_dashboard_post_type') == 'administrator') {
            if ( !current_user_can('administrator') ) {
                // Remove menu
                function muiteer_dashboard_portfolio_type() {
                    remove_menu_page('edit.php?post_type=portfolio');
                }
                add_action('admin_menu', 'muiteer_dashboard_portfolio_type');

                // Remove admin bar new submenu
                function muiteer_remove_new_portfolio_item() {
                    global $wp_admin_bar;   
                    $wp_admin_bar->remove_node('new-portfolio');
                }
                add_action('admin_bar_menu', 'muiteer_remove_new_portfolio_item', 999);
            }
        }

        if (get_theme_mod('muiteer_dashboard_page_type') == 'disabled') {
            // Remove menu
            function muiteer_dashboard_page_type() {
                remove_menu_page('edit.php?post_type=page');
            }
            add_action('admin_menu', 'muiteer_dashboard_page_type');

            // Remove admin bar new submenu
            function muiteer_remove_new_page_item() {
                global $wp_admin_bar;   
                $wp_admin_bar->remove_node('new-page');
            }
            add_action('admin_bar_menu', 'muiteer_remove_new_page_item', 999);
        } elseif (get_theme_mod('muiteer_dashboard_post_type') == 'administrator') {
            if ( !current_user_can('administrator') ) {
                // Remove menu
                function muiteer_dashboard_page_type() {
                    remove_menu_page('edit.php?post_type=page');
                }
                add_action('admin_menu', 'muiteer_dashboard_page_type');

                // Remove admin bar new submenu
                function muiteer_remove_new_page_item() {
                    global $wp_admin_bar;   
                    $wp_admin_bar->remove_node('new-page');
                }
                add_action('admin_bar_menu', 'muiteer_remove_new_page_item', 999);
            }
        }

        if (get_theme_mod('muiteer_dashboard_link_manager') == 'disabled') {
            // Remove menu
            function muiteer_dashboard_link_manager() {
                remove_menu_page('link-manager.php');
            }
            add_action('admin_menu', 'muiteer_dashboard_link_manager');

            // Remove admin bar new submenu
            function muiteer_remove_new_link_item() {
                global $wp_admin_bar;   
                $wp_admin_bar->remove_node('new-link');
            }
            add_action('admin_bar_menu', 'muiteer_remove_new_link_item', 999);
        } elseif (get_theme_mod('muiteer_dashboard_post_type') == 'administrator') {
            if ( !current_user_can('administrator') ) {
                // Remove menu
                function muiteer_dashboard_link_manager() {
                    remove_menu_page('link-manager.php');
                }
                add_action('admin_menu', 'muiteer_dashboard_link_manager');

                // Remove admin bar new submenu
                function muiteer_remove_new_link_item() {
                    global $wp_admin_bar;   
                    $wp_admin_bar->remove_node('new-link');
                }
                add_action('admin_bar_menu', 'muiteer_remove_new_link_item', 999);
            }
        }

        if (get_theme_mod('muiteer_dashboard_tools') == 'disabled') {
            // Remove menu
            function muiteer_dashboard_tools() {
                remove_menu_page('tools.php');
            }
            add_action('admin_menu', 'muiteer_dashboard_tools');
        } elseif (get_theme_mod('muiteer_dashboard_post_type') == 'administrator') {
            if ( !current_user_can('administrator') ) {
                // Remove menu
                function muiteer_dashboard_tools() {
                    remove_menu_page('tools.php');
                }
                add_action('admin_menu', 'muiteer_dashboard_tools');
            }
        }
    // Post type enabled/disabled end

    // Dashboard title start
        function muiteer_dashboard_title($admin_title, $title) {
            return $title . ' &lsaquo; ' . get_bloginfo('name') . __(' Website Console', 'muiteer');
        }
        add_filter('admin_title', 'muiteer_dashboard_title', 10, 2);
    // Dashboard title end

    // Dashboard screen options tab start
        if ( get_theme_mod('muiteer_dashboard_screen_options_tab') == 'disabled') {
            function muiteer_dashboard_screen_options_tab() {
                return false;
            }
            add_filter('screen_options_show_screen', 'muiteer_dashboard_screen_options_tab');
        }
    // Dashboard screen options tab end

    // Dashboard help tab start
        if (get_theme_mod('muiteer_dashboard_help_tab') == 'disabled') {
            function muiteer_dashboard_help_tab($old_help, $screen_id, $screen) {
                $screen->remove_help_tabs();
                return $old_help;
            }
            add_filter('contextual_help', 'muiteer_dashboard_help_tab', 999, 3);
        }
    // Dashboard help tab end

    // Dashboard copyright start
        if (get_theme_mod('muiteer_dashboard_copyright') == 'enabled') {
            function muiteer_dashboard_copyright () {
                $web_created_time_str = get_theme_mod('muiteer_web_created_time');
                if ($web_created_time_str) {
                    $web_created_time = $web_created_time_str . '-';
                };
                echo __('Copyright &copy;', 'muiteer') . ' ' .  $web_created_time . date("Y") . ' ' . str_replace( array('http://', 'https://'), '', get_site_url() ) . '. ' . __('All rights reserved.', 'muiteer'); 
            } 
            add_filter('admin_footer_text', 'muiteer_dashboard_copyright');
        }
    // Dashboard copyright end

    // Dashboard theme version start
        if (get_theme_mod('muiteer_dashboard_theme_version') == 'enabled') {
            function muiteer_dashboard_theme_version() {
                if ( get_template_directory() === get_stylesheet_directory() ) {
                    echo __('Version', 'muiteer') . ' ' . wp_get_theme()->get('Version');
                } else {
                    echo __('Version', 'muiteer') . ' ' . wp_get_theme()->parent()->get('Version');
                }
            } 
            add_filter('update_footer', 'muiteer_dashboard_theme_version', 9999);
        }
    // Dashboard theme version end
?>