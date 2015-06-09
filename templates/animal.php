<article class="row">
	<h1><?php print $page['ime'].' ('.$page['lokacija'].')' ?></h1>
	<div class="image-area col-md-6"><img src="<?php print $page['img_loc'] ?>" alt="<?php print $page['ime'] ?>"></div>
	<div class="text-area col-md-6">
		<p><?php print $page['opis'] ?></p>
	</div>
</article>