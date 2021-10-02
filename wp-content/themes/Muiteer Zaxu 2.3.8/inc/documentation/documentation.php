<?php
/**
 * Muiteer documentation functions
 *
 * @since 2.3.0
*/

// don't call the file directly
if ( !defined('ABSPATH') ) exit;

/**
 * MuiteerDocs class
 *
 * @class MuiteerDocs The class that holds the entire MuiteerDocs plugin
 */
class MuiteerDocs {
    public $theme_dir_path;
    private $post_type = 'docs';

    /**
     * Initializes the MuiteerDocs() class
     *
     * Checks for an existing MuiteerDocs() instance
     * and if it doesn't find one, creates it.
     */
    public static function init() {
        static $instance = false;
        if (!$instance) {
            $instance = new MuiteerDocs();
            add_action( 'after_setup_theme', array($instance, 'plugin_init') );
            register_activation_hook( __FILE__, array($instance, 'activate') );
        }
        return $instance;
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    function plugin_init() {
        $this->theme_dir_path = apply_filters('muiteerdocs_theme_dir_path', 'documentation/');
        $this->file_includes();
        $this->init_classes();
        // custom post types and taxonomies
        add_action( 'init', array($this, 'register_post_type') );
        add_action( 'init', array($this, 'register_taxonomy') );
        // filter the search result
        add_action( 'pre_get_posts', array($this, 'docs_search_filter') );
        // override the theme template
        add_filter('template_include', array($this, 'template_loader'), 20);
        add_action( 'rest_api_init', array($this, 'init_rest_api') );
    }

    /**
     * Load the required files
     *
     * @return void
     */
    function file_includes() {
        include_once dirname( __FILE__ ) . '/includes/functions.php';
        include_once dirname( __FILE__ ) . '/includes/class-walker-docs.php';
        include_once dirname( __FILE__ ) . '/includes/rest-api/class-rest-api.php';
        if ( is_admin() ) {
            include_once dirname( __FILE__ ) . '/includes/admin/class-admin.php';
        }
        if (defined('DOING_AJAX') && DOING_AJAX) {
            include_once dirname( __FILE__ ) . '/includes/class-ajax.php';
        }
    }

    /**
     * Initialize the classes
     *
     * @since 1.4
     *
     * @return void
     */
    public function init_classes() {
        if ( is_admin() ) {
            new MuiteerDocs_Admin();
        }
        if (defined('DOING_AJAX') && DOING_AJAX) {
            new MuiteerDocs_Ajax();
        }
    }

    /**
     * Initialize REST API
     *
     * @return void
     */
    public function init_rest_api() {
        $api = new MuiteerDocs_REST_API();
        $api->register_routes();
    }

    /**
     * Register the post type
     *
     * @return void
     */
    function register_post_type() {
        $labels = array(
            'name'                => __('Documentation', 'muiteer'),
            'singular_name'       => __('Documentation', 'muiteer'),
            'menu_name'           => __('Documentation', 'muiteer'),
            'parent_item_colon'   => __('Parent Documentation', 'muiteer'),
            'all_items'           => __('All Documentations', 'muiteer'),
            'view_item'           => __('View Documentation', 'muiteer'),
            'add_new_item'        => __('Add Documentation', 'muiteer'),
            'add_new'             => __('Add New', 'muiteer'),
            'edit_item'           => __('Edit Documentation', 'muiteer'),
            'update_item'         => __('Update Documentation', 'muiteer'),
            'search_items'        => __('Search Documentation', 'muiteer'),
            'not_found'           => __('Not documentation items found', 'muiteer'),
            'not_found_in_trash'  => __('No documentation items found in trash', 'muiteer'),
        );
        $rewrite = array(
            'slug'                => 'docs',
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => true,
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'comments'),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-media-document',
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'show_in_rest'        => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
            'taxonomies'          => array('doc_tag')
        );
        register_post_type( $this->post_type, apply_filters('muiteerdocs_post_type', $args) );
    }

    /**
     * Register doc tags taxonomy
     *
     * @return void
     */
    function register_taxonomy() {
        $labels = array(
            'name'                       => __('Tags', 'muiteer'),
            'singular_name'              => __('Tag', 'muiteer'),
            'menu_name'                  => __('Tags', 'muiteer'),
            'all_items'                  => __('All Tags', 'muiteer'),
            'parent_item'                => __('Parent Tag', 'muiteer'),
            'parent_item_colon'          => __('Parent Tag:', 'muiteer'),
            'new_item_name'              => __('New Tag', 'muiteer'),
            'add_new_item'               => __('Add New Item', 'muiteer'),
            'edit_item'                  => __('Edit Tag', 'muiteer'),
            'update_item'                => __('Update Documentation Tag', 'muiteer'),
            'view_item'                  => __('View Tag', 'muiteer'),
            'separate_items_with_commas' => __('Separate items with commas', 'muiteer'),
            'add_or_remove_items'        => __('Add or remove items', 'muiteer'),
            'choose_from_most_used'      => __('Choose from the most used', 'muiteer'),
            'popular_items'              => __('Popular Tags', 'muiteer'),
            'search_items'               => __('Search Tags', 'muiteer'),
            'not_found'                  => __('No tags found.', 'muiteer'),
            'no_terms'                   => __('No items', 'muiteer'),
            'items_list'                 => __('Tags list', 'muiteer'),
            'items_list_navigation'      => __('Tags list navigation', 'muiteer'),
        );
        $rewrite = array(
            'slug'                       => 'doc-tag',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
            'rewrite'                    => $rewrite
        );
        register_taxonomy('doc_tag', array('docs'), $args);
    }

    /**
     * If the theme doesn't have any single doc handler, load that from
     * the plugin
     *
     * @param  string  $template
     *
     * @return string
     */
    function template_loader($template) {
        $find = array($this->post_type . '.php');
        $file = '';
        if (is_single() && get_post_type() == $this->post_type) {
            $file   = 'single-' . $this->post_type . '.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;
        }
        if ($file) {
            $template = locate_template($find);
            if (!$template) {
                $template = get_template_directory() . '/inc/documentation/templates/' . $file;
            }
        }
        return $template;
    }

    /**
     * Handle the search filtering in search page
     *
     * @param  \WP_Query  $query
     *
     * @return \WP_Query
     */
    function docs_search_filter($query) {
        if ( !is_admin() && $query->is_main_query() ) {
            if( is_search() ) {
                $param = isset( $_GET['search_in_doc'] ) ? sanitize_text_field( $_GET['search_in_doc'] ) : false;
                if ($param) {
                    if ($param != 'all') {
                        $parent_doc_id = intval($param);
                        $post__in = array($parent_doc_id => $parent_doc_id);
                        $children_docs = muiteerdocs_get_posts_children($parent_doc_id, 'docs');
                        if ($children_docs) {
                            $post__in = array_merge( $post__in, wp_list_pluck($children_docs, 'ID') );
                        }
                        $query->set('post__in', $post__in);
                    }
                }
            }
        }
        return $query;
    }
} // MuiteerDocs

/**
 * Initialize the plugin
 *
 * @return \MuiteerDocs
 */
function muiteerdocs() {
    return MuiteerDocs::init();
}

// kick it off
muiteerdocs();