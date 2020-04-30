<?php get_header(); ?>
    <section class="site_container">
        <div class="page_heading">
            <h2 class="page_title"><?php esc_html_e('Error 404','gardener'); ?></h2>
        </div>
        <!-- Content -->
        <div class="story">
            <div class="wrapper page404">

                <p class="errorp"><?php esc_html_e('Sorry, but the page you\'re looking for has not found. Try checking the URL for errors, then hit the refresh button on your browser.','gardener'); ?></p>

                <a href="<?php echo esc_js('javascript:history.go(-1)'); ?>" class="ale_button font_two"><?php esc_html_e('Go Back','gardener'); ?></a>

            </div>
        </div>
    </section>

<?php get_footer(); ?>