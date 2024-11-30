<?php 
include "settings.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title> UH</title>
    <style type="text/css">
        .btn {
            border-radius: 2rem;
            padding: 1rem;
            background: red;
            color: white;
        }
        .btny {
            border-radius: 2rem;
            padding: 1rem;
            background: blue;
            color: white;
        }
    </style>
 </head>
 <body>
 <h2>users</h2>
 <table>
 	<thead>
 		<tr>
 			<th>ID</th>
 			<th>Name</th>
 			<th>Pasword</th>
 			<th>Profile Image</th>
 			<th>Background Image</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php

 		if($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
 		?>	
 		<tr>
 			<td><?php echo $row['id']; ?></td>
 			<td><?php echo $row['Name']; ?></td>
 			<td><?php echo $row['Password']; ?></td>
 			<td><img height="100px" width="100px" src="images/<?php echo $row['pfp']; ?>"></td>
 			<td><img height="100px" width="100px" src="images/<?php echo $row['backgroundImage']; ?>"></td>
            <td><a class="btny" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
 		</tr> 
        <hr>
 
<h3>Information!</h3>
<div class="main" style=" 
background-image: url(images/<?php echo $row['backgroundImage']; ?>); 
background-repeat: no-repeat; 
background-size: cover; 
background-position: center;">
<p>Username: <?php echo $row['Name']; ?></p>
<p>Password: <?php echo $row['Password']; ?></p>
<img height="100px" width="100px" src="images/<?php echo $row['pfp']; ?>" style="border-radius: 50%;">
</div>
      <?php
        }       
    }
    ?>
 		
 	</tbody>
 </table>


 </body>
 </html>