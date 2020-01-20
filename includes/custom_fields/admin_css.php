<?php 
add_action( 'admin_head', 'blue_theme_admin_css');
function blue_theme_admin_css()
{
    ?>
        <style type="text/css">
        .repeater {
        	border:1px solid #eee;
        }
         	.sectionDivider {
         		padding:0 10px;
         		border-top:1px solid #eee;
         	}
         	.sectionDivider:first-child {
         		border-top:none;
         	}
        </style>
    <?php
}