<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
	
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet"> 
	<?php wp_head(); ?>
</head>

<body>
	<SECTION>
		<DIV class="container">
			<div id="header" class="navbar navbar-inverse navbar-fixed-top" role="banner">
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
            					//'walker'          => new wp_bootstrap_navwalker()
								)
							); 
						}
						?>
					</div>
				</div>
			</div><!--/#header-->

		</DIV>
		
	</SECTION>
	