<?php

/**
 * Admin Class
 */
class MuiteerDocs_Admin {

    function __construct() {
        $this->includes();
        $this->init_actions();
        $this->init_classes();
    }

    public function includes() {
        require_once dirname(__FILE__) . '/class-docs-list-table.php';
    }

    /**
     * Initialize action hooks
     *
     * @return void
     */
    public function init_actions() {
        add_action( 'admin_enqueue_scripts', array($this, 'admin_scripts') );

        add_action( 'admin_menu', array($this, 'admin_menu') );
        add_filter( 'parent_file', array($this, 'fix_tag_menu') );
    }

    public function init_classes() {
        new muiteerDocs_Docs_List_Table();
    }

    /**
     * Load admin scripts and styles
     *
     * @param  string
     *
     * @return void
     */
    public function admin_scripts($hook) {
        if ('toplevel_page_muiteerdocs' != $hook) {
            return;
        }

        wp_enqueue_script('vuejs', get_template_directory_uri() . '/inc/documentation/assets/js/vue.min.js');
        wp_enqueue_script('muiteerdocs-admin-script', get_template_directory_uri() . "/inc/documentation/assets/js/admin-script.js", array('jquery', 'jquery-ui-sortable', 'wp-util'), time(), true);
        wp_localize_script( 'muiteerdocs-admin-script', 'muiteerDocs', array(
            'nonce' => wp_create_nonce('muiteerdocs-admin-nonce'),
            'editurl' => admin_url('post.php?action=edit&post='),
            'viewurl' => home_url('/?p='),
            'enter_doc_title' => __('Enter documentation title', 'muiteer'),
            'enter_section_title' => __('Enter section title', 'muiteer'),
            'enter_section_title' => __('Enter section title', 'muiteer'),
            'delete_section_title' => __('Are you sure to delete the entire section? Articles inside this section will be deleted too!', 'muiteer'),
            'delete_doc_title' => __('Are you sure to delete the entire documentation? Sections and articles inside this doc will be deleted too!', 'muiteer'),
            'delete_article_title' => __('Are you sure to delete the article?', 'muiteer'),

        ) );
    }

    /**
     * Get the admin menu position
     *
     * @return int the position of the menu
     */
    public function get_menu_position() {
        return apply_filters('muiteerdocs_menu_position', 48);
    }

    /**
     * Add menu items
     *
     * @return void
     */
    public function admin_menu() {
        $capability = muiteerdocs_get_publish_cap();
        add_menu_page( __('muiteerDocs', 'muiteer'), __('Documentation', 'muiteer'), $capability, 'muiteerdocs', array($this, 'page_index'), 'dashicons-media-document', $this->get_menu_position() );
        add_submenu_page( 'muiteerdocs', __('All Documentations', 'muiteer'), __('All Documentations', 'muiteer'), $capability, 'muiteerdocs', array($this, 'page_index') );
        add_submenu_page('muiteerdocs', __('Tags', 'muiteer'), __('Tags', 'muiteer'), 'manage_categories', 'edit-tags.php?taxonomy=doc_tag&post_type=docs');
    }

    /**
     * highlight the proper top level menu
     *
     * @link http://wordpress.org/support/topic/moving-taxonomy-ui-to-another-main-menu?replies=5#post-2432769
     *
     * @global obj $current_screen
     * @param string $parent_file
     *
     * @return string
     */
    function fix_tag_menu($parent_file) {
        global $current_screen;

        if ($current_screen->taxonomy == 'doc_tag' || $current_screen->post_type == 'docs') {
            $parent_file = 'muiteerdocs';
        }

        return $parent_file;
    }

    /**
     * UI Page handler
     *
     * @return void
     */
    public function page_index() {
        include dirname(__FILE__) . '/template-vue.php';
    }
}
