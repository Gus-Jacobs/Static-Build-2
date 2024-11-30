<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/login.css">
</head>
<body>
	<main>
	<img id="loz" src="IMG/apple.png">
	<div class="form">
	
	<form action="login.php" method="post">
		<h2>Login</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"> <?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label> User name</label>
		<input type="text" name="uname" placeholder="User name"> <br> 
		<label> Password</label>
		<input type="password" name="password" placeholder="Password"> <br>
		<button class="submit_btn" type="submit">Login</button>
</div>
		
	</form>
</main>
</body>
</html>