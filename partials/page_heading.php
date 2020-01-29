<?php
//Page Title Box based on Selected Design Variant
$ale_page_heading = ale_get_option('page_heading_style');

if($ale_page_heading){
    switch ($ale_page_heading){
        case 'parallax_one' :
            get_template_part('partials/page_head/parallax_one');
            break;
        case 'parallax_two' :
            get_template_part('partials/page_head/parallax_two');
            break;
        case 'simple_image' :
            get_template_part('partials/page_head/simple_image');
            break;
        case 'center_text' :
            get_template_part('partials/page_head/center_title');
            break;
        case 'left_text' :
        case 'left_text_breadcrumbs' :
            get_template_part('partials/page_head/left_title');
            break;
        case 'breadcrumbs' :
            get_template_part('partials/page_head/breadcrumbs');
            break;
        case 'wedding_heading' :
            get_template_part('partials/page_head/wedding_heading');
            break;
        case 'parallax_three' :
            get_template_part('partials/page_head/parallax_three');
            break;
    }
}
