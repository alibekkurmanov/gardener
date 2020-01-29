<?php get_header();
if(ale_get_meta('post_title_position')!="") {
	get_template_part('partials/page_heading');
}

//Sidebar position based on theme options
$ale_sidebar_position = ale_get_option('work_sidebar_position');
$sidebar_class = '';

if($ale_sidebar_position){
	$sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
}


if(ale_get_meta('gallery_slider') == 'top_full'){
	get_template_part('partials/work/top_full_slider' );
} else if(ale_get_meta('gallery_slider') == 'brigitte_slider'){
    get_template_part('partials/work/brigitte_slider' );
}
?>
	<?php if(ale_get_meta('post_title_position') !== 'fullwidthwedding'){ ?>
	<div class="content_wrapper flex_container <?php  echo esc_attr($sidebar_class); ?> cf">

		<?php if($ale_sidebar_position  !== 'no'){
			get_sidebar();
		} ?>
		<!-- Content -->
		<div class="story ale_blog_archive content cf">
			<div class="cf">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part('partials/posthead' );?>
					<?php get_template_part('partials/postcontent' );?>
					<?php get_template_part('partials/postfooter' );?>
				<?php endwhile; else: ?>
					<?php get_template_part('partials/notfound')?>
				<?php endif; ?>
			</div>
			<?php get_template_part('partials/pagination'); ?>
			<?php if (comments_open() || get_comments_number()) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
	</div>
	<?php } ?>
<?php get_footer(); ?>