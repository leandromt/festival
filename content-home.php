<h2>Conteúdo do Site</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem ullam obcaecati, excepturi dolorem nostrum, aliquid quasi laboriosam non voluptate, totam assumenda facere nobis cumque rerum vero! Possimus aliquam, modi fuga aspernatur, aliquid saepe aut id. Aliquam natus consequuntur illum itaque unde. Atque sint debitis dicta molestias, quis voluptates aliquid laborum.</p>

<section class="container-fluid col-1140" role="main">

	<article class="row">
		<h2 class="title-bold">Novidades</h2>
	<?php 
		
		// Get 3 Last Posts 
		if (have_posts()):

			echo "<ul>";

			$i = 0;
			while (have_posts()): the_post();
				$i++;
				if($i <= 3){
					#printf('<li>Post: %s, title: %s, content: %s</li>', $post->ID, $post->post_title, $post->post_content);
					printf('<div class="col-lg-4 col-xs-12 item-novidades"><a href="%s"><figure>%s<figcaption>%s</figcaption></figure></a></div>', get_the_permalink(), get_the_title(), get_the_post_thumbnail());
				}
			endwhile;

			echo "</ul>";

		else:

			echo "<p>Nenhum post cadastrado!</p>";

		endif;

	?>
       
  
           


	<?php 
		
		// Get all posts type programacao
		$args = array('post_type'=>array('posts', 'programacao'));
		query_posts($args);

		if (have_posts()):

			echo "<ul>";
			while (have_posts()): the_post();
				printf('<li><p>%s</p><figure><img src="%s"></figure></li>', get_the_title(), get_the_post_thumbnail_url());
			endwhile;
			echo "</ul>";

		else:

			echo "<p>Nenhuma programação cadastrado!</p>";

		endif;

	?>



</section>