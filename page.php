<?php

/**
*
* Template Geral Pages
*
**/
?>

<h1><?php single_post_title() ?></h1>


<?php
	if (have_posts()): the_post();

		the_content();

	endif;	
?>



<!-- FOOTER -->
<?php get_footer() ?>
<!-- /FOOTER -->