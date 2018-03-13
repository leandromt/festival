<?php

/**
*
* Template Header
*
**/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Festival Vida & Arte</title>
	<!--[if lte IE 9]>
	<link href='css/animations-ie-fix.css' rel='stylesheet'>
	<![endif]-->
	<?php wp_head() ?>
</head>

<body <?php echo body_class() ?>>

	<!-- NAVEGATION -->
	<nav id="navegation" class="nav-wrap">
        <div class="float-nav container-fluid" role="menubar">
            <figure class="logo-bar">
            	<a href="#home">
            		<img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/logo_topo.png" alt="<?php echo bloginfo('name') ?>">
            	</a>
            </figure>
            <input type="checkbox" id="change-hamburguer">
            <div class="hamburguer">
                <span></span>
                <label for="change-hamburguer"></label>
            </div>
            <div class="menu-wrap">
                <?php 

                $defaults = array(
					'container'       => false, 
					'container_class' => false, 
					'echo'            => false,
					'fallback_cb'     => false,
					'depth'           => 0
				); ?>
				<ul>
					<?php echo strip_tags(wp_nav_menu( $defaults ), '<a>'); ?>
				</ul>
                <?php 
		        	/* Show Menu Pages */
					/*
					$pages = get_pages();
					foreach($pages as $p):
						$link = get_page_link($p->ID);
						$title = $p->post_title;
						printf('<li class="item-menu"><a href="%s">%s</a></li>', $link, $title);
					endforeach;
					*/
		        ?>
                <div class="social-btns">
                    <h5>Curta e Compartilhe</h5>
                    <a class="anim-btn" href="" target="_blank" role="menuitem"><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/social/topo_face.png" alt="Facebook"></a>
                    <a class="anim-btn" href="" target="_blank" role="menuitem"><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/social/topo_instagram.png" alt="Instagram"></a>
                    <a class="anim-btn" href="" target="_blank" role="menuitem"><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/social/topo_twitter.png" alt="Twitter"></a>
                </div>
            </div>
        </div>
    </nav>
	<!-- /NAVEGATION -->

	
	<!-- HEADER -->
	<header class="header-page container-fluid">
	    <figure class="logo-fva">
	        <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/imgs/logo_vida_e_arte.png" alt="Vida &amp; Arte">
	    </figure>

        <?php // Script JS Count Down Date - Initialize and End Date

        	$args = array('post_type'=>'datadoevento', 'post_status' => array('future'), 'posts_per_page' => '1');
			query_posts($args);


			if (have_posts()): ?>

				<div class="countdown-wrap" role="marquee">
	        		<h2 class="title-time-remain">FALTAM</h2>

					<?php while (have_posts()): the_post();

						$data_do_evento = get_the_date('M j, Y') . ' ' . get_the_time('g:i:s');

					?>
						<script>
				        	<?php echo 'var countDownDate = new Date("' . $data_do_evento .'").getTime();'; ?>
				        </script>

				        <div class="countDown">
				            <span id="days">0</span>
				            <span id="hours">0</span>
				            <span id="minutes" class="">0</span>
				            <span id="seconds" class="">0</span>
		        		</div>

	        		<?php endwhile; ?>

		    	</div>

        	<?php endif; wp_reset_query(); ?>

	</header>
	<!-- /HEADER -->