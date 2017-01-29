<?php
	$URLRewriting = true; //SEO optimizirani URL-ovi (default -> true)
	include('config.php');

	header('Content-Type: text/html; charset=utf8');
	//provjera je li jezik dobro upisan
	if(!isset($_SESSION['lang']) || !preg_match('/[A-Za-z]{2}$/sx', $_SESSION['lang']) || strlen($_SESSION['lang']) != 2) {
		$_SESSION['lang'] = 'hr';
	}

	$conn = new mysqli($config['sql_ip'], $config['sql_user'], $config['sql_pass'], $config['sql_scheme']) or die("Connection failed!");
	$conn->set_charset('utf8');
	//dohvaćanje statičkih riječi iz baze
	$static_words = [];
	$sql = "SELECT word_id, word FROM static_words WHERE lang like '".$_SESSION['lang']."';";
	$result = $conn->query($sql);
	while($word = $result->fetch_assoc()) {
		$static_words[$word['word_id']] = $word['word'];
	}

	$page_title = '';
	$is_homepage = true;
	$page = [];
	//početni template je homepage
	$content = '/templates/homepage.php';
	$bundle = 'homepage';
	unset($_SESSION['article']);
	unset($_SESSION['animal']);
	unset($_SESSION['administration']);
	//provjera postoji li article param
	if(isset($_GET['article'])) {
		//ide se sa pretpostavkom da kategorija i članak ne postoje
		$content = '/templates/error.php';
		$bundle = 'error';
		$is_homepage = false;
		//prebacivanje parametra u string i provjera sadrži li string nedopuštene znakove
		if(settype($_GET['article'], "string") && !preg_match('/[A-Z\s\.\'\"\[\]\:\;\<\>\?\&\=\(\)]+/sx', $_GET['article'])) {
			$sql = "SELECT id, title, body FROM categories WHERE url = '".$_GET['article']."' AND lang like '".$_SESSION['lang']."';";
			$result = $conn->query($sql);
			if($result && $result->num_rows > 0) {
				$page = $result->fetch_assoc();
				$page_title = $page['title'];
				$content = '/templates/category.php';
				$bundle = 'category';
				$_SESSION['article'] = $_GET['article'];
			} else {
				//ako nije kategorija, onda može biti članak
				$sql = "SELECT title, body FROM articles WHERE url = '".$_GET['article']."' AND lang like '".$_SESSION['lang']."';";
				$result = $conn->query($sql);
				if($result && $result->num_rows > 0) {
					$page = $result->fetch_assoc();
					$page_title = $page['title'];
					$content = '/templates/article.php';
					$bundle = 'article';
					$_SESSION['article'] = $_GET['article'];
				}
			}
		}
	} elseif(isset($_GET['animal'])) {
		$content = '/templates/error.php';
		$bundle = 'error';
		$is_homepage = false;
		//prebacivanje parametra u string i provjera sadrži li string nedopuštene znakove
		if(settype($_GET['animal'], "string") && !preg_match('/[A-Z0-9\s\.\'\"\[\]\:\;\<\>\?\&\=\(\)]+/sx', $_GET['animal'])) {
			$content = '/templates/animal.php';
			$is_homepage = false;
			$sql = "SELECT title, location, body, img_loc FROM pets WHERE url = '".$_GET['animal']."' AND lang like '".$_SESSION['lang']."';";
			$result = $conn->query($sql);
			if($result && $result->num_rows > 0) {
				$page = $result->fetch_assoc();
				$page_title = $page['title'];
				$bundle = 'article';
				$_SESSION['animal'] = $_GET['animal'];
			}
		}
	}

	$_SESSION['bundle'] = $bundle;
?>