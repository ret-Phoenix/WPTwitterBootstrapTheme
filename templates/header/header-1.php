<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet"> 
	<?php wp_head(); ?>

  <script>
  // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  // ga('create', 'UA-18652078-1', 'itpath.ru');
  // ga('send', 'pageview');

  </script>    

</head>

<body <?php body_class() ?>>

  <?php
  $theme_options = get_option('savage-tw-bt-theme');
  echo $theme_options['add-header'];
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
  <div class="container-fluid">
    <div class="row">
      <DIV class='row navbar navbar-default'>
        <DIV class='col-sm-3'></DIV>
        <DIV class='col-sm-6'>
          <header id="header" class="collapse navbar-collapse" role="banner">

            <?php 
            if ( has_nav_menu( 'primary' ) ) {
             wp_nav_menu( array(
              'theme_location'  => 'primary',
              'container'       => false,
              'menu_class'      => 'nav navbar-nav navbar-main',
              'fallback_cb'     => 'wp_page_menu',
              'walker'          => new wp_bootstrap_navwalker()
              )
             ); 
           }
           ?>

         </header><!--/#header-->
       </div>
       <DIV class='col-sm-3'></DIV>
     </DIV>
   </DIV>
 </DIV>


