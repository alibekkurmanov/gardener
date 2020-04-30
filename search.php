<?php get_header(); ?>

    <section class="site_container">
        <div class="page_heading">
            <h2 class="page_title">
                <?php echo esc_html__('Search','gardener')." - ".get_search_query(); ?>
            </h2>
        </div>
        <div class="blog_cats">
            <div class="wrapper">
                <ul class="categories font_two">
                    <li class="current_item"><?php echo esc_html_e('All','gardener'); ?></li>
                    <?php
                    $categories = get_categories( array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ) );

                    foreach( $categories as $category ) {
                        $category_link = sprintf(
                            '<li><a href="%1$s" alt="%2$s">%3$s</a></li>',
                            esc_url( get_category_link( $category->term_id ) ),
                            esc_attr( $category->name),
                            esc_html( $category->name )
                        );
                        echo ale_wp_kses($category_link);
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Content -->
        <div class="story posts_list cf">
            <div class="wrapper cf">
                <div class="grid">
                    <div class="grid-sizer"></div>
                    <div class="gutter-sizer"></div>
                    <?php

                    if (have_posts()) : while (have_posts()) : the_post();  ?>

                        <article <?php post_class('grid-item blog-item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                            <?php if(get_the_post_thumbnail($post->ID,'post-blogimg')){?>
                                <div class="post_thumbnail">
                                    <?php echo get_the_post_thumbnail($post->ID,'post-blogimg'); ?>
                                </div>
                            <?php  } ?>
                            <div class="post_data">
                            <span class="post_category font_two">
                                <?php the_category(' '); ?>
                            </span>
                                <h2 class="post_title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <?php if(ale_get_meta('post_sub_title')) {?>
                                    <span class="post_subtitle">
                                        <?php echo esc_attr(ale_get_meta('post_sub_title')); ?>
                                    </span>
                                <?php } ?>
                                <div class="post_info">
                                    <span class="read_more_button font_two"><a href="<?php the_permalink(); ?>"><span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> <?php esc_html_e('Read More','gardener'); ?></a></span>
                                    <span class="comments_count">
                                        <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php comments_number(); ?>
                                    </span>
                                    <span class="date">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date(); ?>
                                    </span>
                                </div>
                            </div>
                        </article>

                    <?php endwhile; else: ?>
                        <?php get_template_part('partials/notfound')?>
                    <?php endif; ?>
                </div>
            </div>

            <?php get_template_part('partials/pagination'); ?>
        </div>
    </section>
<?php get_footer(); ?>