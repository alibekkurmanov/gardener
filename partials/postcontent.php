<div class="story wrapper cf">

    <div class="post_title_section">
        <div class="post_info">
            <?php if(get_the_category()){ ?>
                <div class="post_category font_two">
                    <?php the_category(' '); ?>
                </div>
            <?php } ?>
            <?php if (comments_open() || get_comments_number()){ ?>
            <div class="post_comments_count">
                <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php comments_number(); ?>
            </div>
            <?php } ?>
            <div class="post_date">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_date(); ?>
            </div>
        </div>
        <h3 class="post_title"><?php the_title(); ?></h3>

        <?php if(ale_get_meta('post_sub_title')){ ?>
            <span class="sub_title">
                <?php echo esc_attr(ale_get_meta('post_sub_title')); ?>
            </span>
        <?php } ?>
    </div>
    <div class="post_content_section <?php if(is_page_template('template-pagesidebar.php')){ echo "page_with_sidebar"; } ?> cf">

        <div class="content_container">
            <?php the_content(); ?>

            <?php if(get_the_tags()){ ?>
                <p class="tagsphar"><?php the_tags( esc_html__('Tagged to: ','gardener'), ' ', '<br />' );  ?></p>
            <?php } ?>

            <?php wp_link_pages(array(
                'before' => '<p class="post_pages">' . esc_html__('Pages:', 'gardener'),
                'after'	 => '</p>',
            )) ?>
        </div>

        <?php if(is_page_template('template-pagesidebar.php')){
            echo get_sidebar();
        } ?>
    </div>

</div>
