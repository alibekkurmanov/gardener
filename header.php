<?php if(isset($_POST['contact'])) { $error = ale_send_contact($_POST['contact']); }?>
<!doctype html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header_top">
    <div class="main-line">
        <div class="wrapper top_line">
            <div class="top_item phone_box">
                <?php if(ale_get_option('header_phone_label')){
                    echo '<span class="label_for_phone font_one">'.esc_attr(ale_get_option('header_phone_label')).'</span>';
                } ?>
                <?php if(ale_get_option('header_phone')){
                    echo '<span class="phone_number font_two">'.esc_attr(ale_get_option('header_phone')).'</span>';
                } ?>
            </div>
            <div class="top_item logo_box">
                <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                    <?php if(ale_get_option('sitelogo')){?>
                        <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" alt="logo" title="<?php esc_attr(bloginfo('title')); ?>" />
                    <?php } else { ?>
                        <h1><?php esc_attr(bloginfo('title')); ?></h1>
                    <?php } ?>
                </a>
            </div>
            <div class="top_item search_box">
                <form class="search" role="search" method="get" id="header_search_form" action="<?php echo site_url()?>" >
                    <fieldset class="form_container">
                        <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                        <input type="submit" id="searchsubmit" value="&#xf002;" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?php if(is_page_template('template-homepage.php')){ ?>
        <div class="slider_home_container">
            <div class="main_top_slider">
                <ul class="slides">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'meta_key'  => 'ale_post_to_slider',
                        'meta_value' => 'on',
                        'post__not_in' => get_option("sticky_posts"),
                        'posts_per_page' => -1
                    );

                    $slides = new WP_Query($args);

                    if ($slides->have_posts()) : while ($slides->have_posts()) : $slides->the_post();

                        $ale_slide_title = get_the_title();
                        $ale_main_image = ale_get_meta('main_image');
                        $ale_bg_image = ale_get_meta('background_image');
                        $ale_subtitle = ale_get_meta('post_sub_title')

                        ?>

                        <li class="slider_item" <?php if($ale_bg_image) {echo 'style="background:url('.esc_url($ale_bg_image).') no-repeat center center;"';} ?>>
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

                    <?php endwhile;  endif; wp_reset_query(); ?>


                </ul>
            </div>
            <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
                <div class="slider_menu_navigation font_two">
                    <nav class="navigation header_nav wrapper">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'=> 'header_menu',
                            'menu'			=> 'Header Menu',
                            'menu_class'	=> 'menu menu-header ',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        )); ?>
                    </nav>
                </div>

                <?php
            } ?>
        </div>
    <?php } else { ?>
        <div class="main_navigation font_two">
            <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
                <nav class="navigation header_nav wrapper">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'=> 'header_menu',
                        'menu'			=> 'Header Menu',
                        'menu_class'	=> 'menu menu-header ',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    )); ?>
                </nav>
                <?php
            } ?>
        </div>
        <section class="breadcrumbs_section">
            <div class="breadcrumbs_line">
                <div class="left_line_bread"></div>
                <?php echo ale_get_breadcrumbs(); ?>
                <div class="right_line_bread"></div>
            </div>
        </section>
    <?php } ?>
</header>



