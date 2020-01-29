<?php
/*
 * Aspect Color
 * */

function olins_customize_register( $wp_customize ) {

    $wp_customize->add_setting('olins_aspect_color', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback'	=> 'esc_attr',
    )

    );

    $wp_customize->add_section('olins_custom_colors', array(
        'title' => esc_html__('Custom Colors', 'olins'),
        'priority' => 30,
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'olins_aspect_color_control', array(
        'label' => esc_html__('Aspect Color', 'olins'),
        'section' => 'olins_custom_colors',
        'settings' => 'olins_aspect_color',
    ) ) );

}

add_action('customize_register', 'olins_customize_register');



// Output Customize CSS
function olins_customize_css() { ?>

    <?php if(get_theme_mod('olins_aspect_color')){ ?>

    <style type="text/css">

        <?php
        // Customizer Styles for Travel Photography Variant

        if(ale_get_option('design_variant')=='travelphoto'){ ?>
            .ale_header_travelphoto .navigation_container nav.header_nav ul.menu-left-header li.current-menu-item,
            .ale_header_travelphoto .navigation_container nav.header_nav ul.menu-left-header li.current-menu-item::before,
            .ale_header_travelphoto .navigation_container nav.header_nav ul.menu-left-header li:hover {
                color: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            input[type="submit"] {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }
        <?php }

        // Customizer Styles for Zoo Variant

        if(ale_get_option('design_variant')=='zoo'){ ?>
            .ale_header_zoo .header_nav ul.menu-header li.current-menu-item a,
            .ale_header_zoo .header_nav ul.menu-header li a:hover,
            .footer_zoo .ale_insta_subscribe .button_border a,
            .extra_heading_line1,
            .works_page .ale_work_archive .works_items_container .title_with_icon .work_title {
                color: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .footer_zoo .footer_first_line .footer_form input[type="submit"] {
                background-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .flexslider .flex-control-nav li a.flex-active, .single_post_images_slider .flex-control-nav li a.flex-active {
                background-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
                border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

        <?php }

        // Customizer Styles for Bakery Variant

        if(ale_get_option('design_variant')=='bakery'){?>
            .ale_header_bakery .header_flex_box .header_flex_child.navigation_container nav.header_nav ul.menu li.current-menu-item a,
            .ale_header_bakery .header_flex_box .header_flex_child.navigation_container nav.header_nav ul.menu a:hover,
            .ale_header_bakery .header_flex_box .header_flex_child.social_profiles_container a:hover,
            .footer_bakery .top_footer .footer_social a:hover,
            .olins_pretty_team_container .olins_pretty_team ul.slides li .member_data .member_position,
            .share_icons a, input[type="submit"] {
                color: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            p.pre_title, .products .vintage-item .woo_category, .products .vintage-item:hover .bottom_shop_item .button,
            .products .vintage-item .bottom_shop_item .price, .woocommerce .vintage-item-style #respond input#submit,
            .woocommerce .vintage-item-style a.button, .woocommerce .vintage-item-style button.button,
            .woocommerce .vintage-item-style input.button, .woocommerce .vintage-item-style .quantity .qty,
            .vintage-item-style #add_payment_method table.cart td.actions .coupon .input-text,
            .woocommerce-cart.vintage-item-style table.cart td.actions .coupon .input-text,
            .woocommerce-checkout.vintage-item-style table.cart td.actions .coupon .input-text,
            .woocommerce .vintage-item-style div.product .woocommerce-tabs ul.tabs li.active a,
            .vintage-item-style .woocommerce .quantity .qty,
            .vintage-item-style .woocommerce input.button,
            .woocommerce-cart.vintage-item-style .wc-proceed-to-checkout a.checkout-button {
                color: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            }

            .olins_simple_team_container .olins_simple_team ul.slides li .team_member_item .name .member_name::before,
            .olins_simple_team_container .olins_simple_team ul.slides li .team_member_item .name .member_name::after,
            .olins_simple_team_container .olins_simple_team ul.slides li .team_member_item .name .member_name,
            .olins_simple_team_container .olins_simple_team ul.slides li .team_member_item .position .member_position,
            .olins_simple_team_container .olins_simple_team ul.slides li .team_member_item .position .member_position::before,
            .olins_simple_team_container .olins_simple_team ul.slides li .team_member_item .position .member_position::after,
            .flexslider .flex-control-nav li a, .single_post_images_slider .flex-control-nav li a,
            .footer_bakery .top_footer .subscribe_form .subscribe_form_title::after,
            .footer_bakery .top_footer .subscribe_form p input[type="submit"],
            .post_category, .post_category::before, .post_category::after,
            aside.sidebar .widget::after, aside.sidebar .widget,.post_info_line_after, .post_info_line, .single_post_share,
            .post_info_line_after::before, .post_info_line::before, .single_post_share::before,
            .post_info_line_after::after, .post_info_line::after, .single_post_share::after,
            textarea,input[type="submit"]:hover, input[type="submit"],
            .products .vintage-item .shop_separator, .products .vintage-item:hover .bottom_shop_item .button,
            .products .vintage-item .bottom_shop_item .price, .woocommerce .vintage-item-style #respond input#submit,
            .woocommerce .vintage-item-style a.button, .woocommerce .vintage-item-style button.button,
            .woocommerce .vintage-item-style input.button, .woocommerce .vintage-item-style .quantity .qty,
            .vintage-item-style #add_payment_method table.cart td.actions .coupon .input-text,
            .woocommerce-cart.vintage-item-style table.cart td.actions .coupon .input-text,
            .woocommerce-checkout.vintage-item-style table.cart td.actions .coupon .input-text,
            .woocommerce .vintage-item-style div.product .woocommerce-tabs ul.tabs,
            .woocommerce .vintage-item-style div.product .woocommerce-tabs ul.tabs:before,
            .vintage-item-style .woocommerce .quantity .qty, .vintage-item-style .woocommerce input.button,
            .woocommerce-cart.vintage-item-style .wc-proceed-to-checkout a.checkout-button, input[type="text"], input[type="email"],
            input[type="password"], input[type="tel"]  {
                border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            }

            .flexslider .flex-control-nav li a.flex-active, .single_post_images_slider .flex-control-nav li a.flex-active,
            .footer_bakery .top_footer .subscribe_form p input[type="submit"]:hover,
            .footer_bakery .top_footer .subscribe_form p input[type="text"],
            .footer_bakery .top_footer .subscribe_form p input[type="email"],
            .comments .comments_name .comments_separator,
            input[type="submit"]:hover {
                background-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .products .vintage-item .bottom_shop_item a.button.add_to_cart_button:hover, .woocommerce-cart.vintage-item-style .wc-proceed-to-checkout a.checkout-button:hover, .vintage-item-style .woocommerce input.button:hover, .woocommerce .vintage-item-style #respond input#submit:hover, .woocommerce .vintage-item-style a.button:hover, .woocommerce .vintage-item-style button.button:hover, .woocommerce .vintage-item-style input.button:hover{
                background-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            }

        <?php }

        // Customizer Styles for Photography Variant

        if(ale_get_option('design_variant')=='photography'){ ?>
            .olins_tax_links ul li a:hover,.mask_opacity .mask_data .inner_container .plus_button a:hover {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }
            ul.works_category_list li a:hover:after {
                background:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }
        <?php }

        // Customizer Styles for Camping Variant

        if(ale_get_option('design_variant')=='camping'){ ?>

            .olins_service_block:hover .data_holder .title,.olins_pricing_element .data_holder .price_holder,
            .nav_container .menu-header li a:hover, .nav_container .menu-header li.current-menu-item a {
                color: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }
            input[type="submit"] {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }
        <?php }

        // Customizer Styles for Viaje Variant

        if(ale_get_option('design_variant')=='viaje'){?>

            #header_search_form #searchsubmit,
            .olins_video_box .video_holder .video_data_mask a.venobox,
            .ale_main_container .ale_container .breadcrumbs_heading a {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .ale_header_viaje .desktop_header .navigation_container .bottom_nav_line ul.menu-header li a::after,
            .olins_works_masonry_grid.simple_design .grid_item_work .gallery_post .data_mask .bottom_text .separator,
            .viaje_block_title,.olins_works_masonry_grid.viaje_design .grid_item_work .gallery_post .data_mask .bottom_text .separator {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .olins_tabs .tabs ul li.active,.olins_tabs .tabs ul li.active:hover {
                border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

        <?php }

        // Customizer Styles for Luxury Shoes Variant

        if(ale_get_option('design_variant')=='luxuryshoes'){?>

            .ale_header_luxuryshoes .social_links a:hover,
            .luxuryshoes_drop_menu ul.menu-header li a:hover,
            .luxuryshoes_drop_menu ul.menu-header li.current-menu-item,
            .olins_hover_text .item_hover_text .data_holder .text_two {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .products .minimal-item .onsale, .minimal-item-style span.onsale,
            .accordion-item-active .accordion-header {
                background-color: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            }

            input[type="submit"] {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .products .minimal-item,
            .woocommerce .minimal-item-style .related .products, .woocommerce .minimal-item-style .up-sells .products,
            .woocommerce .minimal-item-style .related h2::before, .woocommerce .minimal-item-style .up-sells h2::before,
            .ale_main_container .ale_container .simple_image_heading .page_title_container .white_page_title h2::before,
            .ale_main_container .ale_container .simple_image_heading .page_title_container .white_page_title h2::after,
            .ale_blog_archive article.post .post_content_holder .post_title::before, .ale_blog_archive .grid-item .post_content_holder .post_title::before {
                border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            }

            .products .minimal-item .price .amount, .woocommerce .minimal-item-style div.product .amount,
            .ale_blog_archive .type-post .post_category, .ale_blog_archive .post .post_category {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            }

        <?php }

        // Customizer Styles for Creative Variant

        if(ale_get_option('design_variant')=='creative'){?>

            header.ale_header_creative .header_flex_box .navigation_container ul li.current-menu-item,
            header.ale_header_creative .header_flex_box .navigation_container ul li a:hover,
            .story blockquote::before,input[type="submit"]:hover,
            header.ale_header_creative .header_flex_box .search_container .search_open_button:hover {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .olins_creative_text::after,.olins_creative_text::before,
            .olins_hover_team .image_holder .hover_mask .text_two::before,
            .olins_hover_team .image_holder .hover_mask .text_two::after,
            footer.footer_furniture .footer_social a:hover,
            .ale_main_container .ale_container .page_title_container .page_title span::before,
            .ale_main_container .ale_container .page_title_container .page_title span::after,
            .olins_pricing_table .data_holder .one_button .ale_button,
            input[type="submit"],header.ale_header_creative .header_flex_box .cart_container .ale_shop_cart .cart_link:hover  {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .flexslider .flex-control-nav li a.flex-active, .single_post_images_slider .flex-control-nav li a.flex-active {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
                border-color: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .footer_instagram_feed .ale_insta_subscribe .button_border,
            .olins_pricing_table:hover {
                border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

        <?php }

        // Customizer Styles for Magazine Variant

        if(ale_get_option('design_variant')=='magazine'){ ?>

            .olins_featured_post .image_holder .post_data .post_link .ale_button:hover,
            aside.sidebar .sidebar_container .widget_categories ul li,
            .footer_instagram_feed .ale_insta_subscribe .button_border a,
            footer.footer_furniture .footer_social a:hover {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            header.ale_header_zoo .desktop_header .header_nav .menu-header li a::after,
            .ale_blog_archive article.post .post_content_holder .date::after,
            .ale_blog_archive .grid-item .post_content_holder .date::after,
            aside.sidebar .sidebar_container .widget h5.widget_title::after,
            nav.footer_nav .menu-footer li a::after,
            .ale_main_container .ale_container .centered_title h2::after {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .olins_featured_post .image_holder .post_data .post_link .ale_button,
            input[type="submit"]:hover,
            .footer_instagram_feed .ale_insta_subscribe .button_border {
                border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .ale_blog_archive .type-post .post_category, .ale_blog_archive .post .post_category {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            }

        <?php }

        // Customizer Styles for Corporate Variant

        if(ale_get_option('design_variant')=='corporate'){ ?>

            .ale_header_brigitte .search_container .search_open_button:hover,
            .ale_header_brigitte .search_container .pop_search_form_container .close_the_form:hover,
            .ale_header_brigitte .search_container .pop_search_form_container #searchsubmit:hover,
            .olins_corporate_team .social_link a {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .ale_header_brigitte .header_flex_box nav.header_nav ul.menu-header li a::after {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .olins_corporate_team .post {
                border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

        <?php }

        // Customizer Styles for CV Variant

        if(ale_get_option('design_variant')=='cv'){ ?>

            .ale_header_travelphoto .navigation_container nav.header_nav ul.menu-left-header li a.mPS2id-highlight-last,
            .ale_header_travelphoto .navigation_container nav.header_nav ul.menu-left-header li:hover {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .olins_progress_bar .bar .progress {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            }

            input[type="submit"] {
                background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

        <?php }

        // Customizer Styles for Brigitte Variant

        if(ale_get_option('design_variant')=='brigitte'){ ?>

            .ale_header_brigitte .header_flex_box nav.header_nav ul.menu-header li.current-menu-item:first-letter,
            .ale_header_brigitte .header_flex_box nav.header_nav ul.menu-header li:hover:first-letter,
            .ale_header_brigitte .search_container .search_open_button:hover,
            .footer_brigitte .footer_inner .backtotop:hover i.fa,
            .story blockquote p, .story blockquote::before,
            .olins_works_slider_container .works_slider_data_container .white_block .photos-count .previous_works_slide:hover, .olins_works_slider_container .works_slider_data_container .white_block .photos-count .next_works_slide:hover,
            .brigitte_slider .brigitte-slider-container .slick-prev:hover,
            .brigitte_slider .brigitte-slider-container .slick-next:hover {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            .olins_works_slider_container .works_slider_data_container .white_block .photos-count .previous_works_slide:hover, .olins_works_slider_container .works_slider_data_container .white_block .photos-count .next_works_slide:hover,
            .brigitte_slider .brigitte-slider-container .slick-prev:hover,
            .brigitte_slider .brigitte-slider-container .slick-next:hover {
                border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

            input[type="submit"]:hover {
                background:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

        <?php }

        // Customizer Styles for Stephanie Variant

        if(ale_get_option('design_variant')=='stephanie'){?>

            .ale_header_blackwhite .desktop_header nav.navigation ul li.current-menu-item a,
            .ale_header_blackwhite .desktop_header nav.navigation ul li a:hover,
            .footer_furniture .content_wrapper .footer_social a:hover,
            .story blockquote::before,
            .olins_stephanie_slider_container .slick-next,
            .olins_stephanie_slider_container .slick-prev {
                color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
            }

        .ale_header_blackwhite .desktop_header nav.navigation ul li .sub-menu,
        .footer_instagram_feed .ale_instagram_feed li,input[type="submit"]:hover,
        .olins_stephanie_slider_container .slick-prev:hover,
        .olins_stephanie_slider_container .slick-next:hover {
            background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
        }

        .ale_header_blackwhite .desktop_header nav.navigation ul li .sub-menu::before,
        input[type="submit"]:hover {
            border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
        }
        .vc_btn3-container.stephanie_button a:hover,
        .ale_button:hover,
        .olins_recent_post_line .post_read_more a:hover {
            background: <?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
            border-color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>!important;
        }

        <?php }

        // Customizer Styles for Pixel Variant

        if(ale_get_option('design_variant')=='pixel'){ ?>

        .ale_header_photography .header_flex_box .header_flex_child.navigation_container:hover,
        .overlay .overlay-close:hover,
        .nav_container .menu-header li:hover,
        .nav_container .menu-header li.current-menu-item,
        footer.footer_furniture .content_wrapper .footer_social a:hover {
            color:<?php echo esc_attr(get_theme_mod('olins_aspect_color')); ?>;
        }

        <?php } ?>

    </style>

    <?php } ?>

<?php }

add_action('wp_head', 'olins_customize_css');