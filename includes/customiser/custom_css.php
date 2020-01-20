<?php 
add_action( 'wp_head', 'blue_theme_customizer_css');
function blue_theme_customizer_css()
{
    ?>
        <style type="text/css">
         	/*<?php if(get_theme_mod('blue_theme_bg_colour')){?>
             	body { background: <?php echo get_theme_mod('blue_theme_bg_colour', ''); ?>; }
          	<?php } ?>*/
        </style>
    <?php
}