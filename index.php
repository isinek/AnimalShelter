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

	$page_title = '';
	$is_homepage = true;
	$page = [];
	$content = '/templates/homepage.php';
	$bundle = 'homepage';
	if(isset($_GET['article']) && preg_match('/[a-z0-9\_\/\-]+/s', $_GET['article'])) {
		$content = '/templates/error.php';
		$bundle = 'error';
		$is_homepage = false;
		if(settype($_GET['article'], "string")) {
			$sql = "SELECT id, ime, opis FROM categories WHERE url = '".$_GET['article']."' AND jezik like '".$_SESSION['lang']."';";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				$page = $result->fetch_assoc();
				$page_title = $page['ime'];
				$content = '/templates/category.php';
				$bundle = 'category';
			} else {
				$sql = "SELECT title, body FROM articles WHERE url = '".$_GET['article']."' AND lang like '".$_SESSION['lang']."';";
				$result = $conn->query($sql);
				if($result && $result->num_rows > 0) {
					$page = $result->fetch_assoc();
					$page_title = $page['title'];
					$content = '/templates/article.php';
					$bundle = 'article';
				}
			}
		}

	} elseif(isset($_GET['animal']) && preg_match('/[a-z0-9\_\/\-]+/s', $_GET['animal'])) {
		$content = '/templates/animal.php';
		$is_homepage = false;
		if(settype($_GET['animal'], "string")) {
			$sql = "SELECT ime, lokacija, opis, img_loc FROM pets WHERE url = '".$_GET['animal']."' AND jezik like '".$_SESSION['lang']."';";
		}
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$page = $result->fetch_assoc();
			$page_title = $page['ime'];
			$bundle = 'article';
		} else {
			$content = '/templates/error.php';
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php print $page_title.(strlen($page_title) ? ' | ' : '') ?>AnimalShelter</title>
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="/js/script.js"></script>
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<?php include('header.php'); ?>
	<section class="content container">
		<div class="col-md-9 <?php print $bundle ?>">
			<?php include($content); ?>
		</div>
		<aside class="col-md-3">
			<?php include('aside.php'); ?>
		</aside>
	</section>
	<?php include('footer.php'); ?>
</body>
</html>
<?php
	$conn->close();
?>