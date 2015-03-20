<?php
get_header();
blog_row_start();
	// get_sidebar('right');
	include(TEMPLATEPATH.'/templates/blog/blog-1.php');
	get_sidebar('left');
blog_row_end();
get_footer(); 
?>