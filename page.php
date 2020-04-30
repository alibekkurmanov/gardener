<?php get_header(); ?>
<section class="site_container">
    <div class="page_heading">

    </div>
    <!-- Content -->
    <div class="story single_post cf">
        <div class="cf">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part('partials/posthead' );?>
                <?php get_template_part('partials/postcontent' );?>
                <?php get_template_part('partials/postfooter' );?>

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