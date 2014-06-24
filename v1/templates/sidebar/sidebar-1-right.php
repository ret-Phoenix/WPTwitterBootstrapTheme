<?php


if (is_front_page()) {
	if ((is_active_sidebar('sidebar-all-right')) or (is_active_sidebar('front-page-only-right'))) {
		echo '<div class="widget col-lg-3">';
		dynamic_sidebar('sidebar-all-right');
		dynamic_sidebar('front-page-only-right');	
		echo '</div>';
	}
}

if (is_single()) {
	if ((is_active_sidebar('sidebar-all-right')) or (is_active_sidebar('sidebar-post-right'))) {
		echo '<div class="widget col-lg-3">';
		dynamic_sidebar('sidebar-all-right');
		dynamic_sidebar('sidebar-post-right');	
		echo '</div>';
	}
}

if (is_page()) {
	if ((is_active_sidebar('sidebar-all-right')) or (is_active_sidebar('sidebar-page-right'))) {
		echo '<div class="widget col-lg-3">';
		dynamic_sidebar('sidebar-all-right');
		dynamic_sidebar('sidebar-page-right');	
		echo '</div>';
	}
}

if (is_archive()) {
	if ((is_active_sidebar('sidebar-all-right')) or (is_active_sidebar('sidebar-post-list-right'))) {
		echo '<div class="widget col-lg-3">';
		dynamic_sidebar('sidebar-all-right');
		dynamic_sidebar('sidebar-post-list-right');
		echo '</div>';
	}
}


?>