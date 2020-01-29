<?php
/**
 * Enqueue Theme Styles
 */
function ale_enqueue_styles() {

	//Pre loader Lib
	wp_register_style( 'aletheme-preloader', ALETHEME_THEME_URL . '/css/libs/preloader.css', array(), ALETHEME_THEME_VERSION, 'all');

	//Add general css files
	wp_register_style( 'aletheme-general-css', ALETHEME_THEME_URL . '/css/general.min.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-olins-shortcodes-css', ALETHEME_THEME_URL . '/css/olins_shortcodes.min.css', array(), ALETHEME_THEME_VERSION, 'all');

	//Register libs
	wp_register_style( 'font-awesome', ALETHEME_THEME_URL . '/css/font-awesome.min.css', array(), ALETHEME_THEME_VERSION, 'all');

	//Register variants Custom Styles
	//wp_register_style( 'aletheme_ikea_css', ALETHEME_THEME_URL . '/css/variants/ikea.css', array('aletheme_general_css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-blackwhite-css', ALETHEME_THEME_URL . '/css/variants/blackwhite.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-zoo-css', ALETHEME_THEME_URL . '/css/variants/zoo.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-bakery-css', ALETHEME_THEME_URL . '/css/variants/bakery.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-photography-css', ALETHEME_THEME_URL . '/css/variants/photography.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-luxuryshoes-css', ALETHEME_THEME_URL . '/css/variants/luxuryshoes.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-camping-css', ALETHEME_THEME_URL . '/css/variants/camping.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-travelphoto-css', ALETHEME_THEME_URL . '/css/variants/travelphoto.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-viaje-css', ALETHEME_THEME_URL . '/css/variants/viaje.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-wedding-css', ALETHEME_THEME_URL . '/css/variants/wedding.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-furniture-css', ALETHEME_THEME_URL . '/css/variants/furniture.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-magazine-css', ALETHEME_THEME_URL . '/css/variants/magazine.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-creative-css', ALETHEME_THEME_URL . '/css/variants/creative.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-brigitte-css', ALETHEME_THEME_URL . '/css/variants/brigitte.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-corporate-css', ALETHEME_THEME_URL . '/css/variants/corporate.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-cv-css', ALETHEME_THEME_URL . '/css/variants/cv.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-fashion-css', ALETHEME_THEME_URL . '/css/variants/fashion.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-pastel-css', ALETHEME_THEME_URL . '/css/variants/pastel.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-stephanie-css', ALETHEME_THEME_URL . '/css/variants/stephanie.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-cameron-css', ALETHEME_THEME_URL . '/css/variants/cameron.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-pixel-css', ALETHEME_THEME_URL . '/css/variants/pixel.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-jade-css', ALETHEME_THEME_URL . '/css/variants/jade.min.css', array('aletheme-general-css'), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-animate', ALETHEME_THEME_URL . '/css/libs/animate.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-multiscroll', ALETHEME_THEME_URL . '/css/libs/jquery.multiscroll.min.css', array(), ALETHEME_THEME_VERSION, 'all');


	//Load Preloader if it is enabled in Options
	if(ale_get_option('preloder') == 'enable') {
		wp_enqueue_style('aletheme-preloader');
	}

	//Load general css
	wp_enqueue_style('aletheme-general-css');
	wp_enqueue_style('aletheme-olins-shortcodes-css');

	//Load font awesome
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('aletheme-animate');

	//Load Selected Variant Style
	$variant_name = ale_get_option('design_variant');

	if($variant_name){
		switch($variant_name){
			case 'zoo' :
				wp_enqueue_style('aletheme-zoo-css');
				break;
			case 'blackwhite' :
				wp_enqueue_style('aletheme-blackwhite-css');
				break;
			case 'bakery' :
				wp_enqueue_style('aletheme-bakery-css');
				break;
			case 'photography' :
				wp_enqueue_style('aletheme-photography-css');
				break;
			case 'luxuryshoes' :
				wp_enqueue_style('aletheme-luxuryshoes-css');
				break;
			case 'camping' :
				wp_enqueue_style('aletheme-camping-css');
				break;
			case 'travelphoto' :
				wp_enqueue_style('aletheme-travelphoto-css');
				break;
			case 'viaje' :
				wp_enqueue_style('aletheme-viaje-css');
				break;
			case 'wedding' :
				wp_enqueue_style('aletheme-wedding-css');
				break;
			case 'furniture' :
				wp_enqueue_style('aletheme-furniture-css');
				break;
			case 'magazine' :
				wp_enqueue_style('aletheme-magazine-css');
				break;
			case 'creative' :
				wp_enqueue_style('aletheme-creative-css');
				break;
			case 'brigitte' :
				wp_enqueue_style('aletheme-brigitte-css');
				break;
			case 'corporate' :
				wp_enqueue_style('aletheme-corporate-css');
				break;
			case 'cv' :
				wp_enqueue_style('aletheme-cv-css');
				break;
			case 'fashion' :
				wp_enqueue_style('aletheme-fashion-css');
				break;
			case 'pastel' :
				wp_enqueue_style('aletheme-pastel-css');
				break;
            case 'stephanie' :
				wp_enqueue_style('aletheme-stephanie-css');
				break;
            case 'cameron' :
				wp_enqueue_style('aletheme-cameron-css');
				break;
            case 'pixel' :
				wp_enqueue_style('aletheme-pixel-css');
				break;
            case 'jade' :
				wp_enqueue_style('aletheme-jade-css');
				break;
		}
	}

}
add_action( 'wp_enqueue_scripts', 'ale_enqueue_styles' );



/**
 * Enqueue Theme Scripts
 */
function ale_enqueue_scripts() {

	// add html5 for old browsers.
	wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), ALETHEME_THEME_VERSION, false );

    //Libs Register
    //wp_register_script( 'masonry', ALETHEME_THEME_URL . '/js/libs/jquery.masonry.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-slider', ALETHEME_THEME_URL . '/js/libs/jquery.flexslider-min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'hoverdir', ALETHEME_THEME_URL . '/js/libs/jquery.hoverdir.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-modernizr-hoverdir', ALETHEME_THEME_URL . '/js/libs/modernizr.hoverdir.js', array( 'jquery' ), ALETHEME_THEME_VERSION, false );
    wp_register_script( 'ale-modernizr-overlay-nav', ALETHEME_THEME_URL . '/js/libs/modernizr.overlay_nav.js', array( 'jquery' ), ALETHEME_THEME_VERSION, false );
    wp_register_script( 'ale-appear', ALETHEME_THEME_URL . '/js/libs/jquery.appear.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-counter', ALETHEME_THEME_URL . '/js/libs/jquery.counter.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'classie', ALETHEME_THEME_URL . '/js/libs/classie.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-overlay-nav', ALETHEME_THEME_URL . '/js/libs/overlay_nav.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-overlay-nav-move', ALETHEME_THEME_URL . '/js/libs/overlay_nav_move.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-overlay-nav-center', ALETHEME_THEME_URL . '/js/libs/overlay_nav_center.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-woo-accordion', ALETHEME_THEME_URL . '/js/libs/woocommerce.accordion.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'lightbox', ALETHEME_THEME_URL . '/js/libs/lightbox.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'venobox', ALETHEME_THEME_URL . '/js/libs/venobox.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'tabslet', ALETHEME_THEME_URL . '/js/libs/jquery.tabslet.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'slick', ALETHEME_THEME_URL . '/js/libs/slick.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    //wp_register_script( 'imagesloaded', ALETHEME_THEME_URL . '/js/libs/imagesloaded.pkgd.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'easings', ALETHEME_THEME_URL . '/js/libs/jquery.easings.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-multiscroll', ALETHEME_THEME_URL . '/js/libs/jquery.multiscroll.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );

	//Custom JS Code
	wp_register_script( 'ale-scripts', ALETHEME_THEME_URL . '/js/scripts.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );


	wp_enqueue_script( 'jquery-form' );
	wp_enqueue_script( 'html5-shim' );
	wp_script_add_data( 'html5-shim', 'conditional', 'lt IE 9' );

	//Load Libs
	wp_enqueue_script( 'ale-slider' );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'ale-appear' );


	//Load Scripts based on selected Design Variant
	$variant_name = ale_get_option('design_variant');

	if($variant_name){
		switch($variant_name){
			case 'camping' :
			case 'pixel' :
				wp_enqueue_script( 'ale-modernizr-overlay-nav' );
				wp_enqueue_script( 'classie' );
				wp_enqueue_script( 'ale-overlay-nav-move' );
				wp_enqueue_script( 'ale-appear' );
				break;
			case 'photography' :
				wp_enqueue_script( 'ale-modernizr-overlay-nav' );
				wp_enqueue_script( 'classie' );
				wp_enqueue_script( 'ale-overlay-nav' );
				break;
			case 'wedding' :
				wp_enqueue_script( 'ale-modernizr-overlay-nav' );
				wp_enqueue_script( 'classie' );
				wp_enqueue_script( 'ale-overlay-nav-center' );
				break;
		}
	}

	wp_enqueue_script( 'ale-scripts' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'ale_enqueue_scripts');

/**
 * Register Fonts
 */
function ale_google_fonts_url() {
	$font_url = '';

	/* Get fonts names selected by administrator in theme options */

	$ale_font_one = ale_get_option('font_one');
	$ale_font_two = ale_get_option('font_two');

	$ale_font_one_ex = ale_get_option('font_one_ex');
	$ale_font_two_ex = ale_get_option('font_two_ex');


	$ale_default_fonts = ale_get_safe_webfonts();
	$ale_load_urls = '';

	if(in_array($ale_font_one,$ale_default_fonts)){ $ale_load_urls .= ""; }
	else {$ale_load_urls .= str_replace ('+',' ',$ale_font_one).":".$ale_font_one_ex."|"; }

	if(in_array($ale_font_two,$ale_default_fonts)){ $ale_load_urls .= ""; }
	else { $ale_load_urls .= str_replace ('+',' ',$ale_font_two).":".$ale_font_two_ex."|"; }


	/*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'olins' ) ) {
		$font_url = add_query_arg( 'family', urlencode($ale_load_urls), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}
/**
 * Enqueue scripts and styles.
 */
function ale_google_fonts_scripts() {
	wp_enqueue_style( 'olins-fonts', ale_google_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'ale_google_fonts_scripts' );


/**
 * Add header information 
 */
function ale_head() {
	?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
		<link rel="shortcut icon" href="<?php esc_url(ale_favicon()); ?>" />
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php esc_html_e('RSS Feed','olins') ?>" href="<?php ale_rss(); ?>" />
	<?php
	get_template_part('partials/css-option');
}
add_action('wp_head', 'ale_head');


/**
 * Comment callback function
 * @param object $comment
 * @param array $args
 * @param int $depth
 */


function ale_comment_default($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
<<?php echo esc_attr($tag) ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
    <?php if ($depth > 1) { ?>
        <div class="comment-item comment2 second-level cf">
            <div class="response"></div>
    <?php } else { ?>
        <div class="comment-item comment1 first-level cf">
    <?php } ?>

        <div class="commenter-avatar">
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </div>
        <div class="comment-box">
            <div class="info-meta">
                <?php echo esc_html_e('Posted by ','olins'); printf("<span class='author'>".esc_html__('%s','olins')."</span>", get_comment_author_link()); echo " / " ?>
                <?php printf( ale_wp_kses(esc_html__('%1$s %2$s','olins')), get_comment_time(), get_comment_date() ) ?>

                <?php if($depth == 1){ ?><span class="reply-link"><i class="fa fa-reply" aria-hidden="true"></i> <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span><?php } ?>
            </div>
            <div class="info-content">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','olins') ?></em>
                    <br />
                <?php endif; ?>
                <?php comment_text() ?>
            </div>
        </div>

    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
    <?php
}


/**
 * Add Open Graph Tags to <head> 
 */
function ale_og_meta() {
	if (ale_get_option('og_enabled')) {
		
	$og_type='article';
	$og_locale = get_locale();
	
	$og_image = '';
	
	// single page
	if (is_singular()) {
		global $post;
		$og_title = esc_attr(strip_tags(stripslashes($post->post_title)));
		$og_url = get_permalink();
		if (trim($post->post_excerpt) != '') {
			$og_desc = trim($post->post_excerpt);
		} else {
			$og_desc = ale_truncate(strip_tags($post->post_content), 240, '...');
		}
		
		$og_image = ale_get_og_meta_image();
		
		if (is_front_page()) {
			$og_type = 'website';
		}
		
	} else {
		global $wp_query;
		
		$og_title = get_bloginfo('name');
		$og_url = site_url();
		$og_desc = get_bloginfo('description');
		
		if (is_front_page()) {
			$og_type = 'website';
			
		} elseif (is_category()) {
			$og_title = esc_attr(strip_tags(stripslashes(single_cat_title('', false))));
			$term = $wp_query->get_queried_object();
			$og_url = get_term_link($term, $term->taxonomy);
			$cat_desc = trim(esc_attr(strip_tags(stripslashes(category_description()))));
			if ($cat_desc) {
				$og_desc = $cat_desc;
			}
			
		} elseif(is_tag()) {
			$og_title = esc_attr(strip_tags(stripslashes(single_tag_title('', false))));
			$term = $wp_query->get_queried_object();
			$og_url = get_term_link($term, $term->taxonomy);
			$tag_desc = trim(esc_attr(strip_tags(stripslashes(tag_description()))));
			if (trim($tag_desc) != '') {
				$og_desc = $tag_desc;
			}
			
		} elseif (is_tax()) {	
			$og_title = esc_attr(strip_tags(stripslashes(single_term_title('', false))));
			$term = $wp_query->get_queried_object();
			$og_url = get_term_link($term, $term->taxonomy);
			
		} elseif(is_search()) {
			$og_title = esc_attr(strip_tags(stripslashes(__('Search for', 'olins') . ' "' . get_search_query() . '"')));
			$og_url = get_search_link();
			
		} elseif (is_author()) {
			$og_title = esc_attr(strip_tags(stripslashes(get_the_author_meta('display_name', get_query_var('author')))));
			$og_url = get_author_posts_url(get_query_var('author'), get_query_var('author_name'));
			
		} elseif (is_archive()) {
			if (is_post_type_archive()) {
				$og_title = esc_attr(strip_tags(stripslashes(post_type_archive_title('', false))));
				$og_url = get_post_type_archive_link(get_query_var('post_type'));
			} elseif (is_day()) {
				$og_title = esc_attr(strip_tags(stripslashes(get_query_var('day') . ' ' . single_month_title(' ', false) . ' ' . esc_html__('Archives', 'olins'))));
				$og_url = get_day_link(get_query_var('year'), get_query_var('monthnum'), get_query_var('day'));
			} elseif (is_month()) {
				$og_title = esc_attr(strip_tags(stripslashes(single_month_title(' ', false) . ' ' . esc_html__('Archives', 'olins'))));
				$og_url = get_month_link(get_query_var('year'), get_query_var('monthnum'));
			} elseif (is_year()) {
				$og_title = esc_attr(strip_tags(stripslashes(get_query_var('year') . ' ' . esc_html__('Archives', 'olins'))));
				$og_url = get_year_link(get_query_var('year'));
			}
			
		} else {
			// other situations
		}
	}
	
	if (!$og_desc) {
		$og_desc = $og_title;
	}
	?>
	
	<?php if (ale_get_option('fb_id')) : ?>
		<meta property="fb:app_id" content="<?php ale_option('fb_id')?>" />
	<?php endif; ?>
	<?php if ($og_image) : ?>
		<meta property="og:image" content="<?php echo esc_url($og_image) ?>" />
	<?php endif; ?>
	<meta property="og:locale" content="<?php echo esc_attr($og_locale) ?> " />
	<meta property="og:site_name" content="<?php bloginfo('name') ?>" />
	<meta property="og:title" content="<?php echo esc_attr($og_title) ?>" />
	<meta property="og:url" content="<?php echo esc_url($og_url) ?>" />
	<meta property="og:type" content="<?php echo esc_attr($og_type) ?>" />
	<meta property="og:description" content="<?php echo esc_attr($og_desc) ?>" />
	<?php }
}
add_action('wp_head', 'ale_og_meta');

/**
 * Add OpenGraph attributes to html tag
 * @param type $output
 * @return string 
 */
function ale_add_opengraph_namespace($output) {
	if (ale_get_option('og_enabled')) {
		if (!stristr($output, 'xmlns:og')) {
			$output = $output . ' xmlns:og="http://ogp.me/ns#"';
		}
		if (!stristr($output, 'xmlns:fb')) {
			$output = $output . ' xmlns:fb="http://ogp.me/ns/fb#"';
		}
	}
	
	return $output;
}
add_filter('language_attributes', 'ale_add_opengraph_namespace',9999);

/**
 * Get image for Open Graph Meta 
 * 
 * @return string
 */
function ale_og_meta_image() {
	echo ale_get_og_meta_image();
}
function ale_get_og_meta_image() {
	global $post;
	$thumbdone=false;
	$og_image='';
	
	//Featured image
	if (function_exists('get_post_thumbnail_id')) {
		$attachment_id = get_post_thumbnail_id($post->ID);
		if ($attachment_id) {
			$og_image = wp_get_attachment_url($attachment_id, false);
			$thumbdone = true;
		}
	}
	
	//From post/page content
	if (!$thumbdone) {
		$image = ale_parse_first_image($post->post_content);
		if ($image) {
			preg_match('~src="([^"]+)"~si', $image, $matches);
			if (isset($matches[1])) {
				$image = $matches[1];
				$pos = strpos($image, site_url());
				if ($pos === false) {
					if (stristr($image, 'http://') || stristr($image, 'https://')) {
						$og_image = $image;
					} else {
						$og_image = site_url() . $image;
					}
				} else {
					$og_image = $image;
				}
				$thumbdone=true;
			}
		}
	}
	
	//From media gallery
	if (!$thumbdone) {
		$image = ale_get_first_attached_image($post->ID);
		if ($image) {
			$og_image = wp_get_attachment_url($image->ID, false);
			$thumbdone = true;
		}
	}
	
	return $og_image;
}

