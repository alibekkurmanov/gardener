<?php
	// Do not delete these lines for security reasons
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die ('Please do not load this page directly. Thanks!');
	}

?>

<!-- Comments -->
<div class="comments" id="comments">
    <?php if (have_comments()) : ?>
        <div class="comments_container cf">
            <div class="comments_name cf">
                <div class="comments_title"><?php comments_number('0 ' . esc_html__('Comments','olins'), '1 '.esc_html__('Comment','olins'), '% '.esc_html__('Comments','olins')) ?></div>
                <div class="comments_separator"></div>
                <a name="comments"></a>
            </div>

            <?php if (post_password_required()) : ?>
                <p class="comments-protected"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'olins'); ?></p>
                <?php
                return; endif; ?>
            <?php if (have_comments()) : ?>

                <?php wp_list_comments(array('callback' => 'ale_comment_default','style' => 'div', 'max_depth' => 2,'avatar_size' => 55,)); ?>


                <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                    <nav class="comments-nav" class="pager">
                        <div class="previous"><?php previous_comments_link(esc_html__('&larr; Older comments', 'olins')); ?></div>
                        <div class="next"><?php next_comments_link(esc_html__('Newer comments &rarr;', 'olins')); ?></div>
                    </nav>
                <?php endif; // check for comment navigation ?>
            <?php  endif; ?>
        </div>
    <?php  endif; ?>


    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'olins' ); ?></p>
    <?php endif; ?>

    <?php if(comments_open()){ ?>
    <div id="respond" class="leave-a-comment">
        <div class="comments_name cf">
            <div class="comments_title"><?php esc_html_e('Leave a comment','olins');?> <?php echo cancel_comment_reply_link(); ?></div>
            <div class="comments_separator"></div>
            <a name="respond"></a>
        </div>

        <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
            <p class="loginforcomment"><?php printf(ale_wp_kses(__('You must be <a href="%s">logged in</a> to post a comment.', 'olins')), wp_login_url(get_permalink())); ?></p>
        <?php else : ?>
            <form action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" id="comment-form" method="post" class="comment-form cf">

                <?php if (is_user_logged_in()) : ?>
                    <div class=loginforcomment cf">
                        <p><?php printf(ale_wp_kses(__('Logged in as <a class="login_link" href="%s/wp-admin/profile.php">%s</a>.', 'olins')), get_option('siteurl'), $user_identity); ?> <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>" title="<?php esc_html__('Log out of this account', 'olins'); ?>"><?php esc_html_e('Log out', 'olins'); ?></a></p>
                    </div>
                <?php endif; ?>

                <div class="line-item comment_container">
                    <textarea id="message" name="comment" tabindex="1" class="message" required="required" placeholder="<?php esc_html_e('Type here your comment','olins'); ?>"></textarea>
                </div>

                <?php if (!is_user_logged_in()) : ?>
                <div class="line-item cf">
                    <div class="third_item">
                        <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> required="required" placeholder="<?php esc_html_e('Your name*','olins'); ?>" />
                    </div>
                    <div class="third_item">
                        <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> required="required" email="true" placeholder="<?php esc_html_e('Your e-mail*','olins'); ?>" />
                    </div>
                    <div class="third_item last">
                        <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="4"  placeholder="<?php esc_html_e('Your website','olins'); ?>"/>
                    </div>
                </div>
                <?php endif; ?>

                <div class="line-item submit_container cf">
                    <input type="submit" name="submit" tabindex="5" value="<?php esc_html_e('Post a Comment','olins'); ?>"/>
                </div>

                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif; // if registration required and not logged in ?>

    <?php if(isset($wp_default_form)){ comment_form(); } ?>
    </div>
    <?php } ?>
</div>