<?php

/**
 * Abstract Edit WoowGallery class.
 *
 * @package woowgallery
 * @author  Sergey Pasyuk
 */
namespace WoowGallery\Admin;

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
use  WoowGallery\Gallery ;
use  WoowGallery\Posttypes ;
use  WoowGallery\Tools\Cropping ;
use  WP_Post ;
/**
 * Class Edit_Gallery
 */
class Edit_Woowgallery
{
    /**
     * Holds the post_type.
     *
     * @var string
     */
    public  $post_type ;
    /**
     * Primary class constructor.
     *
     * @param string $post_type Post Type.
     */
    public function __construct( $post_type )
    {
        $this->post_type = $post_type;
        // Metaboxes.
        add_action( "add_meta_boxes_{$this->post_type}", [ $this, 'sanitize_metaboxes' ], 1 );
        add_action( "add_meta_boxes_{$this->post_type}", [ $this, 'add_meta_boxes' ], 5 );
        add_action( "load-{$this->post_type}", [ $this, 'load_woowgallery_post_type' ] );
        add_filter(
            "theme_{$post_type}_templates",
            [ $this, 'theme_templates' ],
            10,
            4
        );
    }
    
    /**
     * Set gallery data.
     *
     * @param int          $post_id     Post ID.
     * @param WP_Post      $post        The Post object.
     * @param bool|WP_Post $post_before Is post update or previous post data.
     *
     * @return array Raw gallery data.
     */
    public static function set_gallery_data( $post_id, $post, $post_before = false )
    {
        self::set_gallery_meta( $post_id );
        if ( empty($post->post_content_filtered) ) {
            $post->post_content_filtered = woowgallery_POST( 'post_content_filtered', '[]' );
        }
        // Get initial gallery data.
        $data = (array) json_decode( $post->post_content_filtered, true );
        $force_update = (int) woowgallery_POST( 'wg_force_update', 0 );
        
        if ( !$force_update ) {
            $update_meta = (int) get_post_meta( $post_id, Gallery::GALLERY_UPDATE_META_KEY, true );
            
            if ( is_object( $post_before ) ) {
                $data_before = $post_before->post_content_filtered;
            } else {
                $data_before = get_post_meta( $post_id, '_data_before', true );
            }
            
            $force_update = $update_meta && time() > $update_meta || $post->post_content_filtered !== $data_before;
        }
        
        if ( !$force_update ) {
            $force_update = get_transient( 'woowgallery_fetch_' . $post_id );
        }
        
        if ( $force_update ) {
            $content = self::set_gallery_content( $post_id, $data );
            self::set_gallery_cover_from_content( $post, $content );
        }
        
        return $data;
    }
    
    /**
     * Set gallery meta.
     *
     * @param int $post_id Post ID.
     */
    public static function set_gallery_meta( $post_id )
    {
        $_woowgallery = woowgallery_POST( '_woowgallery', [] );
        
        if ( isset( $_woowgallery['settings'] ) ) {
            $gallery_settings = (array) $_woowgallery['settings'];
            // Misc.
            $gallery_settings['classes'] = array_filter( explode( ' ', preg_replace( '#[^a-z0-9-_ ]#', '', $gallery_settings['classes'] ) ) );
            update_metadata(
                'post',
                $post_id,
                Gallery::GALLERY_SETTINGS_META_KEY,
                apply_filters( 'woowgallery_save_gallery_settings', $gallery_settings, $post_id )
            );
        }
        
        
        if ( isset( $_woowgallery['editor'] ) ) {
            $gallery_editor_settings = (array) $_woowgallery['editor'];
            update_post_meta( $post_id, Gallery::GALLERY_EDITOR_SETTINGS_META_KEY, $gallery_editor_settings );
        }
        
        
        if ( isset( $_woowgallery['skin'] ) ) {
            $skin = preg_replace( '#[^a-z0-9-_]#', '', $_woowgallery['skin'] );
            update_metadata(
                'post',
                $post_id,
                Gallery::GALLERY_SKIN_META_KEY,
                $skin
            );
            $skin_config = (array) woowgallery_POST( '_woowgallery_skin', [] );
            $skin_config['__skin'] = $skin;
            update_metadata(
                'post',
                $post_id,
                Gallery::GALLERY_SKIN_CONFIG_META_KEY,
                apply_filters(
                'woowgallery_save_skin_config',
                $skin_config,
                $skin,
                $post_id
            )
            );
        }
        
        
        if ( isset( $_woowgallery['lightbox'] ) ) {
            $lightbox = preg_replace( '#[^a-z0-9-_]#', '', $_woowgallery['lightbox'] );
            update_metadata(
                'post',
                $post_id,
                Gallery::GALLERY_LIGHTBOX_META_KEY,
                $lightbox
            );
            $lightbox_config = (array) woowgallery_POST( '_woowgallery_lightbox', [] );
            $lightbox_config['__lightbox'] = $lightbox;
            update_metadata(
                'post',
                $post_id,
                Gallery::GALLERY_LIGHTBOX_CONFIG_META_KEY,
                apply_filters(
                'woowgallery_save_lightbox_config',
                $lightbox_config,
                $lightbox,
                $post_id
            )
            );
        }
    
    }
    
    /**
     * Set Gallery Content.
     *
     * @param int   $post_id Post ID.
     * @param array $data    Gallery data.
     *
     * @return array
     */
    public static function set_gallery_content( $post_id, $data = null )
    {
        $post = get_post( (int) $post_id );
        if ( empty($post) ) {
            return [];
        }
        $real_post = $post;
        $post_type = $post->post_type;
        
        if ( wp_is_post_autosave( $post ) ) {
            $real_post = get_post( $post->post_parent );
            $post_type = $real_post->post_type;
        }
        
        if ( !in_array( $post_type, [ Posttypes::GALLERY_POSTTYPE, Posttypes::ALBUM_POSTTYPE ], true ) ) {
            
            if ( Posttypes::DYNAMIC_POSTTYPE === $post_type ) {
                return Edit_Dynamic_Gallery::set_dynamic_content( $post, $data );
            } else {
                return [];
            }
        
        }
        if ( null === $data ) {
            $data = (array) json_decode( $post->post_content_filtered, true );
        }
        $content = [];
        foreach ( $data as $item ) {
            $content[] = woowgallery_full_post_data( $item, $real_post );
        }
        $content = array_filter( $content );
        update_metadata(
            'post',
            $post_id,
            Gallery::GALLERY_CONTENT_META_KEY,
            $content
        );
        update_metadata(
            'post',
            $post_id,
            Gallery::GALLERY_UPDATE_META_KEY,
            0
        );
        return $content;
    }
    
    /**
     * Set Gallery Cover if it is not already set.
     *
     * @param WP_Post $post    The current post object.
     * @param array   $content Gallery data.
     */
    public static function set_gallery_cover_from_content( $post, $content )
    {
        if ( wp_is_post_autosave( $post ) || has_post_thumbnail( $post ) || !count( $content ) ) {
            return;
        }
        $thumbnail_id = 0;
        foreach ( $content as $item ) {
            if ( empty($item['image_id']) ) {
                continue;
            }
            $thumbnail_id = (int) $item['image_id'];
            break;
        }
        
        if ( $thumbnail_id ) {
            $dims = woowgallery_get_resize_dimensions( $post );
            Cropping::resize_image( $thumbnail_id, $dims['thumb'] );
            Cropping::resize_image( $thumbnail_id, $dims['image'] );
            set_post_thumbnail( $post, $thumbnail_id );
        }
    
    }
    
    /**
     * Creates metaboxes for handling and managing galleries.
     *
     * @param WP_Post $post The Post.
     */
    public function add_meta_boxes( $post )
    {
        // Add WoowGallery metaboxes.
        // Displays the media in the WoowGallery.
        add_action( 'edit_form_after_editor', [ $this, 'meta_box_gallery' ], 1 );
        // Load all tabs.
        add_action( 'woowgallery_tab_gallery', [ $this, 'tab_gallery' ] );
        add_action( 'woowgallery_tab_config', [ $this, 'tab_config' ] );
        add_action( 'woowgallery_tab_lightbox', [ $this, 'tab_lightbox' ] );
        add_action( 'woowgallery_tab_misc', [ $this, 'tab_misc' ] );
        // Display the Gallery Code metabox if we're editing an existing Gallery.
        if ( 'auto-draft' !== $post->post_status ) {
            //add_meta_box( 'woowgallery-tips', __( 'WoowGallery Tips', 'woowgallery' ), [ $this, 'meta_box_gallery_tips' ], $this->post_type, 'side', 'default' );
            add_meta_box(
                'woowgallery-code',
                __( 'WoowGallery Code', 'woowgallery' ),
                [ $this, 'meta_box_gallery_code' ],
                $this->post_type,
                'side',
                'default'
            );
        }
        add_filter( 'admin_body_class', [ $this, 'wg_admin_body_class' ] );
        add_filter( 'teeny_mce_plugins', [ $this, 'mce_plugins' ] );
        add_filter( 'tiny_mce_plugins', [ $this, 'mce_plugins' ] );
        add_filter( 'mce_css', '__return_empty_string' );
    }
    
    /**
     * Filter plugins for wp_editor.
     *
     * @param array $plugins Array of MCE plugins.
     *
     * @return array
     */
    public function mce_plugins( $plugins )
    {
        return array_filter( $plugins, function ( $plugin ) {
            return 'fullscreen' !== $plugin;
        } );
    }
    
    /**
     * Removes all the third party metaboxes on the WoowGallery CPT.
     *
     * @global array $wp_meta_boxes Array of registered metaboxes.
     */
    public function sanitize_metaboxes()
    {
        global  $wp_meta_boxes ;
        // This is the post type you want to target. Adjust it to match yours.
        $post_type = $this->post_type;
        // These are the metabox IDs you want to pass over. They don't have to match exactly. preg_match will be run on them.
        $pass_over_defaults = [ 'submitdiv', 'postimagediv', 'woowgallery' ];
        $pass_over = apply_filters( 'woowgallery_metabox_ids', $pass_over_defaults, $post_type );
        // All the metabox contexts you want to check.
        $contexts_defaults = [ 'normal', 'advanced', 'side' ];
        $contexts = apply_filters( 'woowgallery_metabox_contexts', $contexts_defaults, $post_type );
        // All the priorities you want to check.
        $priorities_defaults = [
            'high',
            'core',
            'default',
            'low'
        ];
        $priorities = apply_filters( 'woowgallery_metabox_priorities', $priorities_defaults, $post_type );
        // Loop through and target each context.
        foreach ( $contexts as $context ) {
            // Now loop through each priority and start the purging process.
            foreach ( $priorities as $priority ) {
                if ( isset( $wp_meta_boxes[$post_type][$context][$priority] ) ) {
                    foreach ( (array) $wp_meta_boxes[$post_type][$context][$priority] as $id => $metabox_data ) {
                        // If the metabox ID to pass over matches the ID given, remove it from the array and continue.
                        
                        if ( in_array( $id, $pass_over, true ) ) {
                            unset( $pass_over[$id] );
                            continue;
                        }
                        
                        // Otherwise, loop through the pass_over IDs and if we have a match, continue.
                        foreach ( $pass_over as $to_pass ) {
                            if ( preg_match( '#^' . $id . '#i', $to_pass ) ) {
                                continue;
                            }
                        }
                        // If we reach this point, remove the metabox completely.
                        unset( $wp_meta_boxes[$post_type][$context][$priority][$id] );
                    }
                }
            }
        }
    }
    
    /**
     * Displays the Gallery main metabox.
     *
     * @param WP_Post $post The current post object.
     */
    public function meta_box_gallery( $post )
    {
        $wg = Gallery::get_instance( $post->ID, $post->post_type );
        $gallery = $wg->get_gallery();
        $tabs = $this->get_gallery_editor_tabs_nav();
        $settings = Settings::get_settings();
        // Load view.
        Admin::load_template( 'gallery-edit-page', compact(
            'post',
            'gallery',
            'tabs',
            'settings'
        ) );
    }
    
    /**
     * Returns the tabs to be displayed in the gallery metabox.
     *
     * @return array Array of tab navigation.
     */
    public function get_gallery_editor_tabs_nav()
    {
        $tabs = [
            'gallery'  => [
            'label' => __( 'Gallery', 'woowgallery' ),
            'icon'  => 'dashicons-screenoptions',
        ],
            'config'   => [
            'label' => __( 'Config', 'woowgallery' ),
            'icon'  => 'dashicons-admin-generic',
        ],
            'lightbox' => [
            'label' => __( 'Lightbox', 'woowgallery' ),
            'icon'  => 'dashicons-editor-expand',
        ],
        ];
        $tabs = apply_filters( 'woowgallery_editor_tabs_nav', $tabs, $this->post_type );
        // "Misc" tab is required.
        $tabs['misc'] = [
            'label' => __( 'Misc', 'woowgallery' ),
            'icon'  => 'dashicons-admin-tools',
        ];
        return $tabs;
    }
    
    /**
     * Callback for displaying the Gallery Tips metabox.
     *
     * @param WP_Post $post The current post object.
     */
    public function meta_box_gallery_tips( $post )
    {
        // Load view.
        Admin::load_template( 'gallery-metabox-tips', compact( 'post' ) );
    }
    
    /**
     * Callback for displaying the Gallery Code metabox.
     *
     * @param WP_Post $post The current post object.
     */
    public function meta_box_gallery_code( $post )
    {
        // Load view.
        Admin::load_template( 'gallery-metabox-shortcodes', compact( 'post' ) );
    }
    
    /**
     * Callback for displaying the gallery preview tab.
     *
     * @param WP_Post $post The current post object.
     */
    public function tab_gallery( $post )
    {
        // Load view.
        Admin::load_template( 'gallery-media', compact( 'post' ) );
    }
    
    /**
     * Callback for displaying the template config tab.
     *
     * @param WP_Post $post The current post object.
     */
    public function tab_config( $post )
    {
        // Load view.
        Admin::load_template( 'gallery-skin-config', compact( 'post' ) );
    }
    
    /**
     * Callback for displaying the lightbox settings tab.
     *
     * @param WP_Post $post The current post object.
     */
    public function tab_lightbox( $post )
    {
        // Load view.
        Admin::load_template( 'gallery-lightbox', compact( 'post' ) );
    }
    
    /**
     * Callback for displaying the settings UI for the Misc tab.
     *
     * @param WP_Post $post The current post object.
     */
    public function tab_misc( $post )
    {
        // Load view.
        Admin::load_template( 'gallery-misc-settings', compact( 'post' ) );
    }
    
    /**
     * Callback for saving attached posts meta
     *
     * @param int|array $att_ids   Posts IDs.
     * @param int       $wgpost_id The Gallery ID.
     */
    public function update_attachments_woowgallery_meta( $att_ids, $wgpost_id )
    {
        global  $wpdb ;
        if ( !is_array( $att_ids ) ) {
            $att_ids = [ $att_ids ];
        }
        $found_ids = $wpdb->get_col( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = %s", "_woowgallery_{$wgpost_id}" ) );
        $att_ids = array_map( 'absint', $att_ids );
        $found_ids = array_map( 'absint', $found_ids );
        $add_ids = array_diff( $att_ids, $found_ids );
        foreach ( $add_ids as $id ) {
            // Is attachment already in galleries?
            if ( get_post_meta( $id, "_woowgallery_{$wgpost_id}", true ) ) {
                continue;
            }
            $has_gallery = ( get_post_meta( $id, '_woowgallery', true ) ?: [] );
            array_push( $has_gallery, $wgpost_id );
            update_post_meta( $id, '_woowgallery', array_values( array_unique( $has_gallery ) ) );
            update_post_meta( $id, "_woowgallery_{$wgpost_id}", time() );
        }
        $remove_ids = array_diff( $found_ids, $att_ids );
        foreach ( $remove_ids as $id ) {
            delete_post_meta( $id, "_woowgallery_{$wgpost_id}" );
            // Is attachment in few galleries?
            $has_gallery = ( get_post_meta( $id, '_woowgallery', true ) ?: [] );
            $has_gallery = array_diff( $has_gallery, [ $wgpost_id ] );
            
            if ( count( $has_gallery ) ) {
                update_post_meta( $id, '_woowgallery', $has_gallery );
            } else {
                delete_post_meta( $id, '_woowgallery' );
            }
        
        }
    }
    
    /**
     * Filters the CSS classes for the body tag in the admin.
     *
     * @param string $classes Space-separated list of CSS classes.
     *
     * @return string
     */
    public function wg_admin_body_class( $classes )
    {
        // Check if standalone is enabled.
        $standalone = Settings::get_settings( 'standalone_' . $this->post_type );
        if ( !empty($standalone) ) {
            return "{$classes} standalone-on";
        }
        return "{$classes} standalone-off";
    }
    
    /**
     * Add list of page templates for a theme to WoowGallery CPT.
     *
     * @param array        $post_templates Array of page templates. Keys are filenames,
     *                                     values are translated names.
     * @param \WP_Theme    $theme          The theme object.
     * @param WP_Post|null $post           The post being edited, provided for context, or null.
     * @param string       $post_type      Post type to get the templates for.
     *
     * @return array
     */
    public function theme_templates(
        $post_templates,
        $theme,
        $post,
        $post_type
    )
    {
        $page_templates = get_page_templates();
        return array_unique( array_merge( $post_templates, $page_templates ) );
    }

}