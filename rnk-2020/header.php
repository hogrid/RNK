<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta charset="utf-8"/>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="HandheldFriendly" content="true">
	
	<link rel="stylesheet" href="https://use.typekit.net/okk3qnl.css">

	<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css" type="text/css" />   

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?= get_template_directory_uri() ?>/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?= get_template_directory_uri() ?>/img/favicon/safari-pinned-tab.svg" color="#f04e23">
	<link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/img/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#000000">
	<meta name="msapplication-config" content="<?= get_template_directory_uri() ?>/img/favicon/browserconfig.xml">
	<meta name="theme-color" content="#000000">	

	<?php wp_head(); ?>
</head>
<body>
	
<?php if ( is_front_page() ) : ?>
<header id="header">
<?php else : ?>
<header id="header" class="header-interna">
<?php endif; ?>	

	<div class="content-wrap">
		<div class="header-mobile">
			<a href="#" class="btn-mobile"></a>
		</div>
		
		<h1 class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><img src="<?php the_field('options-logo-01', 'option'); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" class="img-100"></a>
		</h1>
		
		<?php wp_nav_menu( array( 'theme_location' => 'menu-topo', 'container_class' => 'nav' ) ); ?>

		<div class="clear"></div>
	</div>	
</header>