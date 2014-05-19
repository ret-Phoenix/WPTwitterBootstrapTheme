<?php


if (is_front_page()) {
	if ((is_active_sidebar('sidebar-all')) or (is_active_sidebar('Front page only'))) {
		echo '<div class="widget col-lg-3">';
		dynamic_sidebar('Sidebar-all');
		dynamic_sidebar('Front page only');	
		echo '</div>';
	}
}

if (is_single()) {
	if ((is_active_sidebar('sidebar-all')) or (is_active_sidebar('Sidebar post'))) {
		echo '<div class="widget col-lg-3">';
		dynamic_sidebar('Sidebar-all');
		dynamic_sidebar('Sidebar post');	
		echo '</div>';
	}
}

if (is_page()) {
	if ((is_active_sidebar('sidebar-all')) or (is_active_sidebar('Sidebar page'))) {
		echo '<div class="widget col-lg-3">';
		dynamic_sidebar('Sidebar-all');
		dynamic_sidebar('Sidebar page');	
		echo '</div>';
	}
}

if (is_archive()) {
	if ((is_active_sidebar('sidebar-all')) or (is_active_sidebar('Sidebar post list'))) {
		echo '<div class="widget col-lg-3">';
		dynamic_sidebar('Sidebar-all');
		dynamic_sidebar('Sidebar post list');	
		echo '</div>';
	}
}


?>