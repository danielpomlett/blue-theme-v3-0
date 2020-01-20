<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
	<head>
		<link rel="icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon.ico" type="image/x-icon">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/style.css"/>
		<!--[if lte IE 8]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/no_mqs.css" />
		<![endif]-->
		<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie7.css" />
		<![endif]-->
		<?php wp_head(); ?> 
	</head>
	<body <?php body_class(); ?>>
	<div class="outerWrapper <?php if(!get_theme_mod( 'blue_theme_logo')){echo'navCenter';}else{echo get_theme_mod('blue_theme_header_layout');}?>">
		<div class="mainWrapper">
			<?php include_once("includes/nav_main.php"); ?>