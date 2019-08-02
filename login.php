<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Daxil ol</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Istifadeçi adı</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Şifre</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Daxil ol</button>
		</div>
		<p>
			Üzv deyilsən? <a href="register.php">Qeydiyyatdan keç</a>
		</p>
	</form>


</body>
</html>