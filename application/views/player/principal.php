<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Principal page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h3>Players</h3>
		<div class="row">
			<form method="post" action="<?php echo base_url('player/save');?>">
				<div class="col-md-6">
					<div class="form-group input-group">
						<span class="input-group-addon">ID:</span>
						<input type="text" readonly name="id" class="form-control" value="<?php echo $player->id?>">
					</div>

					<div class="form-group input-group">
						<span class="input-group-addon">Name:</span>
						<input type="text" name="name" class="form-control" value="<?php echo $player->name?>">
					</div>

					<div class="form-group input-group">
						<span class="input-group-addon">Type:</span>
						<input type="text" name="type" class="form-control" value="<?php echo $player->type?>">
					</div>

					<div class="form-group input-group">
						<span class="input-group-addon">Games won:</span>
						<input type="text" name="gwon" class="form-control" value="<?php echo $player->gwon?>">
					</div>

					<div class="text-center">
						<button class="btn btn-success" type="submit">Save</button>
					</div>
				</div>
			</form>
		</div>
		<h3>Saved records</h3>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Type</th>
					<th>Games won</th>
					<td>--</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($players as $player){
						$linkEdit = base_url("/player/?id={$player->id}");
						$linkDelete = base_url("/player/delete/?id={$player->id}");
						echo "<tr>
							<td>{$player->id}</td>
							<td>{$player->name}</td>
							<td>{$player->type}</td>
							<td>{$player->gwon}</td>
							<td>
								<a href=\"{$linkDelete}\" onclick='return validateDelete();' class=\"btn btn-danger btn-sm\">Delete</a>
								<a href=\"{$linkEdit}\" class=\"btn btn-info btn-sm\">Edit</a>
							</td>
						</tr>";
					}
				?>
			</tbody>
		</table>
	</div>

	<script>
		function validateDelete(){
			return confirm("Are you sure that you want to delete this player.");
		}
	</script>
</body>
</html>