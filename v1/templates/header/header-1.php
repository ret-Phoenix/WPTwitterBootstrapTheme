<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet"> 
	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

  <?php
  $theme_options = get_option('savage-tw-bt-theme');
  if ($theme_options['show-slider-content'] == 'on') {
    show_content_slider();
  }

  ?>


  <?php
  if (header_image()) {
    ?> 
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    <?php  
  }

  if ($theme_options['show-slider-top'] == 'on') {
    show_slider_top();
  }


  ?>
  <div class="container">
    <DIV class='row'>
      <DIV class='col-sm-12'>
        <header id="header" class="navbar navbar-default" role="banner">
         <div>
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
     </header><!--/#header-->
   </DIV>
 </DIV>

</div>