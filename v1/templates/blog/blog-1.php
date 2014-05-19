<SECTION>
	<DIV class="container">
		<DIV class='row'>
			<DIV class="col-sm-9">

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
				<li class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></li>
				<li class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></li>
			</ul>
			


			<?php

// $query = new WP_Query( array(
//     'post_type' => 'post',
//     'meta_query' => array(
//         array(
//             'key' => 'savage_on_post_slider',
//             'value' => '1',
//         ),
//     ),
// ) );

// $query = query_posts('meta_key=savage_on_post_slider&meta_value=1&numberposts=-1');




			?>
		</DIV>
