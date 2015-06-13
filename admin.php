<?php
	session_start();
	if(!isset($_SESSION['lang'])) {
		$_SESSION['lang'] = 'HR';
	}
	header('Content-Type: text/html; charset=utf8');

	$conn = new mysqli('localhost', 'root', 'root', 'animal_shelter') or die("Connection failed!");
	$conn->set_charset('utf8');
	if(settype($_GET['article'], "string")) {
		$sql = "SELECT word_id, word FROM static_words WHERE lang like '".$_SESSION['lang']."';";
		$result = $conn->query($sql);
		while($word = $result->fetch_assoc()) {
			$static_words[$word['word_id']] = $word['word'];
		}
	}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administration | AnimalShelter</title>
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script src="/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/js/ckeditor/config.js"></script>
	<link rel="stylesheet" type="text/css" href="/js/ckeditor/skins/moono/editor.css">
	<script type="text/javascript" src="/js/ckeditor/lang/<?php print strtolower($_SESSION['lang']) ?>.js"></script>
	<script type="text/javascript" src="/js/ckeditor/styles.js"></script>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>

	<script src="/js/script.js"></script>
	<link rel="stylesheet" href="/css/style.css">

	<script>
		jQuery(function () {
			jQuery('#articles-table').DataTable();
			jQuery('#categories-table').DataTable();
			jQuery('#pets-table').DataTable();
			jQuery('#static-words-table').DataTable();
			jQuery('#articles-table').DataTable();
		});
	</script>
</head>
<body>
	<header class="admin-header container">
		<div class="row">
			<div class="col-sm-2">
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
			<div class="col-sm-10"><h1>AnimalShelter - Administration pages</h1></div>
		</div>
	</header>
	<section class="admin-content container">
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#articles" aria-controls="articles" role="tab" data-toggle="tab"><?php echo $static_words['articles'] ?></a></li>
				<li role="presentation"><a href="#categories" aria-controls="categories" role="tab" data-toggle="tab"><?php echo $static_words['categories'] ?></a></li>
				<li role="presentation"><a href="#pets" aria-controls="pets" role="tab" data-toggle="tab"><?php echo $static_words['pets'] ?></a></li>
				<li role="presentation"><a href="#static_words" aria-controls="static_words" role="tab" data-toggle="tab"><?php echo $static_words['static_words'] ?></a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in" id="articles">
					<table id="articles-table" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th><?php echo $static_words['title'] ?></th>
								<th>URL</th>
								<th><?php echo $static_words['lang'] ?></th>
								<th><?php echo $static_words['on_homepage'] ?></th>
								<th><?php echo $static_words['actions'] ?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql = "SELECT id, title, url, lang, on_homepage FROM articles;";
								$result = $conn->query($sql);
							?>
							<?php if ($result && $result->num_rows > 0): ?>
								<?php while($item = $result->fetch_assoc()) : ?>
									<tr>
										<td><?php echo $item['id'] ?></td>
										<td><?php echo $item['title'] ?></td>
										<td><?php echo $item['url'] ?></td>
										<td><?php echo $item['lang'] ?></td>
										<td><input type="checkbox" disabled <?php echo $item['on_homepage'] == 1 ? 'checked' : '' ?>></td>
										<td></td>
									</tr>
								<?php endwhile; ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="categories">
					<table id="categories-table" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th><?php echo $static_words['title'] ?></th>
								<th>URL</th>
								<th><?php echo $static_words['lang'] ?></th>
								<th><?php echo $static_words['on_homepage'] ?></th>
								<th><?php echo $static_words['actions'] ?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql = "SELECT id, title, url, lang, on_homepage FROM categories;";
								$result = $conn->query($sql);
							?>
							<?php if ($result && $result->num_rows > 0): ?>
								<?php $categories = []; ?>
								<?php while($item = $result->fetch_assoc()) : ?>
									<?php $categories[$item['id']] = $item['title']; ?>
									<tr>
										<td><?php echo $item['id'] ?></td>
										<td><?php echo $item['title'] ?></td>
										<td><?php echo $item['url'] ?></td>
										<td><?php echo $item['lang'] ?></td>
										<td><input type="checkbox" disabled <?php echo $item['on_homepage'] == 1 ? 'checked' : '' ?>></td>
										<td></td>
									</tr>
								<?php endwhile; ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="pets">
					<table id="pets-table" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th><?php echo $static_words['title'] ?></th>
								<th>URL</th>
								<th><?php echo $static_words['category'] ?></th>
								<th><?php echo $static_words['lang'] ?></th>
								<th><?php echo $static_words['actions'] ?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql = "SELECT id, title, url, lang, category_id FROM pets;";
								$result = $conn->query($sql);
							?>
							<?php if ($result && $result->num_rows > 0): ?>
								<?php while($item = $result->fetch_assoc()) : ?>
									<tr>
										<td><?php echo $item['id'] ?></td>
										<td><?php echo $item['title'] ?></td>
										<td><?php echo $item['url'] ?></td>
										<td><?php echo $categories[$item['category_id']] ?></td>
										<td><?php echo $item['lang'] ?></td>
										<td></td>
									</tr>
								<?php endwhile; ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="static_words">
					<table id="static-words-table" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th><?php echo $static_words['word_id'] ?></th>
								<th><?php echo $static_words['word'] ?></th>
								<th><?php echo $static_words['lang'] ?></th>
								<th><?php echo $static_words['actions'] ?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql = "SELECT id, word_id, word, lang FROM static_words;";
								$result = $conn->query($sql);
							?>
							<?php if ($result && $result->num_rows > 0): ?>
								<?php while($item = $result->fetch_assoc()) : ?>
									<tr>
										<td><?php echo $item['id'] ?></td>
										<td><?php echo $item['word_id'] ?></td>
										<td><?php echo $item['word'] ?></td>
										<td><?php echo $item['lang'] ?></td>
										<td></td>
									</tr>
								<?php endwhile; ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<?php
	$conn->close();
?>