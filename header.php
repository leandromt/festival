<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/base-fva.css" media="all"/>
	<link rel="stylesheet" href="css/estilo-fva.css" media="all"/>
	<link rel="stylesheet" href="css/animations.css" media="all"/>
	<title>Festival Vida & Arte</title>
	<!--[if lte IE 9]>
	<link href='css/animations-ie-fix.css' rel='stylesheet'>
	<![endif]-->
	<?php wp_head(); ?>
</head>


<header class="header-page container-fluid">
    <figure class="logo-fva">
        <img src="imgs/logo_vida_e_arte.png" alt="Vida &amp; Arte">
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

<?php wp_nav_menu(); ?>