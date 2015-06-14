<?php
	if(isset($_POST['id']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
		$sql = "SELECT * FROM ".$_GET['bundle']." WHERE id = ".$_GET['id'].";";
		$result = $conn->query($sql);
		if($result && $result->num_rows > 0) {
			$entity = $result->fetch_assoc();
			foreach($entity as $key => $val) {
				if(is_numeric($entity[$key])) {
					if(isset($_POST[$key]) && ( $key == 'on_homepage' || $key == 'in_menu' )) {
						$_POST[$key] = 1;
					} elseif(isset($_POST[$key])) {
						settype($_POST[$key], 'integer');
					}
					$entity[$key] = isset($_POST[$key]) ? $_POST[$key] : 0;
				} elseif(is_null($entity[$key])) {
					if(isset($_POST[$key])) {
						settype($_POST[$key], 'null');
					}
					$entity[$key] = isset($_POST[$key]) ? '"'.$_POST[$key].'"' : 'NULL';
				} elseif(is_string($entity[$key])) {
					if(isset($_POST[$key])) {
						settype($_POST[$key], 'string');
					}
					$entity[$key] = isset($_POST[$key]) ? '"'.$_POST[$key].'"' : '""';
				}
				
			}
			$values = '';
			$i = 0;
			foreach($entity as $key => $val) {
				if($key == 'id') {
					continue;
				}
				$values .= $key.' = '.$val.', ';
			}
			$values = substr($values, 0, strlen($values)-2);
			$sql = "UPDATE ".$_GET['bundle']." SET ".$values." WHERE id = ".$_GET['id'].";";
			$conn->query($sql);
		}
	} elseif(isset($_POST['id']) && isset($_GET['action']) && $_GET['action'] == 'create') {
		$sql = "SELECT * FROM ".$_GET['bundle']." WHERE id = 1;";
		$result = $conn->query($sql);
		if($result && $result->num_rows > 0) {
			$entity = $result->fetch_assoc();
			foreach($entity as $key => $val) {
				if(is_numeric($entity[$key])) {
					if(isset($_POST[$key]) && ( $key == 'on_homepage' || $key == 'in_menu' )) {
						$_POST[$key] = 1;
					} elseif(isset($_POST[$key])) {
						settype($_POST[$key], 'integer');
					}
					$entity[$key] = isset($_POST[$key]) ? $_POST[$key] : 0;
				} elseif(is_null($entity[$key])) {
					if(isset($_POST[$key])) {
						settype($_POST[$key], 'null');
					}
					$entity[$key] = isset($_POST[$key]) ? '"'.$_POST[$key].'"' : 'NULL';
				} elseif(is_string($entity[$key])) {
					if(isset($_POST[$key])) {
						settype($_POST[$key], 'string');
					}
					$entity[$key] = isset($_POST[$key]) ? '"'.$_POST[$key].'"' : '""';
				}
			}
			$values = '';
			$keys = '';
			$i = 0;
			foreach($entity as $key => $val) {
				if($key == 'id') {
					continue;
				}
				$values .= $val.', ';
				$keys .= $key.', ';
			}
			$values = substr($values, 0, strlen($values)-2);
			$keys = substr($keys, 0, strlen($keys)-2);
			$sql = "INSERT INTO ".$_GET['bundle']." (".$keys.") VALUES (".$values.");";
			$conn->query($sql);
			header('Location: /'.($URLRewriting ? 'admin' : 'admin.php'));
		}
	} elseif(isset($_POST['id']) && isset($_GET['action']) && $_GET['action'] == 'delete') {
		$sql = "DELETE FROM ".$_GET['bundle']." WHERE id = ".$_POST['id'].";";
		$conn->query($sql);
		header('Location: /'.($URLRewriting ? 'admin' : 'admin.php'));
	}
	if(isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['bundle']) && settype($_GET['bundle'], 'string') && preg_match('/(articles|pets|categories|static_words)/sx', $_GET['bundle']) && settype($_GET['id'], 'integer') && $_GET['id'] > 0) {
		$sql = "SELECT * FROM ".$_GET['bundle']." WHERE id = ".$_GET['id'].";";
		$result = $conn->query($sql);
		if($result && $result->num_rows > 0) {
			$entity = $result->fetch_assoc();
		}
		$sql = "SELECT id, title FROM ".$_GET['bundle'].";";
		$result = $conn->query($sql);
		if($result && $result->num_rows > 0) {
			$translationOptions = [];
			$translationOptions[0] = '---';
			while($item = $result->fetch_assoc()) {
				$translationOptions[$item['id']] = $item['title'];
			}
		}
	} elseif(isset($_GET['action']) && $_GET['action'] == 'create' && isset($_GET['bundle']) && settype($_GET['bundle'], 'string') && preg_match('/(articles|pets|categories|static_words)/sx', $_GET['bundle'])) {
		$sql = "SELECT * FROM ".$_GET['bundle']." WHERE id = 1;";
		$result = $conn->query($sql);
		if($result && $result->num_rows > 0) {
			$entity = $result->fetch_assoc();
			foreach($entity as $key => $val) {
				if(is_numeric($entity[$key])) {
					$entity[$key] = 0;
				} elseif(is_string($entity[$key])) {
					$entity[$key] = '';
				}
			}
		}
		$sql = "SELECT id, title FROM ".$_GET['bundle'].";";
		$result = $conn->query($sql);
		if($result && $result->num_rows > 0) {
			$translationOptions = [];
			$translationOptions[0] = '---';
			while($item = $result->fetch_assoc()) {
				$translationOptions[$item['id']] = $item['title'];
			}
		}
	} elseif(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['bundle']) && settype($_GET['bundle'], 'string') && preg_match('/(articles|pets|categories|static_words)/sx', $_GET['bundle']) && settype($_GET['id'], 'integer') && $_GET['id'] > 0) {
		$sql = "SELECT * FROM ".$_GET['bundle']." WHERE id = ".$_GET['id'].";";
		$result = $conn->query($sql);
		if($result && $result->num_rows > 0) {
			$entity = $result->fetch_assoc();
		}
		$sql = "SELECT id, title FROM ".$_GET['bundle'].";";
		$result = $conn->query($sql);
		if($result && $result->num_rows > 0) {
			$translationOptions = [];
			$translationOptions[0] = '---';
			while($item = $result->fetch_assoc()) {
				$translationOptions[$item['id']] = $item['title'];
			}
		}
	} else {
		header('Location: /'.($URLRewriting ? 'admin' : 'admin.php'));
	}
?>
<form method="POST">
	<?php if(isset($entity['id'])) : ?>
		<input type="hidden" id="id" name="id" value="<?php echo $entity['id'] ?>" required>
	<?php endif; ?>
	<?php if(isset($entity['title'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="title">Title:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="title" name="title" value="<?php echo $entity['title'] ?>" required pattern="[a-zA-Z0-9\s-_]+" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
				<span class="error-message">Required pattern: [a-zA-Z0-9\s-_\/]+</span>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['location'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="location">Location:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="location" name="location" value="<?php echo $entity['location'] ?>" required pattern="[a-zA-Z\s-_]+" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
				<span class="error-message">Required pattern: [a-zA-Z\s-_\/]+</span>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['body'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Body:</label>
			<div class="col-sm-10"> 
				<textarea class="ckeditor form-control" id="body" name="body" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>><?php echo $entity['body'] ?></textarea>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['summary'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="summary">Summary:</label>
			<div class="col-sm-10"> 
				<textarea class="ckeditor form-control" id="summary" name="summary" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>><?php echo $entity['summary'] ?></textarea>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['word_id'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="word_id">Word ID:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="word_id" name="word_id" value="<?php echo $entity['word_id'] ?>" required pattern="[a-zA-Z\s-_]+" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
				<span class="error-message">Required pattern: [a-zA-Z\s-_\/]+</span>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['word'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="word">Word:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="word" name="word" value="<?php echo $entity['word'] ?>" required <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['lang'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="lang">Language:</label>
			<div class="col-sm-10">
				<select class="form-control" name="lang" id="lang" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
					<option value="hr" <?php echo $entity['lang'] == 'hr' ? 'selected' : '' ?>>HR</option>
					<option value="en" <?php echo $entity['lang'] == 'en' ? 'selected' : '' ?>>EN</option>
				</select>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['img_loc'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="img_loc">Image URL:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="img_loc" name="img_loc" value="<?php echo $entity['img_loc'] ?>" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['url'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="url">URL:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="url" name="url" value="<?php echo $entity['url'] ?>" pattern="[a-z-_]*" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
				<span class="error-message">Required pattern: [a-z-_]*</span>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['in_menu'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="in_menu">In menu:</label>
			<div class="col-sm-10">
				<input type="checkbox" class="form-control" id="in_menu" name="in_menu" <?php echo $entity['in_menu'] ? 'checked' : '' ?> <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['menu_weight'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="menu_weight">Weight:</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="menu_weight" name="menu_weight" value="<?php echo $entity['menu_weight'] ?>" pattern="[0-9]*" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
				<span class="error-message">Required pattern: [0-9]+</span>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['on_homepage'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="on_homepage">On homepage:</label>
			<div class="col-sm-10">
				<input type="checkbox" class="form-control" id="on_homepage" name="on_homepage" <?php echo $entity['on_homepage'] ? 'checked' : '' ?> <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($entity['translation_of'])) : ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="translation_of">Translation of:</label>
			<div class="col-sm-10">
				<select class="form-control" name="translation_of" id="translation_of" <?php echo $_GET['action'] == 'delete' ? 'disabled' : '' ?>>
					<?php foreach($translationOptions as $value => $title) : ?>
						<option value="<?php echo $value ?>" <?php echo $entity['translation_of'] == $value ? 'selected' : '' ?>><?php echo $title ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	<?php endif; ?>
	<div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Submit</button>
			<a href="/admin" class="btn btn-default">Cancel</a>
		</div>
	</div>
</form>