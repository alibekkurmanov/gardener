            <?php $ale_footer_variant = ale_get_option('footer_variant');

            if($ale_footer_variant == 'default'){
                $ale_design_variant = ale_get_option('design_variant');

                switch ($ale_design_variant){
                    case 'zoo' :
                        get_template_part('partials/footer/zoo');
                        break;
                    case 'blackwhite' :
                        get_template_part('partials/footer/blackwhite');
                        break;
                    case 'bakery' :
                        get_template_part('partials/footer/bakery');
                        break;
                    case 'camping' :
                    case 'photography' :
                        get_template_part('partials/footer/photography');
                        break;
                    case 'luxuryshoes' :
                        get_template_part('partials/footer/luxuryshoes');
                        break;
                    case 'viaje' :
                    case 'pastel' :
                    case 'cameron' :
                        get_template_part('partials/footer/viaje');
                        break;
                    case 'brigitte' :
                        get_template_part('partials/footer/brigitte');
                        break;
                    case 'furniture' :
                    case 'creative' :
                    case 'magazine' :
                    case 'stephanie' :
                    case 'pixel' :
                        get_template_part('partials/footer/furniture');
                        break;
                    case 'fashion' :
                        get_template_part('partials/footer/fashion');
                        break;
                    case 'jade' :
                        get_template_part('partials/footer/jade');
                        break;
                }
            } else {
                // Widget Footer Here
                get_template_part('partials/footer/widget-footer');
            }

             ?>
        </div>
    </div> <!-- Main Container End -->

</div><!-- Wrapper End -->
<?php
/* Data for Wedding Variant */
if(is_single()){
    if(ale_get_option('design_variant') == 'wedding'){
        if(ale_get_meta('post_title_position') == 'fullwidthwedding'){
            get_template_part('partials/blog/wedding_full_post');
        }
    }
} ?>
<?php if($ale_footer_variant == 'default'){
    if(ale_get_option('design_variant') == 'wedding'){
        get_template_part('partials/footer/wedding');
    }
} ?>
<?php if(ale_get_option('design_variant')=='photography' or ale_get_option('design_variant')=='camping' or ale_get_option('design_variant')=='wedding' or ale_get_option('design_variant')=='pixel' ){
    get_template_part('partials/header/overlay_nav');
}  ?>
<?php wp_footer(); ?>

</body>
</html>