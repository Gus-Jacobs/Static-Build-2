<?php 
include "settings.php";
error_reporting(0);

if (isset($_POST['submit'])) {
	$name = $_POST['Name'];
	$passw = $_POST['Password'];
	$pfp = $_POST['pfp'];
}

$sql = "INSERT INTO users (Name, Password, pfp) VALUES ('$name', '$passw' ,'$pfp')";

$result = $conn->query($sql);

if($result == TRUE) {
	echo "New record created succesfully";
 }
 else {
 	echo "Error:" .$sql . "<br>".$conn->error;
 }

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Settings</title>
</head>
<body>
<h2>Signup Form</h2>

<form action="" method="POST">
	<fieldset>
		<legend>Personalize</legend>
		User name: <br>
		<input type="text" name="Name">
		<br>
		Password: <br>
		<input type="text" name="Password">
		<br>
		Profile Image: <br>
		<input type="file" name="pfp">
		<br>
		<input type="submit" name="submit" value="submit">
	</fieldset>
</form>
</body>
</html>