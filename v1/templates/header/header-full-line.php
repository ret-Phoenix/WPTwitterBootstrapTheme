<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet"> 
	<?php wp_head(); ?>
</head><!--/head-->

<body <?php body_class() ?>>

	<header id="header" class="navbar navbar-default" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"><?php _e('Toggle navigation', ''); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php // logo();?>
			</div>

			<div class="hidden-xs">
				<?php 
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => false,
						'menu_class'      => 'nav navbar-nav navbar-main',
						'fallback_cb'     => 'wp_page_menu',
            // 'walker'          => new wp_bootstrap_navwalker()
						)
					); 
				}
				?>
			</div>
		</div>
  </header><!--/#header-->