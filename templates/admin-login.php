<form method="POST" action="/<?php print $URLRewriting ? 'admin' : 'admin.php' ?>">
	<div class="form-group">
		<label class="control-label col-sm-2" for="email">Email:</label>
		<div class="col-sm-10">
			<input class="form-control" type="email" name="first">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Password:</label>
		<div class="col-sm-10"> 
			<input class="form-control" type="password" name="second">
		</div>
	</div>
	<div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-10">
			<input type="hidden" name="email" value="">
			<input type="hidden" name="password" value="">
			<button type="submit" class="btn btn-default">LogIn</button>
		</div>
	</div>
</form>