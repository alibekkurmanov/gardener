<footer class="theme_footer <?php if(is_page_template('template-about.php')){ echo 'footer_for_about'; } ?>">
    <div class="footer">
        <div class="top_footer">
            <div class="wrapper social_container">
                <div class="social_profiles font_two">
                    <?php get_template_part('partials/social_profiles' ); ?>
                </div>
                <div class="social_share">
                    <div class="fb-like" data-href="<?php echo esc_url(home_url("/")); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                </div>
            </div>
        </div>
        <div class="bottom_footer">
            <div class="wrapper contacts_footer_box">
                <div class="footer_logo">
                    <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                        <?php if(ale_get_option('footerlogo')){?>
                            <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" alt="logo" title="<?php esc_attr(bloginfo('title')); ?>" />
                        <?php } else { ?>
                            <h6><?php esc_attr(bloginfo('title')); ?></h6>
                        <?php } ?>
                    </a>
                </div>
                <div class="footer_info">
                    <div class="item_contacts">
                        <span class="contacts_label font_two">
                            <?php esc_html_e('Contacts','gardener'); ?>
                        </span>
                        <?php if(ale_get_option('footer_callnumber')){ ?>
                            <span class="footer_phone">
                                <?php echo ale_get_option('footer_callnumber'); ?>
                            </span>
                        <?php }
                        if(ale_get_option('footer_email_address')){ ?>
                            <span class="footer_email">
                                <a href="mailto:<?php echo ale_get_option('footer_email_address'); ?>"><?php echo ale_get_option('footer_email_address'); ?></a>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="item_address">
                        <span class="address_label font_two">
                            <?php esc_html_e('Address','gardener'); ?>
                        </span>
                        <?php if(ale_get_option('footer_address')){ ?>
                            <span class="footer_address">
                                <?php echo ale_get_option('footer_address'); ?>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="item_copyrights">
                        <?php if(ale_get_option('copyrights')) {
                            echo ale_get_option('copyrights');
                        } else {
                            echo "© Copyrights Reserved";
                        } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.10&appId=601548096671681";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>