<?php
/*
  * Template name: Homepage Template
* */
get_header(); ?>

<div class="slider_home_container">
    <div class="main_top_slider">
        <ul class="slides">
            <?php $args = array(
                'post_type' => 'post',
                'meta_key'  => 'ale_post_to_slider',
                'meta_value' => 'on',
                'post__not_in' => get_option("sticky_posts"),
                'posts_per_page' => -1 // all post, ignore general settings
            );

            $slides = new WP_Query($args);

            if ($slides->have_posts()) : while ($slides->have_posts()) :
                $slides->the_post();
                $ale_slide_title = get_the_title();
                $ale_main_image = ale_get_meta('main_image');
                $ale_bg_image = ale_get_meta('background_image');
                $ale_subtitle = ale_get_meta('post_sub_title'); ?>

                <li class="slider_item">
                    <?php if($ale_bg_image) { ?><div class="back_slider_img"><img src="<?php echo esc_url($ale_bg_image); ?>" alt=""/></div> <?php } ?>
                    <div class="image_container">
                        <?php if($ale_main_image){
                            echo '<img src="'.esc_url($ale_main_image).'" alt="" />';
                        } ?>
                        <div class="content_slide_data">
                            <div class="slide_data">
                                <h2 class="slide_title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr($ale_slide_title); ?></a></h2>
                                <div class="sub_title_slide cf">
                                    <span class="slide_icon">
                                        <a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                    </span>
                                    <div class="slide_subtitle">
                                        <p><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr($ale_subtitle); ?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile;  endif;
            wp_reset_query(); ?>
        </ul>
    </div>
</div>

<section class="site_container">
    <?php if(ale_get_meta('order_form') == 'enable'){ ?>
        <div class="order_form">
            <div class="wrapper form_heading">
                <?php if(ale_get_meta('order_box_title')){ ?>
                    <div class="title_form">
                        <h2><?php echo esc_attr(ale_get_meta('order_box_title')); ?></h2>
                    </div>
                <?php } ?>
                <div class="form_categories">
                    <ul class="services_categories font_two">
                        <li class="service_category_li_item" data-cat="<?php echo esc_html_e('For Home','gardener'); ?>"><?php echo esc_html_e('For Home','gardener'); ?></li>
                        <li class="service_category_li_item" data-cat="<?php echo esc_html_e('For Event','gardener'); ?>"><?php echo esc_html_e('For Event','gardener'); ?></li>
                        <li class="service_category_li_item" data-cat="<?php echo esc_html_e('Gardener Suply','gardener'); ?>"><?php echo esc_html_e('Gardener Suply','gardener'); ?></li>
                        <li class="service_category_li_item" data-cat="<?php echo esc_html_e('Industrial','gardener'); ?>"><?php echo esc_html_e('Industrial','gardener'); ?></li>
                        <li class="service_category_li_item" data-cat="<?php echo esc_html_e('Other','gardener'); ?>"><?php echo esc_html_e('Other','gardener'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="gardener_order_data wrapper">
            <div class="order_form_container">
                <div class="gardeners_data">
                    <div class="gardner_container">
                        <div class="gardener_slider_arrows cf">
                            <span class="previous_gardener"><i class="fa fa-caret-left" aria-hidden="true"></i></span>
                            <span class="next_gardener"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                        </div>
                        <?php if(ale_get_meta('gardeners_title')){ ?><h4 class="gardener_slider_title"><?php echo esc_attr(ale_get_meta('gardeners_title')); ?></h4><?php } ?>
                        <?php if(ale_get_meta('order_box_gardener_subtitle')){ ?><span class="subtitle"><?php echo esc_attr(ale_get_meta('order_box_gardener_subtitle')) ?></span><?php } ?>

                        <div class="gardener_slider">

                            <?php
                            $args = array(
                                'post_type' => 'gardeners',
                                'posts_per_page' => -1
                            );

                            $gardeners = new WP_Query($args);

                            if ($gardeners->have_posts()) : while ( $gardeners->have_posts()) : $gardeners->the_post();?>
                                <div>
                                    <div class="gardener_top">
                                        <?php if(get_the_post_thumbnail(get_the_ID(),'gardener-thumb')){ ?>
                                            <div class="image">
                                                <?php echo get_the_post_thumbnail(get_the_ID(),'gardener-thumb'); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="name_post">
                                            <span class="gardener_name font_two"><?php the_title(); ?></span>
                                            <?php if(ale_get_meta('gardener_post')){ ?><span class="gardener_post"><?php echo ale_get_meta('gardener_post'); ?></span><?php } ?>
                                        </div>
                                    </div>
                                    <div class="gardener_middle">
                                        <?php if(ale_get_meta('gardener_title')){ ?>
                                            <p class="sub_title font_two">
                                                <?php echo ale_get_meta('gardener_title'); ?>
                                            </p>
                                        <?php } ?>
                                        <div class="gardener_content">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                    <div class="gardener_bottom">
                                        <?php if(ale_get_meta('gardener_fb')){?><a href="<?php echo esc_url(ale_get_meta('gardener_fb')) ?>" class="fb_icon" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a><?php } ?>
                                        <?php if(ale_get_meta('gardener_twi')){?><a href="<?php echo esc_url(ale_get_meta('gardener_twi')) ?>" class="twi_icon" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php } ?>
                                        <?php if(ale_get_meta('gardener_email')){?><a href="mailto:<?php echo esc_url(ale_get_meta('gardener_email')) ?>" class="email_icon" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a><?php } ?>
                                    </div>
                                </div>
                            <?php endwhile; endif; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
                <div class="order_form_data">
                    <div class="order_form_box">
                        <form method="post" action="<?php the_permalink();?>" class="clearfix">
                            <div class="field">
                                <input name="contact[name]" type="text" placeholder="Name" value="<?php echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''?>" required="required" id="contact-form-name" />
                            </div>
                            <div class="field field_extra cf">
                                <input name="contact[phone]" type="text" placeholder="Phone" value="<?php echo isset($_POST['contact']['phone']) ? $_POST['contact']['phone'] : ''?>" required="required" id="contact-form-phone" />
                                <input name="contact[email]" type="email" placeholder="E-mail" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" required="required" id="contact-form-email" />
                            </div>
                            <div class="field">
                                <input name="contact[address]" type="text" placeholder="Address" value="<?php echo isset($_POST['contact']['address']) ? $_POST['contact']['address'] : ''?>" required="required" id="contact-form-address" />
                            </div>
                            <div class="field">
                                <input name="contact[date]" type="date" value="<?php echo isset($_POST['contact']['date']) ? $_POST['contact']['date'] : ''?>" required="required" id="contact-form-date" />
                            </div>
                            <div class="field">
                                <textarea name="contact[message]"  placeholder="Message..." id="contact-form-message" required="required"><?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?></textarea>
                            </div>

                            <input type="submit" class="submit" value="<?php esc_html_e('Order', 'gardener')?>"/>
                            <input type="hidden" class="category_hidden_field" name="contact[category]" value="<?php esc_html_e('Not Selected', 'gardener')?>" />
                            <?php wp_nonce_field() ?>
                        </form>
                    </div>
                </div>
                <div class="projects_data">
                    <div class="projects_container">
                        <?php if(ale_get_meta('l_projects_title')){ ?><h4 class="projects_title"><?php echo esc_attr(ale_get_meta('l_projects_title')); ?></h4><?php } ?>

                        <?php
                        $args = array(
                            'post_type' => 'projects',
                            'posts_per_page' => 3
                        );

                        $projects = new WP_Query($args);

                        if ($projects->have_posts()) : while ( $projects->have_posts()) : $projects->the_post();?>

                            <div class="project_item">
                                <span class="project_date"><?php echo get_the_date(); ?></span>
                                <a href="<?php esc_url(the_permalink()); ?>" class="project_title_link font_two"><?php the_title(); ?></a>
                            </div>

                        <?php endwhile; endif; wp_reset_query(); ?>

                        <?php if(ale_get_meta('l_projects_link_title')){ ?>
                            <div class="all_projects font_two">
                                <a href="<?php echo home_url("/projects"); ?>"><?php echo esc_attr(ale_get_meta('l_projects_link_title')); ?> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(ale_get_meta('services_box') == 'enable'){ ?>
        <div class="services_box cf">
            <div class="service_left">
                <div class="service_image">
                    <?php
                    $args = array(
                        'post_type' => 'services',
                        'posts_per_page' => -1
                    );

                    $services = new WP_Query($args);

                    $i = 0;
                    $ale_display = "display_none";

                    if ($services->have_posts()) : while ( $services->have_posts()) : $services->the_post();
                        if($i == 0){
                            $ale_display = "display";
                        } else {
                            $ale_display = "display_none";
                        }
                        $i++;
                        ?>

                        <div class="image_container  <?php echo esc_attr($ale_display); ?>" data-id="<?php echo get_the_ID(); ?>" style="background-image: url(<?php echo esc_url(the_post_thumbnail_url( 'full' )) ?>);"></div>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </div>
            </div>

            <div class="service_center">
                <div class="services_list cf">
                    <?php
                    $args = array(
                        'post_type' => 'services',
                        'posts_per_page' => -1
                    );

                    $j = 0;
                    $active_button = 'no-active';
                    $services = new WP_Query($args);

                    if ($services->have_posts()) : while ( $services->have_posts()) : $services->the_post();
                        if($j == 0){
                            $active_button = 'active';
                        } else {
                            $active_button = 'no-active';
                        }

                        $j++;?>

                        <div class="service_button <?php echo esc_attr($active_button); ?>" data-id="<?php echo get_the_ID(); ?>">
                            <div class="item_button button_<?php echo esc_attr($j); ?>">
                                <div class="image_holder">
                                    <?php if(ale_get_meta('service_icon')){
                                        echo "<img class='active_image' src=".esc_url(ale_get_meta('service_icon'))." alt='".get_the_title()."' />";
                                    } ?>
                                    <?php if(ale_get_meta('service_icon_hover')){
                                        echo "<img class='hover_image' src=".esc_url(ale_get_meta('service_icon_hover'))." alt='".get_the_title()."' />";
                                    } ?>
                                </div>
                                <div class="title_holder font_two">
                                    <?php the_title(); ?>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; endif; wp_reset_query(); ?>
                </div>
                <div class="service_description">
                    <?php
                    $args = array(
                        'post_type' => 'services',
                        'posts_per_page' => -1
                    );

                    $services = new WP_Query($args);

                    $i = 0;
                    $ale_display = "display_none";

                    if ($services->have_posts()) : while ( $services->have_posts()) : $services->the_post();
                        if($i == 0){
                            $ale_display = "display";
                        } else {
                            $ale_display = "display_none";
                        }
                        $i++;
                        ?>

                        <div class="item_service <?php echo esc_attr($ale_display); ?>" data-id="<?php echo get_the_ID(); ?>">
                            <h4 class="service_title"><?php the_title(); ?></h4>
                            <?php if(ale_get_meta('service_subtitle')){ ?><span class="service_subtitle font_two"><?php echo esc_attr(ale_get_meta('service_subtitle')) ?></span><?php } ?>
                            <div class="service_content">
                                <?php if(ale_get_meta('service_description_image')){ ?>
                                    <div class="image_top">
                                        <img src="<?php echo esc_url(ale_get_meta('service_description_image')); ?>" alt="" />
                                    </div>
                                <?php } ?>
                                <?php the_content(); ?>
                            </div>
                            <div class="separate_service"></div>
                            <div class="service_links">
                                <?php if(ale_get_meta('service_label_one')){ ?><a class="first_link" href="<?php echo esc_url(ale_get_meta('service_link_one')) ?>" target="_blank"><?php echo esc_attr(ale_get_meta('service_label_one')) ?></a><?php } ?>
                                <?php if(ale_get_meta('service_label_two')){ ?><a class="second_link" href="<?php echo esc_url(ale_get_meta('service_link_two')) ?>" target="_blank"><?php echo esc_attr(ale_get_meta('service_label_two')) ?></a><?php } ?>
                                <?php if(ale_get_meta('service_label_three')){ ?><a class="third_link" href="<?php echo esc_url(ale_get_meta('service_link_three')) ?>" target="_blank"><?php echo esc_attr(ale_get_meta('service_label_three')) ?></a><?php } ?>
                            </div>
                        </div>

                    <?php endwhile; endif; wp_reset_query(); ?>
                </div>
            </div>

            <div class="service_right"></div>

        </div>
    <?php } ?>


    <?php if(ale_get_meta('partners_box') == 'enable'){
        $bg_image_link = '';
        if(ale_get_meta('partners_bg')){
            $bg_image_link = ale_get_meta('partners_bg');
        } ?>
        <div class="partners_box" <?php if($bg_image_link){echo 'style="background-image:url('.esc_url($bg_image_link).');"';} ?>>

            <div class="wrapper partners_box_elements">
                <div class="partners_slider_container">
                    <div class="partners_slider">

                        <?php $args = array(
                            'post_type' => 'partners',
                            'posts_per_page' => 5
                        );
                        $partners = new WP_Query($args);
                        $i = 0;

                        if ($partners->have_posts()) : while ( $partners->have_posts()) :
                            $partners->the_post();
                            $i++; ?>
                            <div class="slide_partner_item" data-partner-id="<?php echo esc_attr($i); ?>">
                                <span class="partner_slide_title font_two"><?php the_title(); ?></span>
                                <?php if(ale_get_meta('partner_subtitle')){ ?>
                                    <span class="partner_slide_subtitle"><?php echo ale_get_meta('partner_subtitle'); ?></span>
                                <?php } ?>
                                <div class="hidden_data">
                                    <div class="par_contents">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="par_links">
                                        <?php if(ale_get_meta('partner_site')){?>
                                            <span class="site_field"><?php echo esc_attr(ale_get_meta('partner_site')); ?></span>
                                        <?php } ?>
                                        <?php if(ale_get_meta('partner_link')){?>
                                            <span class="partner_link"><a href="<?php echo esc_url(ale_get_meta('partner_link')); ?>"><?php esc_html_e('See project','gardener'); ?></a></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif;
                        wp_reset_query(); ?>

                    </div>
                </div>
                <div class="partners_descriptions">
                    <div class="slider_navigations">
                        <div class="nums">
                            <span class="current_slide">1</span> /
                            <span class="all_slides"><?php echo esc_attr($partners->post_count); ?></span>
                        </div>
                        <div class="buttons_slide">
                            <span class="top_slide"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            <span class="bottom_slide"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        </div>
                        <?php if(ale_get_meta('partners_title')){ ?>
                            <div class="slider_title_box">
                                <h4><?php echo ale_get_meta('partners_title'); ?></h4>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="partner_contents_data"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if(ale_get_meta('testimonials_box') == 'enable'){?>
        <div class="testimonials_box">
            <div class="wrapper testimonial_box_container">
                <div class="testimonials_slider">
                    <?php $args = array(
                        'post_type' => 'testimonials',
                        'posts_per_page' => -1
                    );
                    $testimonials = new WP_Query($args);

                    if ($testimonials->have_posts()) : while ($testimonials->have_posts()) : $testimonials->the_post(); ?>

                        <div class="testy_slide">
                            <div class="testy_image">
                                <?php echo get_the_post_thumbnail(get_the_ID(),'testimonials-thumb') ?>
                            </div>
                            <div class="test_head">
                                <h5 class="font_two"><?php the_title(); ?></h5>
                                <?php if(ale_get_meta('testy_position')){ ?>
                                    <span class="testy_position"><?php echo esc_attr(ale_get_meta('testy_position')); ?></span>
                                <?php } ?>
                            </div>
                            <div class="testy_rating">
                                <?php $rating_value = ale_get_meta('testy_rating'); ?>
                                <div class="rating_stars">
                                    <i class="fa fa-star <?php if($rating_value >= 1) {echo "active";} ?>" aria-hidden="true"></i>
                                    <i class="fa fa-star <?php if($rating_value >= 2) {echo "active";} ?>" aria-hidden="true"></i>
                                    <i class="fa fa-star <?php if($rating_value >= 3) {echo "active";} ?>" aria-hidden="true"></i>
                                    <i class="fa fa-star <?php if($rating_value >= 4) {echo "active";} ?>" aria-hidden="true"></i>
                                    <i class="fa fa-star <?php if($rating_value >= 5) {echo "active";} ?>" aria-hidden="true"></i>
                                </div>
                            </div>
                            <?php if(ale_get_meta('testy_subtitle')){ ?>
                                <span class="testy_subtitle"><?php echo esc_attr(ale_get_meta('testy_subtitle')); ?></span>
                            <?php } ?>
                            <div class="testy_content font_two">
                                <?php the_content(); ?>
                            </div>
                            <div class="testy_separator">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                        </div>

                    <?php endwhile; endif; wp_reset_query(); ?>
                </div>
                <div class="testy_buttons_slide cf">
                    <span class="previous_testy"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
                    <span class="next_testy"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                </div>
            </div>

            <div class="title_bg font_two"><?php echo esc_html_e('Testimonials','gardener'); ?></div>
        </div>
    <?php } ?>

    <?php if(ale_get_meta('portfolio_box') == 'enable'){?>
        <div class="portfolio_box">
            <div class="portfolio_slider">
                <?php
                $args = array(
                    'post_type' => 'projects',
                    'posts_per_page' => 3
                );

                $portfolio = new WP_Query($args);


                if ($portfolio->have_posts()) : while ($portfolio->have_posts()) : $portfolio->the_post(); ?>

                    <div class="portfolio_item_slide">
                        <figure>
                            <?php echo get_the_post_thumbnail(get_the_ID(),'projects-slide'); ?>
                            <figcaption>
                                <div class="wrapper">
                                    <?php if(ale_get_meta('project_subtitle')){ ?>
                                        <span class="portfolio_subtitle font_two">
                                        <?php echo esc_attr(ale_get_meta('project_subtitle')) ?>
                                    </span>
                                    <?php } ?>
                                    <h5 class="project_title"><?php the_title(); ?></h5>
                                    <div class="portfolio_slide_info font_two">
                                        <?php if(ale_get_meta('project_company')){ ?>
                                            <span class="project_company">
                                        <?php echo esc_html__('Client','gardener')." ".esc_attr(ale_get_meta('project_company')) ?>
                                    </span>
                                        <?php } ?>
                                        <?php if(ale_get_meta('project_date')){ ?>
                                            <span class="project_date">
                                        <?php echo esc_html__('Date','gardener')." ".esc_attr(ale_get_meta('project_date')) ?>
                                    </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>

                <?php endwhile; endif; wp_reset_query(); ?>


            </div>
            <div class="projects_nav">
                <div class="wrapper">
                    <div class="buttons_slide_projects">
                    <span class="left_slide_project">
                        <i class="fa fa-caret-left" aria-hidden="true"></i>
                    </span>
                        <span class="right_slide_project">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </span>
                    </div>
                    <div class="counter">
                    <span class="current_project_slide">
                        0
                    </span> /
                        <span class="all_project_slides">
                        <?php echo esc_attr($portfolio->post_count); ?>
                    </span>
                    </div>
                </div>
            </div>


        </div>
    <?php } ?>
</section>


<?php get_footer(); ?>