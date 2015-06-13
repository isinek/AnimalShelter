<?php
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
			$sql = "SELECT id, title, body FROM categories WHERE url = '".$_GET['article']."' AND lang like '".$_SESSION['lang']."';";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				$page = $result->fetch_assoc();
				$page_title = $page['title'];
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
			$sql = "SELECT title, location, body, img_loc FROM pets WHERE url = '".$_GET['animal']."' AND lang like '".$_SESSION['lang']."';";
		}
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$page = $result->fetch_assoc();
			$page_title = $page['title'];
			$bundle = 'article';
		} else {
			$content = '/templates/error.php';
		}
	}
?>