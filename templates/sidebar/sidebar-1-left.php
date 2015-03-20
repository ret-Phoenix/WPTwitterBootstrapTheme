<?php

if (is_front_page()) {
	if ((is_active_sidebar('sidebar-all-left')) or (is_active_sidebar('front-page-only-left'))) {
		echo '<div class="widget col-xs-12 col-md-3">';
		dynamic_sidebar('sidebar-all-left');
		dynamic_sidebar('front-page-only-left');	
		echo '</div>';
	}
}

if (is_single()) {
	if ((is_active_sidebar('sidebar-all-left')) or (is_active_sidebar('sidebar-post-left'))) {
		echo '<div class="widget col-xs-12 col-md-3">';
		dynamic_sidebar('sidebar-all-left');
		dynamic_sidebar('sidebar-post-left');	
		echo '</div>';
	}
}

if (is_page()) {
	if ((is_active_sidebar('sidebar-all-left')) or (is_active_sidebar('sidebar-page-left'))) {
		echo '<div class="widget col-xs-12 col-md-3">';
		dynamic_sidebar('sidebar-all-left');
		dynamic_sidebar('sidebar-page-left');	
		echo '</div>';
	}
}

if (is_archive()) {
	if ((is_active_sidebar('sidebar-all-left')) or (is_active_sidebar('sidebar-post-list-left'))) {
		echo '<div class="widget col-xs-12 col-md-3">';
		dynamic_sidebar('sidebar-all-left');
		dynamic_sidebar('sidebar-post-list-left');
		echo '</div>';
	}
}


?>