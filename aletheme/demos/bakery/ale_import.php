<?php

/**
 * Sidebar Settings
 */

//Remove Widgets from all sidebars
ale_preview_widget::remove_widgets_from_sidebar('main-sidebar');

//Add widgets to Main Sidebar
ale_preview_widget::add_widget_to_sidebar('main-sidebar', 'recent-posts', array ('title' => 'Recent Posts','number'=>'5',));
ale_preview_widget::add_widget_to_sidebar('main-sidebar', 'recent-comments', array ('title' => 'Comments','number'=>'5',));
ale_preview_widget::add_widget_to_sidebar('main-sidebar', 'ale_about_widget', array ('title' => 'About Me','image'=>'','text'=>'Etiam vel turpis ac nibh venenatis pretium eget in risus. Vestibulum diam massa, efficitur sit amet libero in, rutrum rutrum elit. Ut justo dolor, ullamcorper id feugiat in, bibendum at nulla. Donec elementum finibus augue, a lobortis velit dignissim ullamcorper. '));




/**
 * Categories and Custom Taxonomies
 */

//Categories for Posts
$preview_post_cat_1_id = ale_demo_category::add_category(array(
    'category_name' => 'Bakery',
    'parent_id' => 0,
    'description' => '',
));


//Categories for WooCommerce Shop
$preview_shop_cat_1_id = ale_demo_category::add_term(array(
    'term_name' => 'Croissant',
    'taxonomy'=>'product_cat',
    'parent_id' => 0,
    'description' => '',
));
$preview_shop_cat_2_id = ale_demo_category::add_term(array(
    'term_name' => 'Brioche',
    'taxonomy'=>'product_cat',
    'parent_id' => 0,
    'description' => '',
));

/**
 * Posts Settings
 */

// Blog posts
ale_demo_content::add_post(array(
    'title' => "Proin porta, odio at sagittis vehicula",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img1',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Etiam ultricies nisi vel augue',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'before_content',
    'ale_featured_position' => 'in_content',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'right_fourth'
));
ale_demo_content::add_post(array(
    'title' => "Duis metus erat, dictum a metus",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img2',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Etiam ultricies nisi vel augue',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'before_content',
    'ale_featured_position' => 'in_content',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'right_fourth'
));
ale_demo_content::add_post(array(
    'title' => "Fusce mollis imperdiet pretium",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img3',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Etiam ultricies nisi vel augue',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'before_content',
    'ale_featured_position' => 'in_content',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'right_fourth'
));
ale_demo_content::add_post(array(
    'title' => "Curabitur a pulvinar mauris",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img4',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Etiam ultricies nisi vel augue',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'before_content',
    'ale_featured_position' => 'in_content',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'right_fourth'
));
ale_demo_content::add_post(array(
    'title' => "Vivamus tempus nunc nec dolor",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img5',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Etiam ultricies nisi vel augue',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'before_content',
    'ale_featured_position' => 'in_content',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'right_fourth'
));
ale_demo_content::add_post(array(
    'title' => "Maecenas rhoncus dui non feugiat tempor",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img6',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Etiam ultricies nisi vel augue',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'before_content',
    'ale_featured_position' => 'in_content',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'right_fourth'
));
ale_demo_content::add_post(array(
    'title' => "Morbi posuere porta libero",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img7',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Etiam ultricies nisi vel augue',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'before_content',
    'ale_featured_position' => 'in_content',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'right_fourth'
));
ale_demo_content::add_post(array(
    'title' => "Donec imperdiet congue enim sit",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img8',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Etiam ultricies nisi vel augue',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'before_content',
    'ale_featured_position' => 'in_content',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'right_fourth'
));



//WooCommerce Products
ale_demo_content::add_post(array(
    'title' => "Coconut Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop1',
    'post_type' => 'product',
    '_regular_price' => '29',
    '_price' => '29',
    '_sale_price' => '21',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Pink Birthday Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_2_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop2',
    'post_type' => 'product',
    '_regular_price' => '39',
    '_price' => '39',
    '_sale_price' => '',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "New Winter Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop3',
    'post_type' => 'product',
    '_regular_price' => '19',
    '_price' => '19',
    '_sale_price' => '',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Good Bread",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_2_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop4',
    'post_type' => 'product',
    '_regular_price' => '32',
    '_price' => '32',
    '_sale_price' => '',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Tasty Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop5',
    'post_type' => 'product',
    '_regular_price' => '19',
    '_price' => '19',
    '_sale_price' => '14',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Delicious Bread",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_2_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop6',
    'post_type' => 'product',
    '_regular_price' => '9',
    '_price' => '9',
    '_sale_price' => '',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Awesome Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop7',
    'post_type' => 'product',
    '_regular_price' => '49',
    '_price' => '49',
    '_sale_price' => '',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Sweet Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop8',
    'post_type' => 'product',
    '_regular_price' => '39',
    '_price' => '39',
    '_sale_price' => '',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Best Bread",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop9',
    'post_type' => 'product',
    '_regular_price' => '30',
    '_price' => '30',
    '_sale_price' => '',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Nice Summer Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop10',
    'post_type' => 'product',
    '_regular_price' => '40',
    '_price' => '40',
    '_sale_price' => '',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Nice Spring Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop11',
    'post_type' => 'product',
    '_regular_price' => '28',
    '_price' => '28',
    '_sale_price' => '20',
    '_visibility' => 'visible',
));
ale_demo_content::add_post(array(
    'title' => "Season Cake",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/product.dat',
    'post_excerpt' => 'Aliquam enim sem, finibus ut consectetur non, venenatis sed augue. Donec non felis sed enim posuere consectetur. Mauris pellentesque sed lacus vel iaculis. Nunc eu lorem elit. Vestibulum mollis nibh eros, sit amet ornare purus imperdiet a. Mauris ultricies, est et gravida pulvinar, turpis ligula varius risus, non vestibulum enim risus a lacus. Quisque vestibulum ante in elit ornare, ac bibendum lorem pellentesque. Sed imperdiet metus non ex efficitur, eu malesuada nibh suscipit. Proin ornare odio leo, sed facilisis diam fringilla vel. Nulla ac ligula feugiat, bibendum odio at, hendrerit augue. Vestibulum id lorem lectus.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_shop12',
    'post_type' => 'product',
    '_regular_price' => '29',
    '_price' => '29',
    '_sale_price' => '',
    '_visibility' => 'visible',
));


//Form post for MailChimp
$subscribe_post_id = ale_demo_content::add_post(array(
    'title' => "Subscribe Form",
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/mailchimp.dat',
    'post_excerpt' => '',
    'post_type' => 'mc4wp-form',
));

/**
 * Pages
 */

//Blog page
$ale_blog_id = ale_demo_content::add_page(array(
    'title' => 'Blog',
    'template' => 'index.php',
    'postspage'=>true,
));

//Contact page
$ale_contact_id = ale_demo_content::add_page(array(
    'title' => 'Contact',
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/contact.dat',
    'ale_maskonheading' => 'negru_40',
    'featured_image_ale_id' => 'ale_contact_heading',
    'ale_featured_position' => 'in_heading',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'Get in touch with our bakery',
    'ale_post_title_position' => 'onheadingfeatured',
));

//About Us page
$ale_about_id = ale_demo_content::add_page(array(
    'title' => 'About',
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/about.dat',
    'featured_image_ale_id' => 'ale_about_heading',
    'ale_maskonheading' => 'negru_40',
    'ale_featured_position' => 'in_heading',
    'ale_featuredimagecover' => 'on',
    'ale_post_pre_title' => 'The Chef creates divine combinations',
    'ale_post_title_position' => 'onheadingfeatured',
));

//WooCommerce Page
$ale_shop_id = ale_demo_content::add_page(array(
    'title' => 'Shop',
));
$ale_cart_id = ale_demo_content::add_page(array(
    'title' => 'Cart',
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/cart.dat',
));
$ale_checkout_id = ale_demo_content::add_page(array(
    'title' => 'Checkout',
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/checkout.dat',
));
$ale_my_account_id = ale_demo_content::add_page(array(
    'title' => 'My Account',
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/my_account.dat',
));


//Home page
$ale_homepage_id = ale_demo_content::add_page(array(
    'title' => 'Home',
    'homepage' => true,
    'file' => get_template_directory() . '/aletheme/demos/bakery/data/home.dat',
));

/**
 * Navigation Settings
 */
$ale_demo_header_menu = ale_demo_menus::create_menu('Header Menu', 'header_menu');
$ale_demo_mobile_menu = ale_demo_menus::create_menu('Mobile Menu', 'mobile_menu');

//Header Menu
ale_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_homepage_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'About',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_about_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Blog',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_blog_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Shop',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_shop_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_contact_id,
    'parent_id' => ''
));

//Mobile Menu
ale_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_homepage_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'About',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_about_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Blog',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_blog_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Shop',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_shop_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_contact_id,
    'parent_id' => ''
));



//WP Options Settings
ale_demo_options::update_shop_cart($ale_cart_id);
ale_demo_options::update_shop_checkout($ale_checkout_id);
ale_demo_options::update_shop_account($ale_my_account_id);

ale_demo_options::update_tagline('Lovely Bakery');
ale_demo_options::update_posts_per_page(6);

ale_demo_options::mc4wp_default_form_id($subscribe_post_id);