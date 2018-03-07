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
	        <figure class="logo-bar"><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/img/logo_topo.PNG" alt="Vida &amp; Arte"></figure>
	        <?php wp_nav_menu() ?>
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
	            <a href="" target="_blank" role="menuitem"><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/img/topo_face.PNG" alt="Facebook"></a>
	            <a href="" target="_blank" role="menuitem"><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/img/topo_instagram.PNG" alt="Instagram"></a>
	            <a href="" target="_blank" role="menuitem"><img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/img/topo_twitter.PNG" alt="Twitter"></a>
	        </div>
	    </div>
	</nav>
	<!-- /NAVEGATION -->

	
	<!-- HEADER -->
	<header class="header-page container-fluid">
	    <figure class="logo-fva">
	        <img src="<?php echo TEMPLATE_DIRETORY_URI ?>/assets/img/logo_vida_e_arte.png" alt="Vida &amp; Arte">
	    </figure>
	    <div class="countdown-wrap" role="marquee">
	        <h2 class="title-time-remain">FALTAM</h2>
	        <div class="countDown">
	            <span id="days">84</span>
	            <span id="hours">21</span>
	            <span id="minutes" class="">38</span>
	            <span id="seconds" class="">51</span>
	        </div>
	    </div>
	</header>
	<!-- /HEADER -->

	