<!DOCTYPE html>
<html>
<head>
	<title>Chat application in php using web scocket programming</title>
	<link rel="stylesheet" href="../library/css/bootstrap.min.css">
	<script src="../library/js/jquery-3.2.1.min.js"></script>
	<style type="text/css">
		#messages {
			height: 200px;
			background: whitesmoke;
			overflow: auto;
		}
		#chat-room-frm {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2 class="text-center" style="margin-top: 5px; padding-top: 0;">Chat application in PHP & MySQL using Ratchet Library</h2>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<?php 
					session_start();
					if(!isset($_SESSION['user'])) {
						header("location: index.php");
					}
					require("db/users_chat.php");
					require("db/chatrooms.php");

					$objChatroom = new chatrooms;
					$chatrooms   = $objChatroom->getAllChatRooms();

					$objUser = new users;
					$users   = $objUser->getAllUsers();
				 ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<td>
								<?php 
									foreach ($_SESSION['user'] as $key => $user) {
										$userId = $key;
										echo '<input type="hidden" name="userId" id="userId" value="'.$key.'">';
										echo "<div>".$user['name']."</div>";
										echo "<div>".$user['email']."</div>";
									}
								 ?>
							</td>
							<td align="right" colspan="2">
								<input type="button" class="btn btn-warning" id="leave-chat" name="leave-chat" value="Leave">
							</td>
						</tr>
						<tr>
							<th colspan="3">Users</th>
						</tr>
					</thead>
					<tbody>
						 <?php 
							foreach ($users as $key => $user) {
								$color = 'color: red';
								if($user['login_status'] == 1) {
									$color = 'color: green';
								}
								if(!isset($_SESSION['user'][$user['id']])) {
								echo "<tr><td>".$user['name']."</td>";
								echo "<td><span class='glyphicon glyphicon-globe' style='".$color."'></span></td>";
								echo "<td>".$user['last_login']."</td></tr>";
								}
							}
						 ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-8">
				<div id="messages">
					<table id="chats" class="table table-striped">
					  <thead>
					    <tr>
					      <th colspan="4" scope="col"><strong>Chat Room</strong></th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		foreach ($chatrooms as $key => $chatroom) {

					  			if($userId == $chatroom['userid']) {
					  				$from = "Me";
					  			} else {
					  				$from = $chatroom['name'];
					  			}
					  			echo '<tr><td valign="top"><div><strong>'.$from.'</strong></div><div>'.$chatroom['msg'].'</div><td align="right" valign="top">'.date("d/m/Y h:i:s A", strtotime($chatroom['created_on'])).'</td></tr>';
					  		}
					  	 ?>
					  </tbody>
					</table>
				</div>
					
				<form id="chat-room-frm" method="post" action="">
					<div class="form-group">
                    	<textarea class="form-control" id="msg" name="msg" placeholder="Enter Message"></textarea>
	                </div>
	                <div class="form-group">
	                    <input type="button" value="Send" class="btn btn-success btn-block" id="send" name="send">
	                </div>
			    </form>
			</div>
		</div>
	</div>
</body>
</html>