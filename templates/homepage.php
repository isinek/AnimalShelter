<?php
	$sql = "SELECT title, url, summary FROM categories WHERE url IS NOT NULL AND summary IS NOT NULL AND on_homepage = 1 AND lang like '".$_SESSION['lang']."';";
	$result = $conn->query($sql);
?>
<?php if ($result && $result->num_rows > 0): ?>
	<?php while($article = $result->fetch_assoc()) : ?>
		<article>
			<h2><a href="/<?php echo $article['url'] ?>"><?php echo $article['title'] ?></a></h2>
			<?php echo $article['summary'] ?>
		</article>
	<?php endwhile; ?>
<?php endif ?>
<?php
	$sql = "SELECT title, url, summary FROM articles WHERE url IS NOT NULL AND on_homepage = 1 AND lang like '".$_SESSION['lang']."';";
	$result = $conn->query($sql);
?>
<?php if ($result && $result->num_rows > 0): ?>
	<?php while($article = $result->fetch_assoc()) : ?>
		<article>
			<h2><a href="/<?php echo $article['url'] ?>"><?php echo $article['title'] ?></a></h2>
			<?php echo $article['summary'] ?>
		</article>
	<?php endwhile; ?>
<?php endif ?>