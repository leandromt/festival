<h2>Conteúdo do Site</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem ullam obcaecati, excepturi dolorem nostrum, aliquid quasi laboriosam non voluptate, totam assumenda facere nobis cumque rerum vero! Possimus aliquam, modi fuga aspernatur, aliquid saepe aut id. Aliquam natus consequuntur illum itaque unde. Atque sint debitis dicta molestias, quis voluptates aliquid laborum.</p>

<section class="container-fluid col-1140" role="main">




	<article class="row bg-trailer">
		<?php 
			
			// Get Sigle Post Trailer
			$args = array('post_type'=>array('posts', 'trailer'));
			query_posts($args);

			// Get 3 Last Posts 
			if (have_posts()):

				echo "<ul>";

				$i = 0;
				while (have_posts()): the_post();
					$i++;
					if($i == 1){
						printf('<h3 class="title-tiny">%s</h3><div class="video-wrap"><div class="embed-responsive embed-responsive-16by9 video-box">%s</div></div>', get_the_title(), get_the_content());
					}
				endwhile;

				echo "</ul>";

			else:

				echo "<p>Nenhum trailer cadastrado!</p>";

			endif;
			wp_reset_query();

		?>
    </article>





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
	</article>
       
  
           

	<article class="row">
		<h2 class="title-bold">Programação</h2>
		<h3 class="title-tiny">Fique por dentro das atrações já confirmadas no FESTIVAL VIDA E ARTE 2018.</h3>
		<div class="attractions" role="contentinfo">
		<?php 
			
			// Get all posts type programacao
			$args = array('post_type'=>array('posts', 'programacao'));
			query_posts($args);

			if (have_posts()):

				// Get First Post
				$i = 0;
				while (have_posts()): the_post();
					$i++;
					if($i == 1){
						printf('<figure class="main-attraction" data-name="%s">%s</figure>', get_the_title(), get_the_post_thumbnail());
					}
				endwhile;

				// Get List Posts
				echo '<ul class="artists animatedParent" data-sequence="200" data-appear-top-offset="-300">';
				$i = 0;
				while (have_posts()): the_post();
					$i++;
					if($i > 1){
						printf('<li class="animated flipInY" data-id="1"><figure>%s<figcaption>%s</figcaption></figure></li>', get_the_post_thumbnail(), get_the_title());
					}
				endwhile;
				echo '</ul>';


			else:

				echo "<p>Nenhuma programação cadastrado!</p>";

			endif;
			wp_reset_query();
		?>
		</div>
		<div><a class="btnDefault center" href="" role="button">Mais atrações</a></div>
	</article>






	<article class="row">
		<h2 class="title-bold">Patrocinadores</h2>
		<?php 
			
			// Get All Posts Type Patrocinadores
			$args = array('post_type'=>array('posts', 'patrocinadores'));
			query_posts($args);

			if (have_posts()):

				echo "<ul>";
				while (have_posts()): the_post();

					printf('<li>%s</div>', get_the_post_thumbnail());

				endwhile;
				echo "</ul>";

			else:

				echo "<p>Nenhum patrocinador cadastrado!</p>";

			endif;
			wp_reset_query();

		?>
	</article>



</section>