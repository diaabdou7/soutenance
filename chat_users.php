<!DOCTYPE html>
<html>
<head>
	<title>Parti chat</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    	<form method="POST" role ="form" id="formumaire" class="formulaire">
			  <h1>Connexion</h1>

			<label><b>Nom d'utilisateur:</b></label>
			<input type="text" name="uname" placeholder="Entrer le nom d'utillisateur" required class="zonetext"><br><br>


			<label><b>Email:</b></label>
			<input type="email" name="email" placeholder="Entrer votre email" required class="zonetext"><br><br><br>

           <input type="submit" name="join" VALUE="LOGIN" id="submit" class="submit">
		</form>
    </div>
    <?php 
           if(isset($_POST['join'])){
                 session_start();
           	     require_once('db/users_chat.php');
           	     $objUser = new users;
                 $objUser->setEmail($_POST['email']);
                 $objUser ->setName($_POST['uname']);
                 $objUser ->setLoginStatus(1);
                 $objUser->setLastLogin(date('Y-m-d h:i:s'));
                 $userData=$objUser->getUserByEmail();
                 if(is_array($userData) && count($userData)>0){
                    $objUser->setId($userData['id']);
                    if($objUser->updateLoginStatus()){
                      
                      $_SESSION['user'][$userData['id']] =(array)$userData;
                      echo "User login ";
                      header("location:chat_room2.php");
                    }else{
                      echo "Failed to login";
                    }
                 }else{
                      if($objUser->save()){
                        $lasId =$objUser->dbConn->lastInsertId();
                        $objUser->setId($lastId);
                        $_SESSION['user'][$userData['id']] = $objUser;
                       echo "User Registred";
                       header("location:chat_room2.php");   
                   }else{
                     echo "failed";
                   }                
 
                 }
                 
           	     
           	     	 


           	   
           }




     ?>
</body>
</html>