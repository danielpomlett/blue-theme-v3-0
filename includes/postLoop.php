<a href="<?php the_permalink();?>" title="<?php _e('Read more of ','blue-theme-v3-0'); ?><?php the_title(); ?>" <?php post_class('postGridItem'); ?>>
<span class="postWrapper <?php echo get_post_type();?>">
	<?php if(has_post_thumbnail()){?>
		<span class="featuredImage" style="background-image:url(<?php $attachment_id = get_post_thumbnail_id($post->ID); $size = "featured"; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo($image[0]); ?>);">
		</span>
	<?php }else{?>
		<span class="featuredImage default">
		</span>
	<?php }?>
	<span class="postHeader"><?php echo the_titlesmall(); ?></span>
	<span class="details">
		<span class="detail author">
			<?php _e('by ', 'blue-theme-v3-0'); ?>
				<?php the_author(); ?>
		</span>
		<span class="detail date">
			<?php _e('on ', 'blue-theme-v3-0'); ?><?php the_time('d.m.y'); ?>
		</span>
		<?php if(has_category()){ ?>

		<?php } ?>
		<?php if(have_comments()){ ?>
			<span class="detail commentNumber">
				<?php _e('| Comments: ', 'blue-theme-v3-0'); ?>
				<?php comments_number('None', '1 comment', '% comments'); ?>
			</span>
		<?php } ?>
	</span>
	<span class="excerpt">
		<span><?php echo substr(get_the_excerpt(), 0,325); ?></span>
		<span class="readMore" ><?php _e('Read more','blue-theme-v3-0'); ?></span>
	</span>
</span></a>