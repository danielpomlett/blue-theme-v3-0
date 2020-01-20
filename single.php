<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	<div class="contentWrapper sections">
		<?php include(locate_template('includes/pageSections.php')); 
		include(locate_template('includes/postNextPrev.php'));?>
	</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>	
	