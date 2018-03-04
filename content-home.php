<h2>Conteúdo do Site</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem ullam obcaecati, excepturi dolorem nostrum, aliquid quasi laboriosam non voluptate, totam assumenda facere nobis cumque rerum vero! Possimus aliquam, modi fuga aspernatur, aliquid saepe aut id. Aliquam natus consequuntur illum itaque unde. Atque sint debitis dicta molestias, quis voluptates aliquid laborum.</p>


<?php 
	
	if (have_posts()):

		echo "<ul>";

		while (have_posts()): the_post();
			#printf('<li>Post: %s, title: %s, content: %s</li>', $post->ID, $post->post_title, $post->post_content);
			printf('<li><a href="%s">%s</a><p>%s</p><figure><img src="%s"></figure></li>', get_the_permalink(), get_the_title(), get_the_content(), get_the_post_thumbnail_url() );
		endwhile;

		echo "</ul>";

	else:

		echo "<p>Nenhum post cadastrado!</p>";

	endif;

?>