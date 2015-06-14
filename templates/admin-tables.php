<div role="tabpanel">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#articles" aria-controls="articles" role="tab" data-toggle="tab"><?php echo isset($static_words['articles']) ? $static_words['articles'] : '' ?></a></li>
		<li role="presentation"><a href="#categories" aria-controls="categories" role="tab" data-toggle="tab"><?php echo isset($static_words['categories']) ? $static_words['categories'] : '' ?></a></li>
		<li role="presentation"><a href="#pets" aria-controls="pets" role="tab" data-toggle="tab"><?php echo isset($static_words['pets']) ? $static_words['pets'] : '' ?></a></li>
		<li role="presentation"><a href="#static_words" aria-controls="static_words" role="tab" data-toggle="tab"><?php echo isset($static_words['static_words']) ? $static_words['static_words'] : '' ?></a></li>
	</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="articles">
			<table id="articles-table" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th><?php echo isset($static_words['title']) ? $static_words['title'] : '' ?></th>
						<th>URL</th>
						<th><?php echo isset($static_words['lang']) ? $static_words['lang'] : '' ?></th>
						<th><?php echo isset($static_words['on_homepage']) ? $static_words['on_homepage'] : '' ?></th>
						<th><?php echo isset($static_words['actions']) ? $static_words['actions'] : '' ?></th>
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
								<td><a href="/<?php print $URLRewriting ? 'admin/edit/articles/' : 'admin.php?action=edit&bundle=articles&id=' ?><?php echo $item['id'] ?>">Edit</a> &nbsp; <a href="/admin/delete/articles/<?php echo $item['id'] ?>">Delete</a></td>
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
						<th><?php echo isset($static_words['title']) ? $static_words['title'] : '' ?></th>
						<th>URL</th>
						<th><?php echo isset($static_words['lang']) ? $static_words['lang'] : '' ?></th>
						<th><?php echo isset($static_words['on_homepage']) ? $static_words['on_homepage'] : '' ?></th>
						<th><?php echo isset($static_words['actions']) ? $static_words['actions'] : '' ?></th>
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
								<td><a href="/<?php print $URLRewriting ? 'admin/edit/categories/' : 'admin.php?action=edit&bundle=categories&id=' ?><?php echo $item['id'] ?>">Edit</a> &nbsp; <a href="/admin/delete/categories/<?php echo $item['id'] ?>">Delete</a></td>
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
						<th><?php echo isset($static_words['title']) ? $static_words['title'] : '' ?></th>
						<th>URL</th>
						<th><?php echo isset($static_words['category']) ? $static_words['category'] : '' ?></th>
						<th><?php echo isset($static_words['lang']) ? $static_words['lang'] : '' ?></th>
						<th><?php echo isset($static_words['actions']) ? $static_words['actions'] : '' ?></th>
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
								<td><a href="/<?php print $URLRewriting ? 'admin/edit/pets/' : 'admin.php?action=edit&bundle=pets&id=' ?><?php echo $item['id'] ?>">Edit</a> &nbsp; <a href="/admin/delete/pets/<?php echo $item['id'] ?>">Delete</a></td>
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
						<th><?php echo isset($static_words['word_id']) ? $static_words['word_id'] : '' ?></th>
						<th><?php echo isset($static_words['word']) ? $static_words['word'] : '' ?></th>
						<th><?php echo isset($static_words['lang']) ? $static_words['lang'] : '' ?></th>
						<th><?php echo isset($static_words['actions']) ? $static_words['actions'] : '' ?></th>
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
								<td><a href="/<?php print $URLRewriting ? 'admin/edit/static_words/' : 'admin.php?action=edit&bundle=static_words&id=' ?><?php echo $item['id'] ?>">Edit</a> &nbsp; <a href="/admin/delete/static_words/<?php echo $item['id'] ?>">Delete</a></td>
							</tr>
						<?php endwhile; ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>