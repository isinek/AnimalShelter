<?php
	session_start();
	$newUrl = '/';
	
	if(isset($_SESSION['administration']) && $_SESSION['administration']) {
		$newUrl = '/admin';
	} else {
		$conn = new mysqli('localhost', 'root', 'root', 'animal_shelter') or die("Connection failed!");
		$conn->set_charset('utf8');
		if(isset($_SESSION['animal']) && settype($_SESSION['animal'], "string") && !preg_match('/[A-Z0-9\s\.\'\"\[\]\:\;\<\>\?\&\=\(\)]+/sx', $_SESSION['animal'])) {
			$sql = "SELECT concat('/',categories.url,'/'pets.url) as url FROM pets JOIN categories ON categories.id = pets.category_id WHERE id = (SELECT translation_of FROM pets WHERE translation_of IS NOT NULL AND url = '".$_SESSION['animal']."' AND lang like '".$_SESSION['lang']."');";
			$result = $conn->query($sql);
			if($result && $result->num_rows > 0) {
				$newUrl = $result->fetch_assoc();
				$newUrl = $newUrl['url'];
			}
		} elseif(isset($_SESSION['article']) && settype($_SESSION['article'], "string") && !preg_match('/[A-Z0-9\s\.\'\"\[\]\:\;\<\>\?\&\=\(\)]+/sx', $_SESSION['article'])) {
			$sql = "SELECT concat('/',url) as url FROM categories WHERE id = (SELECT translation_of FROM categories WHERE translation_of IS NOT NULL AND url = '".$_SESSION['article']."' AND lang like '".$_SESSION['lang']."');";
			$result = $conn->query($sql);
			if($result && $result->num_rows > 0) {
				$newUrl = $result->fetch_assoc();
				$newUrl = $newUrl['url'];
			} else {
				$sql = "SELECT concat('/',url) as url FROM articles WHERE id = (SELECT translation_of FROM articles WHERE translation_of IS NOT NULL AND url = '".$_SESSION['article']."' AND lang like '".$_SESSION['lang']."');";
				$result = $conn->query($sql);
				if($result && $result->num_rows > 0) {
					$newUrl = $result->fetch_assoc();
					$newUrl = $newUrl['url'];
				}
			}
		}
		$conn->close();
	}
	$_SESSION['lang'] = 'hr';
	if(isset($_POST['lang']) && preg_match('/[A-Za-z]{2}$/sx', $_POST['lang']) && strlen($_POST['lang']) == 2) {
		$_SESSION['lang'] = strtolower($_POST['lang']);
	}
	print $newUrl;
	die();
?>