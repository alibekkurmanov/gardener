<?php
$ale_date_position = ale_get_option('blog_custom_date_position');
$ale_post_line_position = ale_get_option('blog_custom_postline_position');
?>
<article <?php post_class('grid-item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <?php if(get_the_post_thumbnail($post->ID,'large')){ ?>
        <div class="post_image_holder">
            <a href="<?php echo esc_url(the_permalink()); ?>"><?php
                if(ale_get_option('blog_grid_layout') == 'magazine'){
                    echo get_the_post_thumbnail($post->ID,'post-squarelarge');
                } else {
                    echo get_the_post_thumbnail($post->ID,'large');
                }

            ?></a>
            <?php if($ale_date_position == 'onimage'){ ?>
                <div class="date_mask">
                    <span class="day"><?php echo esc_attr(get_the_date('j')); ?></span><br />
                    <span class="month"><?php echo esc_attr(get_the_date('M')); ?></span>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="post_content_holder">
        <?php if($ale_post_line_position == 'beforetitle'){get_template_part('partials/blog/blog_info');} ?>
        <h3 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h3>
        <?php if($ale_date_position == 'beforetitle'){
            echo '<span class="date font_two">'.esc_attr(get_the_date()).'</span>';
        } ?>
        <?php if($ale_post_line_position == 'aftertitle'){get_template_part('partials/blog/blog_info');} ?>
        <?php if(ale_get_option('blog_grid_layout') !== 'magazine'){ ?>
            <p class="post_excerpt">
                <?php
                $ale_custom_excerpt_count = '';
                if(ale_get_option('custom_blog_excerpt_count')){
                    $ale_custom_excerpt_count = ale_get_option('custom_blog_excerpt_count');
                } else {
                    $ale_custom_excerpt_count = 20;
                }
                echo ale_limit_excerpt($ale_custom_excerpt_count);
                ?>
            </p>
            <?php
            //For posts without title show Read More button
            if(get_the_title() == false ){ ?>
                <a class="ale_button" href="<?php echo esc_url(the_permalink()); ?>"><?php esc_html_e('Read More','olins'); ?></a>
            <?php } ?>
        <?php } ?>
        <?php if($ale_post_line_position == 'aftercontent'){get_template_part('partials/blog/blog_info');} ?>
        <?php get_template_part('partials/blog/share') ?>
    </div>
</article>
