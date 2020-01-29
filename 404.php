<?php get_header(); ?>
<?php get_template_part('partials/page_heading'); ?>
    <div class="content_wrapper flex_container cf">
        <!-- Content -->
        <div class="story errorpage ale_blog_archive content cf">



            <div class="padding error_page story cf">

                <h2 class="sub-title errorh1"><?php esc_html_e('Error 404','olins'); ?></h2>
                <p class="errorp"><?php esc_html_e('Sorry, but the page you\'re looking for has not found. Try checking the URL for errors, then hit the refresh button on your browser.','olins'); ?></p>

                <a href="<?php echo esc_js('javascript:history.go(-1)'); ?>" class="ale_button"><?php esc_html_e('Go Back','olins'); ?></a>


            </div>
        </div>
    </div>
<?php get_footer(); ?>