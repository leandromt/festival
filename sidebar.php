<?php

/**
*
* Template Side Bar
*
**/

?>

<h1>Categorias</h1>
<ul>
	<?php 

		// Show all categories 
		$categories = get_categories();
		
		foreach ($categories as $category): ?>
			<li><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a></li>
		<?php endforeach; 

	?>
</ul>

<hr>

<h1>Tags</h1>
<ul>
	<?php 

		// Show all tags
		$tags = get_tags();
		
		foreach ($tags as $tag): ?>
			<li><a href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name ?></a></li>
		<?php endforeach; 

	?>
</ul>