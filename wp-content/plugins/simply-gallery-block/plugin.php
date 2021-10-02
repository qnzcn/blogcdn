<?php

/**
 * Plugin Name: SimpLy Gallery Block & Lightbox
 * Plugin URI: https://simplygallery.co/
 * Description: The highly customizable Lightbox for native WordPress Gallery/Image. And beautiful gallery blocks with advanced Lightbox for photographers, video creators, writers and content marketers. This blocks set will help you create responsive Images, Video, Audio gallery. Three desired layout in one plugin - Masonry, Justified and Grid.
 * Author: GalleryCreator
 * Author URI: https://blockslib.com/
 * Version: 2.2.5
 * Text Domain: simply-gallery-block
 * Domain Path: /languages
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package SimpLy Gallery Block
 */
/**
 * Exit if accessed directly.
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( function_exists( 'pgc_sgb_fs' ) ) {
    pgc_sgb_fs()->set_basename( false, __FILE__ );
} else {
    define( 'PGC_SGB_VERSION', '2.2.5' );
    define( 'PGC_SGB_SLUG', 'simply-gallery-block' );
    define( 'PGC_SGB_BLOCK_PREF', 'wp-block-pgcsimplygalleryblock-' );
    define( 'PGC_SGB_PLUGIN_SLUG', 'pgc-simply-gallery-plugin' );
    define( 'PGC_SGB_POST_TYPE', 'pgc_simply_gallery' );
    define( 'PGC_SGB_TAXONOMY', 'pgc_simply_category' );
    define( 'PGC_SGB_FILE', __FILE__ );
    define( 'PGC_SGB_PATH', __DIR__ );
    define( 'PGC_SGB_URL', plugin_dir_url( __FILE__ ) );
    define( 'PGC_SGB_DIRNAME', basename( PGC_SGB_PATH ) );
    $pgc_sgb_skins_list = array();
    $pgc_sgb_skins_presets = array();
    $pgc_sgb_global_lightbox_use = false;
    
    if ( !function_exists( 'pgc_sgb_fs' ) ) {
        // Create a helper function for easy SDK access.
        function pgc_sgb_fs()
        {
            global  $pgc_sgb_fs ;
            
            if ( !isset( $pgc_sgb_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $pgc_sgb_fs = fs_dynamic_init( array(
                    'id'             => '7208',
                    'slug'           => 'simply-gallery-block',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_0e7076e3ce718684690406736d9be',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                    'days'               => 7,
                    'is_require_payment' => true,
                ),
                    'menu'           => array(
                    'slug'       => 'edit.php?post_type=pgc_simply_gallery',
                    'first-path' => 'edit.php?post_type=pgc_simply_gallery&page=pgc-simply-welcome',
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $pgc_sgb_fs;
        }
        
        // Init Freemius.
        pgc_sgb_fs();
        // Signal that SDK was initiated.
        do_action( 'pgc_sgb_fs_loaded' );
    }
    
    function pgc_sgb_fs_uninstall_cleanup()
    {
        delete_option( "pgc_sgb_global_lightbox_use" );
        delete_site_option( 'pgc_sgb_global_lightbox_use' );
    }
    
    pgc_sgb_fs()->add_action( 'after_uninstall', 'pgc_sgb_fs_uninstall_cleanup' );
    function pgc_sgb_load_textdomain()
    {
        load_plugin_textdomain( 'simply-gallery-block', false, basename( PGC_SGB_URL ) . 'languages' );
    }
    
    add_action( 'plugins_loaded', 'pgc_sgb_load_textdomain' );
    function pgc_sgb_getGlobalPresets()
    {
        global  $pgc_sgb_skins_list, $pgc_sgb_skins_presets ;
        /** Skins List */
        $skins_folders = glob( realpath( dirname( __FILE__ ) ) . '/blocks/skins/*.js' );
        foreach ( $skins_folders as $file ) {
            $fileName = substr( $file, strrpos( $file, "/" ) + 1 );
            $skinSlug = substr( $fileName, 0, -3 );
            $pgc_sgb_skins_list[$skinSlug] = PGC_SGB_URL . 'blocks/skins/' . $fileName . '?ver=' . PGC_SGB_VERSION;
            $pgc_sgb_skins_presets[$skinSlug] = get_option( $skinSlug );
        }
    }
    
    add_action( 'init', 'pgc_sgb_getGlobalPresets', 1 );
    /** Frontend Script and Style */
    function pgc_sgb_menager_script()
    {
        global  $pgc_sgb_skins_list, $pgc_sgb_skins_presets ;
        /**  Block style CSS. */
        wp_register_style(
            PGC_SGB_SLUG . '-frontend',
            PGC_SGB_URL . 'blocks/blocks.uni.css',
            array(),
            PGC_SGB_VERSION
        );
        /** Parser */
        wp_register_script(
            PGC_SGB_SLUG . '-script',
            PGC_SGB_URL . 'blocks/pgc_sgb.min.js',
            array(),
            PGC_SGB_VERSION,
            true
        );
        $globalJS = array(
            'assets'        => PGC_SGB_URL . 'assets/',
            'skinsFolder'   => PGC_SGB_URL . 'blocks/skins/',
            'skinsList'     => $pgc_sgb_skins_list,
            'wpApiRoot'     => esc_url_raw( rest_url() ),
            'postType'      => PGC_SGB_POST_TYPE,
            'skinsSettings' => $pgc_sgb_skins_presets,
        );
        wp_localize_script( PGC_SGB_SLUG . '-script', 'PGC_SGB', $globalJS );
    }
    
    add_action( 'wp_enqueue_scripts', 'pgc_sgb_menager_script' );
    function pgc_sgb_update_tags_list( $tagsArr, $delete = NULL )
    {
        $tagsListString = get_option( 'pgc_sgb_tags_list' );
        if ( $tagsListString ) {
            $tagsList = explode( ",", $tagsListString );
        }
        $tagsString = '';
        
        if ( $tagsList && !empty($tagsList) ) {
            foreach ( $tagsArr as $value ) {
                
                if ( is_null( $delete ) ) {
                    if ( array_search( $value, $tagsList ) === false ) {
                        $tagsString = $tagsString . ',' . $value;
                    }
                } else {
                    
                    if ( ($key = array_search( $value, $tagsList )) !== false ) {
                        unset( $tagsList[$key] );
                        //$tagsString = $tagsString . ',' . $value;
                    }
                
                }
            
            }
            
            if ( is_null( $delete ) ) {
                
                if ( $tagsString !== '' ) {
                    $tagsString = $tagsListString . $tagsString;
                } else {
                    $tagsString = $tagsListString;
                }
            
            } else {
                $tagsString = implode( ",", $tagsList );
            }
        
        } else {
            if ( is_null( $delete ) ) {
                $tagsString = implode( ",", $tagsArr );
            }
        }
        
        $res = array();
        if ( !is_null( $delete ) ) {
            $res['delete'] = true;
        }
        $tagsString = sanitize_text_field( $tagsString );
        $res['tagsList'] = $tagsString;
        $res['status'] = update_option( 'pgc_sgb_tags_list', $tagsString );
        return $res;
    }
    
    function pgc_sgb_action_wizard()
    {
        global  $post ;
        check_ajax_referer( 'pgc-sgb-nonce', 'nonce' );
        $globaldata = sanitize_text_field( stripslashes( $_POST['props'] ) );
        $json = json_decode( $globaldata );
        $out = array();
        $out['message'] = array();
        $data = array();
        switch ( $json->type ) {
            case 'update_post_meta':
                $out['message'][$json->key] = update_post_meta( $json->postId, $json->key, $json->value );
                break;
            case 'add_posts_meta':
                $tagsArr = $json->value;
                $postIDs = $json->postIDs;
                $key = $json->key;
                
                if ( isset( $tagsArr ) && isset( $postIDs ) && isset( $key ) && $key === 'pgc_sgb_tag' ) {
                    $out['message'][$json->key] = true;
                    foreach ( $postIDs as $postId ) {
                        $itemTags = get_post_meta( $postId, 'pgc_sgb_tag' );
                        foreach ( $tagsArr as $val ) {
                            
                            if ( $val !== '' ) {
                                if ( !isset( $data[$postId] ) ) {
                                    $data[$postId] = array();
                                }
                                
                                if ( !empty($itemTags) ) {
                                    if ( array_search( $val, $itemTags ) === false ) {
                                        if ( add_post_meta(
                                            $postId,
                                            $key,
                                            $val,
                                            false
                                        ) ) {
                                            array_push( $data[$postId], $val );
                                        }
                                    }
                                } else {
                                    if ( add_post_meta(
                                        $postId,
                                        $key,
                                        $val,
                                        false
                                    ) ) {
                                        array_push( $data[$postId], $val );
                                    }
                                }
                            
                            }
                        
                        }
                    }
                    $out['message']['tags_list'] = pgc_sgb_update_tags_list( $tagsArr );
                }
                
                break;
            case 'delete_posts_meta':
                $tagsArr = $json->value;
                $postIDs = $json->postIDs;
                $key = $json->key;
                
                if ( isset( $tagsArr ) && isset( $postIDs ) && isset( $key ) && $key === 'pgc_sgb_tag' ) {
                    $out['message'][$json->key] = true;
                    foreach ( $postIDs as $postId ) {
                        foreach ( $tagsArr as $val ) {
                            if ( !isset( $data[$postId] ) ) {
                                $data[$postId] = array();
                            }
                            if ( delete_post_meta( $postId, $json->key, $val ) ) {
                                array_push( $data[$postId], $val );
                            }
                        }
                    }
                }
                
                break;
            case 'get_attachments_metadata':
                foreach ( $json->iDs as $i => $value ) {
                    $data[$json->iDs[$i]] = wp_get_attachment_metadata( $json->iDs[$i], true );
                }
                break;
                // case 'get_posts_metadata':
                // 	foreach ($json->iDs as $i => $value) {
                // 		$data[$json->iDs[$i]] = get_post_meta($json->iDs[$i], $json->key ? $json->key : '', true);
                // 	}
                // 	break;
            // case 'get_posts_metadata':
            // 	foreach ($json->iDs as $i => $value) {
            // 		$data[$json->iDs[$i]] = get_post_meta($json->iDs[$i], $json->key ? $json->key : '', true);
            // 	}
            // 	break;
            case 'get_posts_metadata':
                foreach ( $json->iDs as $i => $value ) {
                    $main_meta = get_post_meta( $json->iDs[$i], ( $json->key ? $json->key : '' ), true );
                    $tags = get_post_meta( $json->iDs[$i], 'pgc_sgb_tag' );
                    
                    if ( !$main_meta || !empty($main_meta) ) {
                        $main_meta = json_decode( $main_meta, true );
                    } else {
                        $main_meta = array();
                    }
                    
                    if ( $tags || !empty($main_meta) ) {
                        $main_meta['tags'] = $tags;
                    }
                    if ( !empty($main_meta) ) {
                        $data[$json->iDs[$i]] = json_encode( $main_meta );
                    }
                }
                break;
            case 'update_tags_list':
                $value = $json->value;
                $out['message'][$json->key] = true;
                $out['message']['tags_list'] = pgc_sgb_update_tags_list( $value, ( $json->action === 'delete' ? true : NULL ) );
                break;
            case 'update_option':
                foreach ( $json->options as $key => $value ) {
                    $out['message'][$key] = update_option( $key, $value );
                }
                break;
            case 'get_option':
                foreach ( $json->options as $key => $value ) {
                    $out['message'][$key] = get_option( $key );
                }
                break;
            case 'get_categories_by_taxonomy':
                $taxonomy = $json->taxonomy;
                $categories = get_categories( [
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => 1,
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                ] );
                $data = [];
                foreach ( $categories as $cat ) {
                    $catData = array();
                    $catData['term_name'] = $cat->name;
                    $catData['term_id'] = $cat->term_id;
                    $catData['count'] = $cat->count;
                    $catData['description'] = $cat->category_description;
                    array_push( $data, $catData );
                }
                break;
            case 'get_posts_by_type':
                $my_query = null;
                $postType = $json->postType;
                $extended = ( property_exists( $json, 'extended' ) ? true : false );
                $term_id = ( property_exists( $json, 'term_id' ) ? $json->term_id : null );
                $q_args = [
                    'post_type'      => $postType,
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ];
                if ( isset( $term_id ) ) {
                    $q_args['tax_query'] = array( array(
                        'taxonomy'         => PGC_SGB_TAXONOMY,
                        'terms'            => $term_id,
                        'include_children' => false,
                    ) );
                }
                $my_query = new WP_Query( $q_args );
                
                if ( $my_query->have_posts() ) {
                    $postslist = $my_query->posts;
                    $data = [];
                    foreach ( $postslist as $post ) {
                        $postData = array();
                        $postData['title'] = ( $post->post_title !== '' ? $post->post_title : $post->ID );
                        $postData['ID'] = $post->ID;
                        
                        if ( $extended ) {
                            $postData['id'] = $post->ID;
                            $postData['modified'] = $post->post_modified;
                            $postData['date'] = $post->post_date;
                            $postData['postLink'] = get_post_permalink( $post->ID );
                            $postData['type'] = $post->post_type;
                            $postData['slug'] = $post->post_name;
                        }
                        
                        
                        if ( has_post_thumbnail( $post ) ) {
                            $postData['thumbURL'] = get_the_post_thumbnail_url( $post, 'thumbnail' );
                            
                            if ( $extended ) {
                                $thumbId = get_post_thumbnail_id( $post );
                                
                                if ( $thumbId !== false ) {
                                    $thumbPost = get_post( $thumbId );
                                    $thumbData = wp_prepare_attachment_for_js( $thumbPost );
                                    $postData['thumb'] = ( isset( $thumbData['sizes'] ) ? $thumbData['sizes'] : null );
                                }
                            
                            }
                        
                        } else {
                            
                            if ( $extended ) {
                                $postData['thumbURL'] = PGC_SGB_URL . 'assets/coverAlbum-400x400.png';
                            } else {
                                $postData['thumbURL'] = PGC_SGB_URL . 'assets/icon-150x150.png';
                            }
                        
                        }
                        
                        array_push( $data, $postData );
                    }
                }
                
                wp_reset_query();
                break;
            case 'get_post_content':
                $id = intval( $json->postID );
                $postData = get_post_field( 'post_content', $id, 'display' );
                $output = '';
                
                if ( $postData !== '' || !is_wp_error( $postData ) ) {
                    $blocks = parse_blocks( $postData );
                    foreach ( $blocks as $block ) {
                        $output .= render_block( $block );
                    }
                }
                
                $data['raw'] = $output;
                break;
            case 'get_terms_for_taxonomy':
                $taxonomyName = $json->name;
                $terms = get_terms( [
                    'taxonomy'   => $taxonomyName,
                    'hide_empty' => false,
                ] );
                $data[$taxonomyName] = $terms;
                break;
            case 'deletePosts':
                $p_arg = array(
                    'post_type'   => $json->post_type,
                    'post_status' => 'publish',
                );
                if ( isset( $json->name ) ) {
                    $p_arg['name'] = $json->name;
                }
                $posts = get_posts( $p_arg );
                if ( !empty($posts) ) {
                    foreach ( $posts as $dl_post ) {
                        $postId = $dl_post->ID;
                        $deleted = is_object( wp_delete_post( $postId ) );
                        array_push( $data, array(
                            $postId . '' => $deleted,
                        ) );
                    }
                }
                break;
        }
        $out['message']['data'] = $data;
        header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ), true );
        echo  json_encode( $out ) ;
        wp_die();
    }
    
    if ( wp_doing_ajax() ) {
        add_action( 'wp_ajax_pgc_sgb_action_wizard', 'pgc_sgb_action_wizard' );
    }
    require_once plugin_dir_path( __FILE__ ) . 'blocks/init.php';
    require_once plugin_dir_path( __FILE__ ) . 'plugins/init.php';
}
