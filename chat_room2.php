<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.7.2.js"></script>
</head>
<body>
       <div class="container">
     	<div class="row">
     		<?php
     		        
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
										echo '<input type="text" name="userId" id="userId" value="'.$key.'">';
										echo "<div>".$user['name']."</div>";
										echo "<div>".$user['email']."</div>";
									} 
								 ?>
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
	<script type="text/javascript"  src="script.js"></script>
</body>
</html>