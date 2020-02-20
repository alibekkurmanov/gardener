<?php get_header(); ?>
    <section class="site_container">
        <div class="page_heading">
            <h2 class="page_title"><?php esc_html_e('Our Blog','gardener'); ?></h2>
        </div>
        <!-- Content -->
        <div class="story single_post cf">
            <div class="cf">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article <?php post_class('cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                        <?php get_template_part('partials/posthead' );?>
                        <?php get_template_part('partials/postcontent' );?>
                        <?php //get_template_part('partials/postfooter' );?>
                    </article>
                <?php endwhile; else: ?>
                    <?php get_template_part('partials/notfound')?>
                <?php endif; ?>
            </div>


            <?php if (comments_open() || get_comments_number()) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>