<?php
/**
 * Get current theme options
 * 
 * @return array
 */
function ale_get_options() {

    $headerfont = array_merge(ale_get_safe_webfonts(), ale_get_google_webfonts());

    $background_defaults = array(
        'color' => '',
        'image' => '',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment'=>'scroll',
        'background-size'=>'cover'
    );

    $wrapper_size = array(
        '100' => esc_html__('Flexible 100%','olins'),
        '960' => esc_html__('Boxed 960px','olins'),
        '1024' => esc_html__('Boxed 1024px','olins'),
        'custom' => esc_html__('Custom','olins')
    );

    $design_variant = array(
        //'ikea' => esc_html__('Olins Ikea','olins'),
        'blackwhite' => esc_html__('Olins Black & White','olins'),
        'zoo' => esc_html__('Olins Zoo','olins'),
        'bakery' => esc_html__('Olins Bakery','olins'),
        'photography' => esc_html__('Olins Photography','olins'),
        'luxuryshoes' => esc_html__('Olins Luxury Shoes','olins'),
        'camping' => esc_html__('Olins Camping','olins'),
        'travelphoto' => esc_html__('Olins Travel Photography','olins'),
        'viaje' => esc_html__('Olins Viaje','olins'),
        'wedding' => esc_html__('Olins Wedding','olins'),
        'furniture' => esc_html__('Olins Furniture','olins'),
        'magazine' => esc_html__('Olins Magazine','olins'),
        'creative' => esc_html__('Olins Creative','olins'),
        'brigitte' => esc_html__('Olins Photography Brigitte','olins'),
        'corporate' => esc_html__('Olins Corporate','olins'),
        'cv' => esc_html__('Olins CV','olins'),
        'fashion' => esc_html__('Olins Fashion Store','olins'),
        'pastel' => esc_html__('Olins Pastel Photography','olins'),
        'stephanie' => esc_html__('Olins Stephanie Lark (Wedding)','olins'),
        'cameron' => esc_html__('Olins Cameron','olins'),
        'pixel' => esc_html__('Olins Pixel','olins'),
        'jade' => esc_html__('Olins Jade','olins'),
    );
    $yes_no = array(
        'no' => esc_html__('No. Use Default Styles','olins'),
        'yes' => esc_html__('Yes, Overwrite with Custom','olins')
    );
    $show_hide = array(
        'hide' => esc_html__('Hide','olins'),
        'show' => esc_html__('Show','olins')
    );
    $date_position = array(
        'onimage' => esc_html__('On Featured Image','olins'),
        'infoline' => esc_html__('Blog Info Line','olins'),
        'beforetitle' => esc_html__('Before Title','olins')
    );
    $postline_position = array(
        'beforetitle' => esc_html__('Before Post Title','olins'),
        'aftertitle' => esc_html__('After Post Title','olins'),
        'aftercontent' => esc_html__('After Post Description','olins'),
        'disable' => esc_html__('Disable Post Line','olins')
    );
    $archive_columns = array(
        '1' => esc_html__('One Column','olins'),
        '2' => esc_html__('Two Columns','olins'),
        '3' => esc_html__('Three Columns','olins'),
        '4' => esc_html__('Four Columns','olins'),
        '5' => esc_html__('Five Columns','olins')
    );
    $archive_text_align = array(
        'left' => esc_html__('Left Align','olins'),
        'center' => esc_html__('Center Align','olins'),
        'right' => esc_html__('Right Align','olins'),
        'justify' => esc_html__('Justify','olins')

    );
    $archive_pagination = array(
        'pagination' => esc_html__('Pagination','olins'),
        'loadmore' => esc_html__('Load More Button','olins'),
        'infinite' => esc_html__('Infinite Scroll','olins'),
        'simple' => esc_html__('Simple pagination','olins')
    );
    $archive_sidebar = array(
        'no' => esc_html__('No Sideabar','olins'),
        'left_third' => esc_html__('1/3 Left','olins'),
        'left_fourth' => esc_html__('1/4 Left','olins'),
        'right_third' => esc_html__('1/3 Right','olins'),
        'right_fourth' => esc_html__('1/4 Right','olins')
    );
    $footer_variant = array(
        'default' => esc_html__('Default Footer','olins'),
        'widget' => esc_html__('Widget Footer','olins')
    );
    $page_heading = array(
        'parallax_one' => esc_html__('Dark Title on Light Parallax Image 1','olins'),
        'parallax_two' => esc_html__('Light Title on Dark Parallax Image 2','olins'),
        'simple_image' => esc_html__('White Title on Dark Image','olins'),
        'center_text' => esc_html__('Simple Centered Dart Title (without pre title)','olins'),
        'left_text' => esc_html__('Simple Title (without pre title)','olins'),
        'left_text_breadcrumbs' => esc_html__('Simple Title (without pre title) with Breadcrumbs','olins'),
        'breadcrumbs' => esc_html__('Hide Title, Show Breadcrumbs Line','olins'),
        'wedding_heading' => esc_html__('Left Image. Works for Wedding Variant.','olins'),
        'parallax_three' => esc_html__('Parallax image with Pre Title for Sticky Header','olins')
    );
    $blog_grid = array(
        'masonry' => esc_html__('Masonry Grid','olins'),
        'vintage' => esc_html__('Vintage Grid','olins'),
        'furniture' => esc_html__('Furniture Grid','olins'),
        'magazine' => esc_html__('Magazine Grid','olins'),
        'brigitte' => esc_html__('Brigitte Grid','olins'),
        'cameron' => esc_html__('Cameron Grid','olins'),
        'pixel' => esc_html__('Pixel Grid','olins'),
        'jade' => esc_html__('Jade Grid','olins'),
    );
    $woo_grid = array(
        'default' => esc_html__('Default Style','olins'),
        'vintage' => esc_html__('Vintage Style','olins'),
        'minimal' => esc_html__('Minimal Style','olins'),
        'fashion' => esc_html__('Fashion Style','olins'),
    );
    $menu_styles = array(
        'color' => '',
        'image' => '',
        'width' => '',
        'height' => '',
        'text-color' => '',
        'text-align' => '',
    );

	
	$imagepath =  ALETHEME_URL . '/assets/images/';
	
	$options = array();

    $options[] = array("name" => esc_html__("Brand","olins"),
                        "type" => "heading",
                        "icon" => "fa-desktop");

    $options[] = array( "name" => esc_html__("Site Logo","olins"),
                        "desc" => esc_html__("Upload or put the site logo link.","olins"),
                        "id" => "ale_sitelogo",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => esc_html__("Footer Logo","olins"),
                        "desc" => esc_html__("Upload or put the footer logo link.","olins"),
                        "id" => "ale_footerlogo",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => esc_html__("Uplaod a favicon icon","olins"),
                        "desc" => esc_html__("Upload or put the link of your favicon icon","olins"),
                        "id" => "ale_favicon",
                        "std" => "",
                        "type" => "upload");
		
	$options[] = array("name" => esc_html__("Style","olins"),
						"type" => "heading",
                        "icon" => "fa-window-restore");

    $options[] = array( "name" => esc_html__("Design","olins"),
                        "desc" => esc_html__("Specify the design. Each Design variant will load the own overall style, the header and the footer are hardcoded and are unique for specific variant.","olins"),
                        "id" => "ale_design_variant",
                        "std" => "blackwhite",
                        "type" => "select",
                        "options" => $design_variant);

    $options[] = array( "name" => esc_html__("Page Wrapper","olins"),
                        "desc" => esc_html__("Specify the wrapper width. If you selected the Custom Wrapper, make sure you added the custom value in the field below.","olins"),
                        "id" => "ale_wrapper_width",
                        "std" => "",
                        "type" => "select",
                        "options" => $wrapper_size);

    $options[] = array( "name" => esc_html__("Custom Page Wrapper","olins"),
                        "desc" => esc_html__("If you need a custom Wrapper width, add your value in that field. ex: 900px or 90%. Also make sure the previous field is selected Custom","olins"),
                        "id" => "ale_custom_wrapper",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Inner Wrapper/Content Wrapper","olins"),
                        "desc" => esc_html__("Specify the inner wrapper if it should be different then the default wrapper. Let the field empty to be equal to the default wrapper. Use \"px\" or \"%\".","olins"),
                        "id" => "ale_inner_wrapper",
                        "std" => "1000px",
                        "type" => "text");

    $options[] = array( 'name' => esc_html__("Manage Background","olins"),
                        'desc' => esc_html__("Select the background color, or upload a custom background image. Default background is the #f5f5f5 color","olins"),
                        'id' => 'ale_background',
                        'std' => $background_defaults,
                        'type' => 'background');

    $options[] = array( "name" => esc_html__("Site Pre Loader","olins"),
                        "desc" => esc_html__("Enable or Disable the site preloader","olins"),
                        "id" => "ale_preloder",
                        "std" => "disable",
                        "type" => "select",
                        "options" => array(
                            'disable' => esc_html__('Disable','olins'),
                            'enable' => esc_html__('Enable','olins')
                        ));

    $options[] = array( "name" => esc_html__("Pre loader Animation","olins"),
                        "desc" => esc_html__("Select Pre Loader animation","olins"),
                        "id" => "ale_preloder_style",
                        "std" => "1",
                        "type" => "select",
                        "options" => array(
                            '1' => esc_html__('Rotating Plane','olins'),
                            '2' => esc_html__('Double Bounce','olins'),
                            '3' => esc_html__('Wave','olins'),
                            '4' => esc_html__('Wandering Cubes','olins'),
                            '5' => esc_html__('Spinner','olins'),
                            '6' => esc_html__('Chasing Dots','olins'),
                            '7' => esc_html__('Three Bounce','olins'),
                            '8' => esc_html__('Circle','olins'),
                            '9' => esc_html__('Cube Grid','olins'),
                            '10' => esc_html__('Fading Circle','olins'),
                            '11' => esc_html__('Folding Cube','olins'),
                        ));

    $options[] = array( "name" => esc_html__("Background color","olins"),
                        "desc" => esc_html__("Select a background color for Pre loader","olins"),
                        "id" => "ale_loader_bg",
                        "std" => "",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Animation color","olins"),
                        "desc" => esc_html__("Select a color for Animation","olins"),
                        "id" => "ale_loader_animation",
                        "std" => "",
                        "type" => "color");

    $options[] = array("name" => esc_html__("Header Settings","olins"),
                        "type" => "heading",
                        "icon" => "fa-code");

    $options[] = array( "name" => esc_html__("Overwrite Header Styles","olins"),
                        "desc" => esc_html__("Select Yes if you want to customize the header styles like, bg color, navigation items sizes etc...","olins"),
                        "id" => "ale_header_custom_styles",
                        "std" => "no",
                        "type" => "select",
                        "options" => $yes_no);

    $options[] = array( 'name' => esc_html__("Styles for the Header","olins"),
                        'desc' => esc_html__("Fill all fields to create a custom Header Style. Let the fields empty to use the default styles.","olins"),
                        'id' => 'ale_header_styles',
                        'std' => $menu_styles,
                        'type' => 'header_styles');

    $options[] = array( 'name' => esc_html__("1st Level Menu Style","olins"),
                        'desc' => esc_html__("Change the 1st Level Menu Style","olins"),
                        'id' => 'ale_menu_first_level',
                        'std' => array('size' => '18px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'400','lineheight'=>'normal','padding'=>'10px','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => esc_html__("2st Level Menu Style","olins"),
                        'desc' => esc_html__("Change the 2st Level Menu Style","olins"),
                        'id' => 'ale_menu_second_level',
                        'std' => array('size' => '18px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'400','lineheight'=>'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => esc_html__("3st Level Menu Style","olins"),
                        'desc' => esc_html__("Change the 3st Level Menu Style","olins"),
                        'id' => 'ale_menu_third_level',
                        'std' => array('size' => '18px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'400','lineheight'=>'normal','color' => '#111111'),
                        'type' => 'typography');


    $options[] = array("name" => esc_html__("Footer Options","olins"),
                        "type" => "heading",
                        "icon" => "fa-copyright");

    $options[] = array( "name" => esc_html__("Footer Type","olins"),
                        "desc" => esc_html__("Specify the footer type/style.","olins"),
                        "id" => "ale_footer_variant",
                        "std" => "default",
                        "type" => "select",
                        "options" => $footer_variant);

    $options[] = array( "name" => esc_html__("Footer Call Number","olins"),
                        "desc" => esc_html__("Insert the call number","olins"),
                        "id" => "ale_footer_callnumber",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Footer Email Address","olins"),
                        "desc" => esc_html__("Insert the Email Address.","olins"),
                        "id" => "ale_footer_email_address",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Your Address","olins"),
                        "desc" => esc_html__("Insert the Address.","olins"),
                        "id" => "ale_footer_address",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Copyrights","olins"),
                        "desc" => esc_html__("Insert the Copyrights text","olins"),
                        "id" => "ale_copyrights",
                        "std" => "",
                        "type" => "editor");

    $options[] = array("name" => esc_html__("Page Heading","olins"),
                        "type" => "heading",
                        "icon" => "fa-header");

    $options[] = array( "name" => esc_html__("Page Heading Style","olins"),
                        "desc" => esc_html__("Select a style for page heading. NOTE: Specific Heading was designed and hard coded for a specific demo variant. So after you installed a demo example, do not change this field. It will broke the layout.","olins"),
                        "id" => "ale_page_heading_style",
                        "std" => "parallax_one",
                        "type" => "select",
                        "options" => $page_heading);

    $options[] = array( "name" => esc_html__("Archive Pages Title Background","olins"),
                        "desc" => esc_html__("Upload or put the image link. Necessary size: 1800px-590px","olins"),
                        "id" => "ale_archivetitlebg",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => esc_html__("Blog Archive Page Title","olins"),
                        "desc" => esc_html__("Specify the title for Blog archive page","olins"),
                        "id" => "ale_archiveblogtitle",
                        "std" => "our blog posts",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Blog Archive Page Pre Title","olins"),
                        "desc" => esc_html__("Specify the pre title for Blog archive page","olins"),
                        "id" => "ale_archiveblogpretitle",
                        "std" => "take a look at",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Typography","olins"),
                        "type" => "heading",
                        "icon" => "fa-font");

    $options[] = array( "name" => esc_html__("Select the First Font from Google Library","olins"),
                        "desc" => esc_html__("The default Font is - Raleway","olins"),
                        "id" => "ale_font_one",
                        "std" => "Raleway",
                        "type" => "select",
                        "options" => $headerfont);

    $options[] = array( "name" => esc_html__("Select the First Font Properties from Google Library","olins"),
                        "desc" => esc_html__("The default Font (extended) is - 400,400i,600,800,800i,900","olins"),
                        "id" => "ale_font_one_ex",
                        "std" => "400,400i,600,800,800i,900",
                        "type" => "text",
                        );

    $options[] = array( "name" => esc_html__("Select the Second Font from Google Library","olins"),
                        "desc" => esc_html__("The default Font is - Playfair Display","olins"),
                        "id" => "ale_font_two",
                        "std" => "Playfair+Display",
                        "type" => "select",
                        "options" => $headerfont);

    $options[] = array( "name" => esc_html__("Select the Second Font Properties from Google Library","olins"),
                        "desc" => esc_html__("The default Font (extended) is - 400i","olins"),
                        "id" => "ale_font_two_ex",
                        "std" => "400i",
                        "type" => "text",
                        );

    $options[] = array( 'name' => esc_html__("H1 Style","olins"),
                        'desc' => esc_html__("Change the h1 style","olins"),
                        'id' => 'ale_h1sty',
                        'std' => array('size' => '32px','face' => 'Raleway','style' => 'italic','transform'=>'none', 'weight'=>'900','lineheight'=>'normal','color' => '#898989'),
                        'type' => 'typography');

    $options[] = array( 'name' => esc_html__("H2 Style","olins"),
                        'desc' => esc_html__("Change the h2 style","olins"),
                        'id' => 'ale_h2sty',
                        'std' => array('size' => '28px','face' => 'Raleway','style' => 'italic','transform'=>'none', 'weight'=>'900','lineheight'=>'normal','color' => '#898989'),
                        'type' => 'typography');

    $options[] = array( 'name' => esc_html__("H3 Style","olins"),
                        'desc' => esc_html__("Change the h3 style","olins"),
                        'id' => 'ale_h3sty',
                        'std' => array('size' => '24px','face' => 'Raleway','style' => 'italic','transform'=>'none', 'weight'=>'900','lineheight'=>'normal','color' => '#898989'),
                        'type' => 'typography');

    $options[] = array( 'name' => esc_html__("H4 Style","olins"),
                        'desc' => esc_html__("Change the h4 style","olins"),
                        'id' => 'ale_h4sty',
                        'std' => array('size' => '20px','face' => 'Raleway','style' => 'italic','transform'=>'none', 'weight'=>'900','lineheight'=>'normal','color' => '#898989'),
                        'type' => 'typography');

    $options[] = array( 'name' => esc_html__("H5 Style","olins"),
                        'desc' => esc_html__("Change the h5 style","olins"),
                        'id' => 'ale_h5sty',
                        'std' => array('size' => '16px','face' => 'Raleway','style' => 'italic','transform'=>'none', 'weight'=>'900','lineheight'=>'normal','color' => '#898989'),
                        'type' => 'typography');

    $options[] = array( 'name' => esc_html__("H6 Style","olins"),
                        'desc' => esc_html__("Change the h6 style","olins"),
                        'id' => 'ale_h6sty',
                        'std' => array('size' => '14px','face' => 'Raleway','style' => 'italic','transform'=>'none', 'weight'=>'900','lineheight'=>'normal','color' => '#898989'),
                        'type' => 'typography');

    $options[] = array( 'name' => esc_html__("Body Style","olins"),
                        'desc' => esc_html__("Change the body font style","olins"),
                        'id' => 'ale_bodystyle',
                        'std' => array('size' => '14px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'400','lineheight'=>'24px','color' => '#898989'),
                        'type' => 'typography');

	$options[] = array( "name" => esc_html__("Social Profiles & Share","olins"),
						"type" => "heading",
                        "icon" => "fa-address-book");

    $options[] = array( "name" => esc_html__("Twitter","olins"),
                        "desc" => esc_html__("Your twitter profile URL.","olins"),
                        "id" => "ale_twi",
                        "std" => "",
                        "type" => "text");

	$options[] = array( "name" => esc_html__("Facebook","olins"),
						"desc" => esc_html__("Your facebook profile URL.","olins"),
						"id" => "ale_fb",
						"std" => "",
						"type" => "text");

    $options[] = array( "name" => esc_html__("Youtube","olins"),
                        "desc" => esc_html__("Your youtube profile URL.","olins"),
                        "id" => "ale_you",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("LinkedIn","olins"),
                        "desc" => esc_html__("Your LinkedIn profile URL.","olins"),
                        "id" => "ale_lin",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Pinterest","olins"),
                        "desc" => esc_html__("Your Pinterest profile URL.","olins"),
                        "id" => "ale_pin",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Google Plus+","olins"),
                        "desc" => esc_html__("Your Google Plus+ profile URL.","olins"),
                        "id" => "ale_gpl",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Tumblr","olins"),
                        "desc" => esc_html__("Your Tumblr profile URL.","olins"),
                        "id" => "ale_tum",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Instagram","olins"),
                        "desc" => esc_html__("Your Instagram profile URL.","olins"),
                        "id" => "ale_insta",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Reddit","olins"),
                        "desc" => esc_html__("Your Reddit profile URL.","olins"),
                        "id" => "ale_red",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("VK","olins"),
                        "desc" => esc_html__("Your VK profile URL.","olins"),
                        "id" => "ale_vk",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Share Platforms","olins"),
                        "desc" => esc_html__("Check the platforms you want to use for social share","olins"),
                        "id" => "ale_share_platforms",
                        "std"=>array(
                            'fb'=>'1',
                            'twi'=>'1',
                            'goglp'=>'1'
                            ),
                        "type" => "multicheck",
                        "options" => array(
                            'fb'=>'Facebook',
                            'twi'=>'Twitter',
                            'goglp'=>'Google +',
                            'lin'=>'Linkedin',
                            'red'=>'Reddit',
                            'pin'=>'Pinterest',
                            'vk'=>'Vkontakte'
                        ));

	
	$options[] = array( "name" => esc_html__("Facebook Application ID","olins"),
						"desc" => esc_html__("If you have Application ID you can connect the blog to your Facebook Profile and monitor statistics there.","olins"),
						"id" => "ale_fb_id",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => esc_html__("Enable Open Graph","olins"),
						"desc" => esc_html__("The Open Graph protocol enables any web page to become a rich object in a social graph.","olins"),
						"id" => "ale_og_enabled",
						"std" => "",
						"type" => "checkbox");


	
	$options[] = array( "name" => esc_html__("Advanced Settings","olins"),
						"type" => "heading",
                        "icon" => "fa-cogs");
	
	$options[] = array( "name" => esc_html__("Footer Code","olins"),
						"desc" => esc_html__("If you have anything else to add in the footer - please add it here.","olins"),
						"id" => "ale_footer_info",
						"std" => "",
						"type" => "textarea");

    $options[] = array( "name" => esc_html__("Custom CSS Styles","olins"),
                        "desc" => esc_html__("You can add here your styles. ex. .boxclass { padding:10px; }","olins"),
                        "id" => "ale_customcsscode",
                        "std" => "",
                        "type" => "textarea");

    $options[] = array("name" => esc_html__("Blog Settings","olins"),
                       "type" => "heading",
                       "icon" => "fa-newspaper-o");


    $options[] = array( "name" => esc_html__("Columns Count","olins"),
                        "desc" => esc_html__("Select the columns count for the Blog Archives pages. Works for grids, that support columns.","olins"),
                        "id" => "ale_default_blog_columns",
                        "std" => "3",
                        "type" => "select",
                        "options" => $archive_columns);

    $options[] = array( "name" => esc_html__("Text Align","olins"),
                        "desc" => esc_html__("Setup the Text Align into Blog items","olins"),
                        "id" => "ale_default_blog_text_align",
                        "std" => "center",
                        "type" => "select",
                        "options" => $archive_text_align);

    $options[] = array( "name" => esc_html__("Pagination Settings","olins"),
                        "desc" => esc_html__("Select the Pagination Type for Blog Archives","olins"),
                        "id" => "ale_default_blog_pagination",
                        "std" => "pagination",
                        "type" => "select",
                        "options" => $archive_pagination);

    $options[] = array( "name" => esc_html__("Sidebar Settings","olins"),
                        "desc" => esc_html__("Select a sidebar position for Blog Archives","olins"),
                        "id" => "ale_blog_sidebar_position",
                        "std" => "no",
                        "type" => "select",
                        "options" => $archive_sidebar);

    $options[] = array( "name" => esc_html__("Share Icons","olins"),
                        "desc" => esc_html__("Show or Hide Share Icons?","olins"),
                        "id" => "ale_blog_share_icons",
                        "std" => "show",
                        "type" => "select",
                        "options" => $show_hide);

    $options[] = array( "name" => esc_html__("Number of Words in Description","olins"),
                        "desc" => esc_html__("Specify the Number of Words for Description blog per post.","olins"),
                        "id" => "ale_custom_blog_excerpt_count",
                        "std" => "20",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Date Position","olins"),
                        "desc" => esc_html__("Select the date position.","olins"),
                        "id" => "ale_blog_custom_date_position",
                        "std" => "onimage",
                        "type" => "select",
                        "options" => $date_position);

    $options[] = array( "name" => esc_html__("Blog Info Line Position","olins"),
                        "desc" => esc_html__("Select the post info line position.","olins"),
                        "id" => "ale_blog_custom_postline_position",
                        "std" => "beforetitle",
                        "type" => "select",
                        "options" => $postline_position);

    $options[] = array( "name" => esc_html__("Show Category?","olins"),
                        "desc" => esc_html__("Show or Hide post Category?","olins"),
                        "id" => "ale_blog_show_category",
                        "std" => "show",
                        "type" => "select",
                        "options" => $show_hide);

    $options[] = array( "name" => esc_html__("Show post Author?","olins"),
                        "desc" => esc_html__("Show or Hide post Author?","olins"),
                        "id" => "ale_blog_show_author",
                        "std" => "hide",
                        "type" => "select",
                        "options" => $show_hide);

    $options[] = array( "name" => esc_html__("Show Comments count?","olins"),
                        "desc" => esc_html__("Show or Hide comments count?","olins"),
                        "id" => "ale_blog_show_comments",
                        "std" => "hide",
                        "type" => "select",
                        "options" => $show_hide);

    $options[] = array( "name" => esc_html__("Blog Grid Layout","olins"),
                        "desc" => esc_html__("Specify the Grid Layout. Note: Once you selected a specific Grid some of the options above will not work. This is happening because a specific grid has specific parameters and some options like columns count will not work.","olins"),
                        "id" => "ale_blog_grid_layout",
                        "std" => "masonry",
                        "type" => "select",
                        "options" => $blog_grid);


    $options[] = array( 'name' => esc_html__("Overwrite Default Blog Styles","olins"),
                        'desc' => esc_html__("The fields bellow are for custom styles. You can select the overwrite option and insert custom values to change the blog style.","olins"),
                        'id' => 'ale_overwritebloginfo',
                        'std' => "",
                        'type' => 'info');

    $options[] = array( "name" => esc_html__("Overwrite Blog Styles","olins"),
                        "desc" => esc_html__("Select Yes if you want to customize the elements like title, image, social icons, etc...","olins"),
                        "id" => "ale_blog_custom_styles",
                        "std" => "no",
                        "type" => "select",
                        "options" => $yes_no);

    $options[] = array( 'name' => esc_html__("Title Typography","olins"),
                        'desc' => esc_html__("Change the Typography for block title","olins"),
                        'id' => 'ale_custom_blog_title',
                        'std' => array('size' => '16px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'600','lineheight'=>'normal','color' => '#000000'),
                        'type' => 'typography');

    $options[] = array( "name" => esc_html__("Title Margins","olins"),
                        "desc" => esc_html__("Specify the margin value for block title.","olins"),
                        "id" => "ale_custom_blog_title_margin",
                        "std" => "0 0 25px 0",
                        "type" => "text");

    $options[] = array( 'name' => esc_html__("Description Typography","olins"),
                        'desc' => esc_html__("Change the Typography for block description","olins"),
                        'id' => 'ale_custom_blog_desc',
                        'std' => array('size' => '14px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'400','lineheight'=>'24px','color' => '#898989'),
                        'type' => 'typography');

    $options[] = array( "name" => esc_html__("Description Margins","olins"),
                        "desc" => esc_html__("Specify the margin value for block description.","olins"),
                        "id" => "ale_custom_blog_desc_margin",
                        "std" => "0 0 1em 0",
                        "type" => "text");

    $options[] = array( 'name' => esc_html__("Info Line Typography","olins"),
                        'desc' => esc_html__("Change the Typography for info line","olins"),
                        'id' => 'ale_custom_blog_infoline',
                        'std' => array('size' => '12px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'400','lineheight'=>'14px','color' => '#acacac'),
                        'type' => 'typography');

    $options[] = array( "name" => esc_html__("Info Line Margins","olins"),
                        "desc" => esc_html__("Specify the margin value for info line.","olins"),
                        "id" => "ale_custom_blog_info_margin",
                        "std" => "0",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Share Icons Color","olins"),
                        "desc" => esc_html__("Specify the share icons color.","olins"),
                        "id" => "ale_custom_blog_share_color",
                        "std" => "#898989",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Share Icons Size","olins"),
                        "desc" => esc_html__("Specify the icon size in px.","olins"),
                        "id" => "ale_custom_blog_share_size",
                        "std" => "12px",
                        "type" => "text");

    $options[] = array( 'name' => esc_html__("Overwrite Pagination Styles","olins"),
                        'desc' => esc_html__("Change the fields bellow to overwrite the paginations styles","olins"),
                        'id' => 'ale_overwritepaginationinfo',
                        'std' => "",
                        'type' => 'info');

    $options[] = array( "name" => esc_html__("Button Background color","olins"),
                        "desc" => esc_html__("Specify the color.","olins"),
                        "id" => "ale_pag_button_color",
                        "std" => "#FFF",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Button Font color","olins"),
                        "desc" => esc_html__("Specify the color.","olins"),
                        "id" => "ale_pag_button_color_font",
                        "std" => "#898989",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Button Hover Background color","olins"),
                        "desc" => esc_html__("Specify the color.","olins"),
                        "id" => "ale_pag_button_hover",
                        "std" => "#f3f4f4",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Button Hover Font color","olins"),
                        "desc" => esc_html__("Specify the color.","olins"),
                        "id" => "ale_pag_button_hover_font",
                        "std" => "#000",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Button Border color","olins"),
                        "desc" => esc_html__("Specify the color.","olins"),
                        "id" => "ale_pag_button_border",
                        "std" => "#f3f4f4",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Button Hover Border color","olins"),
                        "desc" => esc_html__("Specify the color.","olins"),
                        "id" => "ale_pag_button_border_hover",
                        "std" => "#f3f4f4",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Overwrite Single Blog Post Styles","olins"),
                        "desc" => esc_html__("Select Yes if you want to customize the elements like title, infoline, social icons, etc...","olins"),
                        "id" => "ale_single_blog_custom_styles",
                        "std" => "no",
                        "type" => "select",
                        "options" => $yes_no);

    $options[] = array( 'name' => esc_html__("Title Typography","olins"),
                        'desc' => esc_html__("Change the Typography for block title","olins"),
                        'id' => 'ale_custom_single_blog_title',
                        'std' => array('size' => '16px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'600','lineheight'=>'normal','color' => '#000000'),
                        'type' => 'typography');

    $options[] = array( "name" => esc_html__("Title Margins","olins"),
                        "desc" => esc_html__("Specify the margin value for block title.","olins"),
                        "id" => "ale_custom_single_blog_title_margin",
                        "std" => "0 0 25px 0",
                        "type" => "text");

    $options[] = array( 'name' => esc_html__("Pre Title Typography","olins"),
                        'desc' => esc_html__("Change the Typography for Pre Title","olins"),
                        'id' => 'ale_custom_single_blog_infoline',
                        'std' => array('size' => '12px','face' => 'Raleway','style' => 'normal','transform'=>'none', 'weight'=>'400','lineheight'=>'14px','color' => '#acacac'),
                        'type' => 'typography');

    $options[] = array( "name" => esc_html__("Pre Title Margins","olins"),
                        "desc" => esc_html__("Specify the margin value for pre title.","olins"),
                        "id" => "ale_custom_single_blog_info_margin",
                        "std" => "0",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Title & Pre Title Align","olins"),
                        "desc" => esc_html__("Setup the Text Align","olins"),
                        "id" => "ale_default_single_blog_text_align",
                        "std" => "center",
                        "type" => "select",
                        "options" => $archive_text_align);


    $options[] = array( "name" => esc_html__("Work Settings","olins"),
                        "type" => "heading",
                        "icon" => "fa-camera");

    $options[] = array( "name" => esc_html__("Archive Pre Title","olins"),
                        "desc" => esc_html__("Insert the pre title for Archives pages","olins"),
                        "id" => "ale_works_pre_title",
                        "std" => "we love the things",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Archive Title","olins"),
                        "desc" => esc_html__("Insert the title for Archives pages","olins"),
                        "id" => "ale_works_title",
                        "std" => "we create for you",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Page Heading Background","olins"),
                        "desc" => esc_html__("Upload or put the image link. Necessary size: 1800px-590px","olins"),
                        "id" => "ale_worktitlebg",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => esc_html__("Columns Count","olins"),
                        "desc" => esc_html__("Select the columns count for the Works Archives pages","olins"),
                        "id" => "ale_default_work_columns",
                        "std" => "3",
                        "type" => "select",
                        "options" => $archive_columns);

    $options[] = array( "name" => esc_html__("Layout Style","olins"),
                        "desc" => esc_html__("Select between Grid or Masonry or Square layout.","olins"),
                        "id" => "ale_default_layout_type",
                        "std" => "masonry",
                        "type" => "select",
                        "options" => array(
                            'masonry' => 'Masonry Layout',
                            'grid'    => 'Grid Layout',
                            'square'    => 'Square Layout',
                        ));

    $options[] = array( "name" => esc_html__("Hover Style","olins"),
                        "desc" => esc_html__("Specify the Hover Style.","olins"),
                        "id" => "ale_work_hover",
                        "std" => "1",
                        "type" => "select",
                        "options" => array(
                            '1' => 'Hover Style 1 (Lines)',
                            '2' => 'Hover Style 2 (Light Opacity)',
                            '3' => 'Hover Style 3 (Mask Opacity)',
                            '4' => 'Hover Style 4 (Light Opacity)',
                            '5' => 'Hover Style 5 (Creative)',
                            '6' => 'Hover Style 6 (Stephanie Wedding)',
                            '7' => 'Hover Style 7 (Cameron)'
                        ));

    $options[] = array( "name" => esc_html__("Padding","olins"),
                        "desc" => esc_html__("Padding between work items in px","olins"),
                        "id" => "ale_work_padding",
                        "std" => "0",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Sidebar Settings","olins"),
                        "desc" => esc_html__("Select a sidebar position for Work Archives","olins"),
                        "id" => "ale_work_sidebar_position",
                        "std" => "no",
                        "type" => "select",
                        "options" => $archive_sidebar);

    $options[] = array( "name" => esc_html__("Item Style","olins"),
                        "desc" => esc_html__("Specify the Item Style.","olins"),
                        "id" => "ale_item_style",
                        "std" => "1",
                        "type" => "select",
                        "options" => array(
                            '1' => esc_html__('Only Image','olins'),
                            '2' => esc_html__('Image, Title, and Category Icon','olins'),
                            '3' => esc_html__('Image, Title, Category','olins'),
                            '4' => esc_html__('Image (On Hover title & category)','olins'),
                            '5' => esc_html__('Image & Title','olins')
                        ));

    $options[] = array( "name" => esc_html__("Container Properties","olins"),
                        "desc" => esc_html__("Specify the Container style for Works Post Type","olins"),
                        "id" => "ale_works_container_prop",
                        "std" => "1",
                        "type" => "select",
                        "options" => array(
                            '1' => esc_html__('Use Default Settings (Style Tab).','olins'),
                            '2' => esc_html__('Use Full Width with no padding.','olins')
                        ));

    $options[] = array( "name" => esc_html__("Extra Heading","olins"),
                        "desc" => esc_html__("Enable or Disable an Extra Heading that shows some additional info","olins"),
                        "id" => "ale_works_extra_heading",
                        "std" => "1",
                        "type" => "select",
                        "options" => array(
                            '1' => esc_html__('Disable Extra Heading','olins'),
                            '2' => esc_html__('Enable Extra Heading','olins')
                        ));

    $options[] = array( "name" => esc_html__("First Line Text","olins"),
                        "desc" => esc_html__("Add some text to show in first line","olins"),
                        "id" => "ale_work_extra_line1",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Second Line Text","olins"),
                        "desc" => esc_html__("Add some text to show in second line","olins"),
                        "id" => "ale_work_extra_line2",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Background Color","olins"),
                        "desc" => esc_html__("Specify the background color for the Extra heading","olins"),
                        "id" => "ale_work_extra_bg",
                        "std" => "",
                        "type" => "color");

    $options[] = array( "name" => esc_html__("Taxonomy Navigation","olins"),
                        "desc" => esc_html__("Enable or Disable the taxonomy (Category) navigation at the top of archive page.","olins"),
                        "id" => "ale_taxonomy_navigation",
                        "std" => "disable",
                        "type" => "select",
                        "options" => array(
                            'disable' => esc_html__('Disable','olins'),
                            'enable' => esc_html__('Enable','olins')
                        ));

    $options[] = array("name" => esc_html__("WooCommerce","olins"),
                       "type" => "heading",
                       "icon" => "fa-shopping-basket");

    $options[] = array( "name" => esc_html__("WooCommerce Title Background","olins"),
                        "desc" => esc_html__("Upload or put the image link. Necessary size: 1800px-590px","olins"),
                        "id" => "ale_wootitlebg",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => esc_html__("WooCommerce Single Page Title Background","olins"),
                        "desc" => esc_html__("Upload or put the image link. LEt the field empty to disable the heading on single shop page.","olins"),
                        "id" => "ale_woosingletitlebg",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => esc_html__("WooCommerce Page Title","olins"),
                        "desc" => esc_html__("Specify the title for WooCommerce pages","olins"),
                        "id" => "ale_wooblogtitle",
                        "std" => "items fo you",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("WooCommerce Pre Title","olins"),
                        "desc" => esc_html__("Specify the pre title for WooCommerce PAges","olins"),
                        "id" => "ale_wooblogpretitle",
                        "std" => "awesome, styled, special",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Columns Count","olins"),
                        "desc" => esc_html__("Select the columns count for WooCommerce pages","olins"),
                        "id" => "ale_woo_columns",
                        "std" => "4",
                        "type" => "select",
                        "options" => $archive_columns);

    $options[] = array( "name" => esc_html__("Sidebar Settings","olins"),
                        "desc" => esc_html__("Select a sidebar position for WooCommerce Pages","olins"),
                        "id" => "ale_woo_sidebar_position",
                        "std" => "no",
                        "type" => "select",
                        "options" => $archive_sidebar);

    $options[] = array( "name" => esc_html__("Shop Grid Style","olins"),
                        "desc" => esc_html__("Specify the Grid Style","olins"),
                        "id" => "ale_woo_grid_style",
                        "std" => "default",
                        "type" => "select",
                        "options" => $woo_grid);

    $options[] = array( "name" => esc_html__("Products per page","olins"),
                        "desc" => esc_html__("Specify the products per page count. by default it is 8","olins"),
                        "id" => "ale_products_per_page",
                        "std" => "8",
                        "type" => "text");

    $options[] = array("name" => esc_html__("Instagram Settings","olins"),
                       "type" => "heading",
                       "icon" => "fa-instagram");

    $options[] = array( "name" => esc_html__("Enable Instagram Feed","olins"),
                        "desc" => esc_html__("Enable to show the recent images from instagram on the footer. Note: It will show the module only on design variants that support the instagram feed in footer. You can check the demo examples to view the list.","olins"),
                        "id" => "ale_instagram_feed_footer",
                        "std" => "disable",
                        "type" => "select",
                        "options" => array(
                            'enable' => esc_html__('Enable Instagram on Footers that supports','olins'),
                            'disable' => esc_html__('Disable Instagram Feed','olins')
                        ));

    $options[] = array( "name" => esc_html__("Instagram Login","olins"),
                        "desc" => esc_html__("Insert your instagram login","olins"),
                        "id" => "ale_instagram_login",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Access Token","olins"),
                        "desc" => esc_html__("Insert your Instagram Access Token. If you don't know how to generate an access token you can take a look at our video tutorial. The link is under this comment.","olins"),
                        "id" => "ale_instagram_token",
                        "tutorial" => "https://www.youtube.com/watch?v=N-nAzuqvePo",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Images Count","olins"),
                        "desc" => esc_html__("How many images to show?","olins"),
                        "id" => "ale_instagram_count",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Images Size","olins"),
                        "desc" => esc_html__("Specify the images Thumb.","olins"),
                        "id" => "ale_instagram_thumb",
                        "std" => "standard_resolution",
                        "type" => "select",
                        "options" => array(
                            'standard_resolution' => esc_html__('Standard Resolution','olins'),
                            'low_resolution' => esc_html__('Low Resolution','olins'),
                            'thumbnail' => esc_html__('Thumbnail','olins')
                        ));

    $options[] = array("name" => esc_html__("Subscribe Settings","olins"),
                       "type" => "heading",
                       "icon" => "fa-envelope-o");

    $options[] = array( 'name' => esc_html__("Subscribe Form works with specific Design Variants","olins"),
                        'desc' => esc_html__("Note that the Subscribe form is shown on a specific design variant and not on all variants. If you want to have a subscribe form into your footer, you must select a design variant that support it. See the demo previews examples. You also need to install a subscribe plugin and paste the shortcode in the field bellow.","olins"),
                        'id' => 'ale_subscribeinfo',
                        'std' => "",
                        'type' => 'info');

    $options[] = array( "name" => esc_html__("Subscribe Title","olins"),
                        "desc" => esc_html__("Type a Title for the subscribe Box","olins"),
                        "id" => "ale_subscribe_title",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Form Shortcode","olins"),
                        "desc" => esc_html__("Paste here the subscribe shortcode generated by a third-part plugin. It can be MailChimp for WP.","olins"),
                        "id" => "ale_subscribe_shortcode",
                        "std" => "",
                        "type" => "text");

    $options[] = array("name" => esc_html__("Google Maps","olins"),
                       "type" => "heading",
                       "icon" => "fa-map-marker");

    $options[] = array( "name" => esc_html__("Google Maps API Key","olins"),
                        "desc" => ale_wp_kses(__("Paste a Google Maps API Key. You can generate a key on the  <a href=\"https://console.developers.google.com/apis/\" target=\"_blank\">Google console.</a>","olins")),
                        "id" => "ale_maps_api_key",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => esc_html__("Custom Pin Icon","olins"),
                        "desc" => esc_html__("Upload a Custom Pin Icon. Let it empty to use the default icon.","olins"),
                        "id" => "ale_map_icon",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => esc_html__("Map Custom Style","olins"),
                        "desc" => esc_html__("Paste here a custom style for your google map. You can use the snazzymaps.com to take a ready style. ","olins"),
                        "id" => "ale_maps_style",
                        "std" => "",
                        "type" => "text");

	return $options;
}


/**
 * Add Metaboxes
 * @param array $meta_boxes
 * @return array 
 */
function ale_metaboxes($meta_boxes) {
	
	$meta_boxes = array();

    $prefix = "ale_";

    $meta_boxes[] = array(
        'id'         => 'home_settings_metabox',
        'title'      => esc_html__('Home Page Settings','gardener'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-homepage.php'), ), // Specific post templates to display this metabox
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Enable Order Form Box','gardener'),
                'desc' => esc_html__('Enable or disable the order form on Homepage','gardener'),
                'id'   => $prefix . 'order_form',
                'std'  => 'enable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Enable','gardener'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','gardener'), 'value' => 'disable', ),
                ),
            ),

            array(
                'name' => esc_html__('Enable Services Box','gardener'),
                'desc' => esc_html__('Enable or disable the services on Homepage','gardener'),
                'id'   => $prefix . 'services_box',
                'std'  => 'enable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Enable','gardener'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','gardener'), 'value' => 'disable', ),
                ),
            ),

            array(
                'name' => esc_html__('Enable Partners Box','gardener'),
                'desc' => esc_html__('Enable or disable the Partners on Homepage','gardener'),
                'id'   => $prefix . 'partners_box',
                'std'  => 'enable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Enable','gardener'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','gardener'), 'value' => 'disable', ),
                ),
            ),

            array(
                'name' => esc_html__('Enable Testimonials Box','gardener'),
                'desc' => esc_html__('Enable or disable the Testimonials on Homepage','gardener'),
                'id'   => $prefix . 'testimonials_box',
                'std'  => 'enable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Enable','gardener'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','gardener'), 'value' => 'disable', ),
                ),
            ),
            array(
                'name' => esc_html__('Enable Portfolio Box','gardener'),
                'desc' => esc_html__('Enable or disable the portfolio on Homepage','gardener'),
                'id'   => $prefix . 'portfolio_box',
                'std'  => 'enable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Enable','gardener'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','gardener'), 'value' => 'disable', ),
                ),
            ),

            array(
                'name' => esc_html__('Order Box Custom Title','gardener'),
                'desc' => esc_html__('Type here the custom title for your order box.','gardener'),
                'id'   => $prefix . 'order_box_title',
                'std'  => 'Order gardener',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Gardeners Section Title','gardener'),
                'desc' => esc_html__('Type here the custom title for your gardeners section.','gardener'),
                'id'   => $prefix . 'gardeners_title',
                'std'  => 'Gardeners',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Order Box Gardener Sub Title','gardener'),
                'desc' => esc_html__('Type here the custom sub title.','gardener'),
                'id'   => $prefix . 'order_box_gardener_subtitle',
                'std'  => 'Our best specialists',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Projects Section Title','gardener'),
                'desc' => esc_html__('Type here the custom title for your projects section.','gardener'),
                'id'   => $prefix . 'l_projects_title',
                'std'  => 'Latest projects',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Projects Section Link Title','gardener'),
                'desc' => esc_html__('Type here the custom title for your projects section link title.','gardener'),
                'id'   => $prefix . 'l_projects_link_title',
                'std'  => 'All projects',
                'type'    => 'text',
            ),


            array(
                'name' => esc_html__('Partners Title','gardener'),
                'desc' => esc_html__('Type here the custom title for your partners title.','gardener'),
                'id'   => $prefix . 'partners_title',
                'std'  => 'Our partners',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Partners Box Background','gardener'),
                'desc' => esc_html__('Upload here a background image. Recommended size: 1920-713px','gardener'),
                'id'   => $prefix . 'partners_bg',
                'std'  => '',
                'type'    => 'file',
            ),
        )
    );


    $meta_boxes[] = array(
        'id'         => 'about_settings_metabox',
        'title'      => esc_html__('About Page Settings','gardener'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Enable Additional Info Box','gardener'),
                'desc' => esc_html__('Enable or disable the additional info box','gardener'),
                'id'   => $prefix . 'additional_info',
                'std'  => 'enable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Enable','gardener'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','gardener'), 'value' => 'disable', ),
                ),
            ),
            array(
                'name' => esc_html__('Enable Skills Box','gardener'),
                'desc' => esc_html__('Enable or disable the skills box','gardener'),
                'id'   => $prefix . 'skills_info',
                'std'  => 'enable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Enable','gardener'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','gardener'), 'value' => 'disable', ),
                ),
            ),
            array(
                'name' => esc_html__('Enable Video & Partners Box','gardener'),
                'desc' => esc_html__('Enable or disable the video/partners box','gardener'),
                'id'   => $prefix . 'video_info',
                'std'  => 'enable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Enable','gardener'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','gardener'), 'value' => 'disable', ),
                ),
            ),

            array(
                'name' => esc_html__('Partners Title','gardener'),
                'desc' => esc_html__('Type here the custom title for your partners title.','gardener'),
                'id'   => $prefix . 'partners_title',
                'std'  => 'Our partners',
                'type'    => 'text',
            ),
        )
    );


    $meta_boxes[] = array(
        'id'         => 'about_author_metabox',
        'title'      => esc_html__('Author Settings','gardener'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Subtitle Title','gardener'),
                'desc' => esc_html__('Type here the subtitle.','gardener'),
                'id'   => $prefix . 'author_subtitle',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Author Photo','gardener'),
                'desc' => esc_html__('Upload a photo. Recommended size 371px-416px','gardener'),
                'id'   => $prefix . 'author_photo',
                'std'  => '',
                'type'    => 'file',
            ),
            array(
                'name' => esc_html__('Author Name','gardener'),
                'desc' => esc_html__('Type here the author name','gardener'),
                'id'   => $prefix . 'author_name',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Author Position','gardener'),
                'desc' => esc_html__('Type here the position','gardener'),
                'id'   => $prefix . 'author_position',
                'std'  => '',
                'type'    => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'about_add_settings_metabox',
        'title'      => esc_html__('Additional Info Settings','gardener'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Container Title','gardener'),
                'desc' => esc_html__('Type here the title.','gardener'),
                'id'   => $prefix . 'info_title',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Photo #1','gardener'),
                'desc' => esc_html__('Upload a photo #1. Recommended size 550-340px','gardener'),
                'id'   => $prefix . 'info_photo_one',
                'std'  => '',
                'type'    => 'file',
            ),
            array(
                'name' => esc_html__('Photo #2','gardener'),
                'desc' => esc_html__('Upload a photo #2. Recommended size 429-377px','gardener'),
                'id'   => $prefix . 'info_photo_two',
                'std'  => '',
                'type'    => 'file',
            ),

            array(
                'name' => esc_html__('Info Description','gardener'),
                'desc' => esc_html__('Type here the description.','gardener'),
                'id'   => $prefix . 'info_description',
                'std'  => '',
                'type'    => 'wysiwyg',
            ),
        )
    );



    $meta_boxes[] = array(
        'id'         => 'about_skills_settings_metabox',
        'title'      => esc_html__('Skills Settings','gardener'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('Icon #1','gardener'),
                'desc' => esc_html__('Upload a photo #1.','gardener'),
                'id'   => $prefix . 'info_icon_1',
                'std'  => '',
                'type'    => 'file',
            ),
            array(
                'name' => esc_html__('Title #1','gardener'),
                'desc' => esc_html__('Type here the title #1.','gardener'),
                'id'   => $prefix . 'skills_title_1',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Description #1','gardener'),
                'desc' => esc_html__('Type here the description #1.','gardener'),
                'id'   => $prefix . 'skills_description_1',
                'std'  => '',
                'type'    => 'textarea',
            ),

            array(
                'name' => esc_html__('Icon #2','gardener'),
                'desc' => esc_html__('Upload a photo #2.','gardener'),
                'id'   => $prefix . 'info_icon_2',
                'std'  => '',
                'type'    => 'file',
            ),
            array(
                'name' => esc_html__('Title #2','gardener'),
                'desc' => esc_html__('Type here the title #2.','gardener'),
                'id'   => $prefix . 'skills_title_2',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Description #2','gardener'),
                'desc' => esc_html__('Type here the description #2.','gardener'),
                'id'   => $prefix . 'skills_description_2',
                'std'  => '',
                'type'    => 'textarea',
            ),

            array(
                'name' => esc_html__('Icon #3','gardener'),
                'desc' => esc_html__('Upload a photo #3.','gardener'),
                'id'   => $prefix . 'info_icon_3',
                'std'  => '',
                'type'    => 'file',
            ),
            array(
                'name' => esc_html__('Title #3','gardener'),
                'desc' => esc_html__('Type here the title #3.','gardener'),
                'id'   => $prefix . 'skills_title_3',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Description #3','gardener'),
                'desc' => esc_html__('Type here the description #3.','gardener'),
                'id'   => $prefix . 'skills_description_3',
                'std'  => '',
                'type'    => 'textarea',
            ),


        )
    );

    $meta_boxes[] = array(
        'id'         => 'about_video_settings_metabox',
        'title'      => esc_html__('Video Settings','gardener'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('Video Photo','gardener'),
                'desc' => esc_html__('Upload a photo','gardener'),
                'id'   => $prefix . 'video_photo',
                'std'  => '',
                'type'    => 'file',
            ),
            array(
                'name' => esc_html__('Video Link','gardener'),
                'desc' => esc_html__('Type here the link.','gardener'),
                'id'   => $prefix . 'video_link',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Title','gardener'),
                'desc' => esc_html__('Type here the title.','gardener'),
                'id'   => $prefix . 'video_title',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Description','gardener'),
                'desc' => esc_html__('Type here the description.','gardener'),
                'id'   => $prefix . 'video_description',
                'std'  => '',
                'type'    => 'textarea',
            ),

        )
    );

    $meta_boxes[] = array(
        'id'         => 'contact_settings_metabox',
        'title'      => esc_html__('Contact Settings','gardener'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-contact.php'), ), // Specific post templates to display this metabox
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('Phone Label','gardener'),
                'desc' => esc_html__('Insert here the phone label','gardener'),
                'id'   => $prefix . 'phono_label',
                'std'  => 'Phone',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Phone Number','gardener'),
                'desc' => esc_html__('Insert here the phone number','gardener'),
                'id'   => $prefix . 'phone_number',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Email Label','gardener'),
                'desc' => esc_html__('Insert here the email label','gardener'),
                'id'   => $prefix . 'email_label',
                'std'  => 'Email',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Your Email','gardener'),
                'desc' => esc_html__('Insert here the email','gardener'),
                'id'   => $prefix . 'your_email',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Address Label','gardener'),
                'desc' => esc_html__('Insert here the address label','gardener'),
                'id'   => $prefix . 'address_label',
                'std'  => 'Address',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Your Address','gardener'),
                'desc' => esc_html__('Insert here the address','gardener'),
                'id'   => $prefix . 'your_address',
                'std'  => '',
                'type'    => 'text',
            ),


            array(
                'name' => esc_html__('Contact Form Title','gardener'),
                'desc' => esc_html__('Insert here the title','gardener'),
                'id'   => $prefix . 'contact_title',
                'std'  => 'Contact form',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Contact Form Description','gardener'),
                'desc' => esc_html__('Insert here the description','gardener'),
                'id'   => $prefix . 'contact_description',
                'std'  => '',
                'type'    => 'text',
            ),
        )
    );


    $meta_boxes[] = array(
        'id'         => 'posts_pages_metabox',
        'title'      => esc_html__('Post Settings','gardener'),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Sub Title','gardener'),
                'desc' => esc_html__('Type here the sub title.','gardener'),
                'id'   => $prefix . 'post_sub_title',
                'std'  => '',
                'type'    => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'slider_settings_metabox',
        'title'      => esc_html__('Slider Options','gardener'),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Show this post in Slider','gardener'),
                'desc' => esc_html__('Check this item if you want to show it in the home slider','gardener'),
                'id'   => $prefix . 'post_to_slider',
                'std'  => '',
                'type'    => 'checkbox',
            ),

            array(
                'name' => esc_html__('Main Image','gardener'),
                'desc' => esc_html__('Upload the main image. Recommended size: 1100px - 491px','gardener'),
                'id'   => $prefix . 'main_image',
                'std'  => '',
                'type'    => 'file',
            ),

            array(
                'name' => esc_html__('Background Image','gardener'),
                'desc' => esc_html__('Upload the background image. Recommended size: 1920px - 890px','gardener'),
                'id'   => $prefix . 'background_image',
                'std'  => '',
                'type'    => 'file',
            ),
        )
    );



    $meta_boxes[] = array(
        'id'         => 'gardeners_metabox',
        'title'      => esc_html__('Gardeners Options','gardener'),
        'pages'      => array( 'gardeners', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Gardener Position','gardener'),
                'desc' => esc_html__('Type here the Gardener position','gardener'),
                'id'   => $prefix . 'gardener_post',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Description Title','gardener'),
                'desc' => esc_html__('Type here the Gardener description title','gardener'),
                'id'   => $prefix . 'gardener_title',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Staff Member?','gardener'),
                'desc' => esc_html__('Check the field if the person is staff.','gardener'),
                'id'   => $prefix . 'gardener_staff',
                'std'  => '',
                'type'    => 'checkbox',
            ),

            array(
                'name' => esc_html__('Facebook link Profile','gardener'),
                'desc' => esc_html__('Type here the Gardener profile link','gardener'),
                'id'   => $prefix . 'gardener_fb',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Twitter link Profile','gardener'),
                'desc' => esc_html__('Type here the Gardener profile link','gardener'),
                'id'   => $prefix . 'gardener_twi',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Gardener Email','gardener'),
                'desc' => esc_html__('Type here the Gardener email','gardener'),
                'id'   => $prefix . 'gardener_email',
                'std'  => '',
                'type'    => 'text',
            ),

        )
    );



    $meta_boxes[] = array(
        'id'         => 'services_metabox',
        'title'      => esc_html__('Services Options','gardener'),
        'pages'      => array( 'services' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Service Small Icon','gardener'),
                'desc' => esc_html__('Upload here an icon. Recommended size: 100px-100px','gardener'),
                'id'   => $prefix . 'service_icon',
                'std'  => '',
                'type'    => 'file',
            ),

            array(
                'name' => esc_html__('Service Small Icon Hover','gardener'),
                'desc' => esc_html__('Upload here an icon. Recommended size: 100px-100px','gardener'),
                'id'   => $prefix . 'service_icon_hover',
                'std'  => '',
                'type'    => 'file',
            ),


            array(
                'name' => esc_html__('Service Big Icon','gardener'),
                'desc' => esc_html__('Upload here an icon. Recommended size: 100px-100px','gardener'),
                'id'   => $prefix . 'service_bigicon',
                'std'  => '',
                'type'    => 'file',
            ),

            array(
                'name' => esc_html__('Service Big Icon Hover','gardener'),
                'desc' => esc_html__('Upload here an icon. Recommended size: 100px-100px','gardener'),
                'id'   => $prefix . 'service_bigicon_hover',
                'std'  => '',
                'type'    => 'file',
            ),


            array(
                'name' => esc_html__('Service Description Image','gardener'),
                'desc' => esc_html__('Upload here an icon. Recommended size: 816px-158px','gardener'),
                'id'   => $prefix . 'service_description_image',
                'std'  => '',
                'type'    => 'file',
            ),

            array(
                'name' => esc_html__('Service Sub Title','gardener'),
                'desc' => esc_html__('Type here the sub title','gardener'),
                'id'   => $prefix . 'service_subtitle',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Link #1','gardener'),
                'desc' => esc_html__('Type here the link','gardener'),
                'id'   => $prefix . 'service_link_one',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Label Link #1','gardener'),
                'desc' => esc_html__('Type here the link label','gardener'),
                'id'   => $prefix . 'service_label_one',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Link #2','gardener'),
                'desc' => esc_html__('Type here the link','gardener'),
                'id'   => $prefix . 'service_link_two',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Label Link #2','gardener'),
                'desc' => esc_html__('Type here the link label','gardener'),
                'id'   => $prefix . 'service_label_two',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Link #3','gardener'),
                'desc' => esc_html__('Type here the link','gardener'),
                'id'   => $prefix . 'service_link_three',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Label Link #3','gardener'),
                'desc' => esc_html__('Type here the link label','gardener'),
                'id'   => $prefix . 'service_label_three',
                'std'  => '',
                'type'    => 'text',
            ),


            array(
                'name' => esc_html__('The Price','gardener'),
                'desc' => esc_html__('Type here the service','gardener'),
                'id'   => $prefix . 'service_price',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('The Currency','gardener'),
                'desc' => esc_html__('Type here the currency','gardener'),
                'id'   => $prefix . 'service_currency',
                'std'  => '$',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('The Price Type','gardener'),
                'desc' => esc_html__('Type here the price type. ex: per hour/per square or let it empty.','gardener'),
                'id'   => $prefix . 'service_price_type',
                'std'  => '',
                'type'    => 'text',
            ),
        )
    );


    $meta_boxes[] = array(
        'id'         => 'partners_metabox',
        'title'      => esc_html__('Partners Options','gardener'),
        'pages'      => array( 'partners' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(


            array(
                'name' => esc_html__('Partner Sub Title','gardener'),
                'desc' => esc_html__('Type here the sub title','gardener'),
                'id'   => $prefix . 'partner_subtitle',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Site','gardener'),
                'desc' => esc_html__('Type here the site','gardener'),
                'id'   => $prefix . 'partner_site',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Project Link','gardener'),
                'desc' => esc_html__('Type here the partner project link','gardener'),
                'id'   => $prefix . 'partner_link',
                'std'  => '',
                'type'    => 'text',
            ),

        )
    );


    $meta_boxes[] = array(
        'id'         => 'testimonial_metabox',
        'title'      => esc_html__('Testimonials Options','gardener'),
        'pages'      => array( 'testimonials' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(


            array(
                'name' => esc_html__('Author Position','gardener'),
                'desc' => esc_html__('Type here the author position/profession.','gardener'),
                'id'   => $prefix . 'testy_position',
                'std'  => '',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Author Subtitle','gardener'),
                'desc' => esc_html__('Type here the subtitle','gardener'),
                'id'   => $prefix . 'testy_subtitle',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Author Rating','gardener'),
                'desc' => esc_html__('Select the star count from 1 to 5','gardener'),
                'id'   => $prefix . 'testy_rating',
                'std'  => '',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('1 Star','gardener'), 'value' => '1', ),
                    array( 'name' => esc_html__('2 Stars','gardener'), 'value' => '2', ),
                    array( 'name' => esc_html__('3 Stars','gardener'), 'value' => '3', ),
                    array( 'name' => esc_html__('4 Stars','gardener'), 'value' => '4', ),
                    array( 'name' => esc_html__('5 Stars','gardener'), 'value' => '5', ),
                ),
            ),

        )
    );



    $meta_boxes[] = array(
        'id'         => 'projects_metabox',
        'title'      => esc_html__('Projects Options','gardener'),
        'pages'      => array( 'projects' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(




            array(
                'name' => esc_html__('Project Subtitle','gardener'),
                'desc' => esc_html__('Type here the subtitle','gardener'),
                'id'   => $prefix . 'project_subtitle',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Project Company','gardener'),
                'desc' => esc_html__('Type here the company','gardener'),
                'id'   => $prefix . 'project_company',
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Project Date','gardener'),
                'desc' => esc_html__('Type here the date','gardener'),
                'id'   => $prefix . 'project_date',
                'std'  => '',
                'type'    => 'text_date',
            ),

        )
    );

	return $meta_boxes;
}

/**
 * Get image sizes for images
 * 
 * @return array
 */
function ale_get_images_sizes() {
	return array(

        'post' => array(
            array(
                'name'      => 'post-squarelarge',
                'width'     => 700,
                'height'    => 700,
                'crop'      => true,
            ),
            array(
                'name'      => 'post-simplelarge',
                'width'     => 1000,
                'height'    => 700,
                'crop'      => true,
            ),
            array(
                'name'      => 'post-simpletin',
                'width'     => 1000,
                'height'    => 480,
                'crop'      => true,
            ),
            array(
                'name'      => 'post-vertical',
                'width'     => 500,
                'height'    => 660,
                'crop'      => true,
            ),
        ),

        'works' => array(
            array(
                'name'      => 'works-squareextrabig',
                'width'     => 1200,
                'height'    => 1200,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-squarebig',
                'width'     => 900,
                'height'    => 900,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-squarelarge',
                'width'     => 700,
                'height'    => 700,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-squaremedium',
                'width'     => 600,
                'height'    => 600,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-squaresmall',
                'width'     => 400,
                'height'    => 400,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-masonryextrabig',
                'width'     => 1200,
                'height'    => 9999,
                'crop'      => false,
            ),
            array(
                'name'      => 'works-masonrybig',
                'width'     => 1000,
                'height'    => 9999,
                'crop'      => false,
            ),
            array(
                'name'      => 'works-masonrylarge',
                'width'     => 700,
                'height'    => 9999,
                'crop'      => false,
            ),
            array(
                'name'      => 'works-masonrymedium',
                'width'     => 600,
                'height'    => 9999,
                'crop'      => false,
            ),
            array(
                'name'      => 'works-masonrysmall',
                'width'     => 400,
                'height'    => 9999,
                'crop'      => false,
            ),
            array(
                'name'      => 'works-gridextrabig',
                'width'     => 1200,
                'height'    => 900,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-gridbig',
                'width'     => 900,
                'height'    => 700,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-gridlarge',
                'width'     => 700,
                'height'    => 500,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-gridmedium',
                'width'     => 600,
                'height'    => 400,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-gridsmall',
                'width'     => 400,
                'height'    => 280,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-linesmall',
                'width'     => 320,
                'height'    => 280,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-linelarge',
                'width'     => 640,
                'height'    => 280,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-vertical',
                'width'     => 410,
                'height'    => 504,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-photobig',
                'width'     => 512,
                'height'    => 600,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-photosmall',
                'width'     => 512,
                'height'    => 300,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-viajemini',
                'width'     => 512,
                'height'    => 418,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-viajetin',
                'width'     => 512,
                'height'    => 835,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-viajebig',
                'width'     => 1024,
                'height'    => 835,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-viajehor',
                'width'     => 1024,
                'height'    => 418,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-brigitte',
                'width'     => 9999,
                'height'    => 700,
                'crop'      => false,
            ),
        ),
    );
}

/**
 * Add post formats that are used in theme
 * 
 * @return array
 */
function ale_get_post_formats() {
	return array('gallery','link','quote','video','audio');
}

/**
 * Get sidebars list
 * 
 * @return array
 */
function ale_get_sidebars() {
	$sidebars = array();
	return $sidebars;
}

/**
 * Post types where metaboxes should show
 * 
 * @return array
 */
function ale_get_post_types_with_gallery() {
	return array('gallery');
}

/**
 * Add custom fields for media attachments
 * @return array
 */
function ale_media_custom_fields() {
	return array();
}