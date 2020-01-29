<?php
class ale_demo_base {

    static function sidebar_name_to_id($sidebar_name) {
        $clean_name = str_replace(array(' '), '-', trim($sidebar_name));
        $clean_name = str_replace(array("'", '"'), '', trim($clean_name));
        return strtolower($clean_name);
    }

    //makes sure that we return something even if the $_POST of that value is not defined
    static function get_http_post_val($post_variable) {
        if (isset($_POST[$post_variable])) {
            return $_POST[$post_variable];
        } else {
            return '';
        }
    }

    //Checks if one of the needles from $needle_array is found in the $haystack
    protected static function multi_instring($haystack, $needle_array) {
        foreach ($needle_array as $needle) {
            if (strpos($haystack, $needle) !== false) {
                return $needle;
            }
        }

        return false;
    }

    //If one of the $requiered_keys is missing from the $received_array we will kill the execution
    protected static function check_params($class, $function, $received_array, $requiered_keys) {
        foreach ($requiered_keys as $requiered_key => $requiered_msg) {
            if (empty($received_array[$requiered_key])) {
                self::kill($class, $function, $requiered_key . ' - ' . $requiered_msg, $received_array);
            }
        }
    }


    // Kill the execution and show an error message
    protected static function kill($class, $function, $msg, $additional_info = '') {
        echo PHP_EOL . 'ERROR - '. esc_attr($class) . '::' . esc_attr($function) . ' - ' . esc_attr($msg);

        if (!empty($additional_info)) {
            if (is_array($additional_info)) {
                echo PHP_EOL . 'More info:' . PHP_EOL;
                foreach ($additional_info as $key => $value) {
                    echo esc_attr($key) . ' - ' . esc_attr($value) . PHP_EOL;
                }
            }
        }

        die;
    }
}


class ale_plugin_installer extends ale_demo_base {
    // Data for Plugins
    private $plugins_data = array();

    // Plugins that are installed, whether activated or not.
    private $installed_plugins = array();

    // Go
    public function __construct() {

        // this file contains the necessary methods for checking if a plugin is activated or installed
        require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }

    // Set the data for the required plugins.
    public function set_plugins_data( $data ) {
        $this->plugins_data = $data;

        // set the file path for each required plugin
        foreach( $this->plugins_data as $plugin_slug => $plugin_data ) {
            $this->set_plugin_file_path( $plugin_slug );
        }
    }

    //Return the complete data for the plugins required by the theme.
    public function get_plugins_data() {
        return $this->plugins_data;
    }

    //Set the file path of the plugin. This should be used after a plugin was installed.
    public function set_plugin_file_path( $slug ) {
        $installed_plugins = $this->get_installed_plugins( true );

        foreach( $installed_plugins as $file_path => $plugin ) {
            if ( strpos( $file_path, $slug ) !== false ) {
                $this->plugins_data[ $slug ][ 'file_path' ] = $file_path;
                return true;
            }
        }

        return false;
    }

    //Get the file path of the plugin.
    public function get_plugin_file_path( $slug ) {
        $plugins_data = $this->get_plugins_data();

        if ( isset( $plugins_data[ $slug ][ 'file_path' ] ) !== false ) {
            return $plugins_data[ $slug ][ 'file_path' ];
        }

        return false;
    }

    //Return the list of installed plugins.
    protected function get_installed_plugins( $refresh = false ) {
        if ( empty ( $this->installed_plugins ) || $refresh === true ) {
            $this->installed_plugins = get_plugins();
        }

        return $this->installed_plugins;
    }

    //Check if plugin is installed.
    public function is_plugin_installed( $slug ) {
        $plugins_data = $this->get_plugins_data();

        if ( isset( $plugins_data[ $slug ]['file_path'] ) ) {
            return true;
        }

        return false;
    }

    //Check if plugin is activated.
    public function is_plugin_activated( $slug ) {
        $plugins_data = $this->get_plugins_data();

        if ( isset( $plugins_data[ $slug ]['file_path'] ) === false ) {
            return false;
        }

        if ( is_plugin_active( $plugins_data[ $slug ]['file_path'] ) === false ) {
            return false;
        }

        return true;
    }

    //Try to activate a plugin.
    public function activate_plugin( $file_path ) {
        $result = activate_plugin( $file_path );

        if ( is_null( $result) ) {
            return true;
        } else {
            return false;
        }
    }

    //Try to install a plugin.
    public function install_plugin( $slug ) {
        $source = $this->get_download_link( $slug );


        if ( $source !== false ) {
            if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
            }

            if ( ! class_exists( 'Automatic_Upgrader_Skin', false ) ) {
                require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader-skins.php');
            }

            $upgrader = new Plugin_Upgrader( new Automatic_Upgrader_Skin() );
            $result = $upgrader->install( $source );

            if ( $result === true ) {
                $this->set_plugin_file_path( $slug );
                return true;
            }
        }
        return false;
    }

    //Return the download link for the plugin.
    public function get_download_link( $slug ) {
        $plugins_data = $this->get_plugins_data();

        // If a source was specified in the plugin data, return that
        if ( isset( $plugins_data[ $slug ][ 'source' ] ) ) {
            return $plugins_data[ $slug ][ 'source' ];
        } else {
            if ( ! function_exists( 'plugins_api' ) ) {
                require_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
            }

            $result = plugins_api( 'plugin_information', array( 'slug' => $slug ) );

            if ( ! is_wp_error( $result ) ) {
                return $result->download_link;
            }
        }
        return false;
    }
}


class ale_demo_content extends ale_demo_base {


    static private function parse_content_file($file_path) {

        if (!file_exists($file_path)) {
            self::kill(__CLASS__, __FUNCTION__, 'file not found: ' . $file_path);
        }

        WP_Filesystem();
        global $wp_filesystem;

        $file_content = $wp_filesystem->get_contents($file_path);

        $search_in_file = self::multi_instring($file_content, array(
            '0div',
            'localhost',
            '192.168.0.'
        ));

        if ($search_in_file !== false) {
            self::kill(__CLASS__, __FUNCTION__, 'found in file content: ' . $search_in_file);
        }

        preg_match_all("/aleimagelink_(.*)_aleimagelink/U", $file_content, $matches, PREG_PATTERN_ORDER);

        if (!empty($matches) and is_array($matches)) {
            foreach ($matches[1] as $index => $match) {
                $size = 'full';
                $file_content = str_replace($matches[0][$index], ale_demo_media::get_image_url_by_ale_id($match, $size), $file_content);
            }
        }

        unset($matches);
        preg_match_all("/aleimageid_(.*)_aleimageid/U", $file_content, $matches, PREG_PATTERN_ORDER);

        if (!empty($matches) and is_array($matches)) {
            foreach ($matches[1] as $index => $match) {
                $file_content = str_replace($matches[0][$index], ale_demo_media::get_by_ale_id($match), $file_content);
            }
        }

        return $file_content;
    }


    static function add_post($params) {


        self::check_params(__CLASS__, __FUNCTION__, $params, array(
            'title' => 'Param is requiered!',
            'file' => 'Param is requiered!',
            'post_type' => 'Param is requiered!' ,
        ));



        if(!empty($params['categories_id_array'])){
            $new_post = array(
                'post_title' => $params['title'],
                'post_excerpt' => $params['post_excerpt'],
                'post_status' => 'publish',
                'post_type' => $params['post_type'],
                'post_content' => self::parse_content_file($params['file']),
                'comment_status' => !empty($params['comment_status']) ? $params['comment_status'] : 'open',
                'post_category' => $params['categories_id_array'],
                'guid' => ale_global::ale_generate_unique_id()
            );
        } elseif(!empty($params['taxonomy_id_array'])){
            $new_post = array(
                'post_title' => $params['title'],
                'post_excerpt' => $params['post_excerpt'],
                'post_status' => 'publish',
                'post_type' => $params['post_type'],
                'post_content' => self::parse_content_file($params['file']),
                'comment_status' => !empty($params['comment_status']) ? $params['comment_status'] : 'open',
                'tax_input' => array( $params['taxonomy_name'] => $params['taxonomy_id_array'] ),
                'guid' => ale_global::ale_generate_unique_id()
            );
        }  else {
            $new_post = array(
                'post_title' => $params['title'],
                'post_excerpt' => $params['post_excerpt'],
                'post_status' => 'publish',
                'post_type' => $params['post_type'],
                'post_content' => self::parse_content_file($params['file']),
                'comment_status' => !empty($params['comment_status']) ? $params['comment_status'] : 'open',
                'guid' => ale_global::ale_generate_unique_id()
            );
        }

        //new post / page
        $post_id = wp_insert_post($new_post);

        // add our demo custom meta field, using this field we will delete all the pages
        update_post_meta($post_id, 'ale_demo_content', true);

        if(!empty($params['post_format'])) {
            set_post_format($post_id, $params['post_format']);
        }

        if(!empty($params['featured_image_ale_id'])) {
            set_post_thumbnail($post_id, ale_demo_media::get_by_ale_id($params['featured_image_ale_id']));
        }

        //Metaboxes
        if(!empty($params['ale_maskonheading'])){
            update_post_meta($post_id, 'ale_maskonheading', $params['ale_maskonheading']);
        }
        if(!empty($params['ale_post_pre_title'])){
            update_post_meta($post_id, 'ale_post_pre_title', $params['ale_post_pre_title']);
        }
        if(!empty($params['ale_post_title_position'])){
            update_post_meta($post_id, 'ale_post_title_position', $params['ale_post_title_position']);
        }
        if(!empty($params['ale_featuredimagecover'])){
            update_post_meta($post_id, 'ale_featuredimagecover', $params['ale_featuredimagecover']);
        }
        if(!empty($params['ale_post_info_line'])){
            update_post_meta($post_id, 'ale_post_info_line', $params['ale_post_info_line']);
        }
        if(!empty($params['ale_author_info'])){
            update_post_meta($post_id, 'ale_author_info', $params['ale_author_info']);
        }
        if(!empty($params['ale_gallery_slider'])){
            update_post_meta($post_id, 'ale_gallery_slider', $params['ale_gallery_slider']);
        }
        if(!empty($params['ale_featured_position'])){
            update_post_meta($post_id, 'ale_featured_position', $params['ale_featured_position']);
        }
        if(!empty($params['ale_sidebar_position'])){
            update_post_meta($post_id, 'ale_sidebar_position', $params['ale_sidebar_position']);
        }
        if(!empty($params['ale_related_posts'])){
            update_post_meta($post_id, 'ale_related_posts', $params['ale_related_posts']);
        }
        if(!empty($params['ale_related_posts_title'])){
            update_post_meta($post_id, 'ale_related_posts_title', $params['ale_related_posts_title']);
        }
        if(!empty($params['ale_related_posts_count'])){
            update_post_meta($post_id, 'ale_related_posts_count', $params['ale_related_posts_count']);
        }

        //WooCommers Products
        if(!empty($params['_regular_price'])){
            update_post_meta($post_id, '_regular_price', $params['_regular_price']);
        }
        if(!empty($params['_price'])){
            update_post_meta($post_id, '_price', $params['_price']);
        }
        if(!empty($params['_sale_price'])){
            update_post_meta($post_id, '_sale_price', $params['_sale_price']);
        }
        if(!empty($params['_visibility'])){
            update_post_meta($post_id, '_visibility', $params['_visibility']);
        }
        if(!empty($params['_sku'])){
            update_post_meta($post_id, '_sku', $params['_sku']);
        }


        //Woo Gallery
        if(!empty($params['_product_image_gallery'])){

            foreach($params['_product_image_gallery'] as $image){
                $ale_gallery_images[] = ale_demo_media::get_by_ale_id($image);

                $product_images_gallery = implode(',',$ale_gallery_images);
            }
            update_post_meta($post_id, '_product_image_gallery', $product_images_gallery);
        }


        //Gallery for posts
        if(!empty($params['gallery_images'])){

            foreach($params['gallery_images'] as $image){
                $ale_gallery_images[] = ale_demo_media::get_by_ale_id($image);
            }
            update_post_meta($post_id, 'ale_gallery_id', $ale_gallery_images);
        }


        return $post_id;
    }


    static function add_page($params) {

        self::check_params(__CLASS__, __FUNCTION__, $params, array(
            'title' => 'Param is requiered!',
        ));


        if(!empty($params['file'])) {
            $new_post = array(
                'post_title' => $params['title'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => self::parse_content_file($params['file']),
                'comment_status' => 'close',
                'guid' => ale_global::ale_generate_unique_id()
            );
        } else {
            $new_post = array(
                'post_title' => $params['title'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'comment_status' => 'close',
                'guid' => ale_global::ale_generate_unique_id()
            );
        }

        //new post / page
        $page_id = wp_insert_post ($new_post);

        if (is_wp_error($page_id)) {
            self::kill(__CLASS__, __FUNCTION__, $page_id->get_error_message());
        }

        if ($page_id === 0) {
            self::kill(__CLASS__, __FUNCTION__, 'wp_insert_post returned 0.');
        }

        // add our demo custom meta field, using this field we will delete all the pages
        update_post_meta($page_id, 'ale_demo_content', true);

        // set the page template if we have one
        if (!empty($params['template'])) {
            update_post_meta($page_id, '_wp_page_template', $params['template']);
        }


        // set as homepage?
        if (!empty($params['homepage']) and $params['homepage'] === true) {
            update_option( 'page_on_front', $page_id);
            update_option( 'show_on_front', 'page' );
        }

        //set as posts page?
        if (!empty($params['postspage']) and $params['postspage'] === true) {

            update_option( 'page_for_posts', $page_id );
        }

        if(!empty($params['featured_image_ale_id'])) {
            set_post_thumbnail($page_id, ale_demo_media::get_by_ale_id($params['featured_image_ale_id']));
        }


/*
        if(!empty($params['ale_mobile_app_photo'])){
            update_post_meta($page_id, 'ale_mobile_app_photo', ale_demo_media::get_image_url_by_ale_id($params['ale_mobile_app_photo']));
        }*/

        if(!empty($params['ale_maskonheading'])){
            update_post_meta($page_id, 'ale_maskonheading', $params['ale_maskonheading']);
        }
        if(!empty($params['ale_post_pre_title'])){
            update_post_meta($page_id, 'ale_post_pre_title', $params['ale_post_pre_title']);
        }
        if(!empty($params['ale_post_title_position'])){
            update_post_meta($page_id, 'ale_post_title_position', $params['ale_post_title_position']);
        }
        if(!empty($params['ale_featuredimagecover'])){
            update_post_meta($page_id, 'ale_featuredimagecover', $params['ale_featuredimagecover']);
        }
        if(!empty($params['ale_featured_position'])){
            update_post_meta($page_id, 'ale_featured_position', $params['ale_featured_position']);
        }
        if(!empty($params['ale_sidebar_position'])){
            update_post_meta($page_id, 'ale_sidebar_position', $params['ale_sidebar_position']);
        }




        return $page_id;
    }


    static function remove() {
        $args = array(
            'post_type' => array('page', 'post','works','product'),
            'meta_key'  => 'ale_demo_content',
            'posts_per_page' => '-1'
        );
        $query = new WP_Query( $args );
        if (!empty($query->posts)) {
            foreach ($query->posts as $post) {
                wp_delete_post($post->ID, true);
            }
        }
    }
}


class ale_demo_media extends ale_demo_base {

    //Download an image from the specified URL and attach it to a post.
    static function add_image_to_media_gallery($ale_attachment_id, $file, $post_id = '', $desc = null ) {

        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');


        // Set variables for storage, fix file filename for query strings.
        preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
        $file_array = array();
        $file_array['name'] = basename( $matches[0] );

        // Download file to temp location.
        $file_array['tmp_name'] = download_url( $file );

        // If error storing temporarily, return the error.
        if ( is_wp_error( $file_array['tmp_name'] ) ) {
            @unlink($file_array['tmp_name']);
            echo 'is_wp_error $file_array: ' . esc_attr($file);
            print_r($file_array['tmp_name']);
            return $file_array['tmp_name'];
        }

        // Do the validation and storage stuff.
        $id = media_handle_sideload( $file_array, $post_id, $desc ); //$id of attachement or wp_error

        // If error storing permanently, unlink.
        if ( is_wp_error( $id ) ) {
            @unlink( $file_array['tmp_name'] );
            echo 'is_wp_error $id: ' . $id->get_error_messages() . ' ' . esc_attr($file);
            return $id;
        }


        update_post_meta($id, 'ale_demo_attachment', $ale_attachment_id);

        return $id;
    }

    static function remove() {
        $args = array(
            'post_type' => array('attachment'),
            'post_status' => 'inherit',
            'meta_key'  => 'ale_demo_attachment',
            'posts_per_page' => '-1'
        );
        $query = new WP_Query( $args );


        if (!empty($query->posts)) {
            foreach ($query->posts as $post) {
                $return_value = wp_delete_attachment($post->ID, true);
                if ($return_value === false) {
                    echo 'ale_demo_media::remove - failed to delete image id:' . esc_attr($post->ID) ;
                }
            }
        }
    }


    static function get_by_ale_id($ale_id) {
        $args = array(
            'post_type' => array('attachment'),
            'post_status' => 'inherit',
            'meta_key'  => 'ale_demo_attachment',
            'posts_per_page' => '-1'
        );


        $query = new WP_Query( $args );
        if (!empty($query->posts)) {
            foreach ($query->posts as $post) {
                //search for our ale_id in the post meta
                $pic_ale_id = get_post_meta($post->ID, 'ale_demo_attachment', true);
                if ($pic_ale_id == $ale_id) {
                    return $post->ID;
                    break;
                }
            }
        }
        return false;
    }


    static function get_image_url_by_ale_id($ale_id, $size = 'full') {
        $image_id = self::get_by_ale_id($ale_id);
        if($image_id !== false) {
            $attachement_array = wp_get_attachment_image_src($image_id, $size, false );
            if (!empty($attachement_array[0])) {
                return $attachement_array[0];
            }

        }
        return false;
    }
}


class ale_demo_history extends ale_demo_base {
    private $ale_demo_history = array();

    //read the current history
    function __construct() {
        $this->ale_demo_history = get_option(ALETHEME_SHORTNAME . '_demo_history');
    }


    //saves one demo history ONLY. If we already have one saved, it will do nothing
    function save_all() {

        // do not save another demo history if we already have one
        if (isset($this->ale_demo_history['demo_settings_date'])) {
            return;
        }

        $local_ale_demo_history = array();

        $local_ale_demo_history['page_on_front'] = get_option('page_on_front');
        $local_ale_demo_history['show_on_front'] = get_option('show_on_front');
        $local_ale_demo_history['nav_menu_locations'] = get_theme_mod('nav_menu_locations');

        $sidebar_widgets = get_option('sidebars_widgets');
        $local_ale_demo_history['sidebars_widgets'] = $sidebar_widgets;

        $used_widgets = $this->get_used_widgets($sidebar_widgets);


        if (is_array($used_widgets)) {
            foreach ($used_widgets as $used_widget) {
                $local_ale_demo_history['used_widgets'][$used_widget] = get_option('widget_' . $used_widget);
            }
        }

        $local_ale_demo_history['theme_options'] = get_option(ALETHEME_THEME_OPTIONS_NAME);
        $local_ale_demo_history['ale_social_networks'] = get_option('ale_social_networks');
        $local_ale_demo_history['demo_settings_date'] = time();
        update_option(ALETHEME_SHORTNAME . '_demo_history', $local_ale_demo_history);
    }



    //Restores a demo history point. After the restore, the saved state is deleted from the database
    function restore_all() {
        update_option('page_on_front', $this->ale_demo_history['page_on_front']);
        update_option('show_on_front',  $this->ale_demo_history['show_on_front']);
        set_theme_mod('nav_menu_locations', $this->ale_demo_history['nav_menu_locations']);
        update_option('sidebars_widgets', $this->ale_demo_history['sidebars_widgets']);

        if (isset($this->ale_demo_history['used_widgets']) and is_array($this->ale_demo_history['used_widgets'])) {
            foreach ($this->ale_demo_history['used_widgets'] as $used_widget => $used_widget_value) {
                update_option('widget_' . $used_widget, $used_widget_value);
            }
        }



        // put the old theme settings back
        ale_global::$ale_options = $this->ale_demo_history['theme_options'];
        update_option(ALETHEME_THEME_OPTIONS_NAME, ale_global::$ale_options);

        // ?
        update_option('ale_social_networks', $this->ale_demo_history['ale_social_networks']);

        // delete the demo history
        delete_option(ALETHEME_SHORTNAME . '_demo_history');
    }



    //returns the widget names used on each sidebar .... not 100% sure
    private function get_used_widgets($sidebar_widgets_option) {
        $used_widgets = array();
        if ( is_array($sidebar_widgets_option) ) {
            foreach ( $sidebar_widgets_option as $sidebar => $widgets ) {
                if ( is_array($widgets) ) {
                    foreach ( $widgets as $widget ) {
                        $used_widgets[]= $this->_get_widget_id_base($widget);
                    }
                }
            }
        }

        return array_unique($used_widgets);
    }

    private function _get_widget_id_base($id) {
        return preg_replace( '/-[0-9]+$/', '', $id );
    }
}


class ale_demo_options extends ale_demo_base {

    static function update_tagline($params) {
        if(!empty($params)) {
            update_option('blogdescription', $params);
        }
    }

    static function update_shop_cart($params) {
        if(!empty($params)) {
            update_option('woocommerce_cart_page_id', $params);
        }
    }

    static function update_shop_checkout($params) {
        if(!empty($params)) {
            update_option('woocommerce_checkout_page_id', $params);
        }
    }

    static function update_shop_account($params) {
        if(!empty($params)) {
            update_option('woocommerce_myaccount_page_id', $params);
        }
    }

    static function update_register($params) {
        if(!empty($params)) {
            update_option('users_can_register', $params);
        }
    }
    static function update_posts_per_page($params) {
        if(!empty($params)) {
            update_option('posts_per_page', $params);
        }
    }

    static function update_om4_cpt_editor($params){
        if(!empty($params)) {
            update_option('om4_cpt_editor', $params);
        }
    }

    static function mc4wp_default_form_id($params){
        if(!empty($params)) {
            update_option('mc4wp_default_form_id', $params);
        }
    }

    static function import_rev_slider($params){
        if(!empty($params)){
            //Get the zip file from server
            $slider_url = $params;

            require_once(get_template_directory().'/aletheme/demos/import_rev_slider.php' );
        }
    }
}


class ale_demo_category extends ale_demo_base {

    static function add_term($params_array){

        self::check_params(__CLASS__, __FUNCTION__, $params_array, array(
            'term_name' => 'Param is required!',
            'taxonomy' => 'Param is required',
        ));

        wp_insert_term(
            $params_array['term_name'], // the term
            $params_array['taxonomy'], // the taxonomy
            array(
                'description'=> $params_array['description'],
                'parent'=> $params_array['parent_id']
            )
        );

        $parent_term = term_exists( $params_array['term_name'], $params_array['taxonomy'] ); // array is returned if taxonomy is given
        $new_term_id = $parent_term['term_id']; // get numeric term id

        if (!empty($params_array['ale_type_icon'])) {
            $type_icon_url = ale_demo_media::get_image_url_by_ale_id($params_array['ale_type_icon']);
            $type_icon_id = ale_demo_media::get_by_ale_id($params_array['ale_type_icon']);

            $type_icon = array('id' => $type_icon_id,'url' => $type_icon_url);
            Tax_Meta_Class::update_tax_meta($new_term_id,'ale_image_field_id',$type_icon);
        }


        // keep a list of installed category ids so we can delete them later if needed
        $ale_stacks_demo_terms_id = get_option('ale_demo_terms_id');
        $ale_stacks_demo_terms_id [] = array('id' => $new_term_id, 'taxonomy' => $params_array['taxonomy']);

        update_option('ale_demo_terms_id', $ale_stacks_demo_terms_id);

        return $new_term_id;
    }

    static function remove_term() {
        $ale_stacks_demo_terms_id = get_option('ale_demo_terms_id');
        if (is_array($ale_stacks_demo_terms_id)) {
            foreach ($ale_stacks_demo_terms_id as $ale_stacks_demo_term) {
                wp_delete_term($ale_stacks_demo_term['id'],$ale_stacks_demo_term['taxonomy']);
            }
        }
        //Clear removed terms id
        update_option('ale_demo_terms_id','');
    }


    static function add_category($params_array) {

        self::check_params(__CLASS__, __FUNCTION__, $params_array, array(
            'category_name' => 'Param is required!',
        ));


        if (empty($params_array['parent_id'])) {
            $new_cat_id = wp_create_category($params_array['category_name']);
        } else {
            $new_cat_id = wp_create_category($params_array['category_name'], $params_array['parent_id']);
        }


        //update category descriptions
        if(!empty($params_array['description'])) {
            wp_update_term($new_cat_id, 'category', array(
                'description' => $params_array['description']
            ));
        }

        // keep a list of installed category ids so we can delete them later if needed
        $ale_stacks_demo_categories_id = get_option('ale_demo_categories_id');
        $ale_stacks_demo_categories_id []= $new_cat_id;
        update_option('ale_demo_categories_id', $ale_stacks_demo_categories_id);

        return $new_cat_id;
    }

    static function remove() {
        $ale_stacks_demo_categories_id = get_option('ale_demo_categories_id');
        if (is_array($ale_stacks_demo_categories_id)) {
            foreach ($ale_stacks_demo_categories_id as $ale_stacks_demo_category_id) {
                wp_delete_category($ale_stacks_demo_category_id);
            }
        }
        //Clear removed categories id
        update_option('ale_demo_categories_id','');
    }
}


class ale_demo_state extends ale_demo_base {

    //updates the current installed demo state
    static function update_state($demo_id, $demo_install_type) {
        $new_state = array(
            'demo_id' => $demo_id,
            'demo_install_type' => $demo_install_type
        );
        update_option(ALETHEME_SHORTNAME . '_demo_state', $new_state);
    }


    static function get_installed_demo() {
        $demo_state = get_option(ALETHEME_SHORTNAME . '_demo_state');
        if (isset($demo_state['demo_install_type']) and $demo_state['demo_install_type'] != '') {
            return $demo_state;
        }
        return false;
    }
}

class ale_preview_widget extends ale_demo_base {

    private static $last_widget_instance = 99;
    private static $last_sidebar_widget_position = 0;

    // Add a widget to sidebar
    static function add_widget_to_sidebar($sidebar_id, $widget_name, $atts) {

        $widget_instances = get_option('widget_' . $widget_name);
        //All demo widgets will have an instance id of 99+
        $widget_instances[self::$last_widget_instance] = $atts;

        //add widget instance to DB
        update_option('widget_' . $widget_name, $widget_instances);
        $sidebars_widgets = get_option( 'sidebars_widgets' );
        $sidebars_widgets[ale_demo_base::sidebar_name_to_id($sidebar_id)][self::$last_sidebar_widget_position] = $widget_name . '-' . self::$last_widget_instance;
        update_option('sidebars_widgets', $sidebars_widgets);


        self::$last_sidebar_widget_position++;
        self::$last_widget_instance++;
    }

    //Remove All widgets from Sidebar
    static function remove_widgets_from_sidebar($sidebar_id = 'default') {

        $sidebar_id = ale_demo_base::sidebar_name_to_id($sidebar_id);
        $sidebars_widgets = get_option( 'sidebars_widgets' );

        if (isset($sidebars_widgets[$sidebar_id])) {
            //clear sidebar
            $sidebars_widgets[$sidebar_id] = array();
            update_option('sidebars_widgets', $sidebars_widgets);
        }
    }
}


class ale_demo_menus extends ale_demo_base {


    private static $allowed_menu_names = array(
        'Header Menu',
        'Header Left Menu',
        'Header Right Menu',
        'Footer Menu',
        'Mobile Menu',
    );

    //creates a menu and adds it to a location of the theme
    static function create_menu($menu_name, $location) {
        if (!in_array($menu_name, self::$allowed_menu_names)) {
            self::kill(__CLASS__, __FUNCTION__, 'menu_name is not in allowed_menu_names.');
        }

        $menu_exists = wp_get_nav_menu_object( $menu_name );
        if ($menu_exists === false) { // check if the menu already exists
            $menu_id = wp_create_nav_menu($menu_name);
            if (is_wp_error($menu_id)) {
                self::kill(__CLASS__, __FUNCTION__, $menu_id->get_error_message());
            }

            $menu_spots_array = get_theme_mod('nav_menu_locations');
            // activate the menu only if it's not already active
            if (!isset($menu_spots_array[$location]) or $menu_spots_array[$location] != $menu_id) {
                $menu_spots_array[$location] = $menu_id;
                set_theme_mod('nav_menu_locations', $menu_spots_array);
            }

            return $menu_id;
        } else {
            return $menu_exists->term_id;
        }
    }


    // Adds a link to a menu
    static function add_link($menu_params) {
        // requiered parameters
        self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
            'title' => 'Param is required!',
            'url' => 'Param is required!',
            'xfn' => 'Param is required!',
            'add_to_menu_id' => 'A menu id generated by ale_demo_menus::create_menu is required'
        ));


        $itemData =  array (
            'menu-item-object' => '',
            'menu-item-type'      => 'custom',
            'menu-item-title'    => $menu_params['title'],
            'menu-item-url' => $menu_params['url'],
            'menu-item-xfn' => $menu_params['xfn'],
            'menu-item-status'    => 'publish'
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        $menu_item_id = wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
        return $menu_item_id;
    }


    static function add_page($menu_params) {

        // requiered parameters
        self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
            'page_id' => 'To add a page to the menu, you need a page_ID. To add links or empty items, use ale_demo_menus::add_link()',
            'add_to_menu_id' => 'A menu id generated by ale_demo_menus::create_menu is requiered'
        ));


        //$menu_id, $title='', $page_id, $parent_id = ''
        $itemData =  array(
            'menu-item-object-id' => $menu_params['page_id'],
            'menu-item-parent-id' => 0,
            'menu-item-object' => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish'
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        // if no titlte is provided, wordpress will show the title of the page
        if (!empty($menu_params['title'])) {
            $itemData['menu-item-title'] = $menu_params['title'];
        }

        // we do not use the menu id anywhere for now
        $menu_item_id = wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
        return $menu_item_id;
    }

    //Add Post
    static function add_post($menu_params) {

        // requiered parameters
        self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
            'post_id' => 'Page id is missing!',
            'add_to_menu_id' => 'A menu id generated by ale_demo_menus::create_menu is requiered'
        ));

        $itemData =  array(
            'menu-item-object-id' => $menu_params['post_id'],
            'menu-item-parent-id' => 0,
            'menu-item-object' => 'post',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish'
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        // if no title is provided, wordpress will show the title of the page
        if (!empty($menu_params['title'])) {
            $itemData['menu-item-title'] = $menu_params['title'];
        }

        $menu_item_id = wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
        return $menu_item_id;
    }

    static function add_tax_page($menu_params){
        // requiered parameters
        self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
            'title' => 'Param is required!',
            'tax_id' => 'Param is required!',
            'add_to_menu_id' => 'A menu id generated by ale_demo_menus::create_menu is required'
        ));

        $itemData =  array(
            'menu-item-title' => $menu_params['title'],
            'menu-item-object-id' => $menu_params['tax_id'],
            'menu-item-db-id' => 0,
            'menu-item-url' => get_term_link($menu_params['tax_id']),
            'menu-item-type' => 'taxonomy', //taxonomy
            'menu-item-status' => 'publish',
            'menu-item-object' => $menu_params['term'],
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        $menu_item_id = wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
        return $menu_item_id;
    }

    //Post Type to menu
    static function add_post_type($menu_params) {

        // requiered parameters
        self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
            'title' => 'Param is required!',
            'post_type' => 'Param is required!',
            'add_to_menu_id' => 'A menu id generated by ale_demo_menus::create_menu is required'
        ));


        $itemData =  array(
            'menu-item-title' => $menu_params['title'],
            'menu-item-url' => get_post_type_archive_link($menu_params['post_type']),
            'menu-item-type' => 'custom',
            'menu-item-status' => 'publish',
            'menu-item-object' => '',
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        $menu_item_id = wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
        return $menu_item_id;
    }


    // adds a category to a menu
    static function add_category($menu_params) {

        // requiered parameters
        self::check_params(__CLASS__, __FUNCTION__, $menu_params, array(
            'title' => 'Param is requiered!',
            'category_id' => 'Param is requiered! - this is the category id that will be used to generate the mega menu',
            'add_to_menu_id' => 'A menu id generated by ale_demo_menus::create_menu is requiered'
        ));


        $itemData =  array(
            'menu-item-title' => $menu_params['title'],
            'menu-item-object-id' => $menu_params['category_id'],
            'menu-item-db-id' => 0,
            'menu-item-url' => get_category_link($menu_params['category_id']),
            'menu-item-type' => 'taxonomy', //taxonomy
            'menu-item-status' => 'publish',
            'menu-item-object' => 'category',
        );

        if (!empty($menu_params['parent_id'])) {
            $itemData['menu-item-parent-id'] = $menu_params['parent_id'];
        }

        $menu_item_id = wp_update_nav_menu_item($menu_params['add_to_menu_id'], 0, $itemData);
        return $menu_item_id;
    }

    //removes all the menus, used by uninstall
    static function remove() {
        foreach (self::$allowed_menu_names as $menu_name) {
            wp_delete_nav_menu($menu_name);
        }
    }
}


class ale_demo_installer {


    function __construct() {
        //AJAX VIEW PANEL LOADING
        add_action( 'wp_ajax_ale_ajax_demo_install', array( $this, 'ale_ajax_demos_controller' ) );
    }


    function ale_ajax_demos_controller() {

        // die if request is fake
        check_ajax_referer('ale-demo-install', 'ale_magic_token');

        if (!current_user_can('switch_themes')) {
            die;
        }

        // try to extend the time limit
        @set_time_limit(240);


        $ale_demo_action = ale_demo_base::get_http_post_val('ale_demo_action');
        $ale_demo_id = ale_demo_base::get_http_post_val('ale_demo_id');



        // Remove demo
        if ($ale_demo_action == 'uninstall_demo') {
            // remove our content
            ale_demo_media::remove();
            ale_demo_content::remove();
            ale_demo_category::remove();
            ale_demo_category::remove_term();
            ale_demo_menus::remove();

            // restore all settings to the state before a demo was installed
            $ale_demo_history = new ale_demo_history();
            $ale_demo_history->restore_all();

            // update our state - no stack installed
            ale_demo_state::update_state('', '');
        }

        // step 1
        else if ($ale_demo_action == 'remove_content_before_install') {


            // save the history - this class will save the history only when going from user settings -> stack
            $ale_demo_history = new ale_demo_history();
            $ale_demo_history->save_all();


            // clean the user settings
            ale_demo_media::remove();
            ale_demo_content::remove();
            ale_demo_category::remove();
            ale_demo_category::remove_term();
            ale_demo_menus::remove();

        }

        // Install Demo
        else if ($ale_demo_action == 'ale_options_media') {
            // change our state
            ale_demo_state::update_state($ale_demo_id, 'full');

            //Set permalink structure
            global $wp_rewrite;
            $wp_rewrite->set_permalink_structure('/%postname%/');
            $wp_rewrite->flush_rules();

            // import images
            require_once(ale_global::$demo_list[$ale_demo_id]['folder'] . 'ale_options_media.php');
        }
        else if ($ale_demo_action == 'ale_works_media') {

            // import images
            require_once(ale_global::$demo_list[$ale_demo_id]['folder'] . 'ale_works_media.php');

            // import theme options
            $this->import_panel_settings(ale_global::$demo_list[$ale_demo_id]['folder'] . '/data/ale_options.dat');
        }
        else if ($ale_demo_action == 'ale_posts_media') {

            // import images
            require_once(ale_global::$demo_list[$ale_demo_id]['folder'] . 'ale_posts_media.php');
        }
        else if ($ale_demo_action == 'ale_pages_media') {
            // import images
            require_once(ale_global::$demo_list[$ale_demo_id]['folder'] . 'ale_pages_media.php');


            if($ale_demo_id == 'fashion' or $ale_demo_id == 'blackwhite'){
                //WooCommerce Sizes
                $catalog = array(
                    'width' 	=> '309',	// px
                    'height'	=> '506',	// px
                    'crop'		=> 1 		// true
                );
                $single = array(
                    'width' 	=> '309',	// px
                    'height'	=> '506',	// px
                    'crop'		=> 1 		// true
                );
                $thumbnail = array(
                    'width' 	=> '120',	// px
                    'height'	=> '120',	// px
                    'crop'		=> 0 		// false
                );

                // Image sizes
                update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
                update_option( 'shop_single_image_size', $single ); 		// Single product image
                update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
            }


        }
        else if ($ale_demo_action == 'ale_library_media') {
            // import images
            require_once(ale_global::$demo_list[$ale_demo_id]['folder'] . 'ale_library_media.php');
        }
        else if ($ale_demo_action == 'ale_import')  {
            // import data
            require_once(ale_global::$demo_list[$ale_demo_id]['folder'] . 'ale_import.php');

        }


    }


    public function import_panel_settings($file_path) {

        WP_Filesystem();
        global $wp_filesystem;
        $file_settings = unserialize($wp_filesystem->get_contents($file_path, true));

        foreach ($file_settings as $setting_id => $setting_value) {

            if($setting_id == 'ale_sitelogo' or $setting_id == 'ale_footerlogo' or $setting_id == 'ale_archivetitlebg' or $setting_id == 'ale_worktitlebg' or $setting_id == 'ale_wootitlebg' or $setting_id == 'ale_woosingletitlebg' or $setting_id == 'ale_map_icon'){
                ale_global::$ale_options[$setting_id] = ale_demo_media::get_image_url_by_ale_id($setting_value);
            } else if($setting_id == 'ale_background'){
                $background_temp = $setting_value;
                $new_bg = array();

                foreach ($background_temp as $key => $value){

                    if($key == 'image'){
                        $new_bg[$key] = ale_demo_media::get_image_url_by_ale_id($value);
                    }else {
                        $new_bg[$key] = $value;
                    }
                }
                ale_global::$ale_options[$setting_id] = $new_bg;

            } else if($setting_id == 'ale_builderheaderbgcolor'){
                $hbackground_temp = $setting_value;
                $new_hbg = array();

                foreach ($hbackground_temp as $key => $value){

                    if($key == 'image'){
                        $new_hbg[$key] = ale_demo_media::get_image_url_by_ale_id($value);
                    }else {
                        $new_hbg[$key] = $value;
                    }
                }
                ale_global::$ale_options[$setting_id] = $new_hbg;

            } else if($setting_id == 'ale_add_property_link' or $setting_id == 'ale_edit_property_link' or $setting_id == 'ale_favorite_property_link'){
                ale_global::$ale_options[$setting_id] = esc_url(home_url('/')).esc_attr($setting_value);
            } else {
                ale_global::$ale_options[$setting_id] = $setting_value;
            }

        }

        update_option(ALETHEME_THEME_OPTIONS_NAME, ale_global::$ale_options);
    }
}

new ale_demo_installer();