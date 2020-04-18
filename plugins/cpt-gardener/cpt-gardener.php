<?php
/**
 * Plugin Name: Gardener Core
 * Plugin URI: http://alethemes.com
 * Description: A plugin that will init all necessary modules for Gardener Theme.
 * Version: 1.0
 * Author: CRIK0VA / ALETHEMES.COM
 * Author URI: http://alethemes.com
 * License: GPL v2
 */

//Contact Form Class
require_once ('contact.php');

/**
 * Add Needed Post Types
 */
function ale_init_post_types() {
    if (function_exists('aletheme_get_post_types')) {
        foreach (aletheme_get_post_types() as $type => $options) {
            ale_add_post_type($type, $options['config'], $options['singular'], $options['multiple']);
        }
    }
}
add_action('init', 'ale_init_post_types');

/**
 * Add Needed Taxonomies
 */
function ale_init_taxonomies() {
    if (function_exists('aletheme_get_taxonomies')) {
        foreach (aletheme_get_taxonomies() as $type => $options) {
            ale_add_taxonomy($type, $options['for'], $options['config'], $options['singular'], $options['multiple']);
        }
    }
}
add_action('init', 'ale_init_taxonomies');


/**
 * Register Post Type Wrapper
 * @param string $name
 * @param array $config
 * @param string $singular
 * @param string $multiple
 */
function ale_add_post_type($name, $config, $singular = 'Entry', $multiple = 'Entries') {
    if (!isset($config['labels'])) {
        $config['labels'] = array(
            'name' => $multiple,
            'singular_name' => $singular,
            'not_found'=> 'No ' . $multiple . ' Found',
            'not_found_in_trash'=> 'No ' . $multiple . ' found in Trash',
            'edit_item' => 'Edit ', $singular,
            'search_items' => 'Search ' . $multiple,
            'view_item' => 'View ', $singular,
            'new_item' => 'New ' . $singular,
            'add_new' => 'Add New',
            'add_new_item' => 'Add New ' . $singular,
        );
    }

    register_post_type($name, $config);
}

/**
 * Register taxonomy wrapper
 * @param string $name
 * @param mixed $object_type
 * @param array $config
 * @param string $singular
 * @param string $multiple
 */
function ale_add_taxonomy($name, $object_type, $config, $singular = 'Entry', $multiple = 'Entries') {

    if (!isset($config['labels'])) {
        $config['labels'] = array(
            'name' => $multiple,
            'singular_name' => $singular,
            'search_items' =>  'Search ' . $multiple,
            'all_items' => 'All ' . $multiple,
            'parent_item' => 'Parent ' . $singular,
            'parent_item_colon' => 'Parent ' . $singular . ':',
            'edit_item' => 'Edit ' . $singular,
            'update_item' => 'Update ' . $singular,
            'add_new_item' => 'Add New ' . $singular,
            'new_item_name' => 'New ' . $singular . ' Name',
            'menu_name' => $singular,
        );
    }

    register_taxonomy($name, $object_type, $config);
}

/**
 * Sets up a custom post type to attach image to.  This allows us to have
 * individual galleries for different uploaders.
 */

if ( ! function_exists( 'optionsframework_mlu_init' ) ) {
    function optionsframework_mlu_init () {
        register_post_type( 'optionsframework', array(
            'labels' => array(
                'name' => __( 'Theme Options Media', 'options_framework_theme' ),
            ),
            'public' => true,
            'show_ui' => false,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => false,
            'supports' => array( 'title', 'editor' ),
            'query_var' => false,
            'can_export' => true,
            'show_in_nav_menus' => false,
            'public' => false
        ) );
    }
}

/**
 * Register Sliders post type to make it queriable
 */
if(class_exists('Aletheme_Sliders')){
    function aletheme_sliders_register_post_type() {
        ale_add_post_type(Aletheme_Sliders::POST_TYPE, array(
            'public' => false,
        ), 'Aletheme Slider', 'Aletheme Sliders');
    }
    add_action( 'init', 'aletheme_sliders_register_post_type' );
}



/**
 * Add post types that are used in the theme
 *
 * @return array
 */
function aletheme_get_post_types() {
    return array(
        'projects' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'comments',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Project',
            'multiple' => 'Projects',
            'columns'    => array(
                'first_image',
            )
        ),
        'gardeners' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Gardener',
            'multiple' => 'Gardeners',
        ),
        'services' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Service',
            'multiple' => 'Services',
        ),
        'partners' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Partner',
            'multiple' => 'Partners',
        ),
        'testimonials' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Testimonial',
            'multiple' => 'Testimonials',
        ),
    );
}



/**
 * Add taxonomies that are used in theme
 *
 * @return array
 */
function aletheme_get_taxonomies() {
    return array(
        'projects-category'    => array(
            'for'        => array('projects'),
            'config'    => array(
                'sort'        => true,
                'args'        => array('orderby' => 'term_order'),
                'hierarchical' => true,
            ),
            'singular'    => 'Category',
            'multiple'    => 'Categories',
        ),
    );
}

/**
 * Add Aletheme Options to Admin Navigation
 */
function olins_add_admin_menu() {
    add_theme_page( esc_html__('Demo Install', 'olins'), esc_html__('Demo Install', 'olins'), 'edit_posts', 'aletheme_theme_demos','ale_theme_demos');
}
add_action('admin_menu', 'olins_add_admin_menu', 1);