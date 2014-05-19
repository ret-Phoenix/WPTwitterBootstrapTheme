<SECTION>
	<DIV class="container">
		<DIV class='row'>
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
