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
	<title>Inbox</title>
	<link href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="CSS/inbox.css">
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
	 <div class="right"> <!-- this will be the top of the page -->
	 		<div class="messages">
					<div class="heading">
						<h4>Messages</h4><i class="uil uil-edit"></i>
				     </div>

					<div class="search-bar">
						<i class="uil uil-search"></i> <input class="message-search-bar" id="message-search" placeholder="Search Messages" type="search">
					 </div>
					<div class="category">
						<h6 class="cate active" id="primary">Primary</h6> <!-- all messages marked 'primary' -->
						<h6 class="cate" id="general">General</h6> <!-- all messages in general  -->
						<h6 class="cate message-requests" id="requests">Requests(0)</h6> <!-- all message requests -->
					</div>
		<div class="message-container">
	 		<div id="a">
	 			<div class="messages">
					<div class="message">
						<div class="profile-picture">
							<img src="IMG/<?php echo $pfp2 ?>">
							<div class="away" title="Away"> </div>
							<div class="primary" title="Primary"> </div>
						</div>
						<div class="message-body">
							<h5><?php echo $real2 ?><small title="Primary" class="text-muted"> †</small></h5>
							<p class="text-muted"> Dont worry babe I'll always love you!</p>
						</div>
					</div>
					<div class="message">
						<div class="profile-picture">
							<img src="IMG/<?php echo $pfp ?>">
							<div class="active" title="Active"> </div>
							<div class="primary" title="Primary"> </div>
						</div>
						<div class="message-body">
							<h5><?php echo $real ?><small title="Primary" class="text-muted"> †</small></h5>
							<p class=""> Its time to turn the page, and walk away</p>
						</div>
					</div>
				</div>
	 		</div>
	 			<div style="display: none;" id="b">
	 			<div class="general">
	 				<div class="messages">
					<div class="message">
						<div class="profile-picture">
							<img src="IMG/<?php echo $pfp2 ?>">
							<div class="away" title="Away"> </div>
							<div class="primary" title="Primary"> </div>
						</div>
						<div class="message-body">
							<h5><?php echo $real2 ?><small title="Primary" class="text-muted"> †</small></h5>
							<p class="text-muted"> Dont worry babe I'll always love you!</p>
						</div>
					</div>
					<div class="message">
						<div class="profile-picture">
							<img src="IMG/<?php echo $pfp ?>">
							<div class="active" title="Active"> </div>
							<div class="primary" title="Primary"> </div>
						</div>
						<div class="message-body">
							<h5><?php echo $real ?><small title="Primary" class="text-muted"> †</small></h5>
							<p class=""> Its time to turn the page, and walk away</p>
						</div>
					</div>
					<div class="message">
						<div class="profile-picture">
							<img src="IMG/post.jpg">
							<div class="active" title="Active"> </div>
						</div>
						<div class="message-body">
							<h5>All Good Things</h5>
							<p class="">New Song for you!</p>
						</div>
					</div>
					<div class="message">
						<div class="profile-picture">
							<img src="IMG/pfp.jpg">
							<div class="active" title="Active"> </div>
						</div>
						<div class="message-body">
							<h5>Nick</h5>
							<p class=""> Is this Lexi?</p>
						</div>
					</div>
	 			</div>
	 				</div>
	 			</div>
	 		<div style="display: none;" id="c">
	 			<div class="friend-requests">
					<h4>Requests</h4>
					<div class="request">
						<div class="info">
							<div class="profile-picture">
								<img src="IMG/pfp2.jpg">
							</div>
							<div>
								<h5>Pete Jacobs</h5>
								<p class="text-muted">
									1 mutual friends
								</p>
								
							</div>
						</div>
						<div class="action">
									<button class="btn btn-primary">
										Accept
									</button>
									<button class="btn">
										Decline
									</button>
								</div>
					</div>
					
				</div>
	 			</div>
	 	</div>
	</div>
	 	</div>
	 	<p class="text-muted" id="selected">Selected Message will show here</p> 
	 	<div class="selected_message">
	 		<div class="message_head">
	 			<h2>Message name</h2>
	 			<img class="profile-picture" src="IMG/<?php echo $pfp; ?>">
	 			<h4>Username</h4>
	 			<small>Start Date</small> 
	 			<small class="text-muted">Number of members</small>
	 		</div>
	 		<div class="messages">
	 			<div class="message">
	 				<div class="message-head">
						<div class="profile-picture"><img src="IMG/<?php echo $pfp2; ?>"></div>	
							<h5><?php echo $real2; ?></h5>
							<small><?php echo $title2; ?></small>
							<small>post count here</small>
						</div>
						<div class="message_body">
							<small class="text-muted">Time</small>
							<p class="text-muted"> Dont worry babe I'll always love you!</p>
						</div>
					</div>
					<div class="message">
	 				<div class="message-head">
						<div class="profile-picture"><img src="IMG/<?php echo $pfp2; ?>"></div>	
							<h5><?php echo $real2; ?></h5>
							<small><?php echo $title2; ?></small>
							<small>post count here</small>
						</div>
						<div class="message_body">
							<small class="text-muted">Time</small>
							<p class="text-muted"> Dont worry babe I'll always love you!</p>
						</div>
					</div>
					<div class="message">
	 				<div class="message-head">
						<div class="profile-picture"><img src="IMG/<?php echo $pfp2; ?>"></div>	
							<h5><?php echo $real2; ?></h5>
							<small><?php echo $title2; ?></small>
							<small>post count here</small>
						</div>
						<div class="message_body">
							<small class="text-muted">Time</small>
							<p class="text-muted"> Dont worry babe I'll always love you!</p>
						</div>
					</div>
	 			</div>
	 		</div>
	 		<div class="respond">
	 			<div class="formatting">	 			
	 			<a href="#">Strikethrough</a>
	 			<a href="#">Italics</a>
	 			<a href="#">Bold</a>
	 			<a href="#">Supersript</a>
	 			<a href="#">Subscript</a>
	 			<a href="#">Emoji</a>
	 			<a href="#">Insert Link</a>
	 		</div>
	 		<div class="message">
	 			<img class="profile-picture" src="IMG/<?php echo $pfp; ?>">
	 			<input type="text" name="respond" placeholder="Respond">
	 			<h4 class="text-muted">Insert Image</h4>
	 		</div>
	 		</div>
	</main>
</body>
<script type="text/javascript">
const menuItems = document.querySelectorAll('.cate');

const changeActiveItem = () => {
	menuItems.forEach(item => {
		item.classList.remove('active');
	})
}

menuItems.forEach(item => {
	item.addEventListener('click', () => {
		changeActiveItem();
		item.classList.add('active');
		if (item.id == 'primary'){
			document.querySelector('#a').style.display = 'block';
			document.querySelector('#b').style.display = 'none';
			document.querySelector('#c').style.display = 'none';
		} else if(item.id == 'general'){
			document.querySelector('#a').style.display = 'none';
			document.querySelector('#b').style.display = 'block';
			document.querySelector('#c').style.display = 'none';
		} else if(item.id == 'requests'){
			document.querySelector('#a').style.display = 'none';
			document.querySelector('#b').style.display = 'none';
			document.querySelector('#c').style.display = 'block';
		}
 })

})

//search messages
const messages = document.querySelector('.messages');
const message = messages.querySelectorAll('.message');
const messageSearch = document.querySelector('#message-search');

const searchMessage = () => {
	const val = messageSearch.value.toLowerCase();
	message.forEach(user => {
		let name = user.querySelector('h5').textContent.toLowerCase();
		if(name.indexOf(val) != -1){
			user.style.display = 'flex';
		} else{
			user.style.display = 'none';
		}
console.log(val);
	})
	}
		

//search chat 
messageSearch.addEventListener('keyup', searchMessage);
</script>
</html>
	<?php endwhile; ?>
	<?php endwhile; ?>




	<?php
}
	?>