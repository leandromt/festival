<?php

/**
*
* Template Home Page
*
**/

?>

<section class="container-fluid col-1140" role="main">


	<!-- SOBRE -->
	<h1 id="sobre" class="sr-only">Sobre</h1>
	<article class="row">
        <div class="about col-lg-6 col-md-6 col-sm-8 col-xs-12" role="contentinfo">
            <h2 class="welcome-title">
                <small>SEJA BEM-VINDO!</small>
                <span>FESTIVAL</span>
                <span>VIDA E ARTE</span>
            </h2>
            <p role="definition">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quaerat magni cupiditate in harum atque beatae voluptatibus officiis a similique. Sequi odit, blanditiis magnam ipsam voluptatum eligendi deserunt animi, debitis voluptatibus! Praesentium delectus ipsum veritatis? Illum repudiandae ad enim maiores incidunt, quibusdam, obcaecati iusto eveniet optio suscipit veritatis ea dicta.</p>
            <div class="logos-content" role="img">
                <figure><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/logo_democr%C3%ADto_rocha.png" alt="Fundação Democrito Rocha"></figure>
                <figure><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/logo_opovo_90_anos.png" alt="O POVO 90 Anos"></figure>
            </div>
            <div><a class="btnDefault btn-trailer hidden-md hidden-sm hidden-xs" href="#trailer" role="button">CONFIRA O TRAILER</a></div>
        </div>
        <div class="col-lg-6 col-md-6 hidden-sm hidden-xs sobre-imgs look-at-me" role="img">
            <div class="figures-wrap">
                <figure>
                    <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/sobre3.png" alt="Imagem #1">
                </figure>
                <figure>
                    <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/sobre2.png" alt="Imagem #2">
                </figure>
                <figure>
                    <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/sobre1.png" alt="Imagem #3">
                </figure>
            </div>
        </div>
    </article>
	<!-- /SOBRE -->




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

			$args = array('post_type'=>array('posts', 'novidades'), 'posts_per_page' => '3');
			query_posts($args); 
			
			if (have_posts()): 

				while (have_posts()): the_post(); ?>
		
					<div class="col-lg-4 col-xs-12 item-novidades">
						<a href="<?php echo get_the_permalink() ?>">
							<figure><?php echo get_the_post_thumbnail(get_the_ID(), 'novidades') ?>
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

				<div class="owl-carousel artists owl-loaded">
				    <div class="owl-stage-outer">
				        <div class="owl-stage">
							
							<?php while (have_posts()): the_post(); ?>
								<figure>
					                <?php echo get_the_post_thumbnail() ?>
					                <figcaption><?php echo get_the_title() ?></figcaption>
					            </figure>
				
							<?php endwhile; ?>
						
						</div>
					</div>
				</div>

			<?php else: ?>

				<p>Nenhuma programação cadastrado!</p>

			<?php endif; 
			wp_reset_query(); 
		?>
		</div>
		<div><a class="btnDefault center" href="<?php get_site_url() ?>" role="button">Mais atrações</a></div>
	</article>
	<!-- /PROGRAMACAO -->


	


	<!-- INSTAGRAM -->
	<article class="row">
        <h2 class="sr-only">@vida&amp;arte</h2>
        <div role="heading">
            <a href="" target="_blank">
                <figure class="title-instagram-user">
                    <img src="imgs/social/rede_sociais_instagram.png" alt="Instagram">
                    <figcaption>
                        <strong>@VIDA&amp;ARTE</strong> no Instagram
                    </figcaption>
                </figure>
            </a>
            <div class="separator"></div>
            <div class="instagram-feed" role="presentation">
                <a href="http://instagram.com" target="_blank">
                    <div>
                        <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/insta1.png" alt="@vidaearteopovo">
                    </div>
                </a>
                <a href="http://instagram.com" target="_blank">
                    <div>
                        <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/insta2.png" alt="@vidaearteopovo">
                    </div>
                </a>
                <a href="http://instagram.com" target="_blank">
                    <div>
                        <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/insta3.png" alt="@vidaearteopovo">
                    </div>
                </a>
                <a href="http://instagram.com" target="_blank">
                    <div>
                        <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/insta4.png" alt="@vidaearteopovo">
                    </div>
                </a>
                <a href="http://instagram.com" target="_blank">
                    <div>
                        <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/insta5.png" alt="@vidaearteopovo">
                    </div>
                </a>
            </div>
            <div class="more-social">
                <span>+ Redes Sociais</span>
                <a class="anim-btn" href="" target="_blank">
                    <img src="imgs/social/rede_sociais_face.png" alt="Facebook">
                </a>
                <a class="anim-btn" href="" target="_blank">
                    <img src="imgs/social/rede_sociais_twitter.png" alt="Twitter">
                </a>
            </div>
        </div>
    </article>
    <!-- /INSTAGRAM -->





	<!-- PATROCINADORES -->
	<article class="row bg-light">

		<h4 class="title-tiny-black">Patrocinadores</h4>

		<?php // Get All Posts Type Patrocinadores

			$args = array('post_type'=>array('posts', 'patrocinadores'));
			query_posts($args);

			if (have_posts()): ?>

				<div class="owl-carousel owl-theme slider-sponsors owl-loaded">
			        <div class="owl-stage-outer">
			        	<div class="owl-stage">
			        		<?php while (have_posts()): the_post(); ?>
				        		<div class="owl-item">
				        			<figure>
				        				<?php echo get_the_post_thumbnail(); ?>
				        			</figure>
				        		</div>
			        		<?php endwhile; ?>
			        	</div>
			        </div>
			    </div>

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



	<!-- APLICATIVO -->
	<h1 class="sr-only">Aplicativo Vida &amp; Arte</h1>
	<article class="row vertical-centered">
        <div class="col-lg-6 col-sm-12 col-xs-12 smartphone-wrap">
            <div class="smartphone-frame">
                <figure class="smartphone-screen">
                    <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/imagem_cell_vida_e_arte.png" alt="Tela">
                </figure>
            </div>
            <div class="btn-social-mobile">
                <a href="https://goo.gl/1Enuzy" target="_blank" title="Baixe no GooglePlay">
                    <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/google_play.png" alt="GooglePlay">
                </a>
                <a href="" target="_blank" title="Baixe no AppStore">
                    <img src="imgs/app_store.png" alt="AppStore">
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12 app-wrap">
            <h2 class="sr-only">App Vida &amp; Arte disponivel na GooglePlay e AppStore</h2>
            <figure>
            	<img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/Vida_e_arte_a_um_toque.png" alt="Vida &amp; Arte a um toque!">
            </figure>
            <p>Espaço reservado para descrição sobre o aplicativo VIDA E ARTE. Uso máximo de duas linhas.</p>
            <a href="https://goo.gl/1Enuzy" target="_blank" title="Baixe no GooglePlay">
                <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/google_play.png" alt="GooglePlay">
            </a>
            <a href="" target="_blank" title="Baixe no AppStore">
                <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/app_store.png" alt="AppStore">
            </a>
        </div>
    </article>
    <!-- /APLICATIVO -->


</section>