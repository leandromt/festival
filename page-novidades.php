<?php

/**
*
* Template Page Novidades
*
**/

?>


<!-- NOVIDADES -->
<article class="row">
	<h2 class="title-bold">Novidades</h2>

	<?php // Get Posts
		$args = array('post_type' => 'post');
		query_posts($args);

		if (have_posts()): 

			while (have_posts()): the_post(); ?>
	
				<div class="col-lg-4 col-xs-12 item-novidades">
					<a href="<?php echo get_the_permalink() ?>">
						<figure><?php echo get_the_post_thumbnail() ?>
							<figcaption><?php echo get_the_title() ?></figcaption>
						</figure>
					</a>
				</div>
	
			<?php endwhile;

		else: ?>

		<p>Nenhum post cadastrado!</p>

	<?php endif; wp_reset_query(); ?>

</article>
<!-- /NOVIDADES -->


<hr>