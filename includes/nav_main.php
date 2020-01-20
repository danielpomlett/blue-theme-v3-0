<header class="collapse headerWrapper <?php if(!(is_home() || is_archive())){ echo 'hasIntro ';}?>">
	<?php if ( get_theme_mod( 'blue_theme_logo' ) ) : ?>
	<div class="mobileNavWrapper">	
	    <div class="logoWrapper flex">
	        <a href="<?php echo get_site_url(); ?>" id="logo" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
				<span><img class="mainLogo" src="<?php echo esc_url( get_theme_mod( 'blue_theme_logo' ) ); ?>"
					alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'><?php if ( get_theme_mod( 'blue_theme_inverted_logo' ) ) : ?><img class="invertedLogo" src="<?php echo esc_url( get_theme_mod( 'blue_theme_inverted_logo' ) ); ?>"
					alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'><?php endif; ?></span>
			</a>
		</div>
		<div class="mobileButtonWrapper">
			<div class="mobileButton">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div>
		</div>
	</div>
	<?php list($width, $height) = getimagesize(esc_url( get_theme_mod( 'blue_theme_logo' ) ));
		if($width >= $height*1.25) {
			if($navCenter){
				$divider = $width/250;
			}else {
				$divider = $width/300;
			}
		}else {
			if($navCenter){
				$divider = $width/150;
			}else {
				$divider = $width/100;
			}
		}
		$width = $width/$divider;
		$height = $height/$divider;
		$widthSmall = $width/1.5;
		$heightSmall = $height/1.5;
		$paddingTop = $height+20;
		$paddingTop2 = $height+40;
		$paddingTop3 = $height+100;
		$paddingTopSmall = ($height/1.5)+30;
		$mobileButtonPos = ($height/2)-10;
		echo"<style>
		.logoWrapper img {
			width:{$width}px;
		    height:auto;
		}
		.section:first-child .innerPadding{
	        padding-top:{$paddingTop}px;
	    }
		@media screen and (min-width: 65em){
			.logoWrapper img {
			}
			.mainNav {
		    	height:{$height}px;
			}
			.section:first-child .innerPadding{
		        padding-top:{$paddingTop2}px;
		    }
		    .navCenter .section:first-child .innerPadding{
		        padding-top:{$paddingTop3}px;
		    }
		}
		@media screen and (min-height:800px) and (min-width:65em) {
			.header-small .logoWrapper img{
				width:{$widthSmall}px;
			}
			.header-small .mainNav{
				height:{$heightSmall}px;
			}
		}
	</style>";
		 ?>
	<?php else : ?>
	<div class="mobileNavWrapper noLogo">	
        <a href="<?php echo get_site_url(); ?>" id="logo">
			<h1><?php bloginfo( 'name' ); ?></h1>
		</a>
		<div class="mobileButtonWrapper">
			<div class="mobileButton">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<nav class="navWrapper flex">
		<div class="mainNav flex">
			<?php if ( has_nav_menu( 'main_menu' ) ) {
				wp_nav_menu(array('theme_location' => 'main_menu', 'container_class'  => 'menu'));
			}else{ ?>
				<nav class="navWrapper flex">
					<div class="mainNav flex">
						<div class="menu">
							<ul>
								<li class="page_item">Set the main menu in the <a style="text-decoration:underline;" href="<?php echo esc_url( wp_login_url() ); ?>" alt="<?php esc_attr_e( 'Login', 'textdomain' ); ?>">dashboard</a></li>
							</ul>
						</div>
					</div>
				</nav>
			<?php } ?>
		</div>
	</nav>
</header>