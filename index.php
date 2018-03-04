<?php

/**
*
* The main template file
*
**/

?>

<!-- HEADER -->
<?php get_header(); ?>
<?php #get_header('personalizado'); ?>
<!-- /HEADER -->

<!-- HOME PAGE -->
<?php get_template_part( "content", "home" ) ?>
<!-- /HOME PAGE -->

<!-- SIDEBAR -->
<?php #get_sidebar(); ?>
<!-- /SIDEBAR -->

<!-- FOOTER -->
<?php get_footer(); ?>
<?php #get_footer('personalizado'); ?>
<!-- /FOOTER -->


