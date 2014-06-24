<?php 

// function show_content_slider() {
// 	include(TEMPLATEPATH.'/templates/slider/-content-slider-1.php');
// }

function show_slider_top($postfix='1') {
	include(TEMPLATEPATH.'/templates/slider/slider-'.$postfix.'.php');
}



function true_thumbnail_url_only( $html ) {
	return preg_replace('#.*src="([^\"]+)".*#', '\1', $html );
}
// add_filter('post_thumbnail_html', 'true_thumbnail_url_only', 10, 5);

function blog_row_start($postfix='') {
	echo '<SECTION>
	<DIV class="container'.(($postfix=='') ? '': '-'.$postfix).'">
		<DIV class="row">';
}

function blog_row_end() {
	echo '</DIV>
		</DIV>
		</SECTION>
	';
}


function savage_get_post_content_loop()
{
	global $post;
	$theme_option = get_option('savage-tw-bt-theme');

	$link = get_the_permalink();
	$title = get_the_title();
	$author = get_the_author();
	
	$thumb1 = get_the_post_thumbnail();
	$thumb_pict = true_thumbnail_url_only($thumb1);
	$thumb = '';
	if ($theme_option['show-thumb'] == 'on') {
		$thumb = get_the_post_thumbnail().' ';
	}
	
	echo '<h2 class="blog-post-title">'.$thumb.'<a href="'.$link.'" rel="bookmark">'.$title.'</a></h2>';

	if(!empty($post->post_excerpt)) {
		the_excerpt();
	}
	else
	{
		the_content('', FALSE,'' );
	}

	echo '<br>';
	echo '<p class="help-block">';
	if ($theme_option['show-author'] == 'on') {
		printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
			'meta-prep meta-prep-author',
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				$link,
				esc_attr( get_the_time() ),
				get_the_date()
				),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), $author ) ),
				$author
				)
			);
	}
	
	if ($theme_option['show-rubrics'] == 'on') {
		if (get_the_category_list()) {
			echo '<br>';
			echo ' <span>'.__('Categories: ').get_the_category_list(',').'</span>';
		}
	}
	if ($theme_option['show-tags'] == 'on') {
		if( get_the_tag_list() ){
			echo ' <span>'.__('Tags: ').get_the_tag_list('',',','').'</span>';
		}
	}

	echo '</p>';



	echo '
	<p>
	<span class="pull-left">
	<a class="btn btn-primary btn-xs" href="'.$link.'">Подробнее ...</a>
	</span>
	<div class="pull-right">
	<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yashareLink="'.$link.'" data-yashareTitle="'.$title.'" data-yashareImage="'.$thumb_pict.'" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,gplus" data-yashareTheme="counter"></div>
	</div>
	</p>
	';

}

function savage_get_post_content()
{
	global $post;
	$theme_option = get_option('savage-tw-bt-theme');

	$link = get_the_permalink();
	$title = get_the_title();
	$author = get_the_author();
	
	$thumb1 = get_the_post_thumbnail();
	$thumb_pict = true_thumbnail_url_only($thumb1);
	$thumb = '';
	if ($theme_option['show-thumb'] == 'on') {
		$thumb = get_the_post_thumbnail().' ';
	}
	
	echo '<h2 class="blog-post-title">'.$thumb.'<a href="'.$link.'" rel="bookmark">'.$title.'</a></h2>';

	the_content('', more_link_text, strip_teaser);

	echo '<br>';
	echo '<p class="help-block">';
	if ($theme_option['show-author'] == 'on') {
		printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
			'meta-prep meta-prep-author',
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				$link,
				esc_attr( get_the_time() ),
				get_the_date()
				),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), $author ) ),
				$author
				)
			);
	}
	
	if ($theme_option['show-rubrics'] == 'on') {
		if (get_the_category_list()) {
			echo '<br>';
			echo ' <span>'.__('Categories: ').get_the_category_list(',').'</span>';
		}
	}
	if ($theme_option['show-tags'] == 'on') {
		if( get_the_tag_list() ){
			echo ' <span>'.__('Tags: ').get_the_tag_list('',',','').'</span>';
		}
	}

	echo '</p>';




	echo '
	<p>
	<div class="pull-right">
	<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yashareLink="'.$link.'" data-yashareTitle="'.$title.'" data-yashareImage="'.$thumb_pict.'" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,gplus" data-yashareTheme="counter"></div>
	</div>
	</p>
	';

}

function savage_widgets_init () {

	register_sidebar( array(
		'name'          => __( 'Header Widget', 'savage' ),
		'id'            => 'Header',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	// left-right sidebars
	// LEFT
	register_sidebar( array(
		'name'          => __( 'Front page only (left)', 'savage' ),
		'id'            => 'front-page-only-left',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	register_sidebar( array(
		'name'          => __( 'Sidebar all (left)', 'savage' ),
		'id'            => 'sidebar-all-left',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	register_sidebar( array(
		'name'          => __( 'Sidebar page (left)', 'savage' ),
		'id'            => 'sidebar-page-left',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	register_sidebar( array(
		'name'          => __( 'Sidebar post (left)', 'savage' ),
		'id'            => 'sidebar-post-left',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	register_sidebar( array(
		'name'          => __( 'Sidebar post list (left)', 'savage' ),
		'id'            => 'sidebar-post-list-left',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );


	// RIGHT
	register_sidebar( array(
		'name'          => __( 'Front page only (right)', 'savage' ),
		'id'            => 'front-page-only-right',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	register_sidebar( array(
		'name'          => __( 'Sidebar all (right)', 'savage' ),
		'id'            => 'sidebar-all-right',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	register_sidebar( array(
		'name'          => __( 'Sidebar page (right)', 'savage' ),
		'id'            => 'sidebar-page-right',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	register_sidebar( array(
		'name'          => __( 'Sidebar post (right)', 'savage' ),
		'id'            => 'sidebar-post-right',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );

	register_sidebar( array(
		'name'          => __( 'Sidebar post list (right)', 'savage' ),
		'id'            => 'sidebar-post-list-right',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div><div class="panel-body">',
		) );


	// footer section
	$theme_option = get_option('savage-tw-bt-theme');
	$footer_widget_count = $theme_option['widgets-footer-count-row-1'];
	for($i = 1; $i<= $footer_widget_count; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget 1.'.$i, 'savage' ),
			'id'            => 'footer1-'.$i,
			'before_widget' => '<div class="panel panel-default">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="panel-heading">',
			'after_title'   => '</div><div class="panel-body">',
			) );
	}
	$footer_widget_count = $theme_option['widgets-footer-count-row-2'];
	for($i = 1; $i<= $footer_widget_count; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget 2.'.$i, 'savage' ),
			'id'            => 'footer2-'.$i,
			'before_widget' => '<div class="panel panel-default">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="panel-heading">',
			'after_title'   => '</div><div class="panel-body">',
			) );
	}

}

add_action( 'widgets_init', 'savage_widgets_init' );

function savage_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'savage_scripts_with_jquery' );

register_nav_menus( array(
	'primary'   => __('Primary', 'menu-primary'),
	// 'footer'    => __('Footer', 'menu-footer')
	));


include('admin/settings.php');

add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_theme_support( 'post-thumbnails' );


add_action( 'init', 'true_register_post_type_init' ); // Использовать функцию только внутри хука init
 
function true_register_post_type_init() {
	$labels = array(
		'name' => __('Savage-slider'),
		'singular_name' => __('Slider'), // админ панель Добавить->Функцию
		'add_new' => __('Add slider page'),
		'add_new_item' => __('Add slider'), // заголовок тега <title>
		'edit_item' => __('Edit slider'),
		'new_item' => __('New slider'),
		'all_items' => __('All sliders'),
		'view_item' => __('Show on site'),
		'search_items' => __('Search slider'),
		'not_found' =>  __('Slider not found'),
		'not_found_in_trash' => __('Slider not found in trash'),
		'menu_name' => __('Sliders') // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		//'has_archive' => true, 
		//'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
		'menu_position' => 20, // порядок в меню
		'supports' => array( 'title', 'editor' ,'excerpt')
	);
	register_post_type('Savage-slider', $args);
}

?>
