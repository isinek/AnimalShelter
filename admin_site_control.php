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

	//funkcija koja provjerava login
	function securityCheck( $privileged ) {
		$conn = new mysqli($config['sql_ip'], $config['sql_user'], $config['sql_pass'], $config['sql_scheme']) or die("Connection failed!");
		$conn->set_charset('utf8');
		if(settype($privileged, "string") && preg_match('/[a-z0-9]{32}/sx', $privileged)) {
			$sql = "SELECT COUNT(id) FROM users WHERE MD5(CONCAT(email, password, CURDATE())) = '".$privileged."';";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				$conn->close();
				return true;
			}
		}
		$conn->close();
		return false;
	}

	if(isset($_POST['first']) && isset($_POST['second']) && isset($_POST['email']) && strlen($_POST['email']) == 0 && isset($_POST['password']) && strlen($_POST['password']) == 0) {
		if(preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,6}/sx', $_POST['first'])) {
			$sql = "SELECT MD5(CONCAT(email, password, CURDATE())) as privileged FROM users WHERE email = '".$_POST['first']."' AND password = '".md5($_POST['second'])."';";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				$result = $result->fetch_assoc();
				$_SESSION['privileged'] = $result['privileged'];
			}
		}
	}

	$content = '/templates/admin-login.php';
	if(isset($_SESSION['privileged']) && securityCheck($_SESSION['privileged'])) {
		$content = '/templates/admin-tables.php';
		if(isset($_GET['action']) && ( $_GET['action'] == 'edit' || $_GET['action'] == 'create' || $_GET['action'] == 'delete' )) {
			$content = '/templates/admin-change.php';
		}
	}
?>