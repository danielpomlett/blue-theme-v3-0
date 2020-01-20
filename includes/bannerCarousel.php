<?php $slideCount = count(get_field('carousel_slide'));?>
<div class="sectionsWrapper <?php if($slideCount > 1){?>owl-carousel<?php } ?>">
	<?php while(have_rows('carousel_slide')): the_row();?>
	<div class="section slide lazy" data-src='<?php $attachment_id = attachment_url_to_postid(the_sub_field('slide_image')); $size = "banner"; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo($image[0]); ?>'>
		<div class="tint sectionFlex">
			<div class="innerPadding">
				<div class="widthWrapper">
					<div class="copyWrapper">
						<h2><?php echo the_sub_field('slide_title'); ?></h2>
						<?php if(get_sub_field('slide_copy')){?><p><?php echo the_sub_field('slide_copy'); ?></p><?php } ?>
						<?php if(get_sub_field('slide_link')){?>
							<?php if(get_sub_field('slide_link_label')){?>
								<p><a href="<?php echo the_sub_field('slide_link'); ?>" class="readMore"><?php _e('find out more', 'blue-theme-v3-0'); ?></a></p>
							<?php }else{?>
								<p><a href="<?php echo the_sub_field('slide_link'); ?>" class="readMore"><?php echo the_sub_field('slide_link_label'); ?></a></p>
							<?php } ?>
						<?php } ?>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>
