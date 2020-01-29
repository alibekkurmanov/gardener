<div class="story cf">

    <?php if(ale_get_meta('featured_position') == 'in_content' or ale_get_meta('featured_position') == ''){
        echo '<div class="single_featured_image">'.get_the_post_thumbnail($post->ID,'large').'</div>';
    } ?>

    <?php if(ale_get_meta('post_title_position') == 'afterheading' or ale_get_meta('post_title_position') == "" or ale_get_meta('post_title_position') == 'afterheadingwithdefaults' or ale_get_meta('post_title_position') == 'fullwidthwedding'){ ?>
        <h2 class="post_title"><?php esc_attr(the_title()); ?></h2>
        <?php if(ale_get_meta('post_pre_title')){ ?>
            <p class="pre_title"><?php echo esc_attr(ale_get_meta('post_pre_title')); ?></p>
        <?php } ?>
    <?php } ?>

    <?php if(ale_get_meta('post_info_line') == 'before_content'){
        echo '<span class="post_info_line">';
        get_template_part('partials/blog/single_info');
        echo '</span>';
    } ?>

    <?php $images = get_post_meta($post->ID, 'ale_gallery_id', true);
    if ( $images ) {
        if(has_post_format('gallery',$post->ID) or is_singular('works')){
            if(ale_get_meta('gallery_slider') == 'top_full' or ale_get_meta('gallery_slider') == 'brigitte_slider'){
                //The Slider is included in single-works.php file outside the wrapper.
            } else if(ale_get_meta('gallery_slider') == 'thumbs_grid'){

                get_template_part('partials/work/work_thumbs_grid');

            } else if(ale_get_meta('gallery_slider') == 'creative_grid'){

                get_template_part('partials/work/creative_grid');

            } else {

                get_template_part('partials/work/work_slider' );

            }
        }
    } ?>

    <?php if(ale_get_meta('post_title_position') == 'afterfeaturedimage'){ ?>
        <h2 class="post_title"><?php esc_attr(the_title()); ?></h2>
        <?php if(ale_get_meta('post_pre_title')){ ?>
            <p class="pre_title"><?php echo esc_attr(ale_get_meta('post_pre_title')); ?></p>
        <?php } ?>
    <?php } ?>
    <?php if(ale_get_meta('post_info_line') == 'right_column'){ ?>
        <div class="cf">
            <div class="content_with_right_info">
                <?php the_content(); ?>
            </div>
            <div class="right_info_aside">
                <?php get_template_part('partials/blog/right_column'); ?>
            </div>
        </div>
    <?php }  else {
        the_content();
    }?>

    <?php if(get_the_tags()){ ?>
        <p class="tagsphar"><?php the_tags( esc_html__('Tagged to: ','olins'), ' ', '<br />' );  ?></p>
    <?php } ?>

    <?php wp_link_pages(array(
        'before' => '<p class="post_pages">' . esc_html__('Pages:', 'olins'),
        'after'	 => '</p>',
    )) ?>

    <?php if(ale_get_meta('post_info_line') == 'after_content'){
        echo '<span class="post_info_line_after">';
        get_template_part('partials/blog/single_info');
        echo '</span>';
    } ?>

    <?php if(ale_get_option('blog_share_icons') == 'show'){?>
        <div class="single_post_share">
            <span class="label"><?php echo esc_html_e('Share this post, choose your Platform!','olins') ?></span>
            <span class="icons_container">
                <?php get_template_part('partials/blog/share'); ?>
            </span>
        </div>
    <?php } ?>

    <?php if(ale_get_meta('post_info_line') == 'grid_line'){
        get_template_part('partials/blog/grid_line');
    } ?>

    <?php if(ale_get_meta('author_info')=='enable'){
        get_template_part('partials/blog/author_info');
    } ?>

    <?php if(ale_get_meta('related_posts')=='enable'){
        get_template_part('partials/blog/related_posts');
    } ?>

</div>
