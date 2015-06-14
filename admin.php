<?php
	session_start();
	$_SESSION['administration'] = true;
	include('admin_site_control.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php print $page_title.(strlen($page_title) ? ' | ' : '') ?>AnimalShelter</title>
	<link rel="icon" type="image/png" href="/images/favicon.png">
	
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
			<div class="col-sm-6 col-xs-10"><a class="site-logo" href="/"><img src="/images/logo.png"></a></div>
			<div class="col-sm-6 col-xs-2">
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
	</header>
	<section class="admin-content container">
		<?php include($content); ?>
	</section>
</body>
</html>
<?php
	$conn->close();
?>