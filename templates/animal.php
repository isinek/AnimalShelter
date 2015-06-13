<article class="row">
	<h1><?php print $page['title'].' ('.$page['location'].')' ?></h1>
	<div class="image-area col-md-6"><img src="<?php print $page['img_loc'] ?>" alt="<?php print $page['title'] ?>"></div>
	<div class="text-area col-md-6">
		<?php echo $page['body'] ?>
	</div>
</article>