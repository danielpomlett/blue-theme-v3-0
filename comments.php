<div class="section normalScroll" id="comments">
	<div class="contentSection">
		<div class="innerPadding">
			<div class="widthWrapper">
				<div class="copyWrapper">
				<?php
					// Do not delete these lines
					if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
						die ('Please do not load this page directly. Thanks!');

					if ( post_password_required() ) { ?>
						<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'blue-theme-v3-0')?></p>
					<?php
						return;
					}
				?>

				<!-- You can start editing here. -->
				<?php if ( have_comments() ) : ?>
				<header class="spanHeader">
					<h3><?php _e('Comments', 'blue-theme-v3-0'); ?></h3>
				</header>
				<?php if(get_previous_comments_link() || get_next_comments_link() ) {?>
					<section class="pagination commentsPagination">
						<div class="half">
							<div class="paginationLeft">
								<?php previous_comments_link(_e('&laquo; Older Comments', 'blue-theme-v3-0')); ?>
							</div>
						</div>
						<div class="half lastModule">
							<div class="paginationRight">
								<?php next_comments_link(_e('Newer Comments &raquo;', 'blue-theme-v3-0')); ?>
							</div>
						</div>
						<div class="clear"></div>
					</section>
				<?php } ?>
				<section class="commentsListWrapper">
					<ul class="commentList">
						<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
					</ul>
				</section>
				<?php if(get_previous_comments_link() || get_next_comments_link() ) {?>
					<section class="pagination commentsPagination">
						<div class="leftWrapper">
							<div class="paginationLeft">
								<?php previous_comments_link(_e('&laquo; Older Comments', 'blue-theme-v3-0')); ?>
							</div>
						</div>
						<div class="rightWrapper">
							<div class="paginationRight">
								<?php next_comments_link(_e('Newer Comments &raquo;', 'blue-theme-v3-0')); ?>
							</div>
						</div>
						<div class="clear"></div>
					</section>	
				<?php } ?>
				<?php else : // this is displayed if there are no comments so far ?>
					<?php if ( comments_open() ) : ?>
					<?php else : // comments are closed ?>
				<?php endif; ?>
				<div class="clear"></div>
				<?php endif; ?>
				<?php if ( comments_open() ) : comment_form(); endif; // if you delete this the sky will fall on your head ?>
				</div>
			</div>
		</div>
	</div>
</div>
