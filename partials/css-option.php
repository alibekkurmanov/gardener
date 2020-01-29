<?php


//Wrapper Object based on Theme Options Values
$wrapper_width = ale_get_option('wrapper_width');

//Background Object based on Theme Options Values
$ale_background = ale_get_option('background');


$ale_font_one = ale_get_option('font_one');
$ale_font_two = ale_get_option('font_two');
$ale_font_three = ale_get_option('font_three');
$ale_font_four = ale_get_option('font_four');
$ale_font_five = ale_get_option('font_five');

$ale_font_one_ex = ale_get_option('font_one_ex');
$ale_font_two_ex = ale_get_option('font_two_ex');
$ale_font_three_ex = ale_get_option('font_three_ex');
$ale_font_four_ex = ale_get_option('font_four_ex');
$ale_font_five_ex = ale_get_option('font_five_ex');

$ale_font = ale_get_option('bodystyle');
$ale_h1 = ale_get_option('h1sty');
$ale_h2 = ale_get_option('h2sty');
$ale_h3 = ale_get_option('h3sty');
$ale_h4 = ale_get_option('h4sty');
$ale_h5 = ale_get_option('h5sty');
$ale_h6 = ale_get_option('h6sty');

//Fonts for Menu levels
$menu_first_level = ale_get_option('menu_first_level');
$menu_second_level = ale_get_option('menu_second_level');
$menu_third_level = ale_get_option('menu_third_level');

//Custom Blog Styles
$ale_custom_blog_title = ale_get_option('custom_blog_title');
$ale_custom_blog_desc = ale_get_option('custom_blog_desc');
$ale_custom_blog_infoline = ale_get_option('custom_blog_infoline');

//Custom Single Blog Post Styles
$ale_custom_single_blog_title = ale_get_option('custom_single_blog_title');
$ale_custom_single_blog_infoline = ale_get_option('custom_single_blog_infoline');

$ale_custom_blog_infolinefamily = '';
?>

<style type='text/css'>
    body {
        <?php
        if($ale_font['size']){ echo "font-size:".$ale_font['size'].";"; }
        if($ale_font['style']){ echo "font-style:".$ale_font['style'].";"; }
        if($ale_font['color']){ echo "color:".$ale_font['color'].";"; }
        if($ale_font['face']){ $fontfamily =  str_replace ('+',' ',$ale_font['face']); echo "font-family:".$fontfamily.";"; }
        if($ale_font['transform']){ echo "text-transform:".$ale_font['transform'].";"; }
        if($ale_font['weight']){ echo "font-weight:".$ale_font['weight'].";"; }
        if($ale_font['lineheight']) { echo "line-height:".$ale_font['lineheight'].";"; }

        //Dynamic Background Settings from Theme Options.
        if($ale_background['color']){ echo "background-color:".$ale_background['color'].";"; }
        if($ale_background['image']){ echo "background-image: url(".$ale_background['image'].");"; }
        if($ale_background['repeat']){ echo "background-repeat:".$ale_background['repeat'].";"; }
        if($ale_background['position']){ echo "background-position:".$ale_background['position'].";"; }
        if($ale_background['attachment']){ echo "background-attachment:".$ale_background['attachment'].";"; }
        if($ale_background['background-size']){ echo "background-size:".$ale_background['background-size'].";"; }
        ?>
    }
    .wrapper {
        <?php
         if($wrapper_width !== 'custom' and $wrapper_width !== '100'){
            echo "max-width:".esc_attr($wrapper_width)."px;";
         } elseif($wrapper_width == 'custom') {
            echo "max-width:".esc_attr(ale_get_option('custom_wrapper')).";";
         } elseif($wrapper_width == '100'){
            echo "max-width:100%;";
         }
         ?>
    }
    .content_wrapper,.wedding_full_post p {
        <?php if(ale_get_option('inner_wrapper')!=''){
            echo "max-width:".esc_attr(ale_get_option('inner_wrapper')).";";
        } else {
            if($wrapper_width !== 'custom' and $wrapper_width !== '100'){
                echo "max-width:".esc_attr($wrapper_width)."px;";
             } elseif($wrapper_width == 'custom') {
                echo "max-width:".esc_attr(ale_get_option('custom_wrapper')).";";
             } elseif($wrapper_width == '100'){
                echo "max-width:100%;";
             }
        } ?>
    }
    h1 {
        <?php
        if($ale_h1['size']){ echo "font-size:".$ale_h1['size'].";"; };
        if($ale_h1['style']){ echo "font-style:".$ale_h1['style'].";"; };
        if($ale_h1['color']){ echo "color:".$ale_h1['color'].";"; };
        if($ale_h1['face']){ $h1family =  str_replace ('+',' ',$ale_h1['face']); echo "font-family:".$h1family.";"; };
        if($ale_h1['transform']){ echo "text-transform:".$ale_h1['transform'].";"; }
        if($ale_h1['weight']){ echo "font-weight:".$ale_h1['weight'].";"; }
        if($ale_h1['lineheight']) { echo "line-height:".$ale_h1['lineheight'].";"; }
        ?>
    }
    h2 {
        <?php
        if($ale_h2['size']){ echo "font-size:".$ale_h2['size'].";"; };
        if($ale_h2['style']){ echo "font-style:".$ale_h2['style'].";"; };
        if($ale_h2['color']){ echo "color:".$ale_h2['color'].";"; };
        if($ale_h2['face']){ $h2family =  str_replace ('+',' ',$ale_h2['face']); echo "font-family:".$h2family.";"; };
        if($ale_h2['transform']){ echo "text-transform:".$ale_h2['transform'].";"; }
        if($ale_h2['weight']){ echo "font-weight:".$ale_h2['weight'].";"; }
        if($ale_h2['lineheight']) { echo "line-height:".$ale_h2['lineheight'].";"; }
        ?>
    }
    h3 {
        <?php
        if($ale_h3['size']){ echo "font-size:".$ale_h3['size'].";"; };
        if($ale_h3['style']){ echo "font-style:".$ale_h3['style'].";"; };
        if($ale_h3['color']){ echo "color:".$ale_h3['color'].";"; };
        if($ale_h3['face']){ $h3family =  str_replace ('+',' ',$ale_h3['face']); echo "font-family:".$h3family.";"; };
        if($ale_h3['transform']){ echo "text-transform:".$ale_h3['transform'].";"; }
        if($ale_h3['weight']){ echo "font-weight:".$ale_h3['weight'].";"; }
        if($ale_h3['lineheight']) { echo "line-height:".$ale_h3['lineheight'].";"; }
        ?>
    }
    h4 {
        <?php
        if($ale_h4['size']){ echo "font-size:".$ale_h4['size'].";"; };
        if($ale_h4['style']){ echo "font-style:".$ale_h4['style'].";"; };
        if($ale_h4['color']){ echo "color:".$ale_h4['color'].";"; };
        if($ale_h4['face']){ $h4family =  str_replace ('+',' ',$ale_h4['face']); echo "font-family:".$h4family.";"; };
        if($ale_h4['transform']){ echo "text-transform:".$ale_h4['transform'].";"; }
        if($ale_h4['weight']){ echo "font-weight:".$ale_h4['weight'].";"; }
        if($ale_h4['lineheight']) { echo "line-height:".$ale_h4['lineheight'].";"; }
        ?>
    }
    h5 {
        <?php
        if($ale_h5['size']){ echo "font-size:".$ale_h5['size'].";"; };
        if($ale_h5['style']){ echo "font-style:".$ale_h5['style'].";"; };
        if($ale_h5['color']){ echo "color:".$ale_h5['color'].";"; };
        if($ale_h5['face']){ $h5family =  str_replace ('+',' ',$ale_h5['face']); echo "font-family:".$h5family.";"; };
        if($ale_h5['transform']){ echo "text-transform:".$ale_h5['transform'].";"; }
        if($ale_h5['weight']){ echo "font-weight:".$ale_h5['weight'].";"; }
        if($ale_h5['lineheight']) { echo "line-height:".$ale_h5['lineheight'].";"; }
        ?>
    }
    h6 {
        <?php
        if($ale_h6['size']){ echo "font-size:".$ale_h6['size'].";"; };
        if($ale_h6['style']){ echo "font-style:".$ale_h6['style'].";"; };
        if($ale_h6['color']){ echo "color:".$ale_h6['color'].";"; };
        if($ale_h6['face']){ $h6family =  str_replace ('+',' ',$ale_h6['face']); echo "font-family:".$h6family.";"; };
        if($ale_h6['transform']){ echo "text-transform:".$ale_h6['transform'].";"; }
        if($ale_h6['weight']){ echo "font-weight:".$ale_h6['weight'].";"; }
        if($ale_h6['lineheight']) { echo "line-height:".$ale_h6['lineheight'].";"; }
        ?>
    }

    <?php
    /*
     * Show CSS Styles for Header and Navigation if the user selected
     * ==============================================================
     */

    if(ale_get_option('header_custom_styles')=='yes'){ ?>
        header.ale_header {
            <?php if(ale_get_option('header_styles')){
                $ale_header_settings = ale_get_option('header_styles');

                if($ale_header_settings['color']){echo "background-color:".$ale_header_settings['color']."!important;";}
                if($ale_header_settings['text-color']){echo "color:".$ale_header_settings['text-color']."!important;";}
                if($ale_header_settings['image']){echo "background-image:url(".$ale_header_settings['image'].")!important;";}
                if($ale_header_settings['width']){echo "width:".$ale_header_settings['width']."px!important;";}
                if($ale_header_settings['height']){echo "height:".$ale_header_settings['height']."px!important;";}
                if($ale_header_settings['text-align']){echo "text-align:".$ale_header_settings['text-align']."!important;";}
            } ?>
        }
        nav.navigation .menu li {
            <?php
            if($menu_first_level['size']){ echo "font-size:".$menu_first_level['size']."!important;"; };
            if($menu_first_level['style']){ echo "font-style:".$menu_first_level['style']."!important;"; };
            if($menu_first_level['color']){ echo "color:".$menu_first_level['color']."!important;"; };
            if($menu_first_level['face']){ $menu_first_levelfamily =  str_replace ('+',' ',$menu_first_level['face']); echo "font-family:".$menu_first_levelfamily."!important;"; };
            if($menu_first_level['transform']){ echo "text-transform:".$menu_first_level['transform']."!important;"; }
            if($menu_first_level['weight']){ echo "font-weight:".$menu_first_level['weight']."!important;"; }
            if($menu_first_level['lineheight']) { echo "line-height:".$menu_first_level['lineheight']."!important;"; }
            ?>
        }
        nav.navigation .menu li li {
            <?php
            if($menu_second_level['size']){ echo "font-size:".$menu_second_level['size']."!important;"; };
            if($menu_second_level['style']){ echo "font-style:".$menu_second_level['style']."!important;"; };
            if($menu_second_level['color']){ echo "color:".$menu_second_level['color']."!important;"; };
            if($menu_second_level['face']){ $menu_second_levelfamily =  str_replace ('+',' ',$menu_second_level['face']); echo "font-family:".$menu_second_levelfamily."!important;"; };
            if($menu_second_level['transform']){ echo "text-transform:".$menu_second_level['transform']."!important;"; }
            if($menu_second_level['weight']){ echo "font-weight:".$menu_second_level['weight']."!important;"; }
            if($menu_second_level['lineheight']) { echo "line-height:".$menu_second_level['lineheight']."!important;"; }
            ?>
        }
        nav.navigation .menu li li li {
            <?php
            if($menu_third_level['size']){ echo "font-size:".$menu_third_level['size']."!important;"; };
            if($menu_third_level['style']){ echo "font-style:".$menu_third_level['style']."!important;"; };
            if($menu_third_level['color']){ echo "color:".$menu_third_level['color']."!important;"; };
            if($menu_third_level['face']){ $menu_third_levelfamily =  str_replace ('+',' ',$menu_third_level['face']); echo "font-family:".$menu_third_levelfamily."!important;"; };
            if($menu_third_level['transform']){ echo "text-transform:".$menu_third_level['transform']."!important;"; }
            if($menu_third_level['weight']){ echo "font-weight:".$menu_third_level['weight']."!important;"; }
            if($menu_third_level['lineheight']) { echo "line-height:".$menu_third_level['lineheight']."!important;"; }
            ?>
        }

    <?php }

    /*
     * Show CSS Styles for Blog Archives pages if the user selected
     * ============================================================
     */

    if(ale_get_option('blog_custom_styles')=='yes'){ ?>
        .ale_blog_archive .type-post h3.post_title,.ale_blog_archive .post h3.post_title {
            <?php
            if($ale_custom_blog_title['size']){ echo "font-size:".$ale_custom_blog_title['size']."!important;"; };
            if($ale_custom_blog_title['style']){ echo "font-style:".$ale_custom_blog_title['style']."!important;"; };
            if($ale_custom_blog_title['color']){ echo "color:".$ale_custom_blog_title['color']."!important;"; };
            if($ale_custom_blog_title['face']){ $ale_custom_blog_titlefamily =  str_replace ('+',' ',$ale_custom_blog_title['face']); echo "font-family:".$ale_custom_blog_titlefamily."!important;"; };
            if($ale_custom_blog_title['transform']){ echo "text-transform:".$ale_custom_blog_title['transform']."!important;"; }
            if($ale_custom_blog_title['weight']){ echo "font-weight:".$ale_custom_blog_title['weight']."!important;"; }
            if($ale_custom_blog_title['lineheight']) { echo "line-height:".$ale_custom_blog_title['lineheight']."!important;"; }

            if(ale_get_option('custom_blog_title_margin')){
                echo "margin:".ale_get_option('custom_blog_title_margin')."!important;";
            }
            ?>
        }
        .ale_blog_archive .type-post .post_excerpt,.ale_blog_archive .post .post_excerpt {
            <?php
            if($ale_custom_blog_desc['size']){ echo "font-size:".$ale_custom_blog_desc['size']."!important;"; };
            if($ale_custom_blog_desc['style']){ echo "font-style:".$ale_custom_blog_desc['style']."!important;"; };
            if($ale_custom_blog_desc['color']){ echo "color:".$ale_custom_blog_desc['color']."!important;"; };
            if($ale_custom_blog_desc['face']){ $ale_custom_blog_descfamily =  str_replace ('+',' ',$ale_custom_blog_desc['face']); echo "font-family:".$ale_custom_blog_descfamily."!important;"; };
            if($ale_custom_blog_desc['transform']){ echo "text-transform:".$ale_custom_blog_desc['transform']."!important;"; }
            if($ale_custom_blog_desc['weight']){ echo "font-weight:".$ale_custom_blog_desc['weight']."!important;"; }
            if($ale_custom_blog_desc['lineheight']) { echo "line-height:".$ale_custom_blog_desc['lineheight']."!important;"; }

            if(ale_get_option('custom_blog_desc_margin')){
                echo "margin:".ale_get_option('custom_blog_desc_margin')."!important;";
            }
            ?>
        }
        .ale_blog_archive .type-post .post_category,.ale_blog_archive .post .post_category {
            <?php
                if($ale_custom_blog_infoline['size']){ echo "font-size:".$ale_custom_blog_infoline['size']."!important;"; };
                if($ale_custom_blog_infoline['style']){ echo "font-style:".$ale_custom_blog_infoline['style']."!important;"; };
                if($ale_custom_blog_infoline['color']){ echo "color:".$ale_custom_blog_infoline['color']."!important;"; };
                if($ale_custom_blog_infoline['face']){ $ale_custom_blog_infolinefamily =  str_replace ('+',' ',$ale_custom_blog_infoline['face']); echo "font-family:".$ale_custom_blog_infolinefamily."!important;"; };
                if($ale_custom_blog_infoline['transform']){ echo "text-transform:".$ale_custom_blog_infoline['transform']."!important;"; }
                if($ale_custom_blog_infoline['weight']){ echo "font-weight:".$ale_custom_blog_infoline['weight']."!important;"; }
                if($ale_custom_blog_infoline['lineheight']) { echo "line-height:".$ale_custom_blog_infoline['lineheight']."!important;"; }

                if(ale_get_option('custom_blog_info_margin')){
                    echo "margin:".ale_get_option('custom_blog_info_margin')."!important;";
                }
            ?>
        }
        .ale_blog_archive .type-post .share_icons,.ale_blog_archive .post .share_icons {
            <?php if(ale_get_option('custom_blog_share_color')){
                echo 'color:'.ale_get_option('custom_blog_share_color').'!important;';
            }
            if(ale_get_option('custom_blog_share_size')){
                echo 'font-size:'.ale_get_option('custom_blog_share_size').'!important;';
            }
            ?>
        }
        .pagination.default_pagination a,section.ale_blog_archive .load-more {
            <?php if(ale_get_option('pag_button_color')){
                echo "background-color:".ale_get_option('pag_button_color')."!important;";
            }
            if(ale_get_option('pag_button_color_font')){
                echo "color:".ale_get_option('pag_button_color_font')."!important;";
            }
            ?>
        }
        .pagination.default_pagination a:hover,section.ale_blog_archive .load-more:hover {
            <?php if(ale_get_option('pag_button_hover')){
                    echo "background-color:".ale_get_option('pag_button_hover')."!important;";
            }
            if(ale_get_option('pag_button_hover_font')){
                    echo "color:".ale_get_option('pag_button_hover_font')."!important;";
            }
            if(ale_get_option('pag_button_border_hover')){
                echo "border-color:".ale_get_option('pag_button_border_hover')."!important;";
            }
            ?>
        }
        .pagination.default_pagination span {
            <?php if(ale_get_option('pag_button_hover')){
                echo "background-color:".ale_get_option('pag_button_hover')."!important;";
            }
            if(ale_get_option('pag_button_hover_font')){
                    echo "color:".ale_get_option('pag_button_hover_font')."!important;";
            }?>
        }
        .pagination.default_pagination span,.pagination.default_pagination a,section.ale_blog_archive .load-more {
            <?php if(ale_get_option('pag_button_border')){
                    echo "border-color:".ale_get_option('pag_button_border')."!important;";
            }?>
        }
    <?php }

     if(ale_get_option('single_blog_custom_styles')=='yes'){ ?>

        h2.post_title {
            <?php
            if($ale_custom_single_blog_title['size']){ echo "font-size:".$ale_custom_single_blog_title['size']."!important;"; };
            if($ale_custom_single_blog_title['style']){ echo "font-style:".$ale_custom_single_blog_title['style']."!important;"; };
            if($ale_custom_single_blog_title['color']){ echo "color:".$ale_custom_single_blog_title['color']."!important;"; };
            if($ale_custom_single_blog_title['face']){ $ale_custom_single_blog_titlefamily =  str_replace ('+',' ',$ale_custom_single_blog_title['face']); echo "font-family:".$ale_custom_single_blog_titlefamily."!important;"; };
            if($ale_custom_single_blog_title['transform']){ echo "text-transform:".$ale_custom_single_blog_title['transform']."!important;"; }
            if($ale_custom_single_blog_title['weight']){ echo "font-weight:".$ale_custom_single_blog_title['weight']."!important;"; }
            if($ale_custom_single_blog_title['lineheight']) { echo "line-height:".$ale_custom_single_blog_title['lineheight']."!important;"; }

            if(ale_get_option('custom_single_blog_title_margin')){
                echo "margin:".ale_get_option('custom_single_blog_title_margin')."!important;";
            }
            ?>
        }
        p.pre_title {
            <?php
                if($ale_custom_single_blog_infoline['size']){ echo "font-size:".$ale_custom_single_blog_infoline['size']."!important;"; };
                if($ale_custom_single_blog_infoline['style']){ echo "font-style:".$ale_custom_single_blog_infoline['style']."!important;"; };
                if($ale_custom_single_blog_infoline['color']){ echo "color:".$ale_custom_single_blog_infoline['color']."!important;"; };
                if($ale_custom_single_blog_infoline['face']){ $ale_custom_single_blog_infolinefamily =  str_replace ('+',' ',$ale_custom_single_blog_infoline['face']); echo "font-family:".$ale_custom_blog_infolinefamily."!important;"; };
                if($ale_custom_single_blog_infoline['transform']){ echo "text-transform:".$ale_custom_single_blog_infoline['transform']."!important;"; }
                if($ale_custom_single_blog_infoline['weight']){ echo "font-weight:".$ale_custom_single_blog_infoline['weight']."!important;"; }
                if($ale_custom_single_blog_infoline['lineheight']) { echo "line-height:".$ale_custom_single_blog_infoline['lineheight']."!important;"; }

                if(ale_get_option('custom_single_blog_info_margin')){
                    echo "margin:".ale_get_option('custom_single_blog_info_margin')."!important;";
                }
            ?>
        }

        <?php if(ale_get_option('default_blog_text_align')){
            echo '.ale_blog_archive .furniture-grid article.furniture-item .item_data_holder .data_holder .post_title, .furniture-item .post_category,.ale_blog_archive .furniture-grid article.furniture-item .item_data_holder .data_holder .post_excerpt { text-align: '.ale_get_option('default_blog_text_align').'!important; padding:0!important; }';
            //echo 'span.post_info_line::before {width:100%!important;left:0!important;margin-left:0!important;}';
        } ?>

        <?php if(ale_get_option('default_single_blog_text_align')){
            echo 'h2.post_title,p.pre_title,span.post_info_line { text-align: '.ale_get_option('default_single_blog_text_align').'!important; padding:0!important; }';
            echo 'span.post_info_line::before {width:100%!important;left:0!important;margin-left:0!important;}';
        } ?>
     <?php } ?>

    <?php

     /*
     * CSS Styles for Work Archive
     * ===========================
     */

     if(ale_get_option('work_padding')!== '0') {
        $work_item_gutter = esc_attr(intval(ale_get_option('work_padding')));
        $work_item_gutter = $work_item_gutter/2;
        echo ".work_item_gutter { margin: ".$work_item_gutter."px;}";
     }

     /* Left Based Heading */
     if(ale_get_option('page_heading_style') == 'wedding_heading'){
        echo '.ale_container > .content_wrapper.flex_container {width:50%; float:right;box-sizing: border-box;padding-left:7%; min-height:calc(100vh - 280px);}';
     }
     ?>




    <?php if($ale_font_one){?>
        .font_one
        {
            <?php if($ale_font_one){ $font_one =  str_replace ('+',' ',$ale_font_one); echo "font-family:".$font_one.";"; }; ?>
        }
    <?php } ?>

    <?php if($ale_font_two){?>
        .font_two,blockquote, .font_two button
        {
            <?php if($ale_font_two){ $font_two =  str_replace ('+',' ',$ale_font_two); echo "font-family:".$font_two.";"; }; ?>
        }
    <?php } ?>

    <?php if($ale_font_three){?>
        .font_three
        {
            <?php if($ale_font_three){ $font_three =  str_replace ('+',' ',$ale_font_three); echo "font-family:".$font_three.";"; }; ?>
        }
    <?php } ?>


    <?php if($ale_font_four){?>
        .font_four
        {
            <?php if($ale_font_four){ $font_four =  str_replace ('+',' ',$ale_font_four); echo "font-family:".$font_four.";"; }; ?>
        }
    <?php } ?>

    <?php if($ale_font_five){?>
        .font_five
        {
            <?php if($ale_font_five){ $font_five =  str_replace ('+',' ',$ale_font_five); echo "font-family:".$font_five.";"; }; ?>
        }
    <?php }

    if(ale_get_option('customcsscode')){ echo esc_attr(ale_get_option('customcsscode'));} ?>

</style>