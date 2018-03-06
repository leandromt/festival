<?php

/**
*
* Template Specific Page
*
**/

?>

<h1>Página com HTML específico</h1>
<hr>
<h2><?php single_post_title() ?></h2>



<?php
	if (have_posts()): the_post();

		the_content();

	endif;	
?>


<!-- SIDEBAR -->
<?php get_sidebar() ?>
<!-- /SIDEBAR -->


<!-- FOOTER -->
<?php get_footer() ?>
<!-- /FOOTER -->