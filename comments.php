<?php
// Do not delete these lines for security reasons
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die ('Please do not load this page directly. Thanks!');
} ?>

<div class="comments_section wrapper">
    <!-- Comments -->
    <div class="comments" id="comments">
        <?php if (have_comments()) : ?>
            <div class="comments_container cf">
                <div class="comments_title"><h3><?php comments_number('0 ' . esc_html__('Comments','gardener'), '1 '.esc_html__('Comment','gardener'), '% '.esc_html__('Comments','gardener')) ?></h3></div>
                <?php if (post_password_required()) : ?>
                    <p class="comments-protected"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'gardener'); ?></p>
                    <?php return;
                endif; ?>
                <?php if (have_comments()) : ?>

                    <?php wp_list_comments(array('callback' => 'ale_comment_default','style' => 'div', 'max_depth' => 2,'avatar_size' => 0,)); ?>

                    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                        <nav class="comments-nav" class="pager">
                            <div class="previous"><?php previous_comments_link(esc_html__('&larr; Older comments', 'gardener')); ?></div>
                            <div class="next"><?php next_comments_link(esc_html__('Newer comments &rarr;', 'gardener')); ?></div>
                        </nav>
                    <?php endif; // check for comment navigation ?>
                <?php  endif; ?>
            </div>
        <?php endif;

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gardener' ); ?></p>
        <?php endif; ?>

        <?php if (comments_open()) : ?>
            <div id="respond" class="leave-a-comment">
                <a name="respond"></a>
                <div class="form_comment_box">
                    <div class="comments_name cf">
                        <div class="comments_title"><h3><?php esc_html_e('Leave a comment','gardener');?> <?php echo cancel_comment_reply_link(); ?></h3></div>
                        <div class="title_comment_label"><?php esc_html_e('Please, fill the fields below','gardener'); ?></div>
                    </div>

                    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                        <p class="loginforcomment"><?php printf(ale_wp_kses(__('You must be <a href="%s">logged in</a> to post a comment.', 'gardener')), wp_login_url(get_permalink())); ?></p>
                    <?php else : ?>
                    <form action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" id="comment-form" method="post" class="comment-form cf">
                        <?php if (is_user_logged_in()) : ?>
                            <div class=loginforcomment cf">
                                <p><?php printf(ale_wp_kses(__('Logged in as <a class="login_link" href="%s/wp-admin/profile.php">%s</a>.', 'gardener')), get_option('siteurl'), $user_identity); ?> <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>" title="<?php esc_html__('Log out of this account', 'gardener'); ?>"><?php esc_html_e('Log out', 'gardener'); ?></a></p>
                            </div>
                        <?php endif; ?>

                        <?php if (!is_user_logged_in()) : ?>
                            <div class="line-item cf">
                                <div class="third_item">
                                    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> required="required" placeholder="<?php esc_html_e('Your name*','gardener'); ?>" />
                                </div>
                                <div class="third_item center-item">
                                    <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> required="required" placeholder="<?php esc_html_e('Your e-mail*','gardener'); ?>" />
                                </div>
                                <div class="third_item">
                                    <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="4"  placeholder="<?php esc_html_e('Your website','gardener'); ?>"/>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="line-item comment_container">
                            <textarea id="message" name="comment" tabindex="1" class="message" required="required" placeholder="<?php esc_html_e('Type here your comment','gardener'); ?>"></textarea>
                        </div>

                        <div class="line-item submit_container cf">
                            <input type="submit" name="submit" tabindex="5" value="<?php esc_html_e('Send message','gardener'); ?>"/>
                        </div>

                        <?php comment_id_fields();
                        do_action('comment_form', $post->ID); ?>
                    </form>
                </div>
                <?php endif;

                if (isset($wp_default_form)) { comment_form(); } ?>
            </div>
        <?php endif; ?>
    </div>
</div>