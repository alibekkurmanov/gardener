<?php
$args = array(
	"slide_image" => "",
	"slide_title" => "",
	"slide_desc" => "",
	"slide_button_link" => ""
);

extract(shortcode_atts($args, $atts));

//An array with Link data
$slide_button_link = vc_build_link( $slide_button_link );

if($slide_image){ ?>
<div>
	<?php if(!empty($slide_image)){
		echo '<img src="'.esc_url(wp_get_attachment_url($slide_image)).'" alt="" />';
	} ?>
	<?php if(!empty($slide_title)){ ?>
		<div class="slide_title font_two">
			<?php echo esc_attr($slide_title); ?>
		</div>
	<?php } ?>
	<?php if(!empty($slide_desc)){ ?>
		<div class="slide_desc">
			<?php echo esc_attr($slide_desc); ?>
		</div>
	<?php } ?>
</div>

<?php } ?>