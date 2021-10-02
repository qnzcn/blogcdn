<?php

/**
 * Parallax Skin
 *
 * @package woowgallery
 * @author  GalleryCreator
 */
namespace WoowGallery\Skins;

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
if ( !class_exists( 'WoowGallery\\Skins\\Parallax' ) ) {
    return;
}
/**
 * Class Parallax
 */
class Parallax
{
    const  NAME = 'Parallax' ;
    const  SLUG = 'parallax' ;
    const  VERSION = '1.0.0' ;
    const  DESCRIPTION = '' ;
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_filter( 'woowgallery_skins', [ $this, 'add_skin' ] );
    }
    
    /**
     * Skin Info
     *
     * @return array
     */
    public static function info()
    {
        $info = [
            'name'        => self::NAME,
            'slug'        => self::SLUG,
            'version'     => self::VERSION,
            'description' => self::DESCRIPTION,
            'screenshots' => [ plugins_url( 'screenshot.png', __FILE__ ) ],
            'styles'      => [],
            'scripts'     => [],
            'dependecies' => [],
            'premium'     => true,
        ];
        return apply_filters( 'woowgallery_skin_info', $info );
    }
    
    /**
     * Render skin HTML
     *
     * @param array $gallery Gallery data.
     *
     * @return string
     */
    public static function render( $gallery )
    {
        return '<div class="woowgallery-parallax">' . esc_html( sprintf( __( '<a href="%s">WoowGallery Premium</a> required.', 'woowgallery' ), 'https://woowgallery.com/' ) ) . '</div>';
    }
    
    /**
     * Skin Settings Schema
     *
     * @return array
     */
    public static function settings()
    {
        $schema = [
            'common' => [
            'label'  => __( 'Premium', 'woowgallery' ),
            'fields' => [
            '_skin_info' => [
            'tag'  => 'html',
            'html' => sprintf( __( '<a href="%s">WoowGallery Premium</a> required.', 'woowgallery' ), woow_fs()->get_upgrade_url() ),
        ],
        ],
        ],
        ];
        return apply_filters( 'woowgallery_skin_settings', $schema, self::SLUG );
    }
    
    /**
     * Add Skin to WoowGallery Skins
     *
     * @param array $skins Array of Skins Objects.
     *
     * @return array
     */
    public function add_skin( $skins )
    {
        $skins[self::SLUG] = $this;
        return $skins;
    }

}
new Parallax();