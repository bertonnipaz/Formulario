<?php
session_start();

function isLogged() {
	return isset($_SESSION['logged']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="../css/semantic.min.css">
	<link rel="stylesheet" href="../css/icon.min.css">
	<link rel="stylesheet" href="../css/image.min.css">
	<link rel="stylesheet" href="../css/form.css">
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/semantic.min.js"></script>
</head>
<body>
	<div class="ui secondary pointing menu">
		<a href="home.php" class="item">Home</a>
		<div class="right menu">
			<?php if (isLogged()): ?>
				<a href="logout.php" class="ui item active">Logout</a>
			<?php else: ?>
				<a href="login.php" id="login" class="ui item active">Login</a>
			<?php endif ?>
		</div>
	</div>