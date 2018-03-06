<?php

/**
*
* Template Home Page
*
**/

?>

<?php #bloginfo(); ?>
<?php #echo get_bloginfo(); ?>

<section class="container-fluid col-1140" role="main">




	<!-- TRAILER -->
	<article class="row bg-trailer">

		<?php // Get Sigle Post Trailer
			
			$args = array('post_type'=>array('posts', 'trailer'), 'posts_per_page' => '1');
			query_posts($args);

			if (have_posts()): 
		
				while (have_posts()): the_post(); ?>
					
					<h3 class="title-tiny"><?php echo get_the_title(); ?></h3>
					<div class="video-wrap">
						<div class="embed-responsive embed-responsive-16by9 video-box"><?php echo get_the_content() ?></div>
					</div>

				<?php endwhile;

			else: ?>

				<p>Nenhum trailer cadastrado!</p>

			<?php endif; 

			wp_reset_query(); 

		?>

    </article>
    <!-- /TRAILER -->






	<!-- NOVIDADES -->
	<article class="row">
		<h2 class="title-bold">Novidades</h2>

		<?php // Get 3 Last Posts

			$args = array('posts_per_page' => '3');
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



       
  
           
	<!-- PROGRAMACAO -->
	<article class="row">
		<h2 class="title-bold">Programação</h2>
		<h3 class="title-tiny">Fique por dentro das atrações já confirmadas no FESTIVAL VIDA E ARTE 2018.</h3>
		<div class="attractions" role="contentinfo">
		<?php 


			// Get first posts type programacao
			$args = array('post_type'=>array('posts', 'programacao'), 'posts_per_page' => '1');
			query_posts($args);

			if (have_posts()):

				while (have_posts()): the_post(); ?>

					<figure class="main-attraction" data-name="<?php echo get_the_title() ?>">
						<?php echo get_the_post_thumbnail() ?>
					</figure>

				<?php endwhile;

			else: ?>

				<p>Nenhuma programação cadastrado!</p>

			<?php endif; 
			wp_reset_query();




			// Get other posts type programacao
			$args = array('post_type'=>array('posts', 'programacao'), 'offset' => '1');
			query_posts($args); 

			if (have_posts()): ?>

				<ul class="artists animatedParent" data-sequence="200" data-appear-top-offset="-300">
				<?php $dataId = 0;
				while (have_posts()): the_post(); ?>
					
					<?php $dataId++; ?>
					<li class="animated flipInY" data-id="<?php echo $dataId; ?>">
						<figure>
							<?php echo get_the_post_thumbnail() ?>
							<figcaption><?php echo get_the_title() ?></figcaption>
						</figure>
					</li>
				
				<?php endwhile; ?>
				</ul>

			<?php else: ?>

				<p>Nenhuma programação cadastrado!</p>

			<?php endif; 
			wp_reset_query(); 
		?>
		</div>
		<div><a class="btnDefault center" href="" role="button">Mais atrações</a></div>
	</article>
	<!-- /PROGRAMACAO -->







	<!-- PATROCINADORES -->
	<article class="row">
		<h2 class="title-bold">Patrocinadores</h2>
		
		<?php // Get All Posts Type Patrocinadores

			$args = array('post_type'=>array('posts', 'patrocinadores'));
			query_posts($args);

			if (have_posts()): ?>

			<ul>
			<?php while (have_posts()): the_post(); ?>
				<li><?php echo get_the_post_thumbnail(); ?></div>
			<?php endwhile; ?>
			</ul>";

			<?php else: ?>

				<p>Nenhum patrocinador cadastrado!</p>

			<?php endif; 
			wp_reset_query(); 

		?>
	</article>
	<!-- /PATROCINADORES -->






	<!-- CARDERNO -->
	<h1 class="sr-only">Caderno</h1>
	<article class="row">
        <div class="row wrap-caderno" role="complementary">
            
    	<?php // Get All Posts Type Patrocinadores

			$args = array('post_type'=>array('posts', 'caderno'), 'posts_per_page' => '1');
			query_posts($args);

			if (have_posts()):

				while (have_posts()): the_post(); ?>

					<div class="col-lg-6 col-xs-12">
    					<h2 class="title-caderno">
		                    <span>CADERNO</span>
		                    <span><?php echo get_the_title() ?></span>
		                    <small><?php echo get_the_content() ?></small>
		                </h2>
		            </div>

		            <div class="col-lg-6 col-xs-12">
		                <figure class="newspaper rotate">
		                    <?php echo get_the_post_thumbnail(); ?>
		                </figure>
		            </div>

                <?php endwhile ?>

        	<?php endif; wp_reset_query();
        ?>

        </div>
    </article>
	<!-- /CARDERNO -->



</section>