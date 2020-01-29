<?php get_header(); ?>


    <!-- Content -->
    <div class="wrap cf">

        <div class="content cf">


            <div class="breadcrumb">
                <div class="line back"></div>
                <a href="<?php echo esc_js('javascript:history.go(-1)'); ?>"><?php esc_html_e('Go Back','olins'); ?></a>
            </div>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="padding story cf">

                    <h1><?php esc_attr(the_title()); ?></h1>
                    <div class="entry-attachment">
                        <?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
                            <p class="attachment"><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo esc_url($att_image[0]);?>" width="<?php echo esc_attr($att_image[1]);?>" height="<?php echo esc_attr($att_image[2]);?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
                            </p>
                        <?php else : ?>
                            <a href="<?php echo wp_get_attachment_url($post->ID) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>

                    <?php the_content( esc_html__( 'Continue reading <span class="meta-nav">&amp;raquo;</span>', 'olins' )  ); ?>
                    <?php wp_link_pages('before=<div class="page-link">' . esc_html__( 'Pages:', 'olins' ) . '&amp;after=</div>') ?>


                </div>

            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; ?>

        </div>
    </div>

<?php get_footer(); ?>