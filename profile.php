<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

$active = ($_SESSION['id']);



	if ($active == 1) {
		$inactive = 2;
	} else {
		$inactive = 1;
	}
	//connection 1 for the active user
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'test_db');
$sql_active = "SELECT * FROM users WHERE id = $active";
$featured_active = $con->query($sql_active);

//connection 2 for inactive user

$sql_inactive = "SELECT * FROM users WHERE id = $inactive";
$featured_inactive = $con->query($sql_inactive);

while ($product_active = mysqli_fetch_assoc($featured_active)):
while ($product_inactive = mysqli_fetch_assoc($featured_inactive)):

$id = $product_active['id'];
$name = $product_active['user_name'];
$password = $product_active['password'];
$pfp = $product_active['pfp'];
$story = $product_active['story'];
$bgi = $product_active['bgi'];
$title = $product_active['title'];
$rank = $product_active['rank'];
$number = $product_active['number'];
$real = $product_active['name'];

$id2 = $product_inactive['id'];
$name2 = $product_inactive['user_name'];
$password2 = $product_inactive['password'];
$pfp2 = $product_inactive['pfp'];
$story2 = $product_inactive['story'];
$bgi2 = $product_inactive['bgi'];
$title2 = $product_inactive['title'];
$rank2 = $product_inactive['rank'];
$number2 = $product_inactive['number'];
$real2 = $product_inactive['name'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile <?php echo $id ?></title>
	<link rel="stylesheet" type="text/css" href="CSS/profile.css">
	<link rel="stylesheet" type="text/css" href="CSS/media.css">
</head>
<body style="background: url(IMG/<?php echo $bgi ?>); background-position: center; background-size:cover ;background-repeat: no-repeat;">
<nav>
		<div class="container">
			<a href="static.php"><h2 class="log">Static</h2></a>
			<div class="search-bar">
				<i class="uil uil-search"></i> <input placeholder="Search Site" type="search">
			</div>
			<div class="create">
				<a href="logout.php"><label class="btn btn-primary" for="creat-post">Logout</label></a>
				<div class="profile-picture"><a href="profile.php"><img src="IMG/<?php echo $pfp ?>"></a></div>
			</div>
		</div>
	</nav>
	<main>
		<div class="top">
			<h3><?php echo $name ?></h3>
			<img class="profile-main" src="IMG/<?php echo $pfp ?>">
			<p class="<?php echo $rank ?>"><?php echo $rank ?></p>
			<p class="title">"<?php echo $title ?>"</p>
			<a href="inbox.php"><label class="btn btn-primary" for="creat-post">Message</label></a>
		</div>
		<div class="bottom">
			<h3>Story</h3>
			<img src="IMG/<?php echo $story ?>">
		</div>
	</main>
</body>
</html>

	<?php endwhile; ?>
	<?php endwhile; ?>




	<?php
}
	?>