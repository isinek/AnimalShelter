<?php
	$sql = "SELECT title, url FROM categories WHERE url IS NOT NULL AND lang like '".$_SESSION['lang']."';";
	$result = $conn->query($sql);
?>
<footer>
	<div class="container clearfix">
		<div class="row">
			<div class="col-xs-12">
				<nav class="collapse navbar-collapse">
					<ul class="nav nav-tabs">
						<?php if($result->num_rows > 0) : ?>
							<li role="presentation" class="dropup">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
									<?php print $static_words['categories'] ?> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<?php while($link = $result->fetch_assoc()) : ?>
										<li><a href="/<?php print $link['url'] ?>"><?php print $link['title'] ?></a></li>
									<?php endwhile;?>
								</ul>
							</li>
						<?php endif; ?>
						<?php
							$sql = "SELECT title, url FROM articles WHERE url IS NOT NULL AND in_menu = 1 AND lang like '".$_SESSION['lang']."' ORDER BY menu_weight;";
							$result = $conn->query($sql);
						?>
						<?php if($result && $result->num_rows > 0) : ?>
							<?php while($link = $result->fetch_assoc()) : ?>
								<li role="presentation"><a href="/<?php print $link['url'] ?>"><?php print $link['title'] ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
						<li role="presentation"><a href="/admin">Admin</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<span>Copyright &copy; 2015 AnimalShelter</span>
			</div>
			<div class="col-md-6" style="text-align: right;">
				<span>
					<?php print $static_words['footer_donated_by'] ?>
				</span>
			</div>
		</div>
	</div>
</footer>