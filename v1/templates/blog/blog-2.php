<DIV class="col-sm-6">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<DIV class="blog-post">
			<?php savage_get_post_content_loop(); ?>
		</DIV>
		<BR>
			<hr>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

	<ul class="pager">
		<li class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'savage' ) ); ?></li>
		<li class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'savage' ) ); ?></li>
	</ul>
</DIV>
