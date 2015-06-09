<?php 
	$sql = "SELECT ime, lokacija, opis, img_loc, url FROM pets WHERE kat_id = '".$page['id']."' AND jezik like '".$_SESSION['lang']."';";
	$result = $conn->query($sql);
?>
<h1><?php print $page['ime'] ?></h1>
<p><?php print $page['opis'] ?></p>
<?php if($result->num_rows > 0) : ?>
	<?php while($animal = $result->fetch_assoc()) : ?>
		<article class="row">
			<h2><a href="/<?php print $_GET['article'] ?>/<?php print $animal['url'] ?>"><?php print $animal['ime'].' ('.$animal['lokacija'].')' ?></a></h2>
			<div class="image-area col-md-6"><img src="<?php print $animal['img_loc'] ?>" alt="<?php print $animal['ime'] ?>"></div>
			<div class="text-area col-md-6">
				<p><?php print $animal['opis'] ?></p>
			</div>
		</article>
	<?php endwhile; ?>
<?php endif; ?>