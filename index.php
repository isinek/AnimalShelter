<?php
	session_start();
	unset($_SESSION['privileged']);
	$_SESSION['administration'] = true;
	include('site_control.php');
?>
<!doctype html>
<html lang="<?php print isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en' ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php print $page_title.(strlen($page_title) ? ' | ' : '') ?>AnimalShelter</title>
	<link rel="icon" type="image/png" href="/images/favicon.png">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script src="/js/script.js"></script>
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<?php include('header.php'); ?>
	<section class="content container <?php print isset($bundle) ? $bundle : '' ?> <?php print isset($_SESSION['lang']) ? $_SESSION['lang'] : '' ?>">
		<div class="col-md-9">
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