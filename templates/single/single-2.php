<?php
get_header();
blog_row_start();
	//get_sidebar('right');
?>	
		<DIV class="col-sm-9">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<DIV class="blog-post">
					<?php savage_get_post_content(); ?>
				</DIV>
				<BR>
					<hr>
					<?php comments_template(); ?>
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, this page does not exist.'); ?></p>
			<?php endif; ?>
		</DIV>
<?php	
	get_sidebar('left');
blog_row_end();
get_footer(); 
?>

