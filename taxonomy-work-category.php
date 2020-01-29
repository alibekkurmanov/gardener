<?php get_header(); ?>
<?php get_template_part('partials/page_heading');

//Sidebar position based on theme options
$ale_sidebar_position = ale_get_option('work_sidebar_position');
$sidebar_class = '';

if($ale_sidebar_position){
	$sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
}

//Works Container Settings
$works_container_class = '';
if(ale_get_option('works_container_prop') == '2'){
	$works_container_class = 'full_width_no_paddings';
}
?>

	<div class="content_wrapper flex_container works_page <?php  echo esc_attr($sidebar_class) .' '. esc_attr($works_container_class); ?> cf">

		<?php if(ale_get_option('works_extra_heading')=='2'){
			$extra_line_1 = ale_get_option('work_extra_line1');
			$extra_line_2 = ale_get_option('work_extra_line2');
			$bg_color = ale_get_option('work_extra_bg');

			?>
			<div class="extra_heading font_one" <?php if($bg_color){ echo 'style="background-color:'.$bg_color.'"';} ?>>
				<?php if($extra_line_1) { echo '<h2 class="extra_heading_line1">'.$extra_line_1.'</h2>'; }?>
				<?php if($extra_line_2) { echo '<p class="extra_heading_line2">'.$extra_line_2.'</p>'; }?>
			</div>
		<?php } ?>
		<?php if($ale_sidebar_position  !== 'no'){
			get_sidebar();
		} ?>
		<!-- Content -->
		<div class="story ale_work_archive content cf">
			<?php
			//Columns Settings
			$ale_work_columns = ale_get_option('default_work_columns');
			$ale_columns_class = '';
			if($ale_work_columns){
				$ale_columns_class = 'ale_work_columns_'.$ale_work_columns;
			} ?>

			<?php if(ale_get_option('taxonomy_navigation')== 'enable'){
				$works_categories = get_terms(array('taxonomy' => 'work-category','hide_empty' => false,));

				$list_class = '';

				if(!empty($works_categories)){
					echo '<ul class="works_category_list font_two">';
					foreach($works_categories as $cat){
						if($cat->term_id == get_queried_object()->term_id) {
							$list_class = 'active';
						} else {
							$list_class = '';
						}

						echo '<li class="'.esc_attr($list_class).'"><a href="'.esc_url(get_term_link($cat,'work-category')).'">'.esc_attr($cat->name).'</a></li>';

					}
					echo '</ul>';
				}
			} ?>

			<div class="grid works_items_container <?php echo esc_attr($ale_columns_class); ?> cf">
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part('partials/work/workpreview' );?>
				<?php endwhile; else: ?>
					<?php get_template_part('partials/notfound')?>
				<?php endif; ?>
			</div>

			<?php if(ale_show_posts_nav()){ ?>
				<div class="pagination default_pagination cf">
					<?php ale_page_links(); ?>
				</div>
			<?php } ?>
		</div>

	</div>
<?php get_footer(); ?>
