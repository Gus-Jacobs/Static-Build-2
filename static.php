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

// $sql_comments = "SELECT * FROM comments";
// $featured_comments = $con->query($sql_comments);

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

// $posts = $product_comments['comment'];
// $time = $product_comments['DatenTime'];
// $img = $product_comments['attachment'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Static</title>
	<link href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css" rel="stylesheet" type="text/css">
	<link href="CSS/style.css" rel="stylesheet" type="text/css">
	<link href="IMG/apple.png" rel="icon" type="image/x-icon">
</head>
<body>
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
		<div class="container">
			<div class="left">
				<a class="profile">
				<div class="profile-picture"><img src="IMG/<?php echo $pfp; ?>"></div>
				<div class="handle">
					<h4><?php echo $real ?></h4>
					<p class="text-muted">@<?php echo $name ?></p>
				</div></a>
				<div class="sidebar">
					<a class="menu-item active" onclick="refresh()"><span><i class="uil uil-home"></i></span>
					<h3>Home</h3></a> <a class="menu-item" id="explore"><span><i class="uil uil-compass"></i></span>
					<h3>Explore</h3></a> <a class="menu-item" id="Notifications"><span><i class="uil uil-bell"><small class="notification-count">1</small></i></span>
					<h3>Notifications</h3>
					<div class="Notifications-popup">
						<div>
							<div class="profile-picture"><img src="IMG/<?php echo $pfp2 ?>"></div>
							<div class="Notifications-body">
								<b><?php echo $real2 ?></b> has accepted your friend request <small class="text-muted">1 hour ago</small>
							</div>
						</div>
					</div></a> <a class="menu-item" id="messages-notifications"><span><i class="uil uil-envelope-alt"><small class="notification-count">1</small></i></span>
					<h3>Messages</h3></a> <a class="menu-item" id="bookmark"><span><i class="uil uil-bookmark"></i></span>
					<h3>Bookmarks</h3></a> <a class="menu-item" id="analytics"><span><i class="uil uil-chart-line"></i></span>
					<h3>Analytics</h3></a> <a class="menu-item" id="theme"><span><i class="uil uil-palette"></i></span>
					<h3>Theme</h3></a> <a class="menu-item active" id="settings"><span><i class="uil uil-settings"></i></span>
					<h3>Settings</h3></a>
				</div><label class="btn btn-primary" for="create-post">Create Post</label>
			 </div>
			<div class="middle">
				<div class="stories">
					<div class="story" style="background: url(IMG/<?php echo $story ?>); 
					background-repeat: no-repeat;background-position: center;background-size: cover;">
						<div class="profile-picture"><img src="IMG/<?php echo $pfp ?>"></div>
						<p class="name">Your Story</p>
					</div>
					<div class="story" style="background: url(IMG/<?php echo $story2 ?>); 
					background-repeat: no-repeat;background-position: center;background-size: cover;">
						<div class="profile-picture"><img src="IMG/<?php echo $pfp2 ?>"></div>
						<p class="name"><?php echo $real2 ?></p>
					</div>
				</div>
				<form class="create-post" method="Post" action="">
					<div class="profile-picture"><img src="IMG/<?php echo $pfp ?>"></div><input  id="create-post" placeholder="What's on your mind, <?php echo $real ?>?" type="text"><label class="btn btn-primary" for="create-post">Post</label>
				</form>
				<div class="feeds">
					<div class="feed">
						<div class="head">
							<div class="user">
								<div class="profile-picture"><img src="IMG/<?php echo $pfp ?>"></div>
								<div class="info">
									<h3><?php echo $real ?></h3><small class="date"></small>
								</div>
							</div><span class="edit"><i class="uil uil-ellipsis-h"></i></span>
						</div>
						<div class="photo"><img src="IMG/<?php echo $story ?>"></div>
						<div class="action-button">
							<div class="interaction-buttons">
								<span><i class="uil uil-heart"></i></span> <span><i class="uil uil-comment-dots"></i></span> <span><i class="uil uil-sahre-alt"></i></span>
							</div>
							<div class="bookmark">
								<span><i class="uil uil-bookmark-full"></i></span>
							</div>
						</div>
						<div class="liked-by">
							<span><img src="IMG/<?php echo $pfp2 ?>"></span>
							<p>Liked by <b><?php echo $real2 ?></b></p>
						</div>
						<div class="caption">
							<p><b><?php echo $real ?></b> Hey welcome to Static! I finally did it I'm so excited to see if it works! <span class="harsh-tag">#GreatDay</span></p>
						</div>
						<div class="comments text-muted">
							View all 4 comments
						</div>
					</div>
					<div class="feed">
						<div class="head">
							<div class="user">
								<div class="profile-picture"><img src="IMG/<?php echo $pfp2 ?>"></div>
								<div class="info">
									<h3><?php echo $real2 ?></h3><small class="date"></small>
								</div>
							</div><span class="edit"><i class="uil uil-ellipsis-h"></i></span>
						</div>
						<div class="photo"><img src="IMG/<?php echo $story2 ?>"></div>
						<div class="action-button">
							<div class="interaction-buttons">
								<span><i class="uil uil-heart"></i></span> <span><i class="uil uil-comment-dots"></i></span> <span><i class="uil uil-sahre-alt"></i></span>
							</div>
							<div class="bookmark">
								<span><i class="uil uil-bookmark-full"></i></span>
							</div>
						</div>
						<div class="liked-by">
							<span><img src="IMG/<?php echo $pfp ?>"></span>
							<p>Liked by <b><?php echo $real ?></b></p>
						</div>
						<div class="caption">
							<p><b><?php echo $real2 ?></b> Love this game^ <span class="harsh-tag">#Gaming</span></p>
						</div>
						<div class="comments text-muted">
							View all 8 comments
						</div>
					</div>
				</div>
			 </div>
			<div class="right">
			 <div class="messages">
					<div class="heading">
						<h4>Messages</h4><i class="uil uil-edit"></i> 
						<a class="btn btn-primary" href="inbox.php">Go to Inbox</a>
				     </div>

					<div class="search-bar">
						<i class="uil uil-search"></i> <input class="message-search-bar" id="message-search" placeholder="Search Messages" type="search">
					 </div>
					<div class="category">
						<h6 class="active">Primary</h6>
						<h6>General</h6>
						<h6 class="message-requests">Requests(0)</h6>
					</div>
					<div class="message">
						<div class="profile-picture">
							<img src="IMG/<?php echo $pfp2 ?>">
							<div class="away"> </div>
						</div>
						<div class="message-body">
							<h5><?php echo $real2 ?></h5>
							<p class="text-muted"> Dont worry babe I'll always love you!</p>
						</div>
						
					</div>
				</div>



				<div class="friend-requests">
					<h4>Requests</h4>
					<div class="request">
						<div class="info">
							<div>
								<p class="text-muted">
									No requests
								</p>
								
							</div>
						</div>
						<!-- <div class="action">
									<button class="btn btn-primary">
										Accept
									</button>
									<button class="btn">
										Decline
									</button>
								</div> -->
					</div>
					
				</div>

			</div>
	    </div>
	   <!--  What needs to be done:
	    >4. Add theme stuff into db so they are saved.
	    	1) Get it to Stop alerting on reload
	    	2) Get the font color/sidebar color to change when background is
	    	3) Get both font size and primary color set to onchange as well
	    5. Make every PFP into a link to the persons profile.
	    6. Main search bar needs to search the whole site.
	    >7. Make posting.
	    	ERROR: It works but duplicates the last comment
	    >8. make an inbox? *This is not required*
	    9. Friend requests denial/acceptal needs to either delet or forward the request.
	    10. Message categories need to have actual values.
	    11. Create button needs to allow you to add a new story. 
	    12. message and notif numbers need to be set and made change on new notifs.
	    13. figure out how to work notifs and get them to display in the right place when needed.
	    14. Try and fix sticky sidebars after fontsized is changed.
	    >15. add values to each other main menu feature on the left. 
	     A) Explore Needs to have interactive features-->

	</main>

	<div class="customize-theme">
		<div class="card">
			<h2>Customize Your View</h2>
			<p class="text-muted">Manage your font size, color and background</p>

<!-- font sizes
 -->
		 	<div class="font-size">
		 		<h4>Font Size</h4>
		 		<div>
		 			<h6>Aa</h6>
		 		<div class="choose-size">
		 			<span class="font-size-1"></span>
		 			<span class="font-size-2"></span>
		 			<span class="font-size-3 active"></span>
		 			<span class="font-size-4"></span>
		 			<span class="font-size-5"></span>
		 		</div>
		 		<h3>Aa</h3>
		 		</div>
		 	</div>

<!--   primary colors -->
			<div class="color">
				<h4>Color</h4>
				<div class="choose-color">
					<span class="color-1 active"></span>
					<span class="color-2"></span>
					<span class="color-3"></span>
					<span class="color-4"></span>
					<span class="color-5"></span>
				</div>
			</div>
<!-- background colors -->

			<div class="background">
				<h4>Background</h4>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="choose-bg">
					<label for="bg1" class="bg-1 active">
						<input type="radio" name="bg" value="Green" id="bg1">
						<h5 for="bg-1">Light</h5>
						</label>
					<label for="bg2" class="bg-2">
						<input type="radio" name="bg" value="Blue" id="bg2">
						<h5 for="bg-2">Dim</h5>
						</label>
					<label for="bg3" class="bg-3">
						<input type="radio" name="bg" value="Red" id="bg3">
						<h5 for="bg-3">Lights Out</h5>
					</label>
				</div>
					<input type="submit" name="go" class="btn">
				
				<?php
				if (isset($_POST['go'])) {
				
				
				$color = $_POST['bg'];

				if ($color == "Green") {
					$bg = "hsl(252, 30%, 95%)";
				} elseif ($color == "Blue") {
					$bg = "hsl(252, 30%, 17%)";
				} elseif ($color == "Red") {
					$bg = "hsl(252,30%,10%)";
				} else {
					$bg = "white";
				}
			}
				?>
			</form>
			</div>
		</div>
		
	</div>
	<!-- Settings card customization --> 

	<div class="customize-settings">
		<div class="card">
			<?php
			if ($rank== "Admin") {
			  ?>
			<h2>Settings</h2>
			<p class="text-muted">Customize site settings</p>
			<h3>Users:</h3>
			<div class="users_list">
				<div class="user">
					<h4><?php echo $name ?></h4>
					<img class="profile-picture" src="IMG/<?php echo $pfp ?>">
					<a href="update.php?id=<?php echo $id; ?>" class="edit_user">Edit user</a>&nbsp;
					<a href="#" onclick="alert('You cannot Delete this user');" class="delete_user">Delete user</a>
				</div>
			<div class="user">
				<h4><?php echo $name2 ?></h4>
				<img class="profile-picture" src="IMG/<?php echo $pfp2 ?>">
				<a href="update.php?id=<?php echo $id2; ?>" class="edit_user">Edit user</a>&nbsp;
				<a href="delete.php" class="delete_user">Delete user</a>
			</div>
		</div>
		<div class="create_user">
			<a href="#create.php" onclick="alert('Create Member field is currently disabled');"><h3>Create New Member</h3></a>
		</div>
			<?php
		} else {
			?>
			<h2>Sorry,</h2>
			<p class="text-muted">This is off limits for Members</p>
			<?php
		}
			  ?>
		</div>
	</div>

	<!-- Analytics -->
	<div class="customize-analytics">
		<div class="card">
			<h2>Site Information</h2>
			<p class="text-muted">Members: 2</p>
			<p class="text-muted">Posts: 2</p>
			<p class="text-muted">Admin: 2</p>
			<p class="text-muted">Created: June 21st, 2022</p>
			<p class="text-muted">Updated: November 28th, 2022</p>
			<p class="text-muted">Creator: Gus Jacobs</p>
			<p class="text-muted">Owner: Lexi Kamish</p>
			<p class="text-bold">Static 2022 All Rights Reserved.</p>
		</div>
	</div>
<!-- bookmarked -->
	<div class="customize-bookmark">
		<div class="card">
			<h2>Bookmarks</h2>
			<p class="text-muted">You have no bookmarks.</p>
			<p class="text-muted">To create a bookmark, click 'bookmark' on an element.</p>
		</div>
	</div>
<!-- explore -->
<div class="customize-explore">
		<div class="card">
		 <h2>Explore Content per user</h2>
		 <p class="text-muted">Select a User to sort there content.</p>
		 <p class="text-muted"><?php echo $real; ?></p><img class="pfp" src="IMG/<?php echo $pfp; ?>">
		 <p class="text-muted"><?php echo $real2; ?></p><img class="pfp" src="IMG/<?php echo $pfp2; ?>">
		</div>
	</div>
<!-- posting -->
<div class="customize-post">
<div class="card">
	<p class="text-muted">Create a post</p>
	<form action="" method="Post">
	<input class="comments" type="text" name="comment" placeholder="Comment">
	<input class="time" type="text" name="time" placeholder="Date and Time">
	<input class="file" type="file" name="attachment">
	<input type="hidden" name="id" value="1">
	<input class="btn btn-primary" type="submit" name="go">
</form>

<?php

// $conn = mysqli_connect('localhost', 'root');
// mysqli_select_db($conn, 'test_db');

// if (isset($_POST['go'])) {
// 	$comment = $_POST['comment'];
// 	$time = $_POST['time'];
// 	$file = $_POST['attachment'];

// 	$sql = "INSERT INTO comments (comment, DatenTime, attachment) VALUES ('$comment','$time','$file')";


// 	$result = $conn->query($sql);

// 	if ($result == TRUE) {
// 		echo "Record Updated";
// 	} else {
// 		echo "Error:" .$sql ."<br>" .$conn->error;
// 	}
// }

 ?>

</div>
</div>	

<script type="text/javascript" src="static.js"></script>
<script type="text/javascript">
	document.body.style.background = "<?php echo $bg; ?>"
	// var sdt = Date();
	// var sy = sdt.getMonth();
	// document.querySelectorAll('.date').innerHTML = sy;
</script>
</body> 
</div>

</html>

	<?php endwhile; ?>
	<?php endwhile; ?>




	<?php
}
	?>