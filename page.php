<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	<?php if (is_woocommerce()){?> 
	<div class="contentWrapper sections">
		<div class="outerPadding">
			<div class="gridWrapper"><?php the_content();?></div>
			<?php include(locate_template('includes/pageSections.php'));?>
		</div>
	</div>
	<?php }else{?>
	<div class="contentWrapper sections">
		<?php include(locate_template('includes/pageSections.php'));?>
	</div>
	<?php }?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>	
	