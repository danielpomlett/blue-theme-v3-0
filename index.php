<?php get_header(); ?>
<div class="contentWrapper">
	<div class="outerPadding">
		<?php if(is_archive()){?>
			<header class="mainHeader gridMainHeader">
				<h1><?php echo the_archive_title(); ?></h1>
			</header>
		<?php } ?>
		<?php 
		if ( get_query_var('paged') ) {
		    $paged = get_query_var('paged');
		} else if ( get_query_var('page') ) {
		    $paged = get_query_var('page');
		} else {
		    $paged = 1;
		}
		echo '<div class="gridWrapper">';
		$count =  0;
		if (have_posts()) : while (have_posts()) : the_post(); include(locate_template('includes/postLoop.php')); $count++; endwhile; endif; echo '</div>';?>
	<?php if (show_posts_nav()) : ?>
		<div class="clear"></div>
		<footer class="paginationWrapper padded">
				<?php
				global $wp_query;
				$big = 999999999; // need an unlikely integer
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'prev_text'    => __('Newer posts', 'blue-theme-v3-0'),
					'next_text'    => __('Older posts', 'blue-theme-v3-0')
				) );
				?>
				<div class="clear"></div>
		</footer>
	<?php endif; ?>
				<?php echo get_field('does_this_work'); ?>

	</div>
</div>
<?php get_footer(); ?>	
	