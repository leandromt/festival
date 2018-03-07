<?php

/**
*
* Template Archive Novidades
*
**/

?>

<!-- HEADER -->
<?php get_header() #get_header('personalizado') ?>
<!-- /HEADER -->

<hr>
<h2><?php single_post_title() ?></h2>



<?php
	if (have_posts()): the_post();

		the_title();
		the_content();


	endif;	
?>


<!-- SIDEBAR -->
<?php #get_sidebar() ?>
<!-- /SIDEBAR -->


<!-- FOOTER -->
<?php get_footer() ?>
<!-- /FOOTER -->