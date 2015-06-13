<?php 
	$sql = "SELECT title, location, summary, img_loc, url FROM pets WHERE category_id = '".$page['id']."' AND lang like '".$_SESSION['lang']."';";
	$result = $conn->query($sql);
?>
<h1><?php print $page['title'] ?></h1>
<?php echo $page['body'] ?>
<?php if($result->num_rows > 0) : ?>
	<?php while($animal = $result->fetch_assoc()) : ?>
		<article class="row">
			<h2><a href="/<?php print $_GET['article'] ?>/<?php print $animal['url'] ?>"><?php print $animal['title'].' ('.$animal['location'].')' ?></a></h2>
			<div class="image-area col-md-6"><img src="<?php print $animal['img_loc'] ?>" alt="<?php print $animal['title'] ?>"></div>
			<div class="text-area col-md-6">
				<?php echo $animal['summary'] ?>
			</div>
		</article>
	<?php endwhile; ?>
<?php endif; ?>