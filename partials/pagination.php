<?php

$ale_pagination_style = ale_get_option('default_blog_pagination');

if(ale_show_posts_nav()){

    if($ale_pagination_style == 'simple'){ ?>
        <div class="pagination simple_pagination cf">
            <span class="prev_page">
                 <?php if(get_previous_posts_link()) { echo get_previous_posts_link('<i class="fa fa-angle-double-left" aria-hidden="true"></i> '.esc_html__('Go to previous page','olins')); }
                 else { echo "<i class=\"fa fa-angle-double-left\" aria-hidden=\"true\"></i> ". esc_html__("Go to previous page","olins"); } ?>
            </span>
            <span class="next_page">
                <?php if(get_next_posts_link()){echo  get_next_posts_link(esc_html__('Go to next page','olins'). ' <i class="fa fa-angle-double-right" aria-hidden="true"></i>');}
                else { echo esc_html__("Go to next page","olins"). " <i class=\"fa fa-angle-double-right\" aria-hidden=\"true\"></i>"; } ?>
            </span>
        </div>
    <?php }
    else if($ale_pagination_style == 'infinite'){
        // The Ajax Code is placed in aletheme/function/infinite-load.php
    }
    else if($ale_pagination_style == 'loadmore'){
        // The Ajax Code is placed in aletheme/function/load-more.php
    }
    else { ?>
        <div class="pagination default_pagination cf">
            <?php ale_page_links(); ?>
        </div>
    <?php } ?>
<?php } ?>