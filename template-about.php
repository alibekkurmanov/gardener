<?php
/*
  * Template name: About Template
  * */
get_header(); ?>

<section class="site_container">
    <div class="page_heading">
        <h2 class="page_title"><?php the_title(); ?></h2>
    </div>
    <!-- Content -->
    <div class="story about_template cf">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="about_author">
                <div class="wrapper">

                    <?php if(ale_get_meta('author_photo')){ ?>
                        <div class="image_box">
                            <img src="<?php echo esc_url(ale_get_meta('author_photo')); ?>" alt="<?php echo esc_attr(ale_get_meta('author_name')); ?>" />
                        </div>
                    <?php } ?>

                    <div class="data_box <?php if(ale_get_meta('author_photo')){ echo "have_image"; } ?>">
                        <?php if(ale_get_meta('author_subtitle')){ ?>
                            <h2 class="subtitle">
                                <?php echo esc_attr(ale_get_meta('author_subtitle')); ?>
                            </h2>
                        <?php } ?>
                        <div class="desctiption_container">
                            <?php the_content(); ?>
                        </div>

                        <div class="author_name">
                            <?php if(ale_get_meta('author_name')){ ?>
                                <span class="author font_two"><?php echo esc_attr(ale_get_meta('author_name')); ?></span>
                            <?php } ?>

                            <?php if(ale_get_meta('author_position')){ ?>
                                <span class="author_position"><?php echo esc_attr(ale_get_meta('author_position')); ?></span>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>

            <?php if(ale_get_meta('additional_info') == 'enable'){?>
                <div class="additional_info_box wrapper">
                    <div class="top_info">
                        <div class="left_info">
                            <?php if(ale_get_meta('info_title')){ ?>
                                <h2 class="additional_title">
                                    <?php echo esc_attr(ale_get_meta('info_title')); ?>
                                </h2>
                            <?php } ?>
                        </div>
                        <div class="right_info">
                            <?php if(ale_get_meta('info_photo_one')){ ?>
                                <img src="<?php echo esc_url(ale_get_meta('info_photo_one')); ?>" alt="<?php echo esc_attr(ale_get_meta('author_name')); ?>" />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bottom_info">
                        <div class="left_info">
                            <?php if(ale_get_meta('info_photo_two')){ ?>
                                <img src="<?php echo esc_url(ale_get_meta('info_photo_two')); ?>" alt="<?php echo esc_attr(ale_get_meta('author_two')); ?>" />
                            <?php } ?>
                        </div>
                        <div class="right_info">
                            <?php if(ale_get_meta('info_description')){ ?>
                                <p>
                                    <?php echo esc_attr(ale_get_meta('info_description')); ?>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if(ale_get_meta('skills_info') == 'enable'){?>
                <div class="skills_info_box wrapper">
                    <div class="item_skills">
                        <?php if(ale_get_meta('info_icon_1')){?>
                            <div class="skills_icon">
                                <img src="<?php echo esc_url(ale_get_meta('info_icon_1')) ?>" alt="<?php echo esc_attr(ale_get_meta('skills_title_1')); ?>" />
                            </div>
                        <?php } ?>
                        <?php if(ale_get_meta('skills_title_1')){ ?><h3 class="skills_title"><?php echo esc_attr(ale_get_meta('skills_title_1')); ?></h3><?php } ?>
                        <?php if(ale_get_meta('skills_description_1')){ ?><p class="skills_details"><?php echo esc_attr(ale_get_meta('skills_description_1')); ?></p><?php } ?>
                    </div>
                    <div class="item_skills">
                        <?php if(ale_get_meta('info_icon_2')){?>
                            <div class="skills_icon">
                                <img src="<?php echo esc_url(ale_get_meta('info_icon_2')) ?>" alt="<?php echo esc_attr(ale_get_meta('skills_title_2')); ?>" />
                            </div>
                        <?php } ?>
                        <?php if(ale_get_meta('skills_title_2')){ ?><h3 class="skills_title"><?php echo esc_attr(ale_get_meta('skills_title_2')); ?></h3><?php } ?>
                        <?php if(ale_get_meta('skills_description_2')){ ?><p class="skills_details"><?php echo esc_attr(ale_get_meta('skills_description_2')); ?></p><?php } ?>
                    </div>
                    <div class="item_skills">
                        <?php if(ale_get_meta('info_icon_3')){?>
                            <div class="skills_icon">
                                <img src="<?php echo esc_url(ale_get_meta('info_icon_3')) ?>" alt="<?php echo esc_attr(ale_get_meta('skills_title_3')); ?>" />
                            </div>
                        <?php } ?>
                        <?php if(ale_get_meta('skills_title_3')){ ?><h3 class="skills_title"><?php echo esc_attr(ale_get_meta('skills_title_3')); ?></h3><?php } ?>
                        <?php if(ale_get_meta('skills_description_3')){ ?><p class="skills_details"><?php echo esc_attr(ale_get_meta('skills_description_3')); ?></p><?php } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if(ale_get_meta('video_info') == 'enable'){?>
                <div class="video_info_box">
                    <div class="container_data_video">
                        <div class="video_section">
                            <figure>
                                <?php if(ale_get_meta('video_photo')){ ?><img src="<?php echo esc_url(ale_get_meta('video_photo')); ?>" alt="" /><?php } ?>
                                <figcaption>
                                    <?php if(ale_get_meta('video_link')){ ?>
                                        <a class="venobox_video_link" target="_blank" href="<?php echo esc_url(ale_get_meta('video_link')); ?>">
                                            <span class="icon_player"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                        </a>
                                    <?php } ?>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="partner_title_section">
                            <?php if(ale_get_meta('video_title')){?>
                                <h3 class="partners_title"><?php echo ale_wp_kses(ale_get_meta('video_title')) ?></h3>
                            <?php } ?>
                            <p class="partners_box_descr">
                                <?php echo esc_attr(ale_get_meta('video_description')) ?>
                            </p>
                        </div>
                    </div>


                    <div class="partners_list">

                        <?php $args = array(
                            'post_type' => 'partners',
                            'posts_per_page' => 5
                        );

                        $partners = new WP_Query($args);

                        if ($partners->have_posts()) : while ($partners->have_posts()) : $partners->the_post(); ?>
                            <span class="partner_item font_two">
                                <?php if(ale_get_meta('partner_link')){ ?>
                                    <a href="<?php echo esc_url(ale_get_meta('partner_link')); ?>"><?php the_title(); ?></a>
                                <?php } else {
                                    the_title();
                                } ?>
                            </span>
                        <?php endwhile; endif; wp_reset_query(); ?>

                    </div>
                </div>
            <?php } ?>

        <?php endwhile; else: ?>
            <?php get_template_part('partials/notfound')?>
        <?php endif; ?>

        <?php if (comments_open()) : ?>
            <?php comments_template(); ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>