<?php

/**
*
* Template Posts
*
**/

?>

<h1>Página com HTML dos Posts</h1>
<hr>
<h2><?php single_post_title() ?></h2>



<?php

	if (have_posts()): the_post();

		the_post_thumbnail('small');
		the_content();

	endif;	
?>






<!-- FOOTER -->
<?php get_footer() ?>
<!-- /FOOTER -->