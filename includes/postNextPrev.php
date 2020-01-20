<?php
$prevPost = get_previous_post();
$prev_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
$prevthumbnail = get_the_post_thumbnail_url($prevPost->ID, "thumbnail");?>
<?php if($prevPost->post_title != "") {?>
	<a class="nextPrev prev" href="<?php echo $prev_post_url; ?>">
		<span class="nextPrevInner">
			<i class="fas fa-angle-left prevIcon"></i>
	    	<?php if($prevthumbnail > ""){?><span class="nextPrevThumb prevThumb lazy" data-src="<?php echo $prevthumbnail; ?>"></span><?php } ?>
	    	<span class="nextPrevTitle prevTitle"><?php echo $prevPost->post_title; ?></span>
	    </span>
	</a>
<?php } ?>
<?php
$nextPost = get_next_post();
$next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
$nextthumbnail = get_the_post_thumbnail_url($nextPost->ID, "thumbnail");?>
<?php if($nextPost->post_title != "") {?>
	<a class="nextPrev next" href="<?php echo $next_post_url; ?>">
		<span class="nextPrevInner">
	    	<span class="nextPrevTitle nextTitle"><?php echo $nextPost->post_title; ?></span>
	    	<?php if($nextthumbnail > ""){?><span class="nextPrevThumb nextThumb lazy" data-src="<?php echo $nextthumbnail; ?>"></span><?php } ?>
			<i class="fas fa-angle-right nextIcon"></i>
	    </span>
	</a>
<?php } ?>