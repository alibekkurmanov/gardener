<?php
class ale_global {

    //generate unique_ids
    private static $ale_unique_counter = 0;

    static function ale_generate_unique_id() {
        self::$ale_unique_counter++;
        return 'ale_uid_' . self::$ale_unique_counter . '_' . uniqid();
    }

    // Demo and plugins list
    public static $demo_list = array ();
    public static $plugins_list = array();

    static $ale_options;
}

//Demos Base
ale_global::$demo_list = array (
    'blackwhite' => array(
        'text' => 'Olins Black&White',
        'folder' => get_template_directory() . '/aletheme/demos/blackwhite/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-blackwhite/',
        'category' => array('all','creative','shop'),
        'date-create' => '2017-01-1',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/bw.jpg',
        'required_plugins' => array('woocommerce','cpt-olins','js_composer')
    ),
    'zoo' => array(
        'text' => 'Olins Zoo',
        'folder' => get_template_directory() . '/aletheme/demos/zoo/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-zoo/',
        'category' => array('all','micro-niche'),
        'date-create' => '2017-01-2',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/zoo.jpg',
        'required_plugins' => array('cpt-olins','js_composer','cpt-editor','mailchimp-for-wp','revslider')
    ),
    'bakery' => array(
        'text' => 'Olins Bakery',
        'folder' => get_template_directory() . '/aletheme/demos/bakery/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-bakery/',
        'category' => array('all','micro-niche','shop'),
        'date-create' => '2017-01-3',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/bakery.jpg',
        'required_plugins' => array('woocommerce','cpt-olins','js_composer','mailchimp-for-wp')
    ),
    'photography' => array(
        'text' => 'Olins Photography',
        'folder' => get_template_directory() . '/aletheme/demos/photography/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-photography/',
        'category' => array('all','photography'),
        'date-create' => '2017-01-4',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/photography.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),
    'luxuryshoes' => array(
        'text' => 'Olins Luxury Shoes',
        'folder' => get_template_directory() . '/aletheme/demos/luxuryshoes/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-luxuryshoes/',
        'category' => array('all','micro-niche','shop'),
        'date-create' => '2017-01-5',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/luxuryshoes.jpg',
        'required_plugins' => array('cpt-olins','js_composer','woocommerce')
    ),
    'camping' => array(
        'text' => 'Olins Camping',
        'folder' => get_template_directory() . '/aletheme/demos/camping/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-camping/',
        'category' => array('all','micro-niche'),
        'date-create' => '2017-01-6',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/camping.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),
    'travelphoto' => array(
        'text' => 'Olins Travel Photography',
        'folder' => get_template_directory() . '/aletheme/demos/travelphoto/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-travelphoto/',
        'category' => array('all','photography'),
        'date-create' => '2017-01-7',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/travelphoto.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),
    'viaje' => array(
        'text' => 'Olins Viaje',
        'folder' => get_template_directory() . '/aletheme/demos/viaje/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-viaje/',
        'category' => array('all','micro-niche'),
        'date-create' => '2017-01-8',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/viaje.jpg',
        'required_plugins' => array('cpt-olins','js_composer','revslider')
    ),
    'wedding' => array(
        'text' => 'Olins Wedding',
        'folder' => get_template_directory() . '/aletheme/demos/wedding/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-wedding/',
        'category' => array('all','photography','micro-niche'),
        'date-create' => '2017-01-9',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/wedding.jpg',
        'required_plugins' => array('cpt-olins','js_composer','revslider')
    ),
    'furniture' => array(
        'text' => 'Olins Furniture',
        'folder' => get_template_directory() . '/aletheme/demos/furniture/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-furniture/',
        'category' => array('all','micro-niche'),
        'date-create' => '2017-01-10',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/furniture.jpg',
        'required_plugins' => array('cpt-olins','js_composer','cpt-editor','revslider')
    ),
    'magazine' => array(
        'text' => 'Olins Magazine',
        'folder' => get_template_directory() . '/aletheme/demos/magazine/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-magazine/',
        'category' => array('all','creative'),
        'date-create' => '2017-01-11',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/magazine.jpg',
        'required_plugins' => array('cpt-olins','js_composer','mailchimp-for-wp')
    ),
    'creative' => array(
        'text' => 'Olins Creative',
        'folder' => get_template_directory() . '/aletheme/demos/creative/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-creative/',
        'category' => array('all','creative'),
        'date-create' => '2017-03-29',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/creative.jpg',
        'required_plugins' => array('cpt-olins','js_composer','cpt-editor','revslider')
    ),
    'brigitte' => array(
        'text' => 'Olins Brigitte',
        'folder' => get_template_directory() . '/aletheme/demos/brigitte/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-brigitte/',
        'category' => array('all','photography'),
        'date-create' => '2017-04-01',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/brigitte.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),
    'corporate' => array(
        'text' => 'Olins Corporate',
        'folder' => get_template_directory() . '/aletheme/demos/corporate/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-corporate/',
        'category' => array('all','business','one-page'),
        'date-create' => '2017-04-03',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/corporate.jpg',
        'required_plugins' => array('cpt-olins','js_composer','revslider','page-scroll-to-id')
    ),
    'cv' => array(
        'text' => 'Olins CV',
        'folder' => get_template_directory() . '/aletheme/demos/cv/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-cv/',
        'category' => array('all','business','creative','one-page'),
        'date-create' => '2017-04-06',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/cv.jpg',
        'required_plugins' => array('cpt-olins','js_composer','revslider','page-scroll-to-id')
    ),
    'fashion' => array(
        'text' => 'Olins Fashion',
        'folder' => get_template_directory() . '/aletheme/demos/fashion/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-fashion/',
        'category' => array('all','shop'),
        'date-create' => '2017-04-10',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/fashion.jpg',
        'required_plugins' => array('cpt-olins','js_composer','revslider','woocommerce')
    ),
    'pastel' => array(
        'text' => 'Olins Pastel',
        'folder' => get_template_directory() . '/aletheme/demos/pastel/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-pastel/',
        'category' => array('all','creative','photography'),
        'date-create' => '2017-04-13',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/pastel.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),
    'stephanie' => array(
        'text' => 'Olins Stephanie',
        'folder' => get_template_directory() . '/aletheme/demos/stephanie/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-stephanie/',
        'category' => array('all','photography'),
        'date-create' => '2017-04-18',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/stephanie.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),
    'cameron' => array(
        'text' => 'Olins Cameron',
        'folder' => get_template_directory() . '/aletheme/demos/cameron/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-cameron/',
        'category' => array('all','photography','creative'),
        'date-create' => '2017-04-24',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/cameron.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),
    'pixel' => array(
        'text' => 'Olins Pixel',
        'folder' => get_template_directory() . '/aletheme/demos/pixel/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-pixel/',
        'category' => array('all','creative'),
        'date-create' => '2017-04-25',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/pixel.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),
    'jade' => array(
        'text' => 'Olins Jade',
        'folder' => get_template_directory() . '/aletheme/demos/jade/',
        'demo_url' => ALETHEME_DEMOS_HOST .'olins-jade/',
        'category' => array('all','creative','photography'),
        'date-create' => '2017-05-04',
        'demo_preview' => ALETHEME_DEMOS_HOST .'olins_base/preview_screen/jade.jpg',
        'required_plugins' => array('cpt-olins','js_composer')
    ),

);

ale_global::$plugins_list = array(
    'js_composer' => array(
        'name'=>'WPBakery Visual Composer',
        'location'=>'bundled',
        'slug'=>'js_composer',
        'source' => ALETHEME_THEME_URL . '/plugins/js_composer.zip'
    ),
    'revslider' => array(
        'name'=>'Slider Revolution',
        'location'=>'bundled',
        'slug'=>'revslider',
        'source' => ALETHEME_THEME_URL . '/plugins/revslider.zip'
    ),
    'essential-grid' => array(
        'name'=>'Essential Grid',
        'location'=>'bundled',
        'slug'=>'essential-grid',
        'source' => ALETHEME_THEME_URL . '/plugins/essential-grid.zip'
    ),
    'woocommerce' => array(
        'name'=>'WooCommerce',
        'location'=>'wp_repo',
        'slug'=>'woocommerce'
    ),
    'page-scroll-to-id' => array(
        'name'=>'Page scroll to id',
        'location'=>'wp_repo',
        'slug'=>'page-scroll-to-id'
    ),
    'cpt-editor' => array(
        'name'=>'Custom Post Type Editor',
        'location'=>'wp_repo',
        'slug'=>'cpt-editor'
    ),
    'mailchimp-for-wp' => array(
        'name'=>'MailChimp for WordPress',
        'location'=>'wp_repo',
        'slug'=>'mailchimp-for-wp'
    ),
    'cpt-olins' => array(
        'name'=>'Olins Core',
        'location'=>'bundled',
        'slug'=>'cpt-olins',
        'source' => ALETHEME_THEME_URL . '/plugins/cpt-olins.zip'
    ),
);