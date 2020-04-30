<article <?php post_class('cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
	<div class="post_image">
		<?php echo get_the_post_thumbnail($post->ID,'post-singleimage'); ?>
	</div>