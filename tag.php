<?php get_header(); ?>
<?php get_template_part('partials/page_heading');

//Sidebar position based on theme options
$ale_sidebar_position = ale_get_option('blog_sidebar_position');
$sidebar_class = '';

if($ale_sidebar_position){
    $sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
}
?>

    <div class="content_wrapper blog_posts flex_container <?php  echo esc_attr($sidebar_class); ?> cf">

        <?php if($ale_sidebar_position  !== 'no'){
            get_sidebar();
        } ?>
        <!-- Content -->
        <div class="story ale_blog_archive content cf">
            <?php
            //Columns Settings
            $ale_blog_columns = ale_get_option('default_blog_columns');
            $ale_columns_class = '';
            if($ale_blog_columns){
                $ale_columns_class = 'ale_blog_columns_'.$ale_blog_columns;
            }
            //Text Align Settings
            $ale_blog_text_align = ale_get_option('default_blog_text_align');
            $ale_text_align_class = '';
            if($ale_blog_text_align){
                $ale_text_align_class = 'ale_blog_text_align_'.$ale_blog_text_align;
            }
            ?>
            <div class="grid <?php echo esc_attr($ale_columns_class)." ".esc_attr($ale_text_align_class); ?>">
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/postpreview' );?>
                <?php endwhile; else: ?>
                    <?php get_template_part('partials/notfound')?>
                <?php endif; ?>
            </div>
            <?php get_template_part('partials/pagination'); ?>
        </div>

    </div>
<?php get_footer(); ?>