<?php get_header(); ?>
<?php if(!is_front_page()){ get_template_part('partials/page_heading'); }

//Sidebar position based on theme options
$ale_sidebar_position = ale_get_option('blog_sidebar_position');
if(ale_get_meta('sidebar_position') !== ''){
    $ale_sidebar_position = ale_get_meta('sidebar_position');
}
$sidebar_class = '';

if($ale_sidebar_position){
    $sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
}
?>

    <div class="content_wrapper flex_container <?php  echo esc_attr($sidebar_class); ?> cf">
        <?php if($ale_sidebar_position  !== 'no'){
            get_sidebar();
        } ?>
        <div class="story ale_blog_archive page-template content cf">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if(!is_front_page()){ ?>
                    <?php if(ale_get_meta('post_title_position') == 'afterheading' or ale_get_meta('post_title_position') == 'afterheadingwithdefaults' or ale_get_meta('post_title_position') == 'fullwidthwedding'){ ?>
                        <h2 class="post_title"><?php esc_attr(the_title()); ?></h2>
                        <?php if(ale_get_meta('post_pre_title')){ ?>
                            <p class="pre_title"><?php echo esc_attr(ale_get_meta('post_pre_title')); ?></p>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>

                <?php if(ale_get_meta('featured_position') == 'in_content'){
                    echo '<div class="single_featured_image">'.get_the_post_thumbnail($post->ID,'large').'</div>';
                } ?>

                <?php the_content(); ?>

            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; ?>

        <?php if (comments_open()) : ?>
            <?php comments_template(); ?>
        <?php endif; ?>
            </div>
    </div>
<?php get_footer(); ?>