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

    <div class="main_navigation font_two <?php if(is_page_template('template-homepage.php')) { echo 'front_page'; } ?>">
        <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
            <nav class="navigation header_nav wrapper">
                <?php wp_nav_menu(array(
                    'theme_location'=> 'header_menu',
                    'menu'			=> 'Header Menu',
                    'menu_class'	=> 'menu menu-header ',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                )); ?>
            </nav>
        <?php } ?>
    </div>

    <?php if(!is_page_template('template-homepage.php')) { ?>
        <section class="breadcrumbs_section">
            <div class="breadcrumbs_line">
                <div class="left_line_bread"></div>
                <?php echo ale_get_breadcrumbs(); ?>
                <div class="right_line_bread"></div>
            </div>
        </section>
    <?php } ?>
</header>



