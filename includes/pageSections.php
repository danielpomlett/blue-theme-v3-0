<?php if( '' !== get_post()->post_content) {$content=true;} ?>
<div class="sectionsWrapper">
	<?php if(is_woocommerce() || ($content==true && !get_field('make_first_section_the_introduction'))) { ?>
		<div id="content" class="section mainContentSection topContent activeSection sectionIntroduction">
			<section class="sectionFlex contentSection">
				<div class="innerPadding">
					<div class="widthWrapper">
						<div class="copyWrapper">
							<header class="mainHeader"><h2><?php the_title();?></h2></header>
							<?php if(is_single() && !is_woocommerce()){?>
								<section class="details">
									<span class="detail author">
										<?php _e('by ', 'blue-theme-v3-0'); ?>
										<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php _e('View all posts by ', 'blue-theme-v3-0'); echo get_the_author(); ?>">
											<?php the_author(); ?>
										</a>
									</span>
									<span class="detail date">
										<?php _e('on ', 'blue-theme-v3-0'); ?><?php the_time('d.m.y'); ?>
									</span>
									<?php if(has_category()){ ?>
										<span class="detail categories">
											<?php _e('in ', 'blue-theme-v3-0'); ?> <?php the_category(', '); ?>
										</span>
									<?php } ?>
									<?php if(have_comments()){ ?>
										<span class="detail commentNumber">
											<?php _e('| Comments: ', 'blue-theme-v3-0'); ?>
										</span>
										<a href="<?php comments_link(); ?>" title="<?php _e('See comments for ', 'blue-theme-v3-0'); the_title(); ?>">
											<?php comments_number('None', '1 comment', '% comments'); ?>
										</a>
									<?php } ?>
								</section>
							<?php } ?>
							<?php the_content();?>
						</div>
					</div>
				</div>
			</section>
		</div>
	<?php } ?>
	<?php if(have_rows('page_section')): ?>
		<?php $rowCount=1; while(have_rows('page_section')): the_row(); 

			if(get_sub_field('section_header')){$sectionId=strip_tags(get_sub_field('section_header')); $sectionId=preg_replace('/[^A-Za-z0-9\-]/', '', $sectionId);$sectionId=strtolower($sectionId); }?>

			<?php if(get_sub_field('section_header')){?>
				<section class="<?php if(get_sub_field('section_type') == 'textRight'){echo 'right';}elseif(get_sub_field('section_type') == 'textLeft'){echo 'left';}else{echo 'center';}?> <?php if($rowCount==1){ echo'activeSection';}?> section lazy <?php echo the_sub_field('fixed_background_image')?> <?php echo the_sub_field('light_or_dark');?>" id="<?php echo $sectionId; ?>" <?php if(get_sub_field('background_image')){?>data-src="<?php $attachment_id = attachment_url_to_postid(the_sub_field('background_image')); $size = "banner"; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo($image[0]); ?>"<?php }?>>
			<?php }else {?>
				<section class="<?php if(get_sub_field('section_type') == 'textRight'){echo 'right';}elseif(get_sub_field('section_type') == 'textLeft'){echo 'left';}else{echo 'center';}?> <?php if($rowCount==1){ echo'activeSection';}?>  section lazy <?php echo the_sub_field('fixed_background_image')?> <?php echo the_sub_field('light_or_dark');?>" <?php if(get_sub_field('background_image')){?>data-src="<?php $attachment_id = attachment_url_to_postid(the_sub_field('background_image')); $size = "banner"; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo($image[0]); ?>"<?php }?>>
			<?php } ?>
				<div class="<?php if(get_sub_field('background_image')){?>tint<?php } ?> sectionFlex">
					<div class="innerPadding">
						<?php if(get_sub_field('section_type') == 'textCenter'){ ?>
							<div class="widthWrapper center">
								<div class="copyWrapper">
									<?php if(get_sub_field('section_image')){?>
										<?php 
										$attachment_id = get_sub_field('section_image'); 
										$image = wp_get_attachment_image_src( $attachment_id,'' );
										$filetype = wp_check_filetype($image[0]);
									    // Check if is gif. 
									    if($filetype['type'] == 'image/gif') {
									        $image_size = ""; ?>
										    <img class="gifImage lazy" data-src="<?php $image = wp_get_attachment_image_src( $attachment_id, $image_size ); echo($image[0]); ?>"/>
										<?php } else{
										    $image_size = "square";?>
										    <div class="squareImage lazy" data-src="<?php $image = wp_get_attachment_image_src( $attachment_id, $image_size ); echo($image[0]); ?>"></div>
										<?php }?>
									<?php } else if(get_sub_field('section_icon')) { ?>
											<div class='largeIcon'><?php echo the_sub_field('section_icon'); ?></div>
									<?php }  ?>
									<div class="sectionCopyWrapper">
										<?php if(get_sub_field('section_header')){?><h2><?php echo the_sub_field('section_header'); ?></h2><?php } ?>
										<?php if(is_single() && $rowCount==1){?>
											<section class="details">
												<span class="detail author">
													<?php _e('by ', 'blue-theme-v3-0'); ?>
													<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php _e('View all posts by ', 'blue-theme-v3-0'); echo get_the_author(); ?>">
														<?php the_author(); ?>
													</a>
												</span>
												<span class="detail date">
													<?php _e('on ', 'blue-theme-v3-0'); ?><?php the_time('d.m.y'); ?>
												</span>
												<?php if(has_category()){ ?>
													<span class="detail categories">
														<?php _e('in ', 'blue-theme-v3-0'); ?> <?php the_category(', '); ?>
													</span>
												<?php } ?>
												<?php if(have_comments()){ ?>
													<span class="detail commentNumber">
														<?php _e('| Comments: ', 'blue-theme-v3-0'); ?>
													</span>
													<a href="<?php comments_link(); ?>" title="<?php _e('See comments for ', 'blue-theme-v3-0'); the_title(); ?>">
														<?php comments_number('None', '1 comment', '% comments'); ?>
													</a>
												<?php } ?>
											</section>
										<?php } ?>
										<?php if(get_sub_field('section_copy')){ echo the_sub_field('section_copy'); } ?>
										<?php if(get_sub_field('section_call_to_action_url')){ ?>
											<?php if(get_sub_field('section_call_to_action_label')){ ?>
												<a class="readMore" href="<?php echo the_sub_field('section_call_to_action_url');?>" title="<?php echo the_sub_field('section_call_to_action_label');?>"><?php echo the_sub_field('section_call_to_action_label');?></a>
											<?php }else{ ?>
												<a class="readMore" href="<?php echo the_sub_field('section_call_to_action_url');?>" title="<?php _e('Find out more', 'blue-theme-v3-0');?>"><?php _e('Find out more', 'blue-theme-v3-0');?></a>
											<?php } ?>
										<?php } ?>
										<?php if(get_sub_field('section_form')){?><div class="formWrapper"><?php echo do_shortcode(get_sub_field('section_form')); ?></div><?php } ?>
									</div>
								</div>
							</div>
						<?php } elseif(get_sub_field('section_type') == 'textLeft'){ ?>
							<div class="widthWrapper left">
								<div class="copyWrapper">
									<div class="grid collapse">
										<div class="column06 second ">
											<?php if(get_sub_field('section_image')){?>
												<?php 
												$attachment_id = get_sub_field('section_image'); 
												$image = wp_get_attachment_image_src( $attachment_id,'' );
												$filetype = wp_check_filetype($image[0]);
											    // Check if is gif. 
											    if($filetype['type'] == 'image/gif') {
											        $image_size = ""; ?>
												    <img class="gifImage lazy" data-src="<?php $image = wp_get_attachment_image_src( $attachment_id, $image_size ); echo($image[0]); ?>"/>
												<?php } else{
												    $image_size = "square";?>
												    <div class="squareImage lazy" data-src="<?php $image = wp_get_attachment_image_src( $attachment_id, $image_size ); echo($image[0]); ?>"></div>
												<?php }?>
											<?php } else if(get_sub_field('section_icon')) { ?>
												<div class='largeIcon'><?php echo the_sub_field('section_icon'); ?></div>
											<?php }  ?>
										</div>
										<div class="column06 first">
											<?php if(get_sub_field('section_header')){?><h2><?php echo the_sub_field('section_header'); ?></h2><?php } ?>
											<?php if(get_sub_field('section_copy')){ echo the_sub_field('section_copy'); } ?>
											<?php if(get_sub_field('section_call_to_action_url')){ ?>
												<?php if(get_sub_field('section_call_to_action_label')){ ?>
													<a class="readMore" href="<?php echo the_sub_field('section_call_to_action_url');?>" title="<?php echo the_sub_field('section_call_to_action_label');?>"><?php echo the_sub_field('section_call_to_action_label');?></a>
												<?php }else{ ?>
													<a class="readMore" href="<?php echo the_sub_field('section_call_to_action_url');?>" title="<?php _e('Find out more', 'blue-theme-v3-0');?>"><?php _e('Find out more', 'blue-theme-v3-0');?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<?php if(get_sub_field('section_form')){?><div class="formWrapper"><?php echo do_shortcode(get_sub_field('section_form')); ?></div><?php } ?>
								</div>
							</div>
						<?php } elseif(get_sub_field('section_type') == 'textRight'){ ?>
							<div class="widthWrapper right">
								<div class="copyWrapper">
									<div class="grid collapse">
										<div class="column06">
											<?php if(get_sub_field('section_image')){?>
												<?php 
												$attachment_id = get_sub_field('section_image'); 
												$image = wp_get_attachment_image_src( $attachment_id,'' );
												$filetype = wp_check_filetype($image[0]);
											    // Check if is gif. 
											    if($filetype['type'] == 'image/gif') {
											        $image_size = ""; ?>
												    <img class="gifImage lazy" data-src="<?php $image = wp_get_attachment_image_src( $attachment_id, $image_size ); echo($image[0]); ?>"/>
												<?php } else{
												    $image_size = "square";?>
												    <div class="squareImage lazy" data-src="<?php $image = wp_get_attachment_image_src( $attachment_id, $image_size ); echo($image[0]); ?>"></div>
												<?php }?>
											<?php } else if(get_sub_field('section_icon')) { ?>
												<div class='largeIcon'><?php echo the_sub_field('section_icon'); ?></div>
											<?php }  ?>
										</div>
										<div class="column06">
											<?php if(get_sub_field('section_header')){?><h2><?php echo the_sub_field('section_header'); ?></h2><?php } ?>
											<?php if(get_sub_field('section_copy')){ echo the_sub_field('section_copy'); } ?>
											<?php if(get_sub_field('section_call_to_action_url')){ ?>
												<?php if(get_sub_field('section_call_to_action_label')){ ?>
													<a class="readMore" href="<?php echo the_sub_field('section_call_to_action_url');?>" title="<?php echo the_sub_field('section_call_to_action_label');?>"><?php echo the_sub_field('section_call_to_action_label');?></a>
												<?php }else{ ?>
													<a class="readMore" href="<?php echo the_sub_field('section_call_to_action_url');?>" title="<?php _e('Find out more', 'blue-theme-v3-0');?>"><?php _e('Find out more', 'blue-theme-v3-0');?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<?php if(get_sub_field('section_form')){?><div class="formWrapper"><?php echo do_shortcode(get_sub_field('section_form')); ?></div><?php } ?>
								</div>
							</div>
						<?php } elseif(get_sub_field('section_type') == 'services'){ ?>
							<div class="widthWrapper center">
								<div class="copyWrapper">
									<?php if(get_sub_field('section_header')){?><h2><?php echo the_sub_field('section_header'); ?></h2><?php } ?>
									<?php if(get_sub_field('section_copy')){ echo the_sub_field('section_copy'); } ?>
									<?php if(get_sub_field('section_call_to_action_url')){ ?>
										<?php if(get_sub_field('section_call_to_action_label')){ ?>
											<a class="readMore" href="<?php echo the_sub_field('section_call_to_action_url');?>" title="<?php echo the_sub_field('section_call_to_action_label');?>"><?php echo the_sub_field('section_call_to_action_label');?></a>
										<?php }else{ ?>
											<a class="readMore" href="<?php echo the_sub_field('section_call_to_action_url');?>" title="<?php _e('Find out more', 'blue-theme-v3-0');?>"><?php _e('Find out more', 'blue-theme-v3-0');?></a>
										<?php } ?>
									<?php } ?>
								</div>
								<?php $count = count(get_sub_field('service_section')); if(have_rows('service_section')): ?>
									<div class="servicesWrapper <?php if($count == 1 || $count == 2) {echo'two';} elseif($count == 3) {echo'three';} elseif($count == 4) {echo'four';} elseif($count == 5) {echo'five';}elseif($count == 6) {echo'six';}?>">
										<?php while(have_rows('service_section')): the_row(); ?><div class="service">
										<div class="servicePadding">
											<?php if(get_sub_field('service_image')){?>
												<?php 
												$attachment_id = get_sub_field('service_image'); 
												$image = wp_get_attachment_image_src( $attachment_id,'' );
												$filetype = wp_check_filetype($image[0]);
											    // Check if is gif. 
											    if($filetype['type'] == 'image/gif') {
											        $image_size = ""; ?>
												    <img class="gifImage lazy" data-src="<?php $image = wp_get_attachment_image_src( $attachment_id, $image_size ); echo($image[0]); ?>"/>
												<?php } else{
												    $image_size = "square";?>
												    <div class="squareImage lazy" data-src="<?php $image = wp_get_attachment_image_src( $attachment_id, $image_size ); echo($image[0]); ?>"></div>
												<?php }?>
											<?php } else if(get_sub_field('service_icon')) { ?>
													<div class='largeIcon'><?php echo the_sub_field('service_icon'); ?></div>
											<?php }  ?>
											<?php if(get_sub_field('service_header')){?><h3><?php echo the_sub_field('service_header'); ?></h3><?php } ?>
											<?php if(get_sub_field('service_copy')){ echo the_sub_field('service_copy'); } ?>
											<?php if(get_sub_field('service_call_to_action_url')){ ?>
												<?php if(get_sub_field('service_call_to_action_label')){ ?>
													<a class="readMore" href="<?php echo the_sub_field('service_call_to_action_url');?>" title="<?php echo the_sub_field('service_call_to_action_label');?>"><?php echo the_sub_field('service_call_to_action_label');?></a>
												<?php }else{ ?>
													<a class="readMore" href="<?php echo the_sub_field('service_call_to_action_url');?>" title="<?php _e('Find out more', 'blue-theme-v3-0');?>"><?php _e('Find out more', 'blue-theme-v3-0');?></a>
												<?php } ?>
											<?php } ?>
											</div>
										</div><?php endwhile; ?>
									</div>
								<?php endif; ?>
								<?php if(get_sub_field('section_form')){?><div class="copyWrapper"><div class="formWrapper"><?php echo do_shortcode(get_sub_field('section_form')); ?></div></div><?php } ?>
							</div>
						<?php } elseif(get_sub_field('section_type') == 'carousel'){ ?>
							<div class="carouselWrapper center">
								<?php if(get_sub_field('section_header')){?><h2><?php echo the_sub_field('section_header'); ?></h2><?php } ?>
								<div class="carousel owl-carousel">
									<?php while(have_rows('carousel')): the_row(); ?>
										<div class="slide">
											<?php if(get_sub_field('slide_image')){?>
												<div class="slideImage lazy" data-src="<?php $attachment_id = attachment_url_to_postid(the_sub_field('slide_image')); $size = "banner"; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo($image[0]); ?>">

												</div>
											<?php }?>
											<?php if(get_sub_field('slide_caption')){?>
												<?php if(get_sub_field('slide_call_to_action_url')){?>
													<span class="slideCaption"><?php echo the_sub_field('slide_caption');?> <span>|</span> <a href="<?php echo the_sub_field('slide_call_to_action_url');?>" title="<?php echo the_sub_field('slide_call_to_action_label');?>"><?php echo the_sub_field('slide_call_to_action_label');?></a></span>
												<?php } else { ?>
													<span class="slideCaption"><?php echo the_sub_field('slide_caption');?> </span>
												<?php }?>
											<?php }?>
										</div>
									<?php endwhile; ?>
								</div>
								<?php if(get_sub_field('section_form')){?><div class="copyWrapper"><div class="formWrapper"><?php echo do_shortcode(get_sub_field('section_form')); ?></div></div><?php } ?>
							</div>
						<?php } elseif(get_sub_field('section_type') == 'testimonials'){ ?>
							<div class="widthWrapper testimonialsWrapper">
								<?php if(get_sub_field('section_header')){?><h2><?php echo the_sub_field('section_header'); ?></h2><?php } ?>
								<div class="carousel testimonials <?php $testimonials = count(get_sub_field('testimonial')); if($testimonials > 1){ echo'owl-carousel';}?>">
									<?php while(have_rows('testimonials')): the_row(); ?>
										<div class="slide">
											<?php if(get_sub_field('testimonial')){?>
												<blockquote><?php echo the_sub_field('testimonial'); ?></blockquote>
											<?php }?>
											<?php if(get_sub_field('citation')){?>
													<cite><?php echo the_sub_field('citation'); ?></cite>
											<?php }?>
										</div>
									<?php endwhile; ?>
								</div>
								<?php if(get_sub_field('section_form')){?><div class="copyWrapper"><div class="formWrapper"><?php echo do_shortcode(get_sub_field('section_form')); ?></div></div><?php } ?>
							</div>
						<?php } ?>
					</div>	
				</div>
			</section>
			<?php if($content==true && get_field('make_first_section_the_introduction') && $rowCount==1) { ?>
			<section id="content" class="mainContentSection">
				<div class="sectionFlex contentSection">
					<div class="innerPadding">
						<div class="widthWrapper">
							<div class="copyWrapper">
								<?php the_content();?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php } ?>
		<?php $rowCount++; endwhile; reset_rows();  ?>
	<?php endif; ?>
	<?php if(is_single() && !is_woocommerce()) {
		comments_template();
	 }?>
</div>
