<?php
/*
  * Template name: Page Full Width
  * */
get_header(); ?>
<?php if(!is_front_page()){ get_template_part('partials/page_heading'); } ?>
	<div class="full-width-page flex_container">
		<div class="story ale_blog_archive content cf">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(!is_front_page()){ ?>
					<?php if(ale_get_meta('post_title_position') == 'afterheading' ){ ?>
						<h2 class="post_title"><?php esc_attr(the_title()); ?></h2>
						<?php if(ale_get_meta('post_pre_title')){ ?>
							<p class="pre_title"><?php echo esc_attr(ale_get_meta('post_pre_title')); ?></p>
						<?php } ?>
					<?php } ?>
				<?php } ?>

				<?php the_content(); ?>

			<?php endwhile; else: ?>
				<?php get_template_part('partials/notfound')?>
			<?php endif; ?>

			<?php if (comments_open()) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>