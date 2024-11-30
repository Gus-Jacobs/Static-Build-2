<?php 
include "settings.php";

if (isset($_POST['update'])) {
	$user_name = $_POST['user_name'];
	$user_id = $_POST['user_id'];
	$passw = $_POST['Password'];
	$pfp = $_POST['pfp'];
	$bgi = $_POST['backgroundImage'];
	$title = $_POST['title'];
	$rank = $_POST['rank'];
	$story = $_POST['story'];
	$name = $_POST['name'];


	$sql = "UPDATE users SET user_name = '$user_name', password = '$passw', pfp = '$pfp', bgi = '$bgi', title = '$title', rank = '$rank', name = '$name' WHERE id = '$user_id'";

	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo "Record Updated";
	} else {
		echo "Error:" .$sql ."<br>" .$conn->error;
	}
}

if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	$sql = "SELECT * FROM users WHERE id = '$user_id'";

	$result = $conn->query($sql);

	if ($result->num_rows> 0) {
		while ($row = $result->fetch_assoc()) {
				$user_name = $row['user_name'];
				$passw = $row['password'];
				$pfp = $row['pfp'];
				$bgi = $row['bgi'];
				$title = $row['title'];
				$rank = $row['rank'];
				$story = $row['story'];
				$name = $row['name'];
				$id = $row['id'];
		}
		 ?>
 <html>
	<head>
		 <title>Update User <?php echo $id; ?></title>
		 <link rel="stylesheet" type="text/css" href="CSS/forms.css">
		</head>
	<body>
	  <nav>
		<div class="container">
			<a href="static.php"><h2 class="log">Static</h2></a>
			<div class="search-bar">
				<i class="uil uil-search"></i> <input placeholder="Search Site" type="search">
			</div>
			<div class="create">
				<label class="btn btn-primary" for="creat-post">Logout</label>
				<div class="profile-picture"><a href="profile<?php echo $id; ?>"><img src="IMG/<?php echo $pfp ?>"></a></div>
			</div>
		</div>
	</nav>
<main>
		 <h2> User Update Form</h2>
		 <form action="" method="post" style="background-image: url('IMG/<?php echo $bgi; ?>');">

<fieldset>
<legend><h3>Personalize</h3></legend>
<div class="form">
	<div class="labels">
		<label for="user_name">User name: </label>
		<label for="Password">Password:</label>
		<label for="pfp">Profile Picture: </label>
		<label for="backgroundImage">Background Image: </label>
		<label for="title">Member Title: </label>
		<label for="rank">Rank: </label>
		<label for="name">Name: </label>
	</div>
	<div class="inputs">
		<input type="text" name="user_name" value= "<?php echo $user_name; ?>">
		<input type="hidden" name="user_id" value= "<?php echo $id; ?>">
		<input type="password" name="Password" value= "<?php echo $passw; ?>">
		<input type="file" name="pfp" value= "<?php echo $pfp; ?>">
		<input type="file" name="backgroundImage" value= "<?php echo $bgi; ?>">
		<input type="hidden" name="story" value= "<?php echo $story; ?>">
		<input title="Do not use special characters" type="text" name="title" value= "<?php echo $title; ?>">
		<input type="text" name="rank" value= "<?php echo $rank; ?>">
		<input type="text" name="name" value= "<?php echo $name; ?>">
	</div>
</div>
<div class="submit"><input class="submit_btn" type="submit" name="update" value="Update"></div>
	</fieldset>
		 </form>
		</main>
		</body>
		</html>

		<?php
	} else {
		header('Location: view.php');
	}
}

?>