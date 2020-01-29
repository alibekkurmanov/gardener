<?php
$args = array(
    'form_title'            => '',
    'form_name'             => '',
    'form_email'            => '',
    'form_message'          => '',
    'form_submit'           => '',
    'form_email_receive'    => '',
    'form_email_subject'    => '',
    'form_bg'               => '',
    'form_mask_color'       => '',
    'form_align'            => '',
);

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$html = '';
$image_src = '';

if($form_mask_color == "") { $form_mask_color = 'rgba(0,0,0,0.7)'; } ;

if (is_numeric($form_bg)) {
    $image_src = wp_get_attachment_url($form_bg);
} ?>

<div class="olins_contact_form_shortcode" style="background-image: url(<?php echo esc_url($image_src); ?>);">
    <div class="form_container" style="background-color: <?php echo esc_attr($form_mask_color); ?>">
        <div class="the_form text_align_<?php echo esc_attr($form_align); ?>">


            <?php if($form_title){?>
                <h3><?php echo esc_attr($form_title); ?></h3>
            <?php } ?>

            <a name="success"></a>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo esc_html_e("Thank you for your message!", "olins"); ?></p>
            <?php } ?>

            <?php if (isset($error) && isset($error['msg'])) {?>
                <p class="error"><?php echo esc_attr($error['msg']); ?></p>
            <?php } ?>

            <form method="post" action="<?php echo esc_url(get_the_permalink()); ?>" class="cf clearfix">

                <input name="contact[name]" type="text" class="item_field" placeholder="<?php echo esc_attr($form_name); ?>" value="" required="required" id="contact-form-name" />
                <input name="contact[email]" type="email" class="item_field" placeholder="<?php echo esc_attr($form_email); ?>" value="" required="required" id="contact-form-email" />
                <textarea name="contact[message]" class="item_field" placeholder="<?php echo esc_attr($form_message); ?>" id="contact-form-message" required="required"></textarea>
                <input type="submit" class="submit submit_button" value="<?php echo esc_attr($form_submit); ?>"/>
                <input name="contact[receive]" type="hidden" value="<?php echo esc_attr($form_email_receive); ?>" />
                <input name="contact[subject]" type="hidden" value="<?php echo esc_attr($form_email_subject); ?>" />
                <?php wp_nonce_field(); ?>

            </form>

        </div>
    </div>
</div>