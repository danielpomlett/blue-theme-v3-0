</div><!-- #mainWrapper END -->
</div><!-- #outerWrapper END -->
<div class="footerWrapper">
	<div class="footerWrapperInner">
		<div class="footerWidgetArea">
			<div class="innerPadding">
				<div class="grid collapse">
					<?php if(get_theme_mod( 'blue_theme_logo_footer')){?>
					<div class="column03">
						<div class="logoWrapper">
					        <a href="<?php echo get_site_url(); ?>" id="logoFooter" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
								<span><img src='<?php echo esc_url( get_theme_mod( 'blue_theme_logo_footer' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></span>
							</a>
						</div>
						<?php if ( get_theme_mod( 'blue_theme_twitter' )||get_theme_mod( 'blue_theme_facebook' )||get_theme_mod( 'blue_theme_instagram' )||get_theme_mod( 'blue_theme_youtube' )){?>
						<ul class="footerSocial">
							<?php 
							if ( get_theme_mod( 'blue_theme_twitter' ) ){echo '<li class="navIcon"><a href="'.get_theme_mod( 'blue_theme_twitter' ).'" target="blank" class="fab fa-twitter"><span>Twitter</span></a></li>';}
						    if ( get_theme_mod( 'blue_theme_facebook' ) ){echo '<li class="navIcon"><a href="'.get_theme_mod( 'blue_theme_facebook' ).'" target="blank" class="fab fa-facebook-f"><span>Facebook</span></a></li>';}
						    if ( get_theme_mod( 'blue_theme_instagram' ) ){echo '<li class="navIcon"><a href="'.get_theme_mod( 'blue_theme_instagram' ).'" target="blank" class="fab fa-instagram"><span>Instagram</span></a></li>';}
						    if ( get_theme_mod( 'blue_theme_youtube' ) ){echo '<li class="navIcon"><a href="'.get_theme_mod( 'blue_theme_youtube' ).'" target="blank" class="fab fa-youtube"><span>YouTube</span></a></li>';}
						    ?>
						</ul>
						<?php } ?>
						<p class="copyright">
							<?php _e('© ', 'blue-theme-v3-0'); bloginfo('name'); echo date(" Y"); ?>
						</p>
					</div>
					<?php } ?>
					<?php if ( has_nav_menu( 'footer_menu_01' ) ) {?>
					<div class="column03">
						<div class="widgetPadding">
							<h3><?php 
								$locations = get_nav_menu_locations();
								$menu = wp_get_nav_menu_object($locations['footer_menu_01']);echo $menu->name; ?></h3>
							<nav class="footerNav">
								<?php wp_nav_menu(array('theme_location' => 'footer_menu_01', 'container_class'  => 'menu'));?>
							</nav>
						</div>
					</div>
					<?php } ?>
					<?php if ( has_nav_menu( 'footer_menu_02' ) ) {?>
					<div class="column03">
						<div class="widgetPadding">
							<h3><?php 
								$locations = get_nav_menu_locations();
								$menu = wp_get_nav_menu_object($locations['footer_menu_02']);echo $menu->name; ?></h3>
							<nav class="footerNav">
								<?php wp_nav_menu(array('theme_location' => 'footer_menu_02', 'container_class'  => 'menu'));?>
							</nav>
						</div>
					</div>
					<?php } ?>
					<?php if ( has_nav_menu( 'footer_menu_03' ) ) {?>
					<div class="column03">
						<div class="widgetPadding">
							<h3><?php 
								$locations = get_nav_menu_locations();
								$menu = wp_get_nav_menu_object($locations['footer_menu_03']);echo $menu->name; ?></h3>
							<nav class="footerNav">
								<?php wp_nav_menu(array('theme_location' => 'footer_menu_03', 'container_class'  => 'menu'));?>
							</nav>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
jQuery(document).ready(function(){
		jQuery('.button').wrap( "<span class='buttonWrapper'></span>" );
});
</script>
</body>
<?php wp_footer(); ?>
</html>