<?php
/*
Template Name: Holding page
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>
	<link rel="icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon.ico" type="image/x-icon">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i" rel="stylesheet">
	<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/no_mqs.css" />
	<![endif]-->
	<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie7.css" />
	<![endif]-->
	<?php wp_head(); ?> 
</head>
<body>
	<div class="contentWrapper holdingPage">
		<div class="widthWrapper">
			<div class="outerPadding">
				<div class="holdingLogo"></div>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
					<header class="mainHeader">
						<h1><?php the_title(); ?></h1>
					</header>
					<section class="mainBody">
						<?php the_content(); ?>
					</section>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</body>
<?php wp_footer(); ?>
</html>
	