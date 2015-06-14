<?php
	$sql = "SELECT title, url FROM categories WHERE url IS NOT NULL AND lang like '".$_SESSION['lang']."';";
	$result = $conn->query($sql);
?>
<header>
	<div class="row">
		<div class="container clearfix">
			<div class="col-sm-6 col-xs-10"><a class="site-logo" href="/"><img src="/images/logo.png"></a></div>
			<div class="col-sm-6 col-xs-2">
				<nav class="collapse navbar-collapse">
					<ul class="nav nav-tabs">
						<?php if($result && $result->num_rows > 0) : ?>
							<li role="presentation" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
									<?php print isset($static_words['categories']) ? $static_words['categories'] : '' ?> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<?php while($link = $result->fetch_assoc()) : ?>
										<li><a href="/<?php print $URLRewriting ? $link['url'] : 'index.php?article='.$link['url'] ?>"><?php print $link['title'] ?></a></li>
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
								<li role="presentation"><a href="/<?php print $URLRewriting ? $link['url'] : 'index.php?article='.$link['url'] ?>"><?php print $link['title'] ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</nav>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-navigation" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div id="lang-select" class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<?php print strtoupper($_SESSION['lang']) ?> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li <?php print strtoupper($_SESSION['lang']) == 'HR' ? 'class="hidden"' : '' ?>><a href="#">HR</a></li>
						<li <?php print strtoupper($_SESSION['lang']) == 'EN' ? 'class="hidden"' : '' ?>><a href="#">EN</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="mobile-navigation" class="row collapse" aria-expanded="false">
		<div class="col-xs-12">
			<ul class="nav nav-tabs">
				<?php
					$sql = "SELECT title, url FROM categories WHERE url IS NOT NULL AND lang like '".$_SESSION['lang']."';";
					$result = $conn->query($sql);
				?>
				<?php if($result && $result->num_rows > 0) : ?>
					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							<?php print isset($static_words['categories']) ? $static_words['categories'] : '' ?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<?php while($link = $result->fetch_assoc()) : ?>
								<li><a href="/<?php print $URLRewriting ? $link['url'] : 'index.php?article='.$link['url'] ?>"><?php print $link['title'] ?></a></li>
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
						<li role="presentation"><a href="/<?php print $URLRewriting ? $link['url'] : 'index.php?article='.$link['url'] ?>"><?php print $link['title'] ?></a></li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">&nbsp;</div>
	</div>
	<?php if($is_homepage) : ?>
		<div class="row slideshow">
			<ul>
				<li><img src="/images/header1.jpg" alt="Header slider 1"></li>
				<li><img src="/images/header2.jpg" alt="Header slider 2"></li>
				<li><img src="/images/header3.jpg" alt="Header slider 3"></li>
			</ul>
			<div class="container clearfix">
				<div class="col-md-12">
					<div class="slideshow-title"><?php print isset($static_words['homepage_slideshow_message']) ? $static_words['homepage_slideshow_message'] : '' ?></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</header>