<?php
/*
 * Functions Helpers
 * */
//get all posts for specific post type
function olins_get_type_posts_data( $post_type = 'post' ) {
    $posts = get_posts( array(
        'posts_per_page' 	=> -1,
        'post_type'			=> $post_type,
    ));
    $result = array();
    foreach ( $posts as $post )	{
        $result[] = array(
            'value' => $post->ID,
            'label' => $post->post_title,
        );
    }
    return $result;
}


/*
 * Map Shortcodes
 * */
//Contact Form Extension
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Contact_Form extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Contact Form', 'olins' ),
        'base'                    => 'olins_contact_form',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Contact Form with background image', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Form Heading Title", "olins" ),
                "param_name"  => "form_title",
                "value"       => esc_html__( "ask us smth...", "olins" ),
                "description" => esc_html__( "Insert a title for your form", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Name Field Placeholder", "olins" ),
                "param_name"  => "form_name",
                "value"       => esc_html__( "Name", "olins" ),
                "description" => esc_html__( "Insert a placeholder. ex: Your Name", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email Field Placeholder", "olins" ),
                "param_name"  => "form_email",
                "value"       => esc_html__( "Email", "olins" ),
                "description" => esc_html__( "Insert a placeholder. ex: Your Email", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Message Field Placeholder", "olins" ),
                "param_name"  => "form_message",
                "value"       => esc_html__( "Message", "olins" ),
                "description" => esc_html__( "Insert a placeholder. ex: Type your message", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Submit button text", "olins" ),
                "param_name"  => "form_submit",
                "value"       => esc_html__( "Send", "olins" ),
                "description" => esc_html__( "Insert the button text. ex: Send", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Receive to", "olins" ),
                "param_name"  => "form_email_receive",
                "description" => esc_html__( "Your email to receive messages from the contact form", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email Subject", "olins" ),
                "param_name"  => "form_email_subject",
                "description" => esc_html__( "Specify a subject that will be used for received emails.", "olins" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "olins" ),
                "param_name"  => "form_bg",
                "description" => esc_html__( "Select or Upload a background image.", "olins" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Mask Color", "olins" ),
                "param_name"  => "form_mask_color",
                "description" => esc_html__( "Select a mask color that is displayed under the form", "olins" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Content Align", "olins" ),
                "param_name"  => "form_align",
                "value"       => array( 'Left Align' => 'left', 'Right Align' => 'right', 'Center Align' => 'center' ),
                "description" => esc_html__( "Specify the Content Align in the Form", "olins" )
            ),

        )
    ) );
}

//Slider One Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Slider_One extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Slider One', 'olins' ),
        "base"                    => "olins_slider_one",
        "as_parent"               => array( 'only' => 'olins_slider_one_item' ),
        'description'             => esc_html__( 'An Animated Slider called One', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Slider_One_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Slider One Item', 'olins' ),
        'base'                    => 'olins_slider_one_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or descriptions', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_slider_one'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "olins" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Pre Title", "olins" ),
                "param_name"  => "slide_pre_title",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slide", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "olins" ),
                "param_name"  => "slide_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slide", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "olins" ),
                "param_name"  => "slide_button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button", "olins" )
            ),
        )
    ) );
}

if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Product_Carousel_Slider extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Products Slider', 'olins' ),
        'base'                    => 'olins_product_carousel_slider',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Display products in a carousel slider', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Carousel Pre Title", "olins" ),
                "param_name"  => "carousel_pre_title",
                "value"       => 'check out',
                "description" => esc_html__( "Insert a pre title for your Product Carousel", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Carousel Title", "olins" ),
                "param_name"  => "carousel_title",
                "value"       => 'our stuff',
                "description" => esc_html__( "Insert a title for your Product Carousel", "olins" )
            ),
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Products', 'olins' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('product'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Enter List of Products', 'olins' ),
            ),
        )
    ) );
}

/* Recent Works shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Recent_Works_Line extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Recent Works Line', 'olins' ),
        'base'                    => 'olins_recent_works_line',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Display a line with recent works posts', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select 7 Work Posts', 'olins' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('works'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select 7 posts or let it empty to load recent posts.', 'olins' ),
            ),
        )
    ) );
}

/* Counter Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Counter extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Counter', 'olins' ),
        'base'                    => 'olins_counter',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'A counter from zero to your value.', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Counter Value", "olins" ),
                "param_name"  => "value",
                "value"       => '',
                "description" => esc_html__( "Specify the Number", "olins" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Counter Value Color", "olins" ),
                "param_name"  => "value_color",
                "value"       => '',
                "description" => esc_html__( "Specify the color", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Counter Label", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type a title for your number", "olins" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Counter Label Color", "olins" ),
                "param_name"  => "title_color",
                "value"       => '',
                "description" => esc_html__( "Specify the color", "olins" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Counter Icon", "olins" ),
                "param_name"  => "icon",
                "value"       => '',
                "description" => esc_html__( "Upload an icon if is necessary.", "olins" )
            ),
        )
    ) );
}

/* Google Maps Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Google_Maps extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Google Maps', 'olins' ),
        'base'                    => 'olins_google_maps',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Generates a Google Maps', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "The Address", "olins" ),
                "param_name"  => "address",
                "value"       => '',
                "description" => esc_html__( "Specify the address.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Map Width", "olins" ),
                "param_name"  => "width",
                "value"       => '100%',
                "description" => esc_html__( "Specify the Map Width", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Map Height", "olins" ),
                "param_name"  => "height",
                "value"       => '540',
                "description" => esc_html__( "Specify the Map Height", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Map Zoom", "olins" ),
                "param_name"  => "zoom",
                "value"       => '8',
                "description" => esc_html__( "Enter a zoom factor for Google Map (0 = whole world, 19 = individual buildings)", "olins" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Zoom on Mouse Wheel", "olins" ),
                "param_name"  => "zoomwithmouse",
                "value"       => array( 'Yes' => 'yes', 'No' => 'no' ),
                "description" => esc_html__( "Allow zooming on mouse wheel?", "olins" )
            ),
        )
    ) );
}


/* Simple Form Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Simple_Form extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Simple Form', 'olins' ),
        'base'                    => 'olins_simple_form',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Generates a Simple Contact Form', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Name Placeholder", "olins" ),
                "param_name"  => "name_label",
                "value"       => 'Your name ...',
                "description" => esc_html__( "Specify the name placeholder", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email Placeholder", "olins" ),
                "param_name"  => "email_label",
                "value"       => 'Your e-mail address',
                "description" => esc_html__( "Specify the email placeholder", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Message Placeholder", "olins" ),
                "param_name"  => "message_label",
                "value"       => 'Write your message here',
                "description" => esc_html__( "Specify the message placeholder", "olins" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Submit button text", "olins" ),
                "param_name"  => "form_submit",
                "value"       => esc_html__( "Send", "olins" ),
                "description" => esc_html__( "Insert the button text. ex: Send", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Receive to", "olins" ),
                "param_name"  => "form_email_receive",
                "description" => esc_html__( "Your email to receive messages from the contact form", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email Subject", "olins" ),
                "param_name"  => "form_email_subject",
                "description" => esc_html__( "Specify a subject that will be used for received emails.", "olins" )
            ),
        )
    ) );
}

/* Pricing Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Price_Element extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Price Element', 'olins' ),
        'base'                    => 'olins_price_element',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Generates a Pricing Element Box', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "olins" ),
                "param_name"  => "icon",
                "value"       => '',
                "description" => esc_html__( "Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "The Price", "olins" ),
                "param_name"  => "price",
                "value"       => '',
                "description" => esc_html__( "Specify the price", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Currency", "olins" ),
                "param_name"  => "currency",
                "value"       => '',
                "description" => esc_html__( "Specify the Currency", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the email placeholder", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Price Link", "olins" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Select a link if needed, or let the field empty.", "olins" )
            ),
            array(
                "type"        => "textarea_html",
                "heading"     => esc_html__( "Description", "olins" ),
                "param_name"  => "content",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "olins" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Price Color", "olins" ),
                "param_name"  => "price_color",
                "value"       => '',
                "description" => esc_html__( "Specify the color", "olins" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Title Color", "olins" ),
                "param_name"  => "title_color",
                "value"       => '',
                "description" => esc_html__( "Specify the color", "olins" )
            ),
        )
    ) );
}


//Testimonials Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Testimonials_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Testimonials Slider', 'olins' ),
        "base"                    => "olins_testimonials_slider",
        "as_parent"               => array( 'only' => 'olins_testimonials_slider_item' ),
        'description'             => esc_html__( 'A Slider with testimonials', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Testimonials_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Testimonials Slider Item', 'olins' ),
        'base'                    => 'olins_testimonials_slider_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add a Testimonial item for Testimonials Slider', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_testimonials_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Author Name", "olins" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert the testimonial's author name", "olins" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Testimonial", "olins" ),
                "param_name"  => "testimonial",
                "value"       => '',
                "description" => esc_html__( "Insert the Testimonial text", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Testimonial Link", "olins" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Generate a link for your testimonial, or let it empty to hide the link.", "olins" )
            ),
        )
    ) );
}




//Pretty Team Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Pretty_Team extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Pretty Team', 'olins' ),
        "base"                    => "olins_pretty_team",
        "as_parent"               => array( 'only' => 'olins_pretty_team_item' ),
        'description'             => esc_html__( 'A Slider with team members', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Pretty_Team_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Pretty Team Item', 'olins' ),
        'base'                    => 'olins_pretty_team_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add a Team Member item for Pretty Team Slider', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_pretty_team'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Name", "olins" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert the team member name", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Position", "olins" ),
                "param_name"  => "position",
                "value"       => '',
                "description" => esc_html__( "Insert the team member position", "olins" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description", "olins" ),
                "param_name"  => "desc",
                "value"       => '',
                "description" => esc_html__( "Insert the team member description", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "External or Internal Link", "olins" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Generate a link for your team member, or let it empty to hide the link.", "olins" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Photo", "olins" ),
                "param_name"  => "photo",
                "value"       => '',
                "description" => esc_html__( "Upload aa member photo.", "olins" )
            ),
        )
    ) );
}



//Move Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Move_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Move Slider', 'olins' ),
        "base"                    => "olins_move_slider",
        "as_parent"               => array( 'only' => 'olins_move_slider_item' ),
        'description'             => esc_html__( 'A Slider with move background.', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Move_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Move Slider Item', 'olins' ),
        'base'                    => 'olins_move_slider_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or descriptions', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_move_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "olins" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Pre Title", "olins" ),
                "param_name"  => "slide_pre_title",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slide", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "olins" ),
                "param_name"  => "slide_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slide", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "olins" ),
                "param_name"  => "slide_button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button", "olins" )
            ),
        )
    ) );
}



//Simple Team Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Simple_Team extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Simple Team', 'olins' ),
        "base"                    => "olins_simple_team",
        "as_parent"               => array( 'only' => 'olins_simple_team_item' ),
        'description'             => esc_html__( 'A Slider with team members', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Simple_Team_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Simple Team Item', 'olins' ),
        'base'                    => 'olins_simple_team_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or position', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_simple_team'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Member Photo", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Name", "olins" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Position", "olins" ),
                "param_name"  => "position",
                "value"       => '',
                "description" => esc_html__( "Insert a member position", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "olins" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for member, or let it empty.", "olins" )
            ),
        )
    ) );
}


/* Selected Works shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Selected_Works extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Selected Works', 'olins' ),
        'base'                    => 'olins_selected_works',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Display a line with selected works posts', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select 5 Work Posts', 'olins' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('works'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select 5 posts or let it empty to load recent work posts.', 'olins' ),
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Taxonomy Navigation", "olins" ),
                "param_name"  => "tax",
                "value"       => array( 'Yes' => 'yes', 'No' => 'no' ),
                "description" => esc_html__( "Select Yes if you want to display the Taxonomy Links", "olins" )
            ),
        )
    ) );
}




/* Scale Image Box shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Scale_Image_Box extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Scale Image Box', 'olins' ),
        'base'                    => 'olins_scale_image_box',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Scale background image and some text', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image. Recommendation: Use big images", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text Field 1", "olins" ),
                "param_name"  => "text_one",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text Field 2", "olins" ),
                "param_name"  => "text_two",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "olins" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Inner Image", "olins" ),
                "param_name"  => "icon",
                "description" => esc_html__( "Select or Upload an image/logo/icon to show into the box.", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "olins" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link, or let it empty.", "olins" )
            ),
        )
    ) );
}

/* Hover Text shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Hover_Text extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Hover Text', 'olins' ),
        'base'                    => 'olins_hover_text',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Text hovered by an image', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Hover Image", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image. Recommendation: Use big images", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text Field 1", "olins" ),
                "param_name"  => "text_one",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text Field 2", "olins" ),
                "param_name"  => "text_two",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "olins" )
            ),
        )
    ) );
}

/* Service Item Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Service_Block extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Service Block', 'olins' ),
        'base'                    => 'olins_service_block',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Service Block with image, title and text', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon Image", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type some text", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Descriptions", "olins" ),
                "param_name"  => "desc",
                "value"       => '',
                "description" => esc_html__( "Type some text", "olins" )
            ),
        )
    ) );
}

//Testimonial Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Simple_Testimonials_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Simple Testimonials Slider', 'olins' ),
        "base"                    => "olins_simple_testimonials_slider",
        "as_parent"               => array( 'only' => 'olins_simple_testimonials_slider_item' ),
        'description'             => esc_html__( 'A Slider with testimonials', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Simple_Testimonials_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Simple Testimonials Slider Item', 'olins' ),
        'base'                    => 'olins_simple_testimonials_slider_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or description', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_simple_testimonials_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Testimonial Photo", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Author Name", "olins" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Testimonial Text", "olins" ),
                "param_name"  => "testimonial",
                "value"       => '',
                "description" => esc_html__( "Insert a testimonial description", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "olins" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for testimonial, or let it empty.", "olins" )
            ),
        )
    ) );
}


/* Price Item shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Price_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Price Item', 'olins' ),
        'base'                    => 'olins_price_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Pricing item', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Pricing Image", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "The Amount (Price)", "olins" ),
                "param_name"  => "amount",
                "value"       => '',
                "description" => esc_html__( "Type the amount", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price Description", "olins" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "olins" )
            ),
        )
    ) );
}


/* Hover Team shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Hover_Team extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Hover Team', 'olins' ),
        'base'                    => 'olins_hover_team',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Hover Team', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text field", "olins" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Type some text", "olins" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Second Text field", "olins" ),
                "param_name"  => "text2",
                "value"       => '',
                "description" => esc_html__( "Type some text", "olins" )
            ),
        )
    ) );
}


/* Works Masonry Grid shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Works_Masonry_Grid extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Works Masonry Grid', 'olins' ),
        'base'                    => 'olins_works_masonry_grid',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Works Masonry Grid', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Items Count", "olins" ),
                "param_name"  => "count",
                "value"       => '',
                "description" => esc_html__( "Specify the items count or insert '-1' to show all posts.", "olins" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "olins" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Travel Photography' => 'travelphotography',
                    'Viaje Grid' => 'viajegrid',
                    'Furniture Grid' => 'furnituregrid',
                    'Creative Grid' => 'creativegrid',
                    'Brigitte Grid' => 'brigittegrid',
                    'Stephanie Grid' => 'stephaniegrid',
                    'Options Grid' => 'optionsgrid',
                    'Simple Grid' => 'simplegrid' ),
                "description" => esc_html__( "Select the Grid layout style.", "olins" )
            ),
        )
    ) );
}


/* Video Box shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Video_Box extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Video Box', 'olins' ),
        'base'                    => 'olins_video_box',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'A box with a video in modal window', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Video Link", "olins" ),
                "param_name"  => "video",
                "value"       => '',
                "description" => esc_html__( "Paste here a video from youtube. ex - https://youtu.be/kct_f6hUPlk", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Video Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the title", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Video Short Description", "olins" ),
                "param_name"  => "desc",
                "value"       => '',
                "description" => esc_html__( "Specify the short description", "olins" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Video Thumb", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
        )
    ) );
}




//Testimonial Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Tabs extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Tabs', 'olins' ),
        "base"                    => "olins_tabs",
        "as_parent"               => array( 'only' => 'olins_tabs_item' ),
        'description'             => esc_html__( 'Tabs Container', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Tabs_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Tabs Item', 'olins' ),
        'base'                    => 'olins_tabs_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for a tab', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_tabs'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Tab Name", "olins" ),
                "param_name"  => "tab",
                "value"       => '',
                "description" => esc_html__( "Insert a tab title", "olins" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Tab Photo", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image or let it empty to hide photo.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text", "olins" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "olins" )
            ),
        )
    ) );
}



//Centered Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Centered_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Centered Slider', 'olins' ),
        "base"                    => "olins_centered_slider",
        "as_parent"               => array( 'only' => 'olins_centered_slider_item' ),
        'description'             => esc_html__( 'A Slider with centered active slide.', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Centered_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Centered Slider Item', 'olins' ),
        'base'                    => 'olins_centered_slider_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or descriptions', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_centered_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "olins" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "olins" ),
                "param_name"  => "slide_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slide", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Descriptions", "olins" ),
                "param_name"  => "slide_desc",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slide", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "olins" ),
                "param_name"  => "slide_button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button", "olins" )
            ),
        )
    ) );
}


//Icon Tabs Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Icon_Tabs extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Icon Tabs', 'olins' ),
        "base"                    => "olins_icon_tabs",
        "as_parent"               => array( 'only' => 'olins_icon_tabs_item' ),
        'description'             => esc_html__( 'Icon Tabs Container', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Icon_Tabs_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Icon Tabs Item', 'olins' ),
        'base'                    => 'olins_icon_tabs_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for a tab', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_icon_tabs'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Tab Icon Image", "olins" ),
                "param_name"  => "icon",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Hover Tab Icon Image", "olins" ),
                "param_name"  => "hover",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text", "olins" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Unique ID", "olins" ),
                "param_name"  => "unique_id",
                "value"       => '',
                "description" => esc_html__( "Specify an unique ID.", "olins" )
            ),
        )
    ) );
}


/* Featured Post shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Featured_Post extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Featured Post', 'olins' ),
        'base'                    => 'olins_featured_post',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Select a post to be featured', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select 1 post', 'olins' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => false,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('post'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select 1 posts or let it empty to load recent post.', 'olins' ),
            ),
        )
    ) );
}



//Image with Title Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Image_Title extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Image with Title', 'olins' ),
        "base"                    => "olins_image_title",
        "as_parent"               => array( 'only' => 'olins_image_title_item' ),
        'description'             => esc_html__( 'Image with Title Container', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Image_Title_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Image Title Item', 'olins' ),
        'base'                    => 'olins_image_title_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Upload an image and specify the title', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_icon_tabs'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Subtitle", "olins" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a subtitle", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "olins" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link or let it empty", "olins" )
            ),
        )
    ) );
}


/* Left Icon Service shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Left_Icon_Service extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Left Icon Service', 'olins' ),
        'base'                    => 'olins_left_icon_service',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Left Icon Service', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon Image", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an icon image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title field", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type some text", "olins" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description field", "olins" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Type some text", "olins" )
            ),
        )
    ) );
}


/* Pricing Table shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Pricing_Table extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Pricing Table', 'olins' ),
        'base'                    => 'olins_pricing_table',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Pricing Table', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Plan Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type some text", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Currency", "olins" ),
                "param_name"  => "currency",
                "value"       => '',
                "description" => esc_html__( "Type the currency", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price", "olins" ),
                "param_name"  => "price",
                "value"       => '',
                "description" => esc_html__( "Type the price", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Period", "olins" ),
                "param_name"  => "preion",
                "value"       => '',
                "description" => esc_html__( "Type the period", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description field", "olins" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Type some text", "olins" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "olins" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link or let it empty", "olins" )
            ),
        )
    ) );
}


/* Recent Blog Based on Options settings */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Recent_Blog_Posts extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Recent Blog Posts', 'olins' ),
        'base'                    => 'olins_recent_blog_posts',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Recent Blog Posts', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Posts Count", "olins" ),
                "param_name"  => "count",
                "value"       => '',
                "description" => esc_html__( "Type the Posts Count", "olins" )
            ),

            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "olins" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Theme Options Style' => 'default',
                    ),
                "description" => esc_html__( "Select the Grid layout style.", "olins" )
            ),
        )
    ) );
}



//Works Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Works_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Works Slider', 'olins' ),
        "base"                    => "olins_works_slider",
        "as_parent"               => array( 'only' => 'olins_works_slider_item' ),
        'description'             => esc_html__( 'Slider with images', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slider Info", "olins" ),
                "param_name"  => "slider_info",
                "value"       => '',
                "description" => esc_html__( "Type the info. (It is displayed in the left part of the slider)", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slider Pre Title", "olins" ),
                "param_name"  => "slider_pre_title",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slider", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slider Title", "olins" ),
                "param_name"  => "slider_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slider", "olins" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Works_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Works Slider Item', 'olins' ),
        'base'                    => 'olins_works_slider_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Upload images for the slider', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_works_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "olins" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
        )
    ) );
}



/* Corporate Team shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Corporate_Team extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Corporate Team', 'olins' ),
        'base'                    => 'olins_corporate_team',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'A box with team member', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Member Photo", "olins" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Name", "olins" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Type the member name", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Post", "olins" ),
                "param_name"  => "post",
                "value"       => '',
                "description" => esc_html__( "Type the member post", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Description", "olins" ),
                "param_name"  => "desc",
                "value"       => '',
                "description" => esc_html__( "Type the member description", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Twitter Link", "olins" ),
                "param_name"  => "tw",
                "value"       => '',
                "description" => esc_html__( "Paste the Twitter link or let it empty", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Facebook Link", "olins" ),
                "param_name"  => "fb",
                "value"       => '',
                "description" => esc_html__( "Paste the Facebook link or let it empty", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Google Plus Link", "olins" ),
                "param_name"  => "gl",
                "value"       => '',
                "description" => esc_html__( "Paste the Google Plus link or let it empty", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Pinterest Link", "olins" ),
                "param_name"  => "pin",
                "value"       => '',
                "description" => esc_html__( "Paste the Pinterest link or let it empty", "olins" )
            ),

        )
    ) );
}


//TimeLine Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Timeline extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Timeline', 'olins' ),
        "base"                    => "olins_timeline",
        "as_parent"               => array( 'only' => 'olins_timeline_item' ),
        'description'             => esc_html__( 'Timeline Container', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Timeline_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Timeline Item', 'olins' ),
        'base'                    => 'olins_timeline_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for timeline item', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_tabs'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Date", "olins" ),
                "param_name"  => "date",
                "value"       => '',
                "description" => esc_html__( "Insert the date", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text", "olins" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "olins" )
            ),
        )
    ) );
}


/* Progress Bar shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Progress_Bar extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Progress Bar', 'olins' ),
        'base'                    => 'olins_progress_bar',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'A progress bar', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Item Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Item Progress", "olins" ),
                "param_name"  => "progress",
                "value"       => '',
                "description" => esc_html__( "Example: 70%", "olins" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Bar Color", "olins" ),
                "param_name"  => "bar_color",
                "description" => esc_html__( "Select a color", "olins" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Bar Background Color", "olins" ),
                "param_name"  => "bar_bg_color",
                "description" => esc_html__( "Select a background color", "olins" )
            ),
        )
    ) );
}




//Fashion Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Fashion_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Fashion Slider', 'olins' ),
        "base"                    => "olins_fashion_slider",
        "as_parent"               => array( 'only' => 'olins_fashion_slider_item' ),
        'description'             => esc_html__( 'A Creative Slider', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Fashion_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Fashion Slider Item', 'olins' ),
        'base'                    => 'olins_fashion_slider_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or descriptions', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_fashion_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "olins" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "olins" ),
                "param_name"  => "slide_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slide", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Sub Title", "olins" ),
                "param_name"  => "slide_subtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a subtitle for your Slide", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Descriptions", "olins" ),
                "param_name"  => "slide_desc",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slide", "olins" )
            ),
        )
    ) );
}





//Stephanie Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Olins_Stephanie_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Stephanie Slider', 'olins' ),
        "base"                    => "olins_stephanie_slider",
        "as_parent"               => array( 'only' => 'olins_stephanie_slider_item' ),
        'description'             => esc_html__( 'Stephanie Slider', 'olins' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Olins', 'olins' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Stephanie_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Stephanie Slider Item', 'olins' ),
        'base'                    => 'olins_stephanie_slider_item',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Add data for each item such images.', 'olins' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'olins_stephanie_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "olins" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "olins" )
            ),
        )
    ) );
}

/* Recent Post Line shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Recent_Post_Line extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Recent Post Line', 'olins' ),
        'base'                    => 'olins_recent_post_line',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Recent Post Line', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title", "olins" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the box title", "olins" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Sub Title", "olins" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Specify the box subtitle", "olins" )
            ),
        )
    ) );
}


/* Recent Post Line shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Olins_Scroll_Works extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Scroll Works', 'olins' ),
        'base'                    => 'olins_scroll_works',
        'category'                => esc_html__( 'Olins', 'olins' ),
        'description'             => esc_html__( 'Scroll Works', 'olins' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Items Count", "olins" ),
                "param_name"  => "count",
                "value"       => '',
                "description" => esc_html__( "Specify the count", "olins" )
            ),
        )
    ) );
}